@extends('layouts.app1')

@section('content')

<div class="container">
    <h1 class="choose-game">Which game do you wish to play?</h1>

    <br><br><br>
    {{-- <div class="row game-navigations">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <a href = "/memory-game" id = "gamebtn1">Memory Game</a>
        </div>
        <div class=""> --}}
            {{-- <a href = "/running-ron" id = "gamebtn">Running Ron</a> --}}
            {{-- <div class="dropdown"> --}}
                {{-- <a href="/running-ron" id = "gamebtn">Running Ron</a> --}}
                {{-- <div class="dropdown-content"> --}}
                    {{-- <a href="/running-ron-abstract">Abstract version</a>--}}
                    {{-- <a href="/running-ron-lifelike">Human Lifelike version</a>--}}
                    {{-- <a href="/running-ron">Human Cartoon version</a> --}}
                    {{-- <a href="/running-ron-hybrid">Hybrid version</a>--}}
                    {{-- <a href="/running-ron-medium-humanlike">Medium Humanlike version</a>--}}
                {{-- </div> --}}
            {{-- </div> --}}
        {{-- </div>
    </div> --}}
    <div class="game-nav">
        <a href="/memory-game">Memory Game</a>
        <a href="/running-ron">Runnning Ron</a>
        <a href="/word-search">Word Search</a>
    </div>

    <div class="credits">
        <p>Game icons/images made by:</p>
    </div>

</div>



@endsection
