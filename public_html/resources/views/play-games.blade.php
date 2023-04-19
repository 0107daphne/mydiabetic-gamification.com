@extends('layouts.under-construction-app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-3 col-md-3 col-lg-3 backbtn">
            <a href="/">Back</a>
        </div>
    </div>
    <h1 class="choose-game">Which game do you wish to play?</h1>

    <br><br><br>
    {{-- <div class="row game-navigations">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="dropdown">
                <a href = "/play/memory-game" id = "gamebtn1">Memory Game</a>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <a href = "/play/running-ron" id = "gamebtn">Running Ron</a>
            <div class="dropdown">
                <button class="dropbtn" id = "gamebtn">Running Ron</button>
                <div class="dropdown-content">
                  <a href="/play/running-ron-abstract">Abstract version</a>
                  <a href="/play/running-ron-lifelike">Human Lifelike version</a>
                  <a href="/play/running-ron">Human Cartoon version</a>
                  <a href="/play/running-ron-hybrid">Hybrid version</a>
                  <a href="/play/running-ron-medium-humanlike">Medium Humanlike version</a>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="game-nav">
        <a href="/play/memory-game">Memory Game</a>
        <a href="/play/running-ron">Runnning Ron</a>
        <a href="http://word-search.mydiabetic-gamification.com/" target="_blank">Word Search</a>
    </div>

    <div class="credits">
        <p>Game icons/images made by: <i><a href="https://www.flaticon.com/authors/icongeek26" title="Icongeek26">Icongeek26</a></i>,  <i><a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a></i> & <i><a href="https://www.flaticon.com/authors/adib-sulthon" title="Adib Sulthon">Adib Sulthon</a></i> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
        </p>
    </div>

</div>



@endsection
