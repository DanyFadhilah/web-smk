<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Materi, Kelas, Mapel};
use App\Http\Requests\MajorRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class MateriController extends Controller
{
    public function addMateri()
    {
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('materi.add', compact('kelas', 'mapel'));
    }

    public function postAddMateri(Request $request)
    {
        $this->validate($request,[
            'lampiran'  => 'required|file|mimes:png,jpg,jpeg,docx,pdf,xlsx,xls|max:5000',
        ]);

        // dd($request->all());
        $data = $request->all();

        // profile
        if ($request->lampiran) {
            $file = $request->file('lampiran');
            $filenameLampiran = sha1($request->nama . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('lampiran', $filenameLampiran);
        }
        
        // profile
        $data['no']   = $request->no;
        $data['judul']      = $request->judul;
        $data['kelas']      = $request->kelas;
        $data['nama_mapel']      = $request->mapel;
        $data['lampiran']        = $filenameLampiran;
        $data['link']  = $request->link;         
        Materi::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableMateri()
    {
        if (request()->ajax()) {
            $query = Materi::query();

            return DataTables::of($query)
                ->addColumn('action', function($item) {
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1"
                                    type="button" id="action' .  $item->id . '"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false">
                                    Aksi
                                </button>
                                <div class="dropdown-menu" aria-labelledby="action' .  $item->id . '">
                                    <a class="dropdown-item" href="' . route('edit.materi', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.materi', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.materi', $item->id) . '" method="POST">
                                        '. method_field('delete') . csrf_field() .'
                                        <button class="dropdown-item text-danger" type="submit">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                })->editColumn('logo', function($item) {
                    return $item->logo ?
                     '<img src="'. asset('storage/images/logo/'.$item->logo) .'" style="max-height: 50px;">'
                     : 'Tidak Ada Logo';
                })->rawColumns([
                    'action', 'logo'
                ])->make();
        }

        return view('materi.table');
    }

    public function detailMateri($id)
    {
        $materi = Materi::findOrFail($id);

        return view('materi.detail', compact('materi'));
    }

    public function editMateri($id)
    {
        $materi = Materi::findOrFail($id);
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        return view('materi.edit', compact('materi', 'kelas', 'mapel'));
    }

    public function updateMateri(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $this->validate($request,[
            'lampiran'  => 'required|file|mimes:png,jpg,jpeg,docx,pdf,xlsx,xls|max:5000',
        ]);

        // profile
        if ($request->lampiran) {
            $file = $request->file('lampiran');
            $filenameLampiran = sha1($request->nama . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('lampiran', $filenameLampiran);
        }

        DB::table('materi')->where('id', $materi->id)->update([
            'no' => $request->no,
            'judul' => $request->judul, 
            'kelas'        => $request->kelas,
            'nama_mapel' => $request->mapel,
            'lampiran' => $request->lampiran,
            'link' => $request->link,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyMateri($id)
    {
        $materi = Materi::findorFail($id);
        $materi->delete();

        return redirect()->back()->with('success', 'Materi tersebut berhasil di hapus!');
    }

}
