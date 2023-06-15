<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    use HasFactory;

    protected $fillable = [
        'contestant_name',
        'contestant_image',
        'about_contestant',
        'slug',
        'contest'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function contest(){
        return $this->belongsTo(Contest::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
