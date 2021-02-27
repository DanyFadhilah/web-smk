<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Http\Requests\MajorRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
{
    public function addMajor()
    {
        return view('jurusan.add');
    }

    public function postAddMajor(MajorRequest $request)
    {
        // dd($request->all());
        $data = $request->all();

        // profile
        if ($request->logo) {
            $file = $request->file('logo');
            $filenameLogo = sha1($request->nama . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('images/logo', $filenameLogo);
        }

        $data['nama']         = $request->nama;
        $data['kode_jurusan'] = $request->kode_jurusan;
        $data['deskripsi']    = $request->deskripsi;
        $data['logo']         = $filenameLogo;
        Jurusan::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableMajor()
    {
        if (request()->ajax()) {
            $query = Jurusan::query();

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
                                    <a class="dropdown-item" href="' . route('edit.major', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.major', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.major', $item->id) . '" method="POST">
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

        return view('jurusan.table');
    }

    public function detailMajor($id)
    {
        $major = Jurusan::findOrFail($id);

        return view('jurusan.detail', compact('major'));
    }

    public function editMajor($id)
    {
        $major = Jurusan::findOrFail($id);

        return view('jurusan.edit', compact('major'));
    }

    public function updateMajor(MajorRequest $request, $id)
    {
        $data = $request->all();

        $major = Jurusan::findOrFail($id);
        
        if ($request->logo) {
            Storage::delete($major->logo);

            $file = $request->file('logo');
            $logo = sha1($file->getClientOriginalName() . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('images/logo', $logo);
        } elseif ($major->logo) {
            $logo = $major->logo;
        } else {
            $logo = null;
        }

        DB::table('jurusan')->where('id', $major->id)->update([
            'kode_jurusan' => $request->kode_jurusan,
            'nama'         => $request->nama,
            'logo'         => $logo,
            'deskripsi'    => $request->deskripsi,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyMajor($id)
    {
        $major = Jurusan::findorFail($id);
        Storage::delete($major->logo);
        $major->delete();

        return redirect()->back()->with('success', 'Jurusan tersebut berhasil di hapus!');
    }
}
