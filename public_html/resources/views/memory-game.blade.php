@extends('layouts.under-construction-app')

@section('title', 'MyDiabetics | Memory Game')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3 backbtn">
            <a href="/play">Back</a>
        </div>
    </div>
    <h3 class="text-center title-game">Memory Game</h3>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <p>Match the cards!</p>
        </div>
    </div>
    
    <div>
        <p><i><small>Best viewed in Chrome</small></i></p>
    </div>
    
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <iframe src = "http://pair-game.mydiabetic-gamification.com" height = "500" width="600"></iframe>
        </div>
    </div>
    
</div>
</div>

@endsection