<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;
    protected $table = "chapters";
    protected $primaryKey = "chapter_id";

    // to fetch record for course
    public function course(){  // function
        return $this->belongsTo(Course::class);
        // return $this->belongsTo('App\Models\Course');
    }

    public function subtopics(){  // function
        return $this->hasMany(Subtopic::class, 'chapter_id', 'chapter_id');
    }
}





