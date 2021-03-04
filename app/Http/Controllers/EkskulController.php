<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Ekskul, Siswa, Kelas};
use App\Http\Requests\MajorRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class EkskulController extends Controller
{
    public function addEkskul()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('ekskul.add', compact('siswa', 'kelas'));
    }

    public function postAddEkskul(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        
        // profile
        $data['nis']   = $request->nis;
        $data['siswa']      = $request->siswa;
        $data['kelas']      = $request->kelas;
        $data['kegiatan']      = $request->kegiatan;
        $data['keterangan']      = $request->keterangan;
        Ekskul::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableEkskul()
    {
        if (request()->ajax()) {
            $query = Ekskul::query();

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
                                    <a class="dropdown-item" href="' . route('edit.ekskul', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.ekskul', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.ekskul', $item->id) . '" method="POST">
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

        return view('ekskul.table');
    }

    // ##Aja request
    // public function getGuru(Request $request){
    //     $search = $request->search;

    //     if($search == ''){
    //         $guru = Guru::orderby("nama")
    //                 ->select("nik")
    //                 ->where("nama", "like", "%".$search."%")
    //                 ->limit(5)
    //                 ->get();
    //     }

    //     $response = array();
    //     foreach($guru as $gu){
    //         $response[] = array(
    //             "value" => $gu->nik,
    //             "label" => $gu->nama
    //         );
    //     }
    //     return response()->json($response);}

    public function detailEkskul($id)
    {
        $ekskul = Ekskul::findOrFail($id);

        return view('ekskul.detail', compact('ekskul'));
    }

    public function editEkskul($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        $siswa = Siswa::all();
        $kelas = Kelas::all();

        return view('ekskul.edit', compact('ekskul', 'siswa', 'kelas'));
    }

    public function updateEkskul(Request $request, $id)
    {
        $ekskul = Ekskul::findOrFail($id);

        DB::table('ekskul')->where('id', $ekskul->id)->update([
            'nis'       => $request->nis,
            'siswa'      => $request->siswa,
            'kelas'     => $request->kelas,
            'kegiatan'    => $request->kegiatan,
            'keterangan'       => $request->keterangan,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyEkskul($id)
    {
        $ekskul = Ekskul::findorFail($id);
        $ekskul->delete();

        return redirect()->back()->with('success', 'Ekskul tersebut berhasil di hapus!');
    }
}
