<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Guru, Mapel};
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

    ##Aja request
    public function getGuru(Request $request){
        $search = $request->search;

        if($search == ''){
            $guru = Guru::orderby("nama")
                    ->select("nik")
                    ->where("nama", "like", "%".$search."%")
                    ->limit(5)
                    ->get();
        }

        $response = array();
        foreach($guru as $gu){
            $response[] = array(
                "value" => $gu->nik,
                "label" => $gu->nama
            );
        }
        return response()->json($response);
    }
}
