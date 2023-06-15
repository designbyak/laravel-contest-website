<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freevote extends Model
{
    use HasFactory;

    protected $fillable = [
        'voters_id',
        'contest_id',
        'contestant_id'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
