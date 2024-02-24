<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseSeries extends Model
{
    use HasFactory;

    protected $table = "course_series";

    protected $primaryKey = "course_series_id";

    public function chapterSeries(){  // function
        return $this->hasMany(ChapterSeries::class, 'course_series_id', 'course_series_id');
    }
}
