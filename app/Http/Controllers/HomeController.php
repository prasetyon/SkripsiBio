<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('SELECT nim, nama_mhs as nama, judul, IF(tanggal_sidang_akhir IS NOT NULL, tanggal_sidang_akhir, tanggal_sidang_proposal) AS tanggal, IF(tanggal_sidang_akhir IS NOT NULL, ruangan_sidang_akhir, ruangan_sidang_proposal) AS ruangan, IF(tanggal_sidang_akhir IS NOT NULL, jam_sidang_akhir, jam_sidang_proposal) AS jam, nama_pembimbing_1 as pembimbing1, nama_pembimbing_2 as pembimbing2, nama_penguji_1 as penguji1, nama_penguji_2 as penguji2, nama_penguji_3 as penguji3, status FROM `mahasiswas` WHERE tanggal_sidang_proposal IS NOT NULL ORDER BY tanggal ASC, jam ASC');
        
        for($i=0; $i<sizeof($data); $i++)
        {
            $data[$i]->status = app('App\Http\Controllers\MhsController')->getStatus($data[$i]->status);
            $data[$i]->jam = app('App\Http\Controllers\JamController')->getJam($data[$i]->jam);
            if($data[$i]->ruangan!=null) $data[$i]->ruangan = app('App\Http\Controllers\RuanganController')->getRuangan($data[$i]->ruangan);
        }
        
        return view('landing/index')->with('data', $data);
    }
}