<?php

use Illuminate\Database\Seeder;

use App\lib\CustomSeeding;
use App\Games;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(CustomSeeding $cs)
    {
        //generate some fake users
        $this->call(UsersTableSeeder::class);    	
    	
    	//don't want to generate fake games, instead use some real ones
    	$games = $cs->getGames();

    	foreach ($games as $name => $details) {
    		Games::insert([
	    		'name' => $name,
	    		'publisher' => $details['publisher'],
	    		'release_date' => $details['release_date'],
	    		'encryption_key' => $details['encryption_key'],
	    		'created_at' => Carbon::now(),
	    		'updated_at' =>  Carbon::now()
	    	]);
    	}
    	
    }
}
