<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Survey; // Add the missing import statement
use App\Models\Words;
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
        $survey = Survey::find($this->survey_id)->first();
        $this->wordcount = $this->survey->answers_all_count;
        $this->usercount = $this->survey->user_count;
        //var_dump($survey); die;
        return view('livewire.SurveyLive');
    }

    public function refreshWords()
    {
        $survey = Survey::find($this->survey_id)->first();
        $this->wordcount = $this->survey->answers_all_count;
        $this->usercount = $this->survey->user_count;

        
    }
}
