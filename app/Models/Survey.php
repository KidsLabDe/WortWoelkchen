<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Words;
use Illuminate\Support\Facades\DB;


class Survey extends Model
{
    use HasFactory;

    public function getEnabledAttribute()
    {
        //dd($this->end);
        // Enddatum prüfen - wenn gesetzt, dann prüfen, ob das Enddatum erreicht ist - wenn ja, dann nicht aktiv
        if (!is_null($this->end)) {
            if (time() > strtotime($this->end)) {
                $enabled = false;
            }
        }
        // ist die umfrage zeitlich begrenzt und ist die zeit abgelaufen?
        if (($this->time_left > 0) or (is_null($this->time))) {
            $enabled = true;
        } else {
            $enabled = false;
        }
        //dd($this->answers_user_count, $this->answers_max);
        if ($this->answers_user_count >= $this->answers_max) {
            $enabled = false;
        }

        return $enabled;

    }

    public function getTimeLeftAttribute()
    {
        if ($this->time_passed > 0) {
            return $this->time - $this->time_passed;
        } else {
            return null;
        }
    }

    public function getTimePassedAttribute()
    {
        if (is_null($this->time)) {
            return null;
        } elseif ($this->start == null) {
            return $this->time;
        } else {

            //dd($this->start, strtotime($this->start), $this->time, );
            return (time() - strtotime($this->start));
        }
    }

    public function getAnswersAllCountAttribute()
    {
        $words_count = words::where('survey_id', $this->id)->count();
        return $words_count;
    }

    public function getAnswersUserCountAttribute()
    {
        //dd($this->id, session()->getId());
        $words_count = words::where('survey_id', $this->id)->where('user_id', session()->getId())->count();

        return $words_count;
    }

    public function getUserCountAttribute()
    {
        $user_count = words::select('user_id')
            ->where('survey_id', $this->id)
            ->groupBy('user_id')
            ->toSQL();


        // TODO: gibt immer 3 zürück - warum? Geht GROUP BY nicht in SQLite?
        //dd($user_count);
        return $user_count;
    }


}

