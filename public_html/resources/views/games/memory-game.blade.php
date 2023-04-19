@extends('layouts.app1')

@section('title', 'MyDiabetics | Memory Game')

@section('content')

<div class="container">
    <h3 class="text-center">Memory Game</h3>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <p>Match the cards!</p>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <iframe src = "http://pair-game.mydiabetic-gamification.com" height = "500" width="600"></iframe>
        </div>
    </div>

</div>

@endsection
