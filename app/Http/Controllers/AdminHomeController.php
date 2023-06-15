<?php

namespace App\Http\Controllers;
use App\Models\Contest;
use App\Models\Contest as ModelsContest;
use App\Models\Contestant as ModelsContestant;
use App\Models\User as ModelsUser;
use App\Models\Makepayment as ModelsMakepayment;
use App\Models\Freevote as ModelsFreevote;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    //
    public function dashboard(){

        $contest = ModelsContest::all()->count();
        $contestant = ModelsContestant::all()->count();
        $totalamount = ModelsMakepayment::sum('amount');
        $paidvote = ModelsMakepayment::all()->count();
        $freevote = ModelsFreevote::all()->count();
        $totalvotes = $paidvote+$freevote;
        $earning = ModelsMakepayment::paginate(15);
        return view('admin.dashboard', compact('contest', 'contestant', 'totalamount', 'totalvotes', 'earning'));
    }
}
