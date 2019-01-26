<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Mahasiswa;
use App\User;
use Carbon\Carbon;

class DaftarAkhir extends Mailable
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
        $mhs->jam_sidang_akhir = app('App\Http\Controllers\JamController')->getJam($mhs->jam_sidang_akhir);
        
        return $this->markdown('email.daftarakhir', ['mhs'=>$mhs, 'nama'=>$nama])->subject('Pendaftaran sidang akhir '.$mhs->nim.' '.$mhs->nama_mhs.' telah diterima')->to($email);
    }
}
