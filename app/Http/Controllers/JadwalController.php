<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Jadwal, Kelas, Mapel, Guru};
use App\Http\Requests\MajorRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function addJadwal()
    {
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $guru = guru::all();
        return view('jadwal.add', compact('kelas', 'mapel', 'guru'));
    }

    public function postAddJadwal(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        
        // profile
        $data['semester']   = $request->semester;
        $data['tahun']      = $request->tahun;
        $data['kelas']      = $request->kelas;
        $data['mapel']      = $request->mapel;
        $data['jam']        = $request->jam;
        $data['nama_guru']  = $request->nama_guru;         
        Jadwal::create($data);

        return redirect()->back()->with('success', 'Tambah Data Berhasil!');
    }
    
    public function tableJadwal()
    {
        if (request()->ajax()) {
            $query = Jadwal::query();

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
                                    <a class="dropdown-item" href="' . route('edit.jadwal', $item->id) . '">Sunting</a>
                                    <form action="' . route('destroy.jadwal', $item->id) . '" method="POST">
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

        return view('jadwal.table');
    }

    public function editJadwal($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $kelas = Kelas::all();
        $mapel = Mapel::all();
        $guru = guru::all();

        return view('jadwal.edit', compact('jadwal', 'kelas', 'mapel', 'guru'));
    }

    public function updateJadwal(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);

        DB::table('jadwal')->where('id', $jadwal->id)->update([
            'semester' => $request->semester,
            'tahun' => $request->tahun, 
            'kelas'        => $request->kelas,
            'mapel' => $request->mapel,
            'jam' => $request->jam,
            'nama_guru' => $request->nama_guru,
        ]);

        // return back();
        return redirect()->back()->with('success', 'Data Berhasil di Update');
    }

    public function destroyJadwal($id)
    {
        $jadwal = Jadwal::findorFail($id);
        $jadwal->delete();

        return redirect()->back()->with('success', 'Jadwal tersebut berhasil di hapus!');
    }

   }
