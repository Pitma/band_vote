<?php

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 DB::table('users')->delete();

        $users = array(
 			array(
         	'name' => 'Mettmanner Spatzen',
			'password' => Hash::make('Mettmanner Spatzen'),
			'email' => 'test@localhost.de',
			'description' => 'wir machen Metal und sind Spitze! Wer nicht für uns Votet ist doof!',
			'genre' => 'Metalmänia',
			'origin' => 'Mettmann',
			'firstname' => 'Atze',
			'lastname' => 'Röder',
			'address' => 'Rock am Ring',
			'city' => 'Düsseldorf',
            'telefon' => '0123 / 33666',
            'created_at' => '2013-07-08 21:21:50',
            'admin' => 0,
            'agb' => 1,
 			),
            array(
            'name' => 'Testbandando',
            'password' => Hash::make('Testbandando'),
            'email' => 'test1@localhost.de',
            'description' => 'verrückte Spanier wollen ganz hoch hinaus',
            'genre' => 'Kuschelrock',
            'origin' => 'Madrid',
            'firstname' => 'Donald',
            'lastname' => 'Duck',
            'address' => 'Flussstraße 233',
            'city' => '33355 Entenhausen',
            'telefon' => '0123 / 33666',
            'created_at' => '2013-07-12 21:21:50',
            'admin' => 0,
            'agb' => 1,
            ),
            array(
            'name' => 'Julian',
            'password' => Hash::make('admin'),
            'email' => 'patrickmainka@gmail.com',
            'description' => '',
            'genre' => '',
            'origin' => '',
            'firstname' => '',
            'lastname' => '',
            'address' => '',
            'city' => '',
            'telefon' => '',
            'created_at' => '',
            'admin' => 1,
            'agb' => 1,
            )
            
        );

        // Uncomment the below to run the seeder
         DB::table('users')->insert($users);
    }

}