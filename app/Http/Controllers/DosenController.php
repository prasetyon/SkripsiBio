<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->session()->get('role')=='dosen'){
            return redirect()->route('login');
        }
        else{
            $nip = $request->session()->get('username');
            $query = 'select nim, nama_mhs as nama, judul, IF(tanggal_sidang_akhir is null, tanggal_sidang_proposal, tanggal_sidang_akhir) AS tanggal, IF(jam_sidang_akhir is null, jam_sidang_proposal, jam_sidang_akhir) AS jam, IF(revisi_proposal is null, proposal, revisi_proposal) as proposal, IF(ruangan_sidang_akhir is null, ruangan_sidang_proposal, ruangan_sidang_akhir) AS ruangan, status, (CASE WHEN pembimbing_1='.$nip.' THEN "Pembimbing 1" WHEN pembimbing_2='.$nip.' THEN "Pembimbing 2" WHEN penguji_1='.$nip.' THEN "Penguji 1" WHEN penguji_2='.$nip.' THEN "Penguji 2" WHEN penguji_3='.$nip.' THEN "Penguji 3" END) as keterangan from mahasiswas where (pembimbing_1='.$nip.' or pembimbing_2='.$nip.' or penguji_1='.$nip.' or penguji_2='.$nip.' or penguji_3='.$nip.')';
            $mhs = DB::select($query);
            
            $revisi = 'select nim, nama_mhs as nama, judul, proposal, revisi_proposal, revisi from mahasiswas where (status=0 AND (pembimbing_1='.$nip.' or pembimbing_2='.$nip.' or penguji_1='.$nip.' or penguji_2='.$nip.' or penguji_3='.$nip.'))';
            $rev = DB::select($revisi);
            
            for($i=0; $i<sizeof($mhs); $i++)
            {
                $mhs[$i]->status = app('App\Http\Controllers\MhsController')->getStatus($mhs[$i]->status);
                $mhs[$i]->jam = app('App\Http\Controllers\JamController')->getJam($mhs[$i]->jam);
                if($mhs[$i]->ruangan!=null)
                $mhs[$i]->ruangan = app('App\Http\Controllers\RuanganController')->getRuangan($mhs[$i]->ruangan);
            }
            
            return view('dosen/index')->with('mhs', $mhs)->with('rev', $rev);
        }
    }
}
