<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Game List</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Bootstrap CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
       
    </head>
    <body>
        <div class="container">
            <h3 class="text-center mt-4 mb-4">Game List</h3>

            <!-- list of games DIV -->
            <div class="">
                @if($all_games)
                    @foreach($all_games as $game)
                        <div class="col-md-12">
                            <p>Name: {{$game->name}}</p>
                            <p>Publisher: {{$game->publisher}}</p>
                            <p>Release Date: {{$game->release_date}}</p>                          
                        </div>
                        <hr />
                    @endforeach
                @else 
                    <h5 class="text-center">No games found</h5>
                @endif
            </div>
        </div>
    </body>
</html>
