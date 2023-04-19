@extends('layouts.index-app')

@section('content')

<h1>MyDiabetic</h1>
    {{-- <img src="{{ asset('img/i01_5.png') }}" alt="" usemap="#image-map" class = "mx=auto d-block">

    <map name="image-map">
        <area target="" alt="" title="" href="" coords="981,148,80" shape="circle">
        <area target="" alt="" title="" href="" coords="1172,148,77" shape="circle">
        <area target="_self" alt="Account" title="Account" href="/login" coords="1359,153,80" shape="circle">
    </map> --}}
    

    <img src="{{ asset('img/landing-page-btn2-2.png') }}" alt="" usemap="#image-map" class="img-fluid">

    <map name="image-map">
        <area target="" alt="" title="" href="" coords="982,104,78" shape="circle">
        <area target="" alt="" title="" href="" coords="1173,103,77" shape="circle">
        <area target="" alt="" title="" href="/login" coords="1361,108,81" shape="circle">
    </map>


@endsection