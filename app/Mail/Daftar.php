<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Mahasiswa;
use App\User;
use Carbon\Carbon;

class Daftar extends Mailable
{
    use Queueable, SerializesModels;
    private $nim;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nim)
    {
        //
        $this->nim = $nim;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nim = $this->nim;
        
        $users = User::where('username',$nim)->get();
        $users = $users[0];
        
        $nama = $users->name;
        $email = $users->email;
        $mhs = Mahasiswa::where('nim',$nim)->get();
        $mhs = $mhs[0];
        $mhs->jam_sidang_proposal = app('App\Http\Controllers\JamController')->getJam($mhs->jam_sidang_proposal);
                
        return $this->markdown('email.daftar', ['mhs'=>$mhs, 'nama'=>$nama])->subject('Pendaftaran proposal '.$mhs->nim.' '.$mhs->nama_mhs.' telah diterima')->to($email);
    }
}