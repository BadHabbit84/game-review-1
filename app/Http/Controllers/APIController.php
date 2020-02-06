<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Games;
use App\User;
use App\Comments;

class APIController extends Controller
{
    public function getGames(Request $request) {

    	// check for any incoming data
    	if ($request->getContent()) {

    		//convert JSON to array
    		$incoming_data_array = json_decode($request->getContent(), true);
    		
    		// secondary check for the right key
    		if (array_key_exists('search_for', $incoming_data_array)) {
    			
    			//now we have to filter the response based on the request
    			$search_filter_like = '%'.$incoming_data_array['search_for'].'%';    			
				
				$search_result = $this->searchQuery($search_filter_like);

				// no result
				if (count($search_result) < 1) {

					$response = $this->callbackMessage('ok', 'No search result');
					
					return json_encode($response); 
				}
				// we got some row(s)!!! return them with status
				$response = $this->callbackMessage('ok', $search_result);
				
				return json_encode($response);

    		}
    		// wrong JSON key been used
    		else {

    			$response = $this->callbackMessage('false', 'This request can not be completed, please use the correct key');
    			    			
    			return json_encode($response);
    		}    		
    		
    	}
    	
    	//if empty request body or missing the search text, show all games
    	$all_games = Games::select('games.name AS name', 'games.publisher', 'games.release_date')->get();    	

    	// no records found fallback
    	if (count($all_games) < 1) {
    		
    		$response = $this->callbackMessage('ok', 'No games to show');
    	}

    	$response = $this->callbackMessage('ok', $all_games);

    	return json_encode($response);
    }

    public function getUsers() {

    	$all_users = User::select('name')->get();

    	// no records found fallback
    	if (count($all_users) < 1) {
    		
    		$response = $this->callbackMessage('ok', 'No users found');

			//early return with message
			return json_encode($response); 
    	}
    	// return result
    	$response = $this->callbackMessage('ok', $all_users);    	

		return json_encode($response);    	

    }

    public function getComments($user_name) {

    	$comments = User::join('comments', 'comments.user_id', '=', 'users.id')
    								->where('users.name', 'LIKE', '%'.$user_name.'%')
    								->select('comments.comment')
    								->get();
    	

    	if (count($comments) < 1) {
    		
    		$response = $this->callbackMessage('ok', 'No comments found from '.$user_name); 
    		
			//early return with message
			return json_encode($response); 
    	}

    	// return result
    	$response = $this->callbackMessage('ok', $comments);    	

		return json_encode($response); 
    }


    // HELPER functions

    //keep it DRY
    private function callbackMessage($status, $result) {

    	$msg = new \StdClass;
		$msg->status = $status;
		$msg->result = $result;

		return $msg;
    }

    private function searchQuery($search_filter_like) {

    	$search_result = Games::select('games.name AS name', 'games.publisher', 'games.release_date')
			->where(function($query) use ($search_filter_like) {
				$query->where('name', 'LIKE', $search_filter_like)
					->orWhere('publisher', 'LIKE', $search_filter_like)
					->orWhere('release_date', 'LIKE', $search_filter_like);
				})								
				->get();

		return $search_result;
    }


}






