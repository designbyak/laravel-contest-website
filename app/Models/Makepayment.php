<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Makepayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'full_name',
        'ip_address',
        'contest_id',
        'contestant_id',
        'numVotes',
        'reference',
        'phone',
        'email',
        'currency',
        'payment_id',
        'status',
        'domain',
        'paystackreference',
        'amount'
    ];
}
