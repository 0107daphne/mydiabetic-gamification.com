@extends('layouts.under-construction-app')

@section('title', 'MyDiabetics | Running Ron')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3 backbtn">
            <a href="/play">Back</a>
        </div>
    </div>
    <h3 class="text-center title-game">Running Ron</h3>

    <div class="col-sm-12 col-md-12 col-lg-12">
        <p>Eat healthy food to earn points!</p>
        <p>To get to Level 2, you have to earn at least 300 pts.</p>
        <p>To get to Level 3, you have to earn at least 450 pts.</p>
        <p>To finish the game, you have to earn at least 600 pts.</p>
    </div>

    <br>
    @include('how-to')
    
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <iframe src = "http://running-ron-game.mydiabetic-gamification.com/" height = "720" width="1000"></iframe>
        </div>
    </div>
    
</div>

@endsection