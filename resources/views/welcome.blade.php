<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <div class="logo">
                <h1>Game.Local</h1>
            </div>
            <div class="options">
                <div class="option newgame">
                    <h1>Load Game</h1>
                    <form action="/register" method="post">
                        <div class="input">
                            <label for="new_username">Username</label>
                            <input type="text" name="new_username">
                        </div>
                        <div class="input">
                            <label for="new_password">Password</label>
                            <input type="password" name="new_password">
                        </div>
                        <div class="input">
                            <label for="new_password_confirmation">Password confirmation</label>
                            <input type="password" name="new_password_confirmation">
                        </div>
                        <button id="new_submit" type="submit">Start</button>
                    </form>
                </div>

                <div class="option loadgame">
                    <h1>New Game</h1>
                    <form action="/login" method="post">
                        <div class="input">
                            <label for="load_username">Username</label>
                            <input type="text" name="load_username">
                        </div>
                        <div class="input">
                            <label for="load_password">Password</label>
                            <input type="password" name="load_password">
                        </div>
                        <button type="submit">Start</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
