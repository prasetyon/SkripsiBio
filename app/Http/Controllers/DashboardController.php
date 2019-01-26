<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Status;
use App\Mahasiswa;
use App\Jadwal;

use Mail;

use App\Mail\Update;
use App\Mail\Revisi;

class DashboardController extends Controller
{
    public function password()
    {
        echo bcrypt('test');
        
        dd("1");
    }
    
    public function index(Request $request)
    {
        if(!$request->session()->get('role')=='admin'){
            return redirect()->route('login');
        }
        else{
            return $this->load();
        }
    }
    
    public function load()
    {
        $status = DB::select('SELECT S.keterangan, IFNULL(M.NUM,0) AS num from statuses S LEFT JOIN (SELECT status, COUNT(nim) as NUM FROM `mahasiswas` GROUP BY status) AS M ON S.id_status=M.status');
//        dd($status);
        
        $revisi = DB::select('SELECT nim, nama_mhs as nama, IF(tanggal_sidang_akhir is null, "proposal", "akhir") AS status FROM `mahasiswas` WHERE status=0');
        
//        $revisi = Mahasiswa::select('nim', 'nama_mhs')->where('status','=','0')->get();
//        dd($revisi);
        
        $waiting = DB::select('SELECT nim, nama_mhs as nama, judul, IF(status=1, tanggal_sidang_proposal, tanggal_sidang_akhir) AS tanggal, IF(status=1, jam_sidang_proposal, jam_sidang_akhir) AS jam, IF(status=1, "proposal", "sidang akhir") AS keterangan FROM `mahasiswas` WHERE (status=1 OR status=4)');
        
        $waitproposal = Mahasiswa::select('nim', 'nama_mhs')->where('status','=','2')->get();
        $waitakhir = Mahasiswa::select('nim', 'nama_mhs')->where('status','=','5')->get();
        
        return view('dashboard')->with('status',$status)->with('waiting',$waiting)->with('revisi',$revisi)->with('waitproposal',$waitproposal)->with('waitakhir',$waitakhir);
    }
    
    public function selesaiSidang(Request $request)
    {
        if($request->status=='revisi'){
            $mhs = Mahasiswa::where('nim','=',$request->nim)
            ->update(['status' => 0,
                     'revisi' => $request->revisi]);
            
            $nim = $request->nim;
            $data = Mahasiswa::where('nim',$nim)->get();

            Mail::send(new Revisi($nim,$nim));
            Mail::send(new Revisi($nim,$data[0]->pembimbing_1));
            Mail::send(new Revisi($nim,$data[0]->pembimbing_2));
            Mail::send(new Revisi($nim,$data[0]->penguji_1));
//            if($data[0]->penguji_2 != 'null') Mail::send(new Revisi($nim,$data[0]->penguji_2));
//            if($data[0]->penguji_3 != 'null') Mail::send(new Revisi($nim,$data[0]->penguji_3));
        }
        else if($request->status=='proposal'){
            $mhs = Mahasiswa::where('nim','=',$request->nim)
            ->update(['status' => 3]);
            
            $this->emailUpdate($request->nim);
        }
        else if($request->status=='akhir'){
            $mhs = Mahasiswa::where('nim','=',$request->nim)
            ->update(['status' => 6]);
            
            $this->emailUpdate($request->nim);
        }
        
        return redirect()->route('dashboard');
    }
    
    private function emailUpdate($nim)
    {
        $data = Mahasiswa::where('nim',$nim)->get();
        
        Mail::send(new Update($nim,$nim));
        Mail::send(new Update($nim,$data[0]->pembimbing_1));
        Mail::send(new Update($nim,$data[0]->pembimbing_2));
        Mail::send(new Update($nim,$data[0]->penguji_1));
//        if($data[0]->penguji_2 != 'null') Mail::send(new Update($nim,$data[0]->penguji_2));
//        if($data[0]->penguji_3 != 'null') Mail::send(new Update($nim,$data[0]->penguji_3));
    }
    
