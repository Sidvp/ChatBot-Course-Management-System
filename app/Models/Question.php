<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = "questions";

    protected $primaryKey = "question_id";

    public function subtopic(){
        return $this->belongsTo(Subtopic::class);
    }
}
