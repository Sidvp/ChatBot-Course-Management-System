<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtopic extends Model
{
    use HasFactory;
    protected $table = "subtopics";
    protected $primaryKey = "subtopic_id";

    // to fetch record for chapter
    public function chapter(){  // function
        return $this->belongsTo(Chapter::class);
    }

    public function questions(){  // function
        return $this->hasMany(Question::class, 'subtopic_id', 'subtopic_id');
    }
}
