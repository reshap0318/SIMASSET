<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('users')->insert([
			    [
			    		'id' 			=> '1',
			    		'username'		=> 'reshap03',
			    		'email' 		=> 'reshap03@gmail.com',
			    		'password' 		=> bcrypt('admin'),
			    		'permissions' 	=> '{"home.dashboard":true}',
			    		'first_name' 	=> 'Reinaldo',
			    		'last_name' 	=> 'Shandev Pratama',
			    		'avatar' 		=> 'admin.png',
			    		'QRpassword'	=>'Dammy-CODE-1S4u7lJzehk62xDm3DgYgXXYWtbHE6gSP',

			    ],[
			    		'id' 			=> '2',
			    		'username'		=> 'dara',
			    		'email' 		=> 'dara@gmail.com',
			    		'password' 		=> bcrypt('1sampai8'),
			    		'permissions' 	=> '{"home.dashboard":true}',
			    		'first_name' 	=> 'Dartika',
			    		'last_name' 	=> 'Anie Marian',
			    		'avatar' 		=> '',
			    		'QRpassword'	=>'$2y$10$Mk6340rb4nNbGjMEO0oAG.IzRoaawFpCUc0L.eDpc/iTZ19.LN.zm',

			    ],[
			    		'id' 			=> '3',
			    		'username'		=> 'indah',
			    		'email' 		=> 'indah@gmail.com',
			    		'password' 		=> bcrypt('1sampai8'),
			    		'permissions' 	=> '{"home.dashboard":true}',
			    		'first_name' 	=> 'Regitha',
			    		'last_name' 	=> 'Indah F',
			    		'avatar' 		=> '',
			    		'QRpassword'	=>'$2y$10$0foUeS0PvhUQ2X4/B9k0UePBJulICp0FS9za5irLMeFY6j2kEn./u',

			    ],[
			    		'id' 			=> '4',
			    		'username'		=> 'agust',
			    		'email' 		=> 'agust@gmail.com',
			    		'password' 		=> bcrypt('1sampai8'),
			    		'permissions' 	=> '{"home.dashboard":true}',
			    		'first_name' 	=> 'Agusti',
			    		'last_name' 	=> 'Amri Rahmi',
			    		'avatar' 		=> '',
			    		'QRpassword'	=>'$2y$10$Es6TSWLlQk1Qn3/9Irs2xOjZW1WjvazFqbFlMfIcmXaEODGCWpUwe',

			    ],[
			    		'id' 			=> '5',
			    		'username'		=> 'cahaya',
			    		'email' 		=> 'cahaya@gmail.com',
			    		'password' 		=> bcrypt('1sampai8'),
			    		'permissions' 	=> '{"home.dashboard":true}',
			    		'first_name' 	=> 'Cahaya',
			    		'last_name' 	=> 'Camila',
			    		'avatar' 		=> '',
			    		'QRpassword'	=>'$2y$10$LcMafyEWcxK4sBjCuFTUEOUd4BHJrA2Th/fP1QZPepcdp6vnLwYs.',

			    ],[
			    		'id' 			=> '6',
			    		'username'		=> 'nanda',
			    		'email' 		=> 'rzyunanda@gmail.com',
			    		'password' 		=> bcrypt('1sampai8'),
			    		'permissions' 	=> '{"home.dashboard":true}',
			    		'first_name' 	=> 'Rezky',
			    		'last_name' 	=> 'Yunanda',
			    		'avatar' 		=> '',
			    		'QRpassword'	=>'$2y$10$DYWCdCr/w2g5zRWokwjm4.jJUFFl5p0zKNapkO.pSsP8e0XZenysm',

			    ],[
			    		'id' 			=> '7',
			    		'username'		=> 'najip',
			    		'email' 		=> 'najip@gmail.com',
			    		'password' 		=> bcrypt('1sampai8'),
			    		'permissions' 	=> '{"home.dashboard":true}',
			    		'first_name' 	=> 'Nazhifa',
			    		'last_name' 	=> 'Najla Ardian',
			    		'avatar' 		=> '',
			    		'QRpassword'	=>'$2y$10$VN6uEGOsrYklvTEojnrUu.Io3Gh.MngpBZ6./74FMPpjP95jc5806',

			    ],[
			    		'id' 			=> '8',
			    		'username'		=> 'ami',
			    		'email' 		=> 'ami@gmail.com',
			    		'password' 		=> bcrypt('1sampai8'),
			    		'permissions' 	=> '{"home.dashboard":true}',
			    		'first_name' 	=> 'Aulia',
			    		'last_name' 	=> 'Rahmi',
			    		'avatar' 		=> '',
			    		'QRpassword'	=>'$2y$10$FOTwKIG4KLT/ErJ0Ai81/e5jMGn.d1.mXBh8YKc0UdzLiAouajQfu',

			    ],[
			    		'id' 			=> '9',
			    		'username'		=> 'icha',
			    		'email' 		=> 'icha@gmail.com',
			    		'password' 		=> bcrypt('1sampai8'),
			    		'permissions' 	=> '{"home.dashboard":true}',
			    		'first_name' 	=> 'Annisa',
			    		'last_name' 	=> 'Aulia Khaira',
			    		'avatar' 		=> '',
			    		'QRpassword'	=>'$2y$10$HkH78lHfHgj2Z/RhXhjFQeaPB6zYvy7YjKI.3TnrcmIBCyeqwAEJO',

			    ],[
			    		'id' 			=> '10',
			    		'username'		=> 'ib',
			    		'email' 		=> 'ib@gmail.com',
			    		'password' 		=> bcrypt('1sampai8'),
			    		'permissions' 	=> '{"home.dashboard":true}',
			    		'first_name' 	=> 'Mahfuz',
			    		'last_name' 	=> 'Jailani Ibrahim',
			    		'avatar' 		=> '',
			    		'QRpassword'	=>'$2y$10$Vnb5TT7eqUm1Q2nrbo2qjOokj3lL6NdhMeqWdKCSH2TCF1cE3Ch3e',

			    ],[
			    		'id' 			=> '11',
			    		'username'		=> 'chacha',
			    		'email' 		=> 'chacha@gmail.com',
			    		'password' 		=> bcrypt('1sampai8'),
			    		'permissions' 	=> '{"home.dashboard":true}',
			    		'first_name' 	=> 'Annisa',
			    		'last_name' 	=> 'Nurgustia',
			    		'avatar' 		=> '',
			    		'QRpassword'	=>'$2y$10$Je/YVIvTRokY3itjVKAko.7cHhFOUjxF/Zm0P6Lu2Z83xlJt9GntW',

			    ],[
			    		'id' 			=> '12',
			    		'username'		=> 'rizka',
			    		'email' 		=> 'reshap03@gmail.com',
			    		'password' 		=> bcrypt('1sampai8'),
			    		'permissions' 	=> '{"home.dashboard":true}',
			    		'first_name' 	=> 'Reinaldo',
			    		'last_name' 	=> 'Camila',
			    		'avatar' 		=> '',
			    		'QRpassword'	=>'$2y$10$aY2dgeVR7zUeYmEa3WsevOR0ziD8gw8avDdHKuZSO8cSg71T1Taxy',

			    ]
			]);
         DB::table('roles')->insert([
			    [
			    		'id'=>'1',
			    		'slug' 		=> 'admin',
			    		'name' 			=> 'Admin',
			    		'permissions' 	=> '{"password.request":true,"password.email":true,"password.reset":true,"home.dashboard":true,"user.index":true,"user.create":true,"user.store":true,"user.show":true,"user.edit":true,"user.update":true,"user.destroy":true,"user.activate":true,"user.deactivate":true,"user.permissions":true,"user.simpan":true,"role.index":true,"role.create":true,"role.store":true,"role.show":true,"role.edit":true,"role.update":true,"role.destroy":true,"role.permissions":true,"role.simpan":true,"kategori.index":true,"kategori.create":true,"kategori.store":true,"kategori.show":true,"kategori.edit":true,"kategori.update":true,"kategori.destroy":true,"inventaris.index":true,"inventaris.create":true,"inventaris.store":true,"inventaris.show":true,"inventaris.edit":true,"inventaris.update":true,"inventaris.destroy":true,"inventaris.cek":true,"inventaris-detail.index":true,"inventaris-detail.create":true,"inventaris-detail.store":true,"inventaris-detail.show":true,"inventaris-detail.edit":true,"inventaris-detail.update":true,"inventaris-detail.destroy":true,"piket.index":true,"piket.create":true,"piket.store":true,"piket.show":true,"piket.edit":true,"piket.update":true,"piket.destroy":true,"jenis-denda.index":true,"jenis-denda.create":true,"jenis-denda.store":true,"jenis-denda.show":true,"jenis-denda.edit":true,"jenis-denda.update":true,"jenis-denda.destroy":true,"denda.index":true,"denda.create":true,"denda.store":true,"denda.show":true,"denda.edit":true,"denda.update":true,"denda.destroy":true,"postingan.index":true,"postingan.create":true,"postingan.store":true,"postingan.show":true,"postingan.edit":true,"postingan.update":true,"postingan.destroy":true,"postingan.jadwalpost":true,"postingan.bayarpost":true,"piket-detail.index":true,"piket-detail.create":true,"piket-detail.store":true,"piket-detail.show":true,"piket-detail.edit":true,"piket-detail.update":true,"piket-detail.destroy":true,"piket-izin.index":true,"piket-izin.create":true,"piket-izin.store":true,"piket-izin.show":true,"piket-izin.edit":true,"piket-izin.update":true,"piket-izin.destroy":true}',
			    ],
			    [
			    		'id'=>'2',
			    		'slug' 		=> 'Koor',
			    		'name' 			=> 'Koor',
			    		'permissions' 			=> '{"home.dashboard":true}',
			    ],
			    [
			    		'id'=>'3',
			    		'slug' 		=> 'Sekretaris',
			    		'name' 			=> 'Sekretaris',
			    		'permissions' 			=> '{"home.dashboard":true}',
			    ],
			    [
			    		'id'=>'4',
			    		'slug' 		=> 'Bendahara',
			    		'name' 			=> 'Bendahara',
			    		'permissions' 			=> '{"home.dashboard":true}',
			    ],
			    [
			    		'id'=>'5',
			    		'slug' 		=> 'PJ Pengembangan dan Penelitian',
			    		'name' 			=> 'PJ Pengembangan dan Penelitian',
			    		'permissions' 			=> '{"home.dashboard":true}',
			    ],
			    [
			    		'id'=>'6',
			    		'slug' 		=> 'PJ Rumah Tangga',
			    		'name' 			=> 'PJ Rumah Tangga',
			    		'permissions' 			=> '{"home.dashboard":true}',
			    ],
			    [
			    		'id'=>'7',
			    		'slug' 		=> 'PJ Pengabdian dan Pelatihan',
			    		'name' 			=> 'PJ Pengabdian dan Pelatihan',
			    		'permissions' 			=> '{"home.dashboard":true}',
			    ],
			    [
			    		'id'=>'8',
			    		'slug' 		=> 'Anggota Pengembangan dan Penelitian',
			    		'name' 			=> ' Anggota Pengembangan dan Penelitian',
			    		'permissions' 			=> '{"home.dashboard":true}',
			    ],
			    [
			    		'id'=>'9',
			    		'slug' 		=> 'Anggota Rumah Tangga',
			    		'name' 			=> 'Anggota Rumah Tangga',
			    		'permissions' 			=> '{"home.dashboard":true}',
			    ],
			    [
			    		'id'=>'10',
			    		'slug' 		=> 'Anggota Pengabdian dan Pelatihan',
			    		'name' 			=> 'Anggota Pengabdian dan Pelatihan',
			    		'permissions' 			=> '{"home.dashboard":true}',
			    ]
		 ]);
		 DB::table('role_users')->insert([
			    [
			    		'user_id' 		=> '1',
			    		'role_id' 			=> '1',
			    ],[
			    		'user_id' 		=> '2',
			    		'role_id' 			=> '2',
			    ],[
			    		'user_id' 		=> '3',
			    		'role_id' 			=> '4',
			    ],[
			    		'user_id' 		=> '4',
			    		'role_id' 			=> '3',
			    ],[
			    		'user_id' 		=> '5',
			    		'role_id' 			=> '7',
			    ],[
			    		'user_id' 		=> '6',
			    		'role_id' 			=> '10',
			    ],[
			    		'user_id' 		=> '7',
			    		'role_id' 			=> '10',
			    ],[
			    		'user_id' 		=> '8',
			    		'role_id' 			=> '6',
			    ],[
			    		'user_id' 		=> '9',
			    		'role_id' 			=> '9',
			    ],[
			    		'user_id' 		=> '10',
			    		'role_id' 			=> '5',
			    ],[
			    		'user_id' 		=> '11',
			    		'role_id' 			=> '8',
			    ],[
			    		'user_id' 		=> '12',
			    		'role_id' 			=> '8',
			    ]
		 ]);
		 DB::table('activations')->insert([
			    [
			    		'user_id' 		=> '1',
			    		'code' 			=> '1S4u7lJzehk62xDm3DgYgXXYWtbHE6gSP',
			    		'completed' 			=> '1',
			    ],[
			    		'user_id' 		=> '2',
			    		'code' 			=> 'VzhehItZR8eMGguts8qUxoscWrNXYfvz',
			    		'completed' 			=> '1',
			    ],[
			    		'user_id' 		=> '3',
			    		'code' 			=> 'nZCXLjeiXRzoKwemSsBP48pddOT08ljG',
			    		'completed' 			=> '1',
			    ],[
			    		'user_id' 		=> '4',
			    		'code' 			=> 'GcUEXIGZ7RVGhAR4d2TMQP1zrfDtT1UW',
			    		'completed' 			=> '1',
			    ],[
			    		'user_id' 		=> '5',
			    		'code' 			=> 'I0O4RmDbSY8pxMkytdHnQR1eN8oTNGrz',
			    		'completed' 			=> '1',
			    ],[
			    		'user_id' 		=> '6',
			    		'code' 			=> 'dOctE9mJC11j8G3HKLUqQEWLQ6hR0o5H',
			    		'completed' 			=> '1',
			    ],[
			    		'user_id' 		=> '7',
			    		'code' 			=> 'fNGCFGjSohy0qHcyL2pBPSHklchMGrya',
			    		'completed' 			=> '1',
			    ],[
			    		'user_id' 		=> '8',
			    		'code' 			=> '3TORuRVYgq2qlS9B7SEu6ZakyOoShdVg',
			    		'completed' 			=> '1',
			    ],[
			    		'user_id' 		=> '9',
			    		'code' 			=> 'D0gFOpXc0XDzA3ssAW4tUmdMjJtx8RZr',
			    		'completed' 			=> '1',
			    ],[
			    		'user_id' 		=> '10',
			    		'code' 			=> 'unB8h9Qd50vh3wMtjP4rY3DDXDGXL5Lz',
			    		'completed' 			=> '1',
			    ],[
			    		'user_id' 		=> '11',
			    		'code' 			=> 'LfvUMZ2gL9PwlQTIsIe1G39h8GvT74Zb',
			    		'completed' 			=> '1',
			    ],[
			    		'user_id' 		=> '12',
			    		'code' 			=> 'DhWSV0jxSNAfubzBKHohNlQwEJCztchM',
			    		'completed' 			=> '1',
			    ]
		 ]);
    }
}
