<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <div id="app">
            <div class="logo">
                <h1>Game.Local</h1>
            </div>
            <div class="options">
                <div class="option newgame">
                    <h1>New Game</h1>
                    @include('forms.register')
                </div>

                <div class="option loadgame">
                    <h1>Load Game</h1>
                    @include('forms.login')
                </div>
            </div>
        </div>
    </body>
</html>
