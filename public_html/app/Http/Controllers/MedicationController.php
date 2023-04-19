<?php

namespace App\Http\Controllers;

use Session;
use App\Medication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedicationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*  public function index()
    {
        $medications = Medication::all();
        return view('home', compact('medications'));
    } */

    public function ongoing()
    {
        $medications = Medication::where([
                                        ['user_id', Auth::user()->id],
                                        ['status', '=', 0]
                                    ])
                                    ->get();

        return view('medication.medication', compact('medications'));
    }

    public function stopped()
    {
        $medications = Medication::where([
                                        ['user_id', Auth::user()->id],
                                        ['status', '=', 1]
                                    ])
                                    ->get();

        return view('medication.medication', compact('medications'));
    }

    public function create()
    {
        return view ('medication.add-medication');
    }

    public function store(Request $request)
    {
        Medication::create([
            'user_id'=>Auth::user()->id,
            'medication'=>request('medication'),
            'date_given'=>request('date_given'),
            'date_start'=>request('date_start'),
            'date_stop'=>request('date_stop'),
            'dosage'=>request('dosage'),
            'med_form'=>request('med_form'),
            'frequency'=>request('frequency'),
            'directions'=>request('directions'),
            'reason'=>request('reason'),
            'use'=>request('use'),
            'status'=>request('status'),
            'note'=>request('note')
        ]);

        session()->flash('message', 'Medication has been added!');

        return redirect('/medication');
    }

    public function show(Medication $medication)
    {
        $medications = Medication::where([
                                        ['user_id', Auth::user()->id]
                                    ])
                                    ->get();
                
        return view('medication.medication', compact('medications'));
    }

    public function edit($id)
    {
        $medication = Medication::find($id);

        return view('medication.edit-medication', compact('medication'));
    }

    public function update($id)
    {
        $medication = Medication::find($id);

        $medication->update([
            'user_id'=>Auth::user()->id,
            'medication'=>request('medication'),
            'date_given'=>request('date_given'),
            'date_start'=>request('date_start'),
            'date_stop'=>request('date_stop'),
            'dosage'=>request('dosage'),
            'med_form'=>request('med_form'),
            'frequency'=>request('frequency'),
            'directions'=>request('directions'),
            'reason'=>request('reason'),
            'use'=>request('use'),
            'status'=>request('status'),
            'note'=>request('note')
        ]);

        session()->flash('message', 'Medicine has been updated!');
    
        return redirect('/medication');

    }

    public function notification($id)
    {
        $medication = Medication::find($id);

        $medication->update([
                        'notification'=>request(notification)
                    ]);

        return back();
    }

    public function destroy(Medication $medication)
    {
        $medication->delete();
        return redirect()->back();
    }
}
