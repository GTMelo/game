@extends('layouts.master')

@section('master.content')
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
@endsection