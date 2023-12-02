<?php

namespace App\Livewire;

use Livewire\Component;

class LiveSurvey extends Component
{
    public $external_id;
    public $answer = "";
    public function render()
    {
        $session_id = session()->getId();

        $survey = \App\Models\Survey::where('external_id', $this->external_id)->first();
        if ($survey->start == null) {
            $survey->start = now();
            $survey->save();
        }

        return view('livewire.live-survey', [
            'survey' => $survey,
            'user_id' => $session_id,
        ]);
    }

    public function mount($external_id)
    {
        $this->external_id = $external_id;
    }

    public function save() {
        $this->validate([
            'answer' => 'required|min:1|max:255',
        ]);

        $session_id = session()->getId();

        $survey = \App\Models\Survey::where('external_id', $this->external_id)->first();

        if ($survey->type == "feedback") {
            if (
                \App\Models\Words::where('user_id', $session_id)
                    ->where('survey_id', $survey->id)
                    ->exists()
            ) {
                $enabled = false;
            }

        }

        $word = new \App\Models\Words;
        $word->word = $this->answer;
        $word->user_id = $session_id;
        $word->survey_id = $survey->id;
        $word->save();

        $this->answer = "";
    }
}
