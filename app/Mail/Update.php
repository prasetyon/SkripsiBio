<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

use App\Mahasiswa;
use App\User;
use Carbon\Carbon;

class Update extends Mailable
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
        
        $status = '';
        
        if($mhs[0]->status==2) $status = 'Mendapat ruangan sidang proposal di '.app('App\Http\Controllers\RuanganController')->getRuangan($mhs[0]->ruangan_sidang_proposal).' dan sedang menunggu sidang proposal';
        else if($mhs[0]->status==3) $status = 'Telah menyelesaikan sidang proposal dan harus memasukkan data untuk sidang akhir';
        else if($mhs[0]->status==5) $status = 'Mendapat ruangan sidang akhir di '.app('App\Http\Controllers\RuanganController')->getRuangan($mhs[0]->ruangan_sidang_akhir).' dan sedang menunggu sidang akhir';
        else if($mhs[0]->status==6) $status = 'Telah menyelesaikan sidang akhir dan harus mengunggah lembar pengesahan';
        else if($mhs[0]->status==7) $status = 'Telah menyelesaikan studi';
        
        return $this->markdown('email.update', ['nama'=>$nama, 'namamhs'=>$namamhs, 'status'=>$status])->subject('Update Skripsi/Thesis '.$mhs[0]->nim.' '.$mhs[0]->nama_mhs)->to($email);
    }
}
