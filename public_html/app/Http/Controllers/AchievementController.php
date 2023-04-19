<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Task;
use App\User;
use App\Badge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AchievementController extends Controller
{
    public function index()
    {
        return view('achievements');
    }

    public function appointment_tiers()
    {

    }

    public function appointment_monthly()
    {

    }

    public function task_tiers()
    {

    }

    public function task_monthly()
    {

    }
}
