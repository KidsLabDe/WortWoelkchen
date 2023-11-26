<?php

namespace App\Livewire;

use App\Models\Survey;
use App\Models\Words;

use Livewire\Component;

class Input extends Component
{
    public $timeLeft = 0;
    public $survey_id = 0;
    public $survey;
    public $wordcount = 0;
    public $userwordcount = 0;

    public $enableInput = true;

    public function mount(Survey $survey) {
        $this->survey = $survey;
        $this->survey_id = $survey->id;
    }
    public function render()
    {
        return view('livewire.input');
    }

    public function showInput(string $survey_id, $user_id) {
        $survey = Survey::find($this->survey_id)->first();
        $this->wordcount = words::where('survey_id', $this->survey->id)->count();
        $this->userwordcount = words::select('user_id')->where('survey_id', $this->survey->id)->count(); 
        $this->timeLeft = $survey->start -  $survey->time;
    }
}
