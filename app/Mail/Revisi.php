<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Mahasiswa;
use App\User;
use Carbon\Carbon;

class Revisi extends Mailable
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
        $users = $users[0];
        
        $nama = $users->name;
        $email = $users->email;
        
        $mhs = Mahasiswa::where('nim',$nim)->get();
        $namamhs = $mhs[0]->nama_mhs;
        $revisi = $mhs[0]->revisi;
        
        $status = 'Revisi';
        
        return $this->markdown('email.revisi', ['nama'=>$nama, 'namamhs'=>$namamhs, 'status'=>$status, 'revisi'=>$revisi])->subject('Update Skripsi/Thesis '.$mhs[0]->nim.' '.$mhs[0]->nama_mhs)->to($email);
    }
}
