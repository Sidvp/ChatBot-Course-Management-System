<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = "course";
    protected $primaryKey = "course_id";

    // define one-to-many relationship
    public function chapters(){  // function
        return $this->hasMany(Chapter::class, 'course_id', 'course_id');
    }
}
