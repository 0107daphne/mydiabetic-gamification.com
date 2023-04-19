@extends('layouts.app1')

@section('title', 'MyDiabetics | Running Ron')

@section('content')

<div class="container">
    <h3 class="text-center">Running Ron (Abstract ver.)</h3>

    <div>
        <p>Eat healthy food to earn points!</p>
        <p>To get to Level 2, you have to earn at least 300 pts.</p>
        <p>To get to Level 3, you have to earn at least 450 pts.</p>
        <p>To finish the game, you have to earn at least 600 pts.</p>
    </div>

    <br>
    @include('how-to')
    
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <iframe src = "http://running-ron-abstract.mydiabetic-gamification.com/" height = "720" width="1000"></iframe>
        </div>
    </div>
    
</div>

@endsection