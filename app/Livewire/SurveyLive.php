<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Survey;
use App\Models\words;
use Illuminate\Support\Facades\DB;


class SurveyLive extends Component
{
    public $wordcount = 0;

    public $usercount = 0;
    public $time = 0;
    public $survey_id = 0;

    public $survey;

    public $end;

    public function render($survey = null)
    {   
        if (isset($survey)) {
            $this->survey = $survey;
        }
        $this->survey_id = $this->survey->id;
        //var_dump($survey); die;
        return view('livewire.surveylive');
    }

    public function refreshWords()
    {

        $survey = Survey::find($this->survey_id)->first();
        $this->wordcount = words::where('survey_id', $this->survey->id)->count();
        $this->usercount = words::select('user_id')->where('survey_id', $this->survey->id)->groupBy('user_id')->count(); // TODO: this is not working - always 0
 
        
    }
}
