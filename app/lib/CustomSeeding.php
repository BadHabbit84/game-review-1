<?php

namespace App\lib;

use Illuminate\Support\Str;

class CustomSeeding{

	public function getGames() {

		$games = [
    		'Battlefield 4' => [
    			'publisher' => 'EA Games',
    			'release_date' => '2016-03-21',
    			'encryption_key' => Str::random(14)
    		],
    		'Gears 5' => [
    			'publisher' => 'The Coalition',
    			'release_date' => '2018-08-11',
    			'encryption_key' => Str::random(14)
    		],
    		'The Division 2' => [
    			'publisher' => 'Massive Entertainment, Ubisoft Reflections',
    			'release_date' => '2018-02-07',
    			'encryption_key' => Str::random(14)
    		],
    		'Fire Emblem: Three Houses' => [
    			'publisher' => 'Intelligent Systems',
    			'release_date' => '2016-05-18',
    			'encryption_key' => Str::random(14)
    		],
    		'Borderlands 3' => [
    			'publisher' => 'Gearbox Software',
    			'release_date' => '2018-11-18',
    			'encryption_key' => Str::random(14)
    		],
    		'Kingdom Hearts 3 ' => [
    			'publisher' => 'Square Enix',
    			'release_date' => '2017-12-28',
    			'encryption_key' => Str::random(14)
    		]
    	];

    	return $games;
	}
}