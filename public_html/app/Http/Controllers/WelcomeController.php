<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view ('welcome');
    }

    public function home_game()
    {
        return view ('home-game');
    }

    public function memory_game()
    {
        return view ('/games/memory-game');
    }

    public function runningron_game()
    {
        return view ('/games/running-ron');
    }

    public function runningron_lifelike()
    {
        return view ('/games/running-ron-lifelike');
    }

    public function runningron_abstract()
    {
        return view ('/games/running-ron-abstract');
    }

    public function runningron_hybrid()
    {
        return view ('/games/running-ron-hybrid');
    }

    public function runningron_medium_humanlike()
    {
        return view ('/games/running-ron-medium');
    }
    
    public function wordsearch_game()
    {
        return view ('/games/word-search');
    }

    public function play_game(){
        return view ('play-games');
    }

    public function play_memory_game(){
        return view ('memory-game');
    }

    public function play_running_ron(){
        return view ('running-ron');
    }

    public function play_running_ron_lifelike(){
        return view ('running-ron-lifelike');
    }

    public function play_running_ron_abstract(){
        return view ('running-ron-abstract');
    }

    public function play_running_ron_hybrid(){
        return view ('running-ron-hybrid');
    }

    public function play_running_ron_medium_humanlike(){
        return view ('running-ron-medium');
    }
    
    public function play_word_search(){
        return view ('word-search');
    }

    
}
