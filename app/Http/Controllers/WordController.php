<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Words;
use App\Models\Survey;

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
        ->first()) {
            return redirect( $request->survey_id);}
        else {
            // get the survey_id by external_id
            $survey = Survey::where('external_id', $request->survey_id)->firstOrFail();

            $word = new Words();
            $word->word = $request->word;
            $word->user_id = $request->user_id;
            $word->survey_id = $survey->id;
            $word->save();
            return redirect( $request->survey_id);
        }
    }

}
