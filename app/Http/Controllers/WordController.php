<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Words; // Add this line to import the Words model
use App\Models\Survey;
use Illuminate\Support\Facades\DB;

class WordController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }


    public function store(Request $request)
    {
        if (words::where('word', $request->word)
        ->where('user_id', $request->user_id)
        ->where('survey_id', $request->survey_id)
        ->exists()) {
            //echo ("word already exists");
            return redirect( $request->survey_external_id);
        }
        else {
            // get the survey_id by external_id

            $word = new Words();
            $word->word = $request->word;
            $word->user_id = $request->user_id;
            $word->survey_id = $request->survey_id;
            $word->save();
            return redirect( $request->survey_external_id);
        }
    }

}

