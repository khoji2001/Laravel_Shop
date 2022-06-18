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
        'user_id'
    ];
    // public function user(){
    //     return $this->hasMany(User::class,"id","user_id"); 
    // }
}
