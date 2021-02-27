<?php

namespace App\Http\Controllers;

use App\{Mapel, Kelas};
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class MapelController extends Controller
{
    public function addLesson()
    {
        $kelas = Kelas::all();
        return view('mapel.add', compact('kelas'));

        
    }

    public function postAddLesson(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'kelas'        => 'required',
            'kode_mapel'   => 'required|string|unique:mapel,kode_mapel,',
            'mata_pelajaran' => 'required|string|min:2|max:50',
            'detail_mapel' => 'required|min:10',
        ]);

        $lesson = new Mapel();
        $lesson->kelas          = $request->kelas;
        $lesson->kode_mapel     = $request->kode_mapel;
        $lesson->detail_mapel   = $request->detail_mapel;
        $lesson->mata_pelajaran = $request->mata_pelajaran;
        $lesson->save();

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableLesson()
    {
        if (request()->ajax()) {
            $query = Mapel::query();

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
                                    <a class="dropdown-item" href="' . route('edit.lesson', $item->id) . '">Sunting</a>
                                    <form action="' . route('destroy.lesson', $item->id) . '" method="POST">
                                        '. method_field('delete') . csrf_field() .'
                                        <button class="dropdown-item text-danger" type="submit">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                })->rawColumns([
                    'action',
                ])->make();
        }

        return view('mapel.table');
    }

    public function editLesson($id)
    {
        $lesson = Mapel::findOrFail($id);

        return view('mapel.edit', compact('lesson'));
    }

    public function updateLesson(Request $request, $id)
    {
        $lesson = Mapel::findOrFail($id);

        $this->validate($request,[
            'kelas'        => 'required',
            'kode_mapel'   => 'required|string|unique:mapel,kode_mapel,',
            'mata_pelajaran' => 'required|string|min:2|max:50',
            'detail_mapel' => 'required|min:10',
        ]);

        DB::table('mapel')->where('id', $lesson->id)->update([
            'kode_mapel'     => $request->kode_mapel,
            'kelas'          => $request->kelas,
            'mata_pelajaran' => $request->mata_pelajaran,
            'detail_mapel'   => $request->detail_mapel,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyLesson($id)
    {
        $lesson = Mapel::findorFail($id);
        $lesson->delete();

        return redirect()->back()->with('success', 'Mata Pelajaran tersebut berhasil di hapus!');
    }
}
