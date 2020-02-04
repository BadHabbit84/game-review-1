<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Games;


class GameController extends Controller
{
    public function index() {

    	$all_games = array();

    	//get all games from the DB
    	$all_games = Games::all();
    	
    	return view('welcome', compact('all_games'));
    }
}
