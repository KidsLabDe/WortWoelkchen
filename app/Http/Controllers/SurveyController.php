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
            // TODO: Prüfen, ob die ID schon existiert

            $external_id = $part1 . '-' . $part2; // Fügt die beiden Teile mit einem "-" in der Mitte zusammen

            return $external_id;
        }

        $answers = array();

        if ($request->type == "multiple-choice") {
            $answers[] = $request->answer1;
            $answers[] = $request->answer2;
            $answers[] = $request->answer3;
            $answers[] = $request->answer4;
            $answers[] = $request->answer5;
            $answers[] = $request->answer6;
            $answers_max = 1;
        }

        if ($request->type == "feedback") {

            $answers[] = "1 - Sehr Gut";
            $answers[] = "2 - Gut";
            $answers[] = "3 - Befriedigend";
            $answers[] = "4 - Ausreichend";
            $answers[] = "5 - Mangelhaft";
            $answers[] = "6 - Ungenügend";
            $answers_max = 1;
            //dd($answers);
        }

        if ($request->type == "wordcloud") {
            $answers_max = 99;
        }

        //dd($answers);


        $survey = new Survey();
        $survey->external_id = createExternalId();
        $survey->name = $request->name;
        $survey->email = $request->email;
        $survey->question = $request->question;
        $survey->type = $request->type;
        $survey->answers = json_encode($answers);
        $survey->answers_max = $answers_max;
        if ($request->time < 0) {
            $survey->time = null;
        } else {
            $survey->time = $request->time;
        }
        $survey->save();



        return redirect('survey/' . $survey->external_id);

        //return redirect()->route('home');
    }

    public function survey_input($external_id)
    {
        $survey = Survey::where('external_id', $external_id)->firstOrFail();

        // beim ersten Aufruf wird die Startzeit gesetzt und damit die Umfrage gestartet
        if ($survey->start == null) {
            $survey->start = now();
            $survey->save();
        }

        //var_dump($survey); die;
        $session_id = session()->getId();



        if ($survey->type == "feedback") {
            if (
                words::where('user_id', $session_id)
                    ->where('survey_id', $survey->id)
                    ->exists()
            ) {
                $enabled = false;
            }

        }

        return view('survey_input', [
            'survey' => $survey,
            'user_id' => $session_id,
            'enabled' => $enabled,
        ]);


    }


    public function show($external_id)
    {
        //var_dump($external_id); die;

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



        return view('survey_results', [
            'survey' => $survey,
            'words' => $words,
            //'words_count' => $words_count,
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