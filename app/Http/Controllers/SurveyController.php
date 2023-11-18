<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\words;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode; // Add this import statement
use DB;

class SurveyController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        $survey = new Survey();
        $survey->external_id = Str::uuid();
        $survey->name = $request->name;
        $survey->email = $request->email;
        $survey->question = $request->question;
        $survey->save();

        

        return $this->show($survey->external_id);

        //return redirect()->route('home');
    }

    public function survey_input($external_id)
    {
        $survey = Survey::where('external_id', $external_id)->firstOrFail();

        //var_dump($survey); die;
        $session_id = session()->getId();

        return view('survey_input', [
            'survey' => $survey,
            'user_id' => $session_id,
        ]);
    }


    public function show($external_id)
    {

        $survey = Survey::where('external_id', $external_id)->firstOrFail();

        $url = 'survey/' . $survey->external_id ;
        $qrCode =  QrCode::eyeColor(0, 150, 100, 200, 0, 0, 0)->size(300)->generate($url);

        

        return view('survey_show', [
            'survey' => $survey,
            'qrCode' => $qrCode,
            'url'=> $url,
        ]);
    }

    public function results($external_id)
    {

       
        $survey = Survey::where('external_id', $external_id)->firstOrFail();
        $words = Words::where('survey_id', $survey->id)->get();

        $words_count = DB::table('words')
                 ->select('word', DB::raw('count(*) as total'))
                 ->groupBy('word')
                 ->where('survey_id', $survey->id)
                 ->get();


        return view('survey_results', [
            'survey' => $survey,
            'words' => $words,
            'words_count' => $words_count,
        ]);
    }



public function survey_results_api($external_id)
    {

       
        $survey = Survey::where('external_id', $external_id)->firstOrFail();
        //$words = Words::where('survey_id', $survey->id)->get();

        $words = DB::table('words')
                 ->select('word', DB::raw('count(*) as total'))
                 ->groupBy('word')
                 ->where('survey_id', $survey->id)
                 ->get();
        return response()->json([
            'words' => $words,
        ]);
    }

}