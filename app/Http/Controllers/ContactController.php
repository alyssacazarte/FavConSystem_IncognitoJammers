<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Schedule;
use App\Models\Request as Requests;
use App\Models\Appointment;
use App\Http\Requests\BookingRequest;
use Session;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::where('status', 'active')->whereHas('schedule')->get();

        return view('contact', compact('services'));
    }

    public function book(Request $request)
    // public function book(BookingRequest $request)
    {
        $data = $request->all();
        $req = Appointment::create($data);
        // $req = Requests::create($request->validated());
        // $req->appointment()->create($request->validated());

        if ($req) {
            return redirect()->route('contact.thankyou');
        }

        return redirect()->route('contact.index');
    }

    public function thankyou()
    {
        return view('thankyou');
    }

    public function getSchedule(Request $request)
    {
        $data = $request->all();

        $schedule = Schedule::where('service_id', $data['schedule_id'])->with('timeslot')->get();

        return response()->json($schedule);
    }


}
