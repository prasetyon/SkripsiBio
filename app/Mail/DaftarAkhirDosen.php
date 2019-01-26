<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Mahasiswa;
use App\User;
use Carbon\Carbon;

class DaftarAkhirDosen extends Mailable
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
        $mhs->jam_sidang_akhir = app('App\Http\Controllers\JamController')->getJam($mhs->jam_sidang_akhir);
        
        return $this->markdown('email.daftarakhirdosen', ['mhs'=>$mhs, 'nama'=>$nama])->subject('Pendaftaran sidang akhir '.$mhs->nim.' '.$mhs->nama_mhs.' telah diterima')->to($email);
    }
}
