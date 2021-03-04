<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Rapot, Siswa, Kelas};
use App\Http\Requests\MajorRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class RapotController extends Controller
{
    public function addRapot()
    {
        $siswa = Siswa::all();
        $kelas = Kelas::all();
        return view('rapot.add', compact('siswa', 'kelas'));
    }

    public function postAddRapot(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        
        // profile
        $data['nis']   = $request->nis;
        $data['siswa']      = $request->siswa;
        $data['kelas']      = $request->kelas;
        $data['akademik']      = $request->akademik;
        $data['integritas']      = $request->integritas;
        $data['religius']      = $request->religius;
        $data['nasionalis']      = $request->nasionalis;
        $data['mandiri']      = $request->mandiri;
        $data['gotong_royong']      = $request->gotong_royong;
        $data['catatan']      = $request->catatan;
        $data['mitra_pkl']      = $request->mitra_pkl;
        $data['lokasi']      = $request->lokasi;
        $data['lama_pkl']      = $request->lama_pkl;
        $data['keterangan']      = $request->keterangan;


        Rapot::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableRapot()
    {
        if (request()->ajax()) {
            $query = Rapot::query();

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
                                    <a class="dropdown-item" href="' . route('edit.rapot', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.rapot', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.rapot', $item->id) . '" method="POST">
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

        return view('rapot.table');
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

    public function detailRapot($id)
    {
        $rapot = Rapot::findOrFail($id);

        return view('rapot.detail', compact('rapot'));
    }

    public function editRapot($id)
    {
        $rapot = Rapot::findOrFail($id);
        $siswa = Siswa::all();
        $kelas = Kelas::all();

        return view('rapot.edit', compact('rapot', 'siswa', 'kelas'));
    }

    public function updateRapot(Request $request, $id)
    {
        $rapot = Rapot::findOrFail($id);

        DB::table('rapot')->where('id', $rapot->id)->update([
            'nis'               => $request->nis,
            'siswa'             => $request->siswa,
            'kelas'             => $request->kelas,
            'akademik'          => $request->akademik,
            'integritas'        => $request->integritas,
            'religius'          => $request->religius,
            'nasionalis'        => $request->nasionalis,
            'mandiri'           => $request->mandiri,
            'gotong_royong'     => $request->gotong_royong,
            'catatan'           => $request->catatan,
            'mitra_pkl'         => $request->mitra_pkl,
            'lokasi'            => $request->lokasi,
            'lama_pkl'          => $request->lama_pkl,
            'keterangan'        => $request->keterangan,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyRapot($id)
    {
        $rapot = Rapot::findorFail($id);
        $rapot->delete();

        return redirect()->back()->with('success', 'Rapot tersebut berhasil di hapus!');
    }
}