    public function checkRuangan(Request $request)
    {
        $nim = $request->nim;
        
        $status = DB::select('SELECT S.keterangan, IFNULL(M.NUM,0) AS num from statuses S LEFT JOIN (SELECT status, COUNT(nim) as NUM FROM `mahasiswas` GROUP BY status) AS M ON S.id_status=M.status');
//        dd($status);
        
        $revisi = DB::select('SELECT nim, nama_mhs as nama, IF(tanggal_sidang_akhir is null, "proposal", "akhir") AS status FROM `mahasiswas` WHERE status=0');
        
        $waiting = DB::select('SELECT nim, nama_mhs as nama, judul, IF(status=1, tanggal_sidang_proposal, tanggal_sidang_akhir) AS tanggal, IF(status=1, jam_sidang_proposal, jam_sidang_akhir) AS jam, IF(status=1, "proposal", "sidang") AS keterangan FROM `mahasiswas` WHERE (status=1 OR status=4)');
        
        $waitproposal = Mahasiswa::select('nim', 'nama_mhs')->where('status','=','2')->get();
        $waitakhir = Mahasiswa::select('nim', 'nama_mhs')->where('status','=','5')->get();
        
        $query = 'SELECT IF(status=1, tanggal_sidang_proposal, tanggal_sidang_akhir) AS tanggal, IF(status=1, jam_sidang_proposal, jam_sidang_akhir) AS jam, status FROM `mahasiswas` WHERE nim='.$nim;
        $getjam = DB::select($query);
        
        $jam = app('App\Http\Controllers\JamController')->getJam($getjam[0]->jam);
        $jam = explode('-', $jam);
        
        $ruangans = 'SELECT id_ruangan, nama_ruangan FROM `ruangans` WHERE id_ruangan NOT IN (SELECT id_ruangan from `jadwals` where (tanggal='."'".$getjam[0]->tanggal."'".' AND ((mulai BETWEEN '."'".$jam[0]."'".' and '."'".$jam[1]."'".') OR (selesai BETWEEN '."'".$jam[0]."'".' and '."'".$jam[1]."'".'))))';
        $ruangan = DB::select($ruangans);
        
//        dd($ruangan);
        
        return view('dashboard')->with('status',$status)->with('waiting',$waiting)->with('revisi',$revisi)->with('ruangan',$ruangan)->with('nim',$nim)->with('mulai',$jam[0])->with('selesai',$jam[1])->with('tanggal',$getjam[0]->tanggal)->with('waitproposal',$waitproposal)->with('waitakhir',$waitakhir)->with('statuss',$getjam[0]->status);   
    }
    
    public function assignRuangan(Request $request)
    {
//        dd($request);
        
        if($request->status==1){
            $mhs = Mahasiswa::where('nim','=',$request->nim)
                ->update(['ruangan_sidang_proposal' => $request->ruangan,
                         'status' => 2]);
        }
        else if($request->status==4){
        $mhs = Mahasiswa::where('nim','=',$request->nim)
            ->update(['ruangan_sidang_akhir' => $request->ruangan,
                     'status' => 5]);
        }
        
        $jadwal = new Jadwal();
        $jadwal->id_ruangan = $request->ruangan;
        $jadwal->mulai = $request->mulai;
        $jadwal->selesai = $request->selesai;
        $jadwal->tanggal = $request->tanggal;
        $jadwal->save();
                
        $mhs = DB::select('SELECT nim, nama_mhs, judul, IF(status=2, tanggal_sidang_proposal, tanggal_sidang_akhir) AS tanggal, IF(status=2, jam_sidang_proposal, jam_sidang_akhir) AS jam, IF(status=2, ruangan_sidang_proposal, ruangan_sidang_akhir) AS ruang, pembimbing_1, nama_pembimbing_1, pembimbing_2, nama_pembimbing_2, penguji_1, nama_penguji_1, penguji_2, nama_penguji_2, penguji_3, nama_penguji_3, IF(status=2, "proposal", "akhir") AS keterangan, status FROM `mahasiswas` WHERE nim='.$request->nim);
                
        $mhs[0]->jam = app('App\Http\Controllers\JamController')->getJam($mhs[0]->jam);
        $mhs[0]->ruang = app('App\Http\Controllers\RuanganController')->getRuangan($mhs[0]->ruang);
        $date = date_create($mhs[0]->tanggal);
        $mhs[0]->tanggal = date_format($date, "D, j-M-Y");
        
        $generateFile = app('App\Http\Controllers\FileController')->generate($mhs[0]);
        
        if($mhs[0]->status=='2'){
            $mhs = Mahasiswa::where('nim','=',$request->nim)
                ->update(['undangan_proposal' => $generateFile]);
        } else if($mhs[0]->status=='5'){
            $mhs = Mahasiswa::where('nim','=',$request->nim)
                ->update(['undangan_akhir' => $generateFile]);
        }
        
        $this->emailUpdate($request->nim);
                
        return redirect()->route('dashboard');
    }
}