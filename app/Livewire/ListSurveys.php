<?php

namespace App\Livewire;

use Livewire\Component;

class ListSurveys extends Component
{
    public function render()
    {
        return view('livewire.list-surveys', [
            'Surveys' => \App\Models\Survey::all()
        ]);
    }
}
