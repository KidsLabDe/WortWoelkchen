<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Survey;
use App\Models\Words;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode; // Add this import statement
use Illuminate\Support\Facades\DB;


class SurveyController extends Controller
{
    //
    public function index()
    {
        return view('welcome');
    }

    public function store(Request $request)
    {
        function createExternalId()
        {
            $part1 = rand(100, 999); // Generiert eine zufällige 3-stellige Zahl
            $part2 = rand(100, 999); // Generiert eine weitere zufällige 3-stellige Zahl

            $external_id = $part1 . '-' . $part2; // Fügt die beiden Teile mit einem "-" in der Mitte zusammen

            return $external_id;
        }

        $survey = new Survey();
        $survey->external_id = createExternalId();
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

        $url = url($survey->external_id);
        $qrCode = QrCode::eyeColor(0, 150, 100, 200, 0, 0, 0)->size(300)->generate($url);



        return view('survey_show', [
            'survey' => $survey,
            'qrCode' => $qrCode,
            'url' => $url,
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
            ->orderBy('total', 'desc')
            ->get();


        return view('survey_results', [
            'survey' => $survey,
            'words' => $words,
            'words_count' => $words_count,
        ]);
    }


    public function survey_end($external_id)
    {
        $survey = Survey::where('external_id', $external_id)->firstOrFail();
        $survey->end = now();
        $survey->save();
        return ($this->results($external_id));
    }
    public function survey_results_api($external_id)
    {


        $survey = Survey::where('external_id', $external_id)->firstOrFail();
        //$words = Words::where('survey_id', $survey->id)->get();

        $words = DB::table('words')
            //->select('word', DB::raw('count(*) as total'))
            ->select('word')
            ->groupBy('word')
            ->where('survey_id', $survey->id)
            ->get();
        // kleiner workaround, da sonst die json nicht richtig funktioniert
        $words_simple = array();
        foreach ($words as $word) {
            $words_simple[] = $word->word;
        }
        return response()->json($words_simple);
    }

}