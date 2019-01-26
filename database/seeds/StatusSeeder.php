<?php

use Illuminate\Database\Seeder;
use App\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $status = new Status();
        $status->id_status = '0';
        $status->keterangan = 'Revisi';
        $status->save();
        
        $status = new Status();
        $status->id_status = '1';
        $status->keterangan = 'Tunggu Ruangan Sidang Proposal';
        $status->save();
        
        $status = new Status();
        $status->id_status = '2';
        $status->keterangan = 'Tunggu Sidang Proposal';
        $status->save();
        
        $status = new Status();
        $status->id_status = '3';
        $status->keterangan = 'Masukkan Informasi Sidang Akhir';
        $status->save();
        
        $status = new Status();
        $status->id_status= '4';
        $status->keterangan = 'Tunggu Ruangan Sidang Akhir';
        $status->save();
        
        $status = new Status();
        $status->id_status = '5';
        $status->keterangan = 'Tunggu Sidang Akhir';
        $status->save();
        
        $status = new Status();
        $status->id_status = '6';
        $status->keterangan = 'Selesai Sidang Akhir';
        $status->save();
    }
}
