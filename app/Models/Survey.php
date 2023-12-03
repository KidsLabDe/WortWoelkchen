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
        if (($this->time_left > 0) or (is_null($this->time))) {
            return true;
        } else {
            return false;
        }
        
    }

    public function getTimeLeftAttribute()
    {
        if ($this->time_passed > 0 ) {
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

    public function getAnswerCountAttribute()
    {
        $words_count = DB::table('words')
            ->select('word', DB::raw('count(*) as total'))
            ->groupBy('word')
            ->where('survey_id', $this->id)
            ->orderBy('total', 'desc')
            ->count();
        return $words_count;
    }

    /*
    public function getAnswersAttribute()
    {
        /* //dd($this);
        if (!property_exists($this, 'answers')) {
            // Property does not exist
            return array();
        } else {
            dd($this->answers);
            return(json_decode($this->answers));
        }
      

    }
    */

}

