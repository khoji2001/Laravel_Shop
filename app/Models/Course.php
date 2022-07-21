<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'subject',
        'cover',
        'description',
        'user_id',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function related()
    {
        return $this->belongsToMany(Course::class, 'related_course_pivot','post_id', 'related_id');
    }
    public function session(){
        return $this->hasMany(Session::class,"course_id","id"); 
    }

}
