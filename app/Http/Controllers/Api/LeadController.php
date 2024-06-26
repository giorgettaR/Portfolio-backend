<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\NewLead;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    public function store(Request $request){
        // validiamo manulamente senza il validate()
        $data = $request->all();
        $validator = Validator::make($data,[
            'name'=> 'required|max:255',
            'email'=> 'required|email|max:255',
            'message'=> 'required',
        ]);



        // ritorniamo un json di fallimento con errori
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]
            );
        } else {
                    
            // salviamo
            $lead = Lead::create($data);

            // inviamo email
            Mail::to('giang@gamil.com')->send(new NewLead($lead));

            // ritorniamo un json di successo
            return response()->json([
                'success' => true
            ]);
            
        };

    }
}
