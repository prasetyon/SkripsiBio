<?php

use Illuminate\Database\Seeder;
use App\Jam;

class JamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jam1 = new Jam();
        $jam1->id_jam = '101';
        $jam1->mulai = '07:00:00';
        $jam1->selesai = '08:15:00';
        $jam1->save();
        
        $jam2 = new Jam();
        $jam2->id_jam = '102';
        $jam2->mulai = '08:50:00';
        $jam2->selesai = '10:05:00';
        $jam2->save();
        
        $jam3= new Jam();
        $jam3->id_jam = '103';
        $jam3->mulai = '10:40:00';
        $jam3->selesai = '11:55:00';
        $jam3->save();
        
        $jam4= new Jam();
        $jam4->id_jam = '104';
        $jam4->mulai = '13:00:00';
        $jam4->selesai = '14:15:00';
        $jam4->save();
        
        $jam5= new Jam();
        $jam5->id_jam = '105';
        $jam5->mulai = '14:50:00';
        $jam5->selesai = '16:05:00';
        $jam5->save();
        
        $jam6= new Jam();
        $jam6->id_jam = '106';
        $jam6->mulai = '16:50:00';
        $jam6->selesai = '18:05:00';
        $jam6->save();
        
        $jam1 = new Jam();
        $jam1->id_jam = '111';
        $jam1->mulai = '07:00:00';
        $jam1->selesai = '08:30:00';
        $jam1->save();
        
        $jam2 = new Jam();
        $jam2->id_jam = '112';
        $jam2->mulai = '08:50:00';
        $jam2->selesai = '10:20:00';
        $jam2->save();
        
        $jam3= new Jam();
        $jam3->id_jam = '113';
        $jam3->mulai = '10:40:00';
        $jam3->selesai = '12:10:00';
        $jam3->save();
        
        $jam4= new Jam();
        $jam4->id_jam = '114';
        $jam4->mulai = '13:00:00';
        $jam4->selesai = '14:30:00';
        $jam4->save();
        
        $jam5= new Jam();
        $jam5->id_jam = '115';
        $jam5->mulai = '14:50:00';
        $jam5->selesai = '16:20:00';
        $jam5->save();
        
        $jam6= new Jam();
        $jam6->id_jam = '116';
        $jam6->mulai = '16:50:00';
        $jam6->selesai = '18:20:00';
        $jam6->save();
        
        
        $jam1 = new Jam();
        $jam1->id_jam = '201';
        $jam1->mulai = '07:00:00';
        $jam1->selesai = '08:30:00';
        $jam1->save();
        
        $jam2 = new Jam();
        $jam2->id_jam = '202';
        $jam2->mulai = '08:50:00';
        $jam2->selesai = '10:20:00';
        $jam2->save();
        
        $jam3= new Jam();
        $jam3->id_jam = '203';
        $jam3->mulai = '10:40:00';
        $jam3->selesai = '12:10:00';
        $jam3->save();
        
        $jam4= new Jam();
        $jam4->id_jam = '204';
        $jam4->mulai = '13:00:00';
        $jam4->selesai = '14:30:00';
        $jam4->save();
        
        $jam5= new Jam();
        $jam5->id_jam = '205';
        $jam5->mulai = '14:50:00';
        $jam5->selesai = '16:20:00';
        $jam5->save();
        
        $jam6= new Jam();
        $jam6->id_jam = '206';
        $jam6->mulai = '16:50:00';
        $jam6->selesai = '18:20:00';
        $jam6->save();
        
        
        $jam1 = new Jam();
        $jam1->id_jam = '211';
        $jam1->mulai = '07:30:00';
        $jam1->selesai = '09:30:00';
        $jam1->save();
        
        $jam2 = new Jam();
        $jam2->id_jam = '212';
        $jam2->mulai = '10:00:00';
        $jam2->selesai = '12:00:00';
        $jam2->save();
        
        $jam3= new Jam();
        $jam3->id_jam = '213';
        $jam3->mulai = '13:00:00';
        $jam3->selesai = '15:00:00';
        $jam3->save();
        
        $jam4= new Jam();
        $jam4->id_jam = '214';
        $jam4->mulai = '15:30:00';
        $jam4->selesai = '17:30:00';
        $jam4->save();
    }
}
