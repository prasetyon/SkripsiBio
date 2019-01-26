<?php

use Illuminate\Database\Seeder;
use App\Ruangan;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $ruangan = new Ruangan();
        $ruangan->nama_ruangan = '221';
        $ruangan->save();
        
        $ruangan = new Ruangan();
        $ruangan->nama_ruangan = '224';
        $ruangan->save();
        
        $ruangan = new Ruangan();
        $ruangan->nama_ruangan = 'Lab Basic Science';
        $ruangan->save();
    }
}
