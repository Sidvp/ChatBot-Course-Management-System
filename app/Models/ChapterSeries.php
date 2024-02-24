<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChapterSeries extends Model
{
    use HasFactory;

    protected $table = "chapter_series";

    protected $primaryKey = "chapter_series_id";

    // to fetch record for course
    public function courseSeries(){  // function
        return $this->belongsTo(CourseSeries::class);
        // return $this->belongsTo('App\Models\Course');
    }
    
    // public function subtopics(){  // function
    //     return $this->hasMany(Subtopic::class, 'chapter_id', 'chapter_id');
    // }
}
