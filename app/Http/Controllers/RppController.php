<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Rpp, Guru, Mapel};
use App\Http\Requests\MajorRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class RppController extends Controller
{
    public function addRpp()
    {
        $guru = Guru::all();
        $mapel = Mapel::all();
        return view('rpp.add', compact('guru', 'mapel'));
    }

    public function postAddRpp(Request $request)
    {
        $this->validate($request,[
            'lampiran'  => 'required|file|mimes:docx,pdf|max:5000',
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
        $data['nik']      = $request->nik;
        $data['guru']      = $request->guru;
        $data['mapel']      = $request->mapel;
        $data['ki']      = $request->ki;
        $data['kd']      = $request->kd;
        $data['lampiran']        = $filenameLampiran;     
        Rpp::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableRpp()
    {
        if (request()->ajax()) {
            $query = Rpp::query();

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
                                    <a class="dropdown-item" href="' . route('edit.rpp', $item->id) . '">Sunting</a>
                                    <a class="dropdown-item" href="' . route('view.detail.rpp', $item->id) . '">Lihat Detail</a>
                                    <form action="' . route('destroy.rpp', $item->id) . '" method="POST">
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

        return view('rpp.table');
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

    public function detailRpp($id)
    {
        $rpp = Rpp::findOrFail($id);

        return view('rpp.detail', compact('rpp'));
    }

    public function editRpp($id)
    {
        $rpp = Rpp::findOrFail($id);
        $guru = Guru::all();
        $mapel = Mapel::all();

        return view('rpp.edit', compact('rpp', 'guru', 'mapel'));
    }

    public function updateRpp(Request $request, $id)
    {
        $rpp = Rpp::findOrFail($id);

        $this->validate($request,[
            'lampiran'  => 'file|mimes:docx,pdf|max:5000',
        ]);

        if ($request->lampiran) {
            Storage::delete($rpp->lampiran);

            $file = $request->file('lampiran');
            $lampiran = sha1($file->getClientOriginalName() . Carbon::now() . mt_rand()). '.'.$file->getClientOriginalExtension();
            $file->storeAs('lampiran', $lampiran);
        } elseif ($rpp->lampiran) {
            $lampiran = $rpp->lampiran;
        } else {
            $lampiran = null;
        }

        DB::table('rpp')->where('id', $rpp->id)->update([
            'no'       => $request->no,
            'nik'      => $request->nik,
            'guru'     => $request->guru,
            'mapel'    => $request->mapel,
            'ki'       => $request->ki,
            'kd'       => $request->kd,
            'lampiran' => $lampiran,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyRpp($id)
    {
        $rpp = Rpp::findorFail($id);
        Storage::delete($rpp->lampiran);
        $rpp->delete();

        return redirect()->back()->with('success', 'RPP tersebut berhasil di hapus!');
    }
}
