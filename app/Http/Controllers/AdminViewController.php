<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Timeslot;
use App\Models\Schedule;
use App\Models\Service;
use App\Models\User;
use App\Mail\TestEmail;


class AdminViewController extends Controller
{
    //Login Controller
    public function showLoginForm() {
        return view("layout.admin.login");
    }
    public function login(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();
    
        if ($user && $request->input('password') === $user->password) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }


    //APPOINTMENT CONTROLLER
    public function appointmentView() {
        $appointments = Appointment::get();
        return view("layout.admin.appointment", compact('appointments'));
    }

    public function updateAppointment(Request $request, $id)
    {
        $appointment = Appointment::findOrFail($id); 
        $message = $request->input('status'); 

        $recipientEmail= $appointment->email;
        $user = ['message' => 'This is a test!'];

        $appointmentStatus = $request->input('status') === 'Approved' ? 'Approved' : 'Rejected';

         Mail::to($recipientEmail)->send(new TestEmail($appointmentStatus));
        $appointment->update(['status' => $message]);
    
        $serviceId = $appointment->service_id;
    
        // Find the corresponding schedule
        $schedule = Schedule::where('service_id', $serviceId)
                            // ->where('date', $date)
                            ->where('status', 'Available')
                            ->first();
    
        // Find an available timeslot for the appointment
        $timeslot = null;
        if ($schedule) {
            $timeslot = Timeslot::where('schedule_id', $schedule->id)
                                ->where('status', 'Available')
                                ->first();
        }
    
        if ($schedule && $timeslot) {
            // Update the schedule_id and timeslot_id of the appointment
            $appointment->update([
                'schedule_id' => $schedule->id,
                'timeslot_id' => $timeslot->id,
            ]);
    
            // Update the status of the timeslot to "booked"
            DB::table('timeslots')
                ->where('id', $timeslot->id)
                ->update(['status' => 'Booked']);
            
            DB::table('schedules')
                ->where('id', $schedule->id)
                ->update(['status' => 'Booked']);
        } else {
            // Handle the case where no available schedule or timeslot is found 
            return redirect()->back()->with('error', 'No available schedule or timeslot for the appointment.');
        }
        
        return redirect()->back();
}

    //SCHEDULE CONTROLLER

    public function scheduleview() {
        $schedules  = Schedule::all();
        return view('layout.admin.schedule', compact('schedules'));
    }
    
    public function createSchedule(Request $request )
    {
        return view('layout.admin.schedule_create');
    }

    public function addSchedule(Request $request)
    {
        $addSchedules = new Schedule;
        if ($addSchedules) {
            $addSchedules->date = $request->input('date');
            $addSchedules->service_id = $request->input('service_id');
            $addSchedules->status = $request->input('status');
            $addSchedules->save();
            return redirect('/schedule-dashboard')->with('success', 'Successfully Created');
        } else {
            return redirect('layout.admin.schedule_create')->with('error');
        }
    }

    public function updateSchedule($id)
    {
        $updateSchedule = Schedule::find($id);
        return view('layout.admin.schedule_update', ['data'=>$updateSchedule]);
    }

    public function editSchedule(Request $request)
    {
        $editSchedule = Schedule::find($request->id);
        if ($editSchedule) {
            $editSchedule->date = $request->input('date');
            $editSchedule->service_id = $request->input('service_id');
            $editSchedule->status = $request->input('status');
            $editSchedule->save();
            return redirect('/schedule-dashboard')->with('success', 'Successfully Updated');

        } else {

            return redirect('layout.admin.schedule_update')->with('error');
        }
    }

    //SERVICE CONTROLLER
    public function serviceview() {
        $services  = Service::all();
        return view ('layout.admin.service', compact('services'));
    }

        public function createServices()
        {
            return view('layout.admin.service_create');
        }


        public function addServices(Request $request)
        {
            $createServices = new Service;
            if ($createServices) {
                $createServices->type = $request->input('type');
                $createServices->description = $request->input('description');
                $createServices->status = $request->input('status');
                $createServices->save();
                return redirect('/service-dashboard')->with('success', 'Successfully Created');

            } else {

                return redirect('/admin/service')->with('error');
            }
        }
        public function editServices($id)
        {
            $editServices = Service::find($id);
            return view('layout.admin.service_update', ['data'=>$editServices]);
        }
        public function updateServices(Request $request)
        {
            $updateServices = Service::find($request->id);
            if ($updateServices) {
                $updateServices->type = $request->input('type');
                $updateServices->description = $request->input('description');
                $updateServices->status = $request->input('status');
                $updateServices->save();
                return redirect('/service-dashboard')->with('success', 'Successfully Updated');
            } else {
                return redirect('layout.admin.service_update')->with('error', 'User not found');
            }
        }

    //TIMESLOT CONTROLLER
    public function timeslotview() {
        $timeslots  = Timeslot::all();
        return view ('layout.admin.timeslot',compact('timeslots'));
    }
    public function createTimeSlot(Request $request )
    {
        return view('layout.admin.timeslot_create');
    }

    public function addTimeSlot(Request $request)
    {
        $addTimes = new Timeslot;
        if ($addTimes) {
            $addTimes->start_time = $request->input('start_time');
            $addTimes->end_time = $request->input('end_time');
            $addTimes->status = $request->input('status');
            $addTimes->schedule_id = $request->input('schedule_id');
            $addTimes->save();
            return redirect('/timeslot-dashboard')->with('success', 'Successfully Created');
        } else {

            return redirect('layout.admin.timeslot_create')->with('error');
        }
    }
    public function updateTimeSlot($id)
    {
        $updateTime = Timeslot::find($id);
        return view('layout.admin.timeslot_update', ['data'=>$updateTime]);
    }

    public function editTimeSlot(Request $request)
    {
        $editTime = Timeslot::find($request->id);
        if ($editTime) {
            $editTime->start_time = $request->input('start_time');
            $editTime->end_time = $request->input('end_time');
            $editTime->status = $request->input('status');
            $editTime->schedule_id = $request->input('schedule_id');
            $editTime->save();
            return redirect('/timeslot-dashboard')->with('success', 'Successfully Updated');
        } else {
            return redirect('layout.admin.timeslot_update')->with('error');
        }
    }

 
}
