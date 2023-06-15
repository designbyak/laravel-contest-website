<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contest extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'contest_name',
        'contact_email',
        'contact_num',
        'contest_type',
        'start_date',
        'end_date',
        'vote_price',
        'contest_thumb',
        'contest_decription',
        'slug'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function contestant(){
        return $this->belongsTo(Contestant::class);
    }

    public function getRouteKeyName(){
        return 'slug';
    }
}
