<?php

namespace App\Http\Controllers;

use App\{Kelas, Jurusan};
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class KelasController extends Controller
{
    public function addClass()
    {
        $jurusan = Jurusan::all();

        return view('kelas.add', compact('jurusan'));
    }

    public function postAddClass(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'kelas' => 'required|string|min:1|max:50|unique:kelas,kelas,',
            'kode_jurusan' => 'required|string',
            'jumlah_siswa' => 'required',
        ]);

        $class = new Kelas();
        $class->kelas        = $request->kelas;
        $class->kode_jurusan = $request->kode_jurusan;
        $class->jumlah_siswa = $request->jumlah_siswa;
        $class->save();

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }

    public function tableClass()
    {
        if (request()->ajax()) {
            $query = Kelas::query();

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
                                    <a class="dropdown-item" href="' . route('edit.class', $item->id) . '">Sunting</a>
                                    <form action="' . route('destroy.class', $item->id) . '" method="POST">
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

        return view('kelas.table');
    }

    public function editClass($id)
    {
        $class = Kelas::findOrFail($id);
        $jurusan = Jurusan::all();

        return view('kelas.edit', compact('class', 'jurusan'));
    }

    public function updateClass(Request $request, $id)
    {
        $class = Kelas::findOrFail($id);

        $this->validate($request,[
            'kelas' => 'required|string|min:1|max:50|unique:kelas,kelas,',
            'kode_jurusan' => 'required|string',
            'jumlah_siswa' => 'required',
        ]);

        DB::table('kelas')->where('id', $class->id)->update([
            'kode_jurusan' => $request->kode_jurusan,
            'kelas'        => $request->kelas,
            'jumlah_siswa' => $request->jumlah_siswa,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyClass($id)
    {
        $class = Kelas::findorFail($id);
        $class->delete();

        return redirect()->back()->with('success', 'Kelas tersebut berhasil di hapus!');
    }
}
