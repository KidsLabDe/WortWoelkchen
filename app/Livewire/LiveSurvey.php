<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Words; // Add this line
use App\Models\Survey; // Add this line
class LiveSurvey extends Component
{
    public $external_id;
    public $answer = "";
    public function render()
    {
        $session_id = session()->getId();

        $survey = Survey::where('external_id', $this->external_id)->firstorfail();
        if ($survey->start == null) {
            $survey->start = now();
            $survey->save();
            $survey->refresh();
        }

        //dd($survey->answers);
        $survey->answers = json_decode($survey->answers);

        return view('livewire.live-survey', [
            'survey' => $survey,
            'user_id' => $session_id,
        ]);
    }

    public function mount($external_id)
    {
        $this->external_id = $external_id;
    }

    public function save($answer = null)
    {

        if (($answer != '')) {
            $this->answer = $answer;
        }

        $this->validate([
            'answer' => 'required|min:1|max:255',
        ]);

        $session_id = session()->getId();
        

        $survey = \App\Models\Survey::where('external_id', $this->external_id)->first();

/*        if ($survey->type == "feedback") {
            if (
                Words::where('user_id', $session_id)
                    ->where('survey_id', $survey->id)
                    ->exists()
            ) {
                $enabled = false;
            }

        }
*/



        if (
            words::where('word', $this->answer)
                ->where('user_id', $session_id)
                ->where('survey_id', $survey->id)
                ->exists()
        ) {
            //echo ("word already exists");

        } else {



            $word = new Words;
            $word->word = $this->answer;
            $word->user_id = $session_id;
            $word->survey_id = $survey->id;
            $word->save();
        }

        $this->answer = "";
    }
}
