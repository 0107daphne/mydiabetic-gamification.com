<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Task;
use App\User;
use App\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class BadgeController extends Controller
{
    public function index()
    {
        $badges = Badge::all();
        
        return view ('badge', compact('badges'));
    }
}
