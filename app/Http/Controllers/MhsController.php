<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\Mahasiswa;
use Mail;

use App\Mail\Daftar;
use App\Mail\DaftarAkhir;
use App\Mail\DaftarDosen;
use App\Mail\DaftarAkhirDosen;

class MhsController extends Controller
{    
    private function permission(Request $request)
    {
        if(!$request->session()->get('role')=='mhs'){
            return false;
        } else return true;
    }
    
    public function data(Request $request)
    {
        if(!$this->permission($request)){
            return redirect()->route('login');
        }
        else{
            $nim = $request->session()->get('username');
            $query = 'SELECT * FROM `mahasiswas` WHERE nim='.$nim;
            $mhs = DB::select($query);

            if($mhs[0]->strata=='S1') $strata="1";
            else $strata="2";
            
            if($mhs[0]->judul==null){
                $strata=$strata.'0';
                $terdaftar = false;
            }
            else{
                $terdaftar = true;
                $strata=$strata.'1';
            }
            
            $queryjam = 'SELECT * FROM `jams` where id_jam LIKE '."'".$strata."%'";
            $jam = DB::select($queryjam);
            
            $querydosen = 'SELECT * FROM `dosens`';
            $dosen = DB::select($querydosen);
            
            return view('mahasiswa/data')->with('mhs',$mhs)->with('jam',$jam)->with('dosen',$dosen)->with('terdaftar',$terdaftar);
        }
    }
    
    public function lempeng(Request $request)
    {
        if(!$this->permission($request)){
            return redirect()->route('login');
        }
        else{
            if($request->isMethod('get')){
                $nim = $request->session()->get('username');
                
                return view('mahasiswa/lempeng');
            } else if($request->isMethod('patch')){
                $input = Input::all();
                $nim = $request->session()->get('username');
                $file = $input['lempeng'];

                $destinationPath = public_path() . '/upload/';
                $file->move($destinationPath,$file->getClientOriginalName());

                $mhs = Mahasiswa::where('nim','=',$nim)
                    ->update(['lempeng' => $file->getClientOriginalName(),
                              'status' => 7]);
                
                Mail::send(new Daftar($nim));
                Mail::send(new DaftarDosen($nim,$pembimbing1[0]));
                Mail::send(new DaftarDosen($pembimbing2[0]));
                Mail::send(new DaftarDosen($penguji1[0]));
                if($request->penguji2!='null') Mail::send(new DaftarDosen($penguji2[0]));
                
                return $this->load($request);
            }
        }
    }
    
    public function file(Request $request)
    {
        if(!$this->permission($request)){
            return redirect()->route('login');
        }
        else{
             $nim = $request->session()->get('username');
             $query = 'SELECT * FROM `mahasiswas` WHERE nim='.$nim;
             $mhs = DB::select($query);

             if($mhs[0]->strata=='S1') $strata="1";
             else $strata="2";

             if($mhs[0]->judul==null){
                 $strata=$strata.'0';
                 $terdaftar = false;
             }
             else{
                 $terdaftar = true;
                 $strata=$strata.'1';
             }
             return view('mahasiswa/file')->with('terdaftar',$terdaftar)->with('mhs',$mhs);
        }
    }
    
    public function revisiakhir(Request $request)
    {
        if(!$this->permission($request)){
            return redirect()->route('login');
        }
        else{
            if($request->isMethod('get')){
                $nim = $request->session()->get('username');
                $query = 'SELECT nim, nama_mhs, judul, revisi FROM `mahasiswas` WHERE nim='.$nim;
                $mhs = DB::select($query);
                
                return view('mahasiswa/revisiakhir')->with('mhs',$mhs);
            } else if($request->isMethod('patch')){
                $input = Input::all();
                $nim = $request->session()->get('username');
                $file = $input['buku'];
                
                $destinationPath = public_path() . '/upload/';
                $file->move($destinationPath,$file->getClientOriginalName());

                $mhs = Mahasiswa::where('nim','=',$nim)
                ->update(['revisi_buku' => $file->getClientOriginalName()]);
                                
                return $this->load($request);
            }
        }
    }
    
