# game-review website/API

## to run correctly the application please follow these steps 
	After downloading(cloning) the app, create a new Database and set up 
	the appropriate connection in the ".env" file.
	
	Migration
		enter the root directory from the CLI and type 2 commands:
		php artisan migrate
		php artisan db:seed

		this will create the required tables with basic data inside

	API endpoints
		/api/get-games 
			-> use POST method
			-> calling this endpoint with empty body or empty search key will return all the games from the database
			-> calling this endpoint with JSON for filtering the result, you MUST use "search_for" as a key and the search text
				example: { "search_for":"battlefield" }
		/api/get-users
			-> use POST method
			-> calling this endpoint will return all the users from the database
		/api/get-comments/user_name
			-> use POST method
			-> this endpoint returns the requested users all comments
			-> when calling this endpoint, replace the "user_name" with an actual user name 





 
