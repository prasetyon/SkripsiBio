<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

use App\Mahasiswa;
use App\User;

class DaftarDosen extends Mailable
{
    use Queueable, SerializesModels;
    private $nim, $nip;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nim, $nip)
    {
        //
        $this->nim = $nim;
        $this->nip = $nip;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $nim = $this->nim;
        $nip = $this->nip;
        
        $users = User::where('username',$nip)->get();
        
        $nama = $users[0]->name;
        $email = $users[0]->email;
                        
        $mhs = Mahasiswa::where('nim',$nim)->get();
        $mhs = $mhs[0];
        $mhs->jam_sidang_proposal = app('App\Http\Controllers\JamController')->getJam($mhs->jam_sidang_proposal);
        
        return $this->markdown('email.daftardosen', ['mhs'=>$mhs, 'nama'=>$nama])->subject('Pendaftaran proposal '.$mhs->nim.' '.$mhs->nama_mhs.' telah diterima')->to($email);
    }
}