    public function revisi(Request $request)
    {
        if(!$this->permission($request)){
            return redirect()->route('login');
        }
        else{
            if($request->isMethod('get')){
                $nim = $request->session()->get('username');
                $query = 'SELECT nim, nama_mhs, judul, revisi FROM `mahasiswas` WHERE nim='.$nim;
                $mhs = DB::select($query);
                
                return view('mahasiswa/revisi')->with('mhs',$mhs);
            } else if($request->isMethod('patch')){
                $input = Input::all();
                $nim = $request->session()->get('username');
                $file = $input['proposal'];
                
                $destinationPath = public_path() . '/upload/';
                $file->move($destinationPath,$file->getClientOriginalName());

                $mhs = Mahasiswa::where('nim','=',$nim)
                ->update(['revisi_proposal' => $file->getClientOriginalName()]);
                                
                return $this->load($request);
            }
        }
    }
    
    public function load(Request $request)
    {
        //
        if(!$this->permission($request)){
            return redirect()->route('login');
        }
        else{
            $nim = $request->session()->get('username');
            $query = 'SELECT * FROM `mahasiswas` WHERE nim='.$nim;
            $mhs = DB::select($query);
                        
            if($mhs[0]->jam_sidang_proposal!=null)
                $mhs[0]->jam_sidang_proposal = app('App\Http\Controllers\JamController')->getJam($mhs[0]->jam_sidang_proposal);
            if($mhs[0]->jam_sidang_akhir!=null)
                $mhs[0]->jam_sidang_akhir = app('App\Http\Controllers\JamController')->getJam($mhs[0]->jam_sidang_akhir);
            
            if($mhs[0]->ruangan_sidang_proposal!=null)
                $mhs[0]->ruangan_sidang_proposal = app('App\Http\Controllers\RuanganController')->getRuangan($mhs[0]->ruangan_sidang_proposal);
            if($mhs[0]->ruangan_sidang_akhir!=null)
                $mhs[0]->ruangan_sidang_akhir = app('App\Http\Controllers\RuanganController')->getRuangan($mhs[0]->ruangan_sidang_akhir);
            

            if($mhs[0]->judul==null) $terdaftar = false;
            else $terdaftar = true;
            
            $mhs[0]->statuss = $this->getStatus($mhs[0]->status);

            return view('mahasiswa/index')->with('mhs',$mhs)->with('terdaftar',$terdaftar);
        }
    }

    public function sidangAkhir(Request $request)
    {
        //
        if(!$this->permission($request)){
            return redirect()->route('login');
        }
        else{
            if($request->isMethod('get')){
                $nim = $request->session()->get('username');
                $query = 'SELECT * FROM `mahasiswas` WHERE nim='.$nim;
                $mhs = DB::select($query);

                if($mhs[0]->strata=='S1') $strata="1";
                else $strata="2";

                if($mhs[0]->judul==null){
                    $strata=$strata.'0';
                    $terdaftar = false;
                }
                else{
                    $terdaftar = true;
                    $strata=$strata.'1';
                }

                $queryjam = 'SELECT * FROM `jams` where id_jam LIKE '."'".$strata."%'";
                $jam = DB::select($queryjam);

                $querydosen = 'SELECT * FROM `dosens`';
                $dosen = DB::select($querydosen);

                return view('mahasiswa/dataakhir')->with('mhs',$mhs)->with('jam',$jam)->with('dosen',$dosen)->with('terdaftar',$terdaftar);
            }
            else if($request->isMethod('patch')){
                $input = Input::all();
                $nim = $request->nim;
                $pembimbing1 = explode('$', $request->pembimbing1);
                $pembimbing2 = explode('$', $request->pembimbing2);
                $penguji1 = explode('$', $request->penguji1);
                $penguji2 = explode('$', $request->penguji2);

                if($request->penguji3!='null') $penguji3 = explode('$', $request->penguji3);
                else {$penguji3[0]=null;$penguji3[1]=null;}

                $file = $input['buku'];

                $destinationPath = public_path() . '/upload/';
                $file->move($destinationPath,$file->getClientOriginalName());
                
                $mhs = Mahasiswa::where('nim','=',$nim)
                    ->update(['tanggal_sidang_akhir' => $request->tanggal,
                             'jam_sidang_akhir' => $request->jam,
                             'buku' => $file->getClientOriginalName(),
                             'pembimbing_1' => $pembimbing1[0],
                             'nama_pembimbing_1' => $pembimbing1[1],
                             'pembimbing_2' => $pembimbing2[0],
                             'nama_pembimbing_2' => $pembimbing2[1],
                             'penguji_1' => $penguji1[0],
                             'nama_penguji_1' => $penguji1[1],
                             'penguji_2' => $penguji2[0],
                             'nama_penguji_2' => $penguji2[1],
                             'penguji_3' => $penguji3[0],
                             'nama_penguji_3' => $penguji3[1],
                             'status' => 4]);
                
                Mail::send(new DaftarAkhir($nim));
                Mail::send(new DaftarAkhirDosen($nim,$pembimbing1[0]));
                Mail::send(new DaftarAkhirDosen($pembimbing2[0]));
                Mail::send(new DaftarAkhirDosen($penguji1[0]));
                Mail::send(new DaftarAkhirDosen($penguji2[0]));
                if($request->penguji3!='null') Mail::send(new DaftarAkhirDosen($penguji3[0]));

                return redirect()->route('mahasiswa')->with('alert-success', 'Data Sidang Akhir Diterima.');
            }
        }
    }
    
