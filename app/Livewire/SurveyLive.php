<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Survey;
use App\Models\words;


class SurveyLive extends Component
{
    public $wordcount = 0;
    public $time = 0;
    public $survey_id = 0;
    public function render($survey)
    {   
        var_dump($survey); die;
        return view('livewire.surveylive');
    }

    public function refreshWords()
    {
        $this->wordcount = words::count();
    }
}
