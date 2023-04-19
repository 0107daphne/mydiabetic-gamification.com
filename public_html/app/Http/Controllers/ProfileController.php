<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use App\Badge;
use App\Achievement;
use App\Appointment;
use App\Task;
use App\Mission;
use Session;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {   
        $missions = Mission::where([
                                ['user_id', Auth::user()->id]
                            ])->get();
        
        $all_missions = count(Mission::whereIn('user_id', [Auth::user()->id])
                                        ->get());
        
        $completed_mission = 0;

        if($all_missions!=0){
            $completed_mission = count(Mission::where([
                                                    ['user_id', Auth::user()->id],
                                                    ['completed', '=', '1']])
                                                ->get()) / $all_missions * 100;
        }
        else{
            $completed_mission = 0;
        }
        
        $users = User::whereIn('id', [Auth::user()->id])
                        ->get();

        $appointments = Appointment::whereIn('user_id', [Auth::user()->id]) //every completed appointment
                                    ->whereIn('completed', [1])
                                    ->get();

        $all_appointments = count(Appointment::whereIn('user_id', [Auth::user()->id]) //total all appointments
                                                ->get());

        $completed_appointment = 0;

        if($all_appointments != 0)
        {
            $completed_appointment = count(Appointment::where([
                                                            ['user_id', Auth::user()->id],
                                                            ['completed', '=', '1']])
                                                        ->get()); //total all completed appointments

            //IF-ELSE FOR OVERALL APPOINTMENTS ACHIEVEMENT TIERS
            if($completed_appointment >= 10 && $completed_appointment < 20) //TIER 1
            {
                $achievement = Achievement::updateOrInsert([
                                'user_id' => Auth::user()->id,
                                'type' => 'AT1',
                                'badge_id' => 1
                ]);
                
                $user = User::find(Auth::user()->id);
                $user->update([
                    'badge_status' => 1
                ]);
            }
            elseif ($completed_appointment >= 20 && $completed_appointment < 30) //TIER 2
            {
                $achievement = DB::table('achievements')
                                    ->where([
                                        ['user_id', Auth::user()->id],
                                        ['type', 'AT1']
                                    ])
                                    ->update([
                                        'type' => 'AT2',
                                        'badge_id' => 2
                                    ]);
            }
            elseif($completed_appointment >= 30) //TIER 3
            {
                $achievement = DB::table('achievements')
                                    ->where([
                                        ['user_id', Auth::user()->id],
                                        ['type', 'AT2']
                                    ])
                                    ->update([
                                        'type' => 'AT3',
                                        'badge_id' => 3
                                    ]);
            }
            //END IF-ELSE FOR OVERALL APPOINTMENTS ACHIEVEMENT TIERS

            /* cal_days_in_month(CAL_GREGORIAN, date("m"), date("Y")); */ //get the last day of the specified month

            //IF-ELSE FOR MONTHLY APPOINTMENTS ACHIEVEMENT TIERS

            if(date("Y-m-d") == date("Y-m-t"))
            {
                $total_monthly_apt = count(Appointment::where([
                                                            ['user_id', [Auth::user()->id]]
                                                        ])
                                                        ->whereMonth('appointment_date', date('m'))
                                                        ->get());

                $total_monthly_completed = count(Appointment::where([
                                                                ['user_id', [Auth::user()->id]],
                                                                ['completed', 1]])
                                                            ->whereMonth('appointment_date', date('m'))
                                                            ->get());

                $monthly_check = $total_monthly_completed / $total_monthly_apt;

                if($monthly_check == 1)
                {
                    $user = User::find(Auth::user()->id);
                    $user->update([
                                'badge_status' => 1
                                ]);

                    $b_id = date("n") + 3; //for badge id

                    if(date("n"))
                    {
                        $achievement = Achievement::updateOrInsert([
                            'user_id' => Auth::user()->id,
                            'type' => 'AM'.date("n"),
                            'badge_id' => $b_id
                        ]);
                    }
                }
            }
            //END IF-ELSE FOR MONTHLY APPOINTMENTS ACHIEVEMENT TIERS
        }
        else
        {
            $completed_appointment = 0;
        }

        $achievement_badges = DB::table('achievements')
                                    ->join('badges', function ($join) {
                                            $join->on('achievements.badge_id', '=', 'badges.id');
                                        })
                                    ->get();
        
        return view('profile', compact('users', 
                                       'achievement_badges', 
                                       'missions',
                                       'completed_mission'));
    }

    public function edit($id)
    {
        $users = User::find($id);

        return view('edit-profile', compact('users'));
    }

    public function update($id)
    {
        $users = User::find($id);

        $users->update([
            'name'=>request('name'),
            'date_of_birth'=>request('date_of_birth'),
            'phone_no'=>request('phone_no'),
            'emergency_name'=>request('emergency_name'),
            'emergency_relation'=>request('emergency_relation'),
            'emergency_phone'=>request('emergency_phone'),
            'physician_name'=>request('physician_name'),
            'physician_phone'=>request('physician_phone'),
            'allergies'=>request('allergies'),
            'medical_condition'=>request('medical_condition')
        ]);

        session()->flash('message', 'Profile updated');

        return redirect('/profile');
    }

    public function avatar($id)
    {
        $users = User::find($id);

        return view('update-avatar', compact('users'));
    }

    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

    public function update_avatar(Request $request)
    {
        $request->validate([
            'name'              =>  'required',
            'profile_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $user = User::findOrFail(auth()->user()->id);
        $user_id = Auth::user()->id;
        $user->name = $request->input('name');

        
        if ($request->has('profile_image')) {

            $image = $request->file('profile_image');
            $name = Str::slug($request->input('name')).'_'.time();
            $folder = '/uploads/images/'.$user_id.'/';
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            $this->uploadOne($image, $folder, 'public', $name);
            $user->profile_image = $filePath;
        }
        $user->save();

        return redirect()->back()->with(['status' => 'Profile updated successfully.']);
    }

    public function store(Request $request)
    {
        Mission::create([
            'mission'=>request('mission'),
            'user_id'=>Auth::user()->id
        ]);

        session()->flash('message', 'Mission created');

        return redirect('/profile');
    }

    public function complete(Mission $mission)
    {
        $mission->update([
            'completed'=>request()->has('completed')
        ]);

        return back();
    }

    public function delete_mission(Mission $mission)
    {
        $mission->delete();
        return redirect()->back();
    }

}
