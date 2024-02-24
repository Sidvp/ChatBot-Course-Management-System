<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    use HasFactory;
    protected $table = "users_progress";

    protected $primaryKey = "progress_id";

    // public function user(){  // function
    //     return $this->belongsTo(User::class);
    //     // return $this->belongsTo('App\Models\Course');
    // }

}
