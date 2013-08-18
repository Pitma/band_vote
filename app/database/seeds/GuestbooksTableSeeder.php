<?php

class GuestbooksTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	 //DB::table('guestbooks')->delete();

        $guestbooks = array(
 			array(
 			 'name' => 'Patrick',
 			 'email' => 'patrickmainka@gmail.com',
 			 'message' => 'Die Band 1 sollte gewinnen! Das wäre cool!',
 			 'created_at' => date('Y-m-d H:i:s')
 			),
 			array(
 			 'name' => 'Joana',
 			 'email' => 'anotheremail@localhost.de',
 			 'message' => 'so ein Quatsch...Du hast doch keine Ahnung! Go Band 50! :-D',
 			 'created_at' => date('Y-m-d H:i:s')
 			)
        );

        // Uncomment the below to run the seeder
         DB::table('guestbooks')->insert($guestbooks);
    }

}