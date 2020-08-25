<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\ConsultationRequest;
use App\Consultant;

class ConsultantsController extends Controller
{
    /**
     * show public page for Consultant
     * 
     * @param Request $request
     * @param integer $consultantId
     * 
     * @return view
     */
    public function view(Request $request, $consultantId)
    {
        $consultant = Consultant::find($consultantId);

        if (!$consultant) abort(404);

        // need to get the available dates 
        // $response = Http::get('https://api.calendly.com/scheduled_events', [
        //     'user' => 'https://api.calendly.com/users/EBHAAFHDCAEQTSEZ',
        // ]);

        // dd($response->body());

        return view('consultants.view',[
            'consultant' => $consultant
        ]);
    }

    /**
     * request consultantation 
     * 
     * @param Request $request
     * @param integer $consultantId
     * 
     * @return response
     */
    public function request(Request $request, $consultantId)
    {
        $consultant = Consultant::find($consultantId);

        if (!$consultant) abort(404);

        foreach ([$request->email , $consultant->email] as $recipient) {
            Mail::to($recipient)->send(new ConsultationRequest($request->all()));
        }

        return redirect()->back()
                ->with("success", "Your request has been sent successfully.");
    }
}
