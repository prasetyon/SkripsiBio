<?php

use Illuminate\Database\Seeder;

class MhsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'PRASETYO NUGROHADI',
            'username' => '5114100070',
            'password' => bcrypt('5114100070'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'PRASETYO NUGROHADI',
            'strata' => 'S1',
            'nim' => '5114100070',
        ]); 
        
        DB::table('users')->insert([
            'name' => 'MARATUS SHOLICHAH',
            'username' => '081624153004',
            'password' => bcrypt('test'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'MARATUS SHOLICHAH',
            'strata' => 'S2',
            'nim' => '081624153004',
        ]);    
        
        DB::table('users')->insert([
            'name' => 'DWI YUNITA LAILI FITRIAH',
            'username' => '081614153003',
            'password' => bcrypt('test'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'DWI YUNITA LAILI FITRIAH',
            'strata' => 'S2',
            'nim' => '081614153003',
        ]);    
        
        DB::table('users')->insert([
            'name' => 'NABELA NUR HANIFAH',
            'username' => '081624153009',
            'password' => bcrypt('test'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'NABELA NUR HANIFAH',
            'strata' => 'S2',
            'nim' => '081624153009',
        ]);    
        
        DB::table('users')->insert([
            'name' => 'INDRA ADI WIRA PRASETYA',
            'username' => '081714153001',
            'password' => bcrypt('test'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'INDRA ADI WIRA PRASETYA',
            'strata' => 'S2',
            'nim' => '081714153001',
        ]);         
    
        DB::table('users')->insert([
            'name' => 'ALFI RIZCA HARDIANTI',
            'username' => '081514153015',
            'password' => bcrypt('test'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'ALFI RIZCA HARDIANTI',
            'strata' => 'S2',
            'nim' => '081514153015',
        ]);
        
        DB::table('users')->insert([
            'name' => 'HANIF HARDINI',
            'username' => '081311133050',
            'password' => bcrypt('test'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'HANIF HARDINI',
            'strata' => 'S1',
            'nim' => '081311133050',
        ]);
        
        DB::table('users')->insert([
            'name' => 'M NAUFAL RASYIDI',
            'username' => '081411131030',
            'password' => bcrypt('test'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'M NAUFAL RASYIDI',
            'strata' => 'S1',
            'nim' => '081411131030',
        ]);
        
        DB::table('users')->insert([
            'name' => 'NISRINA KUSUMA SARI',
            'username' => '081411131038',
            'password' => bcrypt('test'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'NISRINA KUSUMA SARI',
            'strata' => 'S1',
            'nim' => '081411131038',
        ]);
        
        DB::table('users')->insert([
            'name' => 'BAGUS ARYAN DELFTANTO',
            'username' => '081411133010',
            'password' => bcrypt('test'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'BAGUS ARYAN DELFTANTO',
            'strata' => 'S1',
            'nim' => '081411133010',
        ]);
        
        DB::table('users')->insert([
            'name' => 'DINA TRIA APSARI',
            'username' => '081411431022',
            'password' => bcrypt('test'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'DINA TRIA APSARI',
            'strata' => 'S1',
            'nim' => '081411431022',
        ]);
        
        DB::table('users')->insert([
            'name' => 'RIZKI ARI SUSANTO',
            'username' => '081411431025',
            'password' => bcrypt('test'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'RIZKI ARI SUSANTO',
            'strata' => 'S1',
            'nim' => '081411431025',
        ]);
        
        DB::table('users')->insert([
            'name' => 'AHMAD FAUZI',
            'username' => '081411431012',
            'password' => bcrypt('test'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'AHMAD FAUZI',
            'strata' => 'S1',
            'nim' => '081411431012',
        ]);
        
        DB::table('users')->insert([
            'name' => 'ASLAM SHAUKI MAHMUD',
            'username' => '081411433077',
            'password' => bcrypt('test'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'ASLAM SHAUKI MAHMUD',
            'strata' => 'S1',
            'nim' => '081411433077',
        ]);
            
        DB::table('users')->insert([
            'name' => 'MUHAMMAD HISYAM RIFQ',
            'username' => '081411431017',
            'password' => bcrypt('test'),
            'role' => 'mhs',
        ]);
        
        DB::table('mahasiswas')->insert([
            'nama_mhs' => 'MUHAMMAD HISYAM RIFQ',
            'strata' => 'S1',
            'nim' => '081411431017',
        ]);
    }
}
