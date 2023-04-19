<?php

namespace App\Http\Controllers;

use Session;
use App\Appointment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function completed_appointments()
    {
        $appointments = Appointment::whereIn('user_id', [Auth::user()->id])
                                    ->whereIn('completed', [1])
                                    ->get();

        return view('appointment.appointment', compact('apppointments'));
    }

    public function incomplete_appointments()
    {
        $appointments = Appointment::whereIn('user_id', [Auth::user()->id])
                                    ->whereIn('completed', [0])
                                    ->where('days','<', 0)
                                    ->get();

        return view('appointment.appointment', compact('appointments'));
    }

    public function create()
    {
        
        return view ('appointment.add-appointment');
    }

    public function store(Request $request)
    {
        Appointment::create([
            'appointment'=>request('appointment'),
            'appointment_date'=>request('appointment_date'),
            'user_id'=>Auth::user()->id
        ]);

        session()->flash('message', 'Appointment has been added!');

        return redirect('/appointment');
    }

    public function show(Appointment $appointment)
    {
        $appointments = Appointment::whereIn('user_id', [Auth::user()->id])
                                    ->get();

        return view('appointment.appointment', compact('appointments'));
    }

    public function history()
    {
        $appointments = Appointment::whereIn('user_id', [Auth::user()->id])
                                    ->where('days', '<', 0)
                                    ->get();
        
        return view('appointment.appointment', compact('appointments'));
    }

    public function upcoming()
    {
        $appointments = Appointment::whereIn('user_id', [Auth::user()->id])
                                    ->where('days', '>=', 0)
                                    ->get();
                        
        return view('appointment.appointment', compact('appointments'));
    }

    public function edit($id)
    {
        $appointment = Appointment::find($id);

        return view('appointment.edit-appointment', compact('appointment'));
    }

    public function update($id)
    {
        $appointment = Appointment::find($id);

        $appointment->update([
            'appointment'=>request('appointment'),
            'appointment_date'=>request('appointment_date'),
            'completed'=>request('completed')
        ]);

        session()->flash('message', 'Appointment has been updated!');

        return redirect('/appointment');
    }

    public function complete(Appointment $appointment)
    {
        $appointment->update([
            'completed'=>request()->has('completed')
        ]);

        return back();
    }

    /* public function incomplete(Appointment $appointment)
    {
        $appointment->completed = 0;
        $appointment->save();

        return back();
    } */

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->back();
    }
}