    public function update(Request $request)
    {
        //
        if(!$this->permission($request)){
            return redirect()->route('login');
        }
        else{
            $input = Input::all();
            $nim = $request->nim;
            $pembimbing1 = explode('$', $request->pembimbing1);
            $pembimbing2 = explode('$', $request->pembimbing2);
            $penguji1 = explode('$', $request->penguji1);

            if($request->penguji2!='null') $penguji2 = explode('$', $request->penguji2);
            else {$penguji2[0]=null;$penguji2[1]=null;}
            
            $file = $input['proposal'];

            $destinationPath = public_path() . '/upload/';
            $file->move($destinationPath,$file->getClientOriginalName());

            $mhs = Mahasiswa::where('nim','=',$nim)
                ->update(['judul' => $request->judul,
                         'proposal' => $file->getClientOriginalName(),
                         'tanggal_sidang_proposal' => $request->tanggal,
                         'jam_sidang_proposal' => $request->jam,
                         'pembimbing_1' => $pembimbing1[0],
                         'nama_pembimbing_1' => $pembimbing1[1],
                         'pembimbing_2' => $pembimbing2[0],
                         'nama_pembimbing_2' => $pembimbing2[1],
                         'penguji_1' => $penguji1[0],
                         'nama_penguji_1' => $penguji1[1],
                         'penguji_2' => $penguji2[0],
                         'nama_penguji_2' => $penguji2[1],
                         'status' => 1]);
            
            Mail::send(new Daftar($nim));
            Mail::send(new DaftarDosen($nim,$pembimbing1[0]));
            Mail::send(new DaftarDosen($pembimbing2[0]));
            Mail::send(new DaftarDosen($penguji1[0]));
            if($request->penguji2!='null') Mail::send(new DaftarDosen($penguji2[0]));
            
            return redirect()->route('mahasiswa')->with('alert-success', 'Data Proposal Skripsi Diterima.');
        }
    }
    
    public function getStatus($status)
    {
        if($status==0) return 'Revisi';
        else if($status==1) return 'Tunggu Ruangan Sidang Proposal';
        else if($status==2) return 'Tunggu Sidang Proposal';
        else if($status==3) return 'Masukkan Informasi Sidang Akhir';
        else if($status==4) return 'Tunggu Ruangan Sidang Akhir';
        else if($status==5) return 'Tunggu Sidang Akhir';
        else if($status==6) return 'Unggah Lembang Pengesahan';
        else if($status==7) return 'Selesai';
    }
}
