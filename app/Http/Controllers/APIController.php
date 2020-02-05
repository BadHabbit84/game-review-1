<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Games;

class APIController extends Controller
{
    public function getAllGames(Request $request) {

    	// check for any incoming data
    	if ($request->getContent()) {

    		//convert JSON to array
    		$incoming_data_array = json_decode($request->getContent(), true);
    		
    		// secondary check for the right key
    		if (array_key_exists('search_for', $incoming_data_array)) {
    			
    			$search_filter_like = '%'.$incoming_data_array['search_for'].'%';

    			$search_result = Games::where(function($query) use ($search_filter_like) {
					$query->where('name', 'LIKE', $search_filter_like)
						->orWhere('publisher', 'LIKE', $search_filter_like)
						->orWhere('release_date', 'LIKE', $search_filter_like);
					})
					->orderBy('id', 'DESC')
					->get();

				if (count($search_result) < 1) {
					$msg = new \StdClass;
					$msg->status = 'ok';
					$msg->message = 'No search result';

					return json_encode($msg); 
				}

    		}
    		else {
    			$error_msg = new \StdClass;
    			$error_msg->status = 'False';
    			$error_msg->error_message = 'This request can not be completed, please use the correct key';
    			
    			return json_encode($error_msg);
    		}
    		
    		//now we have to filter the response based on the request
    		
    	}
    	//if empty request body or missing the search text show all games
    	$all_games = Games::all();    	

    	// no records found fallback
    	if (count($all_games) < 1) {
    		$all_games = 'No data to show';
    	}

    	return json_encode($all_games);
    }
}
