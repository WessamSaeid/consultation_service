<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Consultant;

class ConsultantsController extends Controller
{
    /**
     * show public page for Consultant
     */
    public function view(Request $request, $consultantId)
    {
        $consultant = Consultant::find($consultantId);

        if (!$consultant) abort(404);

        // need to get the available dates 

        return view('consultants.view',[
            'consultant' => $consultant
        ]);
    }
}
