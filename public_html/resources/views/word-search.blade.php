@extends('layouts.under-construction-app')

@section('title', 'MyDiabetics | Word Search')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3 backbtn">
            <a href="/play">Back</a>
        </div>
    </div>
    <h3 class="text-center title-game">Word Search</h3>

    <!--<div class="row">-->
    <!--    <div class="col-sm-12 col-md-12 col-lg-12">-->
    <!--        <p>Match the cards!</p>-->
    <!--    </div>-->
    <!--</div>-->

    <div>
        <p><i><small>Best viewed in Chrome</small></i></p>
    </div>

    <div class="game-frame">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <iframe src = "WordSearchGame.htm" height = "500" width="600" ></iframe>
        </div>
    </div>

</div>
</div>

@endsection
