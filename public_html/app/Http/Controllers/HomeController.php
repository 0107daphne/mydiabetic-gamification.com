<?php

namespace App\Http\Controllers;
use Session;
use App\User;
use App\Task;
use App\Appointment;
use App\Medication;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        $upcoming_tasks = Task::where([
                                ['user_id', Auth::user()->id],
                                ['days', '>=', 0]
                            ])->get();

        $overdue_tasks = Task::where([
                                ['user_id', Auth::user()->id],
                                ['completed', '=', 0],
                                ['days', '<', 0]
                            ])->get();
                            
        $all_tasks = count(Task::whereIn('user_id', [Auth::user()->id])
                            ->get());

        
        $treatment = 0;

        if($all_tasks !=0){
            $treatment = count(Task::where([
                                        ['user_id', Auth::user()->id],
                                        ['completed', '=', 1]])
                                    ->get()) / $all_tasks * 100;
        }
        else{
            $treatment = 0;
        }

        $appointments = Appointment::where([
                                        ['user_id', Auth::user()->id],
                                        ['days', '>=', 0]
                                    ])->get();

        $all_appointments = count(Appointment::whereIn('user_id', [Auth::user()->id])
                            ->get());
        
        $care = 0; //completed appointments / all appointments
        $planning = 0; //upcoming appointments / all appointments
        
        if($all_appointments!=0){
            $care = count(Appointment::where([
                                        ['user_id', Auth::user()->id],
                                        ['completed', '=', '1']
                                    ])->get()) / $all_appointments * 100;

            $planning = count($appointments) / $all_appointments * 100;
        }
        else{
            $care = 0;
            $planning = 0;
        }

        $all_medications = count(Medication::whereIn('user_id', [Auth::user()->id])
                                            ->get());

        $ongoing_med = count(Medication::where([
                                            ['user_id', Auth::user()->id],
                                            ['status', '=', 0]
                                        ])->get());
        
        $medication = 0;
        if($all_medications!=0){
            $medication = $ongoing_med / 5 * 100;
        }
        else{
            $medication = 0;
        }
                
        $medications_noti = Medication::whereIn('user_id', [Auth::user()->id])
                                        ->whereIn('countdown', [1,3,7])
                                        ->whereIn('status', [0])
                                        ->orderBy('date_stop')
                                        ->get();
        $all = count($medications_noti);
        
        return view('home', compact('upcoming_tasks',
                                    'overdue_tasks', 
                                    'appointments', 
                                    'medications_noti', 
                                    'all', 
                                    'planning', 
                                    'medication', 
                                    'treatment', 
                                    'care'));
    }

}
