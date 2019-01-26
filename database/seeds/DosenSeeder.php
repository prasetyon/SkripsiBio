<?php

use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
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
            'name' => 'Prof. Win Darmanto, M.Si., Ph.D.',
            'username' => '196106161987011001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);        
        DB::table('users')->insert([
            'name' => 'Prof. Dr. Ir. Agoes Soegianto, DEA',
            'username' => '196208031987101001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Prof. Dr. Bambang Irawan',
            'username' => '195504051982031004',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Prof. H. Hery Purnobasuki, M.Si., Ph.D.',
            'username' => '196705071991021001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Prof. Dr. Ir. Tini Surtiningsih, DEA.',
            'username' => '195110121980032001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Drs. Salamun, M.Kes.',
            'username' => '196111101987031003',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Drs. H. Abdul Latief Burhan, M.S. ',
            'username' => '195307081983031002',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Dr. Alfiah Hayati, M.Kes.',
            'username' => '19511012198003200',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Dr. Edy Setiti Wida Utami, M.S. ',
            'username' => '195704211984032003',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Dr. Sri Puji Astuti Wahyuningsih, M.Si.',
            'username' => '196602211992032001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Drs. Saikhu Akhmad Husen, M.Kes.',
            'username' => '196308141989031004',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Dr. Rosmanida, M.Kes. ',
            'username' => '195412281982032001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Prof. Dr. Yosephine Sri Wulan Manuhara, M.Si.',
            'username' => '196403031988102001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Dr. Dwi Winarni, M.Si.',
            'username' => '196511071989032001 ',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Dr. Hamidah, M, Kes.',
            'username' => '196306101987012001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Sugiharto, S.Si., M.Si.',
            'username' => '197003011994121001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => "Dr. Ni'matuzahroh",
            'username' => '196801051992032003',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Dra. Thin Soedarti, CESA',
            'username' => '196709201992032001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Dr. Sucipto Hariyanto, DEA',
            'username' => '195609021986011002',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Drs. Moch. Affandi, M.Si.',
            'username' => '196404121991021001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Dr. Listyani Suhargo, M.Si.',
            'username' => '196209171988102001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Tri Nurhariyati, S.Si., M.Kes.',
            'username' => '196711131994032001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Drs. Agus Supriyanto. M.Kes.',
            'username' => '196208241989031002',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Drs. Trisnadi Widyaleksono C.P., M.Si.',
            'username' => '196312151989031002',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Hari Soepriandono, S.Si., M.Si. ',
            'username' => '196711221994121001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Dr. Fatimah, S.Si., M.Kes.',
            'username' => '197410152002122001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Dr. Junairiah, M.Kes.',
            'username' => '197107142002122002',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Dwi Kusuma Wahyuni, S.Si., M.Si.  ',
            'username' => '197701152006042002',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Nita Citrasari, S.Si., M.T. ',
            'username' => '198208022008122002',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Nur Indradewi Oktavitri, S.T., M.T. ',
            'username' => '198310012008122004',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Dr. Eko Prasetyo Kuncoro, S.T., DEA. ',
            'username' => '197508302008121001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => 'Dwi Ratri Mitha Isnadina, S.T., M.T. ',
            'username' => '199012052014042001',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
        DB::table('users')->insert([
            'name' => "Muhammad Hilman Fu'adil Amin, S.Si., M.Si. ",
            'username' => '198712032015041005',
            'password' => bcrypt('test'),
            'role' => 'dosen',
        ]);
    }
}
