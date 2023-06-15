<?php

namespace App\Http\Controllers;

use App\Models\Contestant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contest as ModelsContest;
use App\Models\Makepayment as ModelsMakepayment;
use App\Models\Contestant as ModelsContestant;
use App\Models\Freevote as ModelsFreevote;
use Illuminate\Support\Str;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Paystack;


class FrontPageController extends Controller
{
    //

    public function index()
    {
        //
        $contestant = ModelsContestant::paginate(9);
        $contest = ModelsContest::paginate(3);
        return view('welcome', compact('contestant', 'contest'));
    }


    public function about()
    {
        //
        return view('about');
    }

    public function contact()
    {
        //
        return view('contact');
    }

    public function contest()
    {
        //
        $contest = ModelsContest::all();
        return view('contest', compact('contest'));
    }

    public function contestants()
    {
        //
        $contestant = ModelsContestant::paginate(9);
        return view('contestants', compact('contestant'));
    }

    public function view_contest($slug)
    {
        //
        //$slug = null;
        $contest = ModelsContest::where('slug',$slug)->get();
        foreach ($contest as $contests) {
            // Code Here
        }
        $contestview = ModelsContest::where('slug',$slug)->first();
        $contestant = ModelsContestant::where('contest',$contests->id)->get();
        return view('contestview', compact('contestant', 'contest', 'contestview'));
    }

    public function view_contestant($slug)
    {
        //
        //$slug = null;
        $contestant = ModelsContestant::where('slug',$slug)->get();
        foreach ($contestant as $contestants) {
            // Code Here
        }
        $contestantview = ModelsContest::where('id',$contestants->contest)->first();
        $contestvote = ModelsContestant::where('slug',$slug)->first();
        return view('viewcontestant', compact('contestvote', 'contestantview'));
    }

    public function finalpayment(Request $request, $slug)
    {
        //
        //$slug = null;
            $slug = $request->input('slug');
            $numVotes = $request->input('numVotes');
            $voters_name = $request->input('voters_name');
            $voters_email = $request->input('voters_email');
            $phone = $request->input('phone');
            $contest_id = $request->input('contest_id');
            $contestant_id = $request->input('contestant_id');
            $amount = $request->input('amount');
            $reference = str_random(7);
            $clientIP = request()->ip();
            $voting_details_id = $request->input('voting_details_id');
            $paystacknum = $amount * $numVotes * 100;

            $data['numVotes'] = $numVotes;
            $data['clientIP'] = $clientIP;
            $data['reference'] = $reference;
            $data['slug'] = $slug;
            $data['voters_name'] = $voters_name;
            $data['voters_email'] = $voters_email;
            $data['phone'] = $phone;
            $data['contest_id'] = $contest_id;
            $data['contestant_id'] = $contestant_id;
            $data['amount'] = $amount * $numVotes;
            $data['totalamount'] = $paystacknum;
            $data['voting_details_id'] = $voting_details_id;

            
            $meta = [
            'full_name'=>$data['voters_name'],
            'clientIP'=>$data['clientIP'],
            'contest_id'=>$data['contest_id'],
            'contestant_id'=>$data['contestant_id'],
            'numVotes'=>$data['numVotes'],
            'reference'=>$data['reference'],
            'voting_details_id'=>$data['voting_details_id'],
            'phone'=>$data['phone']];
            
        $contestant = ModelsContestant::where('slug',$slug)->get();
        foreach ($contestant as $contestants) {
            // Code Here
        }
        $contestantview = ModelsContest::where('id',$contestants->contest)->first();
        $contestvote = ModelsContestant::where('slug',$slug)->first();

        return view('votecontestant', compact('contestvote', 'contestantview', 'data', 'meta'));

       dd($data);
    }


     /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();

        $dataraw = new ModelsMakepayment([
            "full_name" => $paymentDetails['data']['metadata']['full_name'],
            "ip_address" => $paymentDetails['data']['ip_address'], 
            "contest_id" => $paymentDetails['data']['metadata']['contest_id'],
            "contestant_id" => $paymentDetails['data']['metadata']['contestant_id'],
            "numVotes" => $paymentDetails['data']['metadata']['numVotes'],
            "reference" => $paymentDetails['data']['metadata']['reference'],
            "phone" => $paymentDetails['data']['metadata']['phone'],
            "email" => $paymentDetails['data']['customer']['email'],
            "currency" => $paymentDetails['data']['currency'],
            "payment_id" => $paymentDetails['data']['id'],
            "status" => $paymentDetails['data']['status'],
            "domain" => $paymentDetails['data']['domain'],
            "paystackreference" => $paymentDetails['data']['reference'],
            "amount" => $paymentDetails['data']['amount'] / 100
           ]);

           if ($paymentDetails['data']['status'] == 'success'){
            $id = $paymentDetails['data']['metadata']['contestant_id'];
            $data = ModelsContestant::find($id);
            $data->vote_count = $paymentDetails['data']['metadata']['numVotes'] + $data->vote_count;
            $data->update(); 
           }
           $dataraw->save();
           return redirect()->away('/contest')->with('success', 'Vote Received successfully');
            
            }
            
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
       
        public function freevote(Request $request)
        {
            //
            $data = request()->validate([
                "voters_name" => 'required',
                "voters_email" => 'required',
                "phone" => 'required',
            ]);
            $voters_id = Auth::user()->id;
            $dataraw = new ModelsFreevote([
                "voters_id" => $voters_id,
                "contest_id" => $request->get('contest_id'),
                "contestant_id" => $request->get('contestant_id'),
               ]);
               $contest_id = $request->get('contest_id');


               //$checkvote = ModelsFreevote::where('contest_id', '=', $contest_id)
                 //        ->whereRaw('voters_id '!=', $voters_id')->get();

                 $checkvote = ModelsFreevote::where('contest_id', $contest_id)->where('voters_id', $voters_id)->exists();
                 if($checkvote == true){
                    return redirect()->back()->with('success','You cannot vote more than once for this voting contest!');
                 }else{
                    $data = ModelsContestant::find($request->get('contestant_id'));
                    $data->vote_count = 1 + $data->vote_count;
                    $data->update(); 
                    $dataraw->save();
                    return redirect()->back()->with('success','Vote casted sucessfully');
                 }
            
    }


    public function search(Request $request)
    {
        //

        $search = $request->input('search');
        
        if (request('search')) {
            $contest = ModelsContest::query()
            ->where('contest_name', 'LIKE', "%{$search}%")
            ->orWhere('contest_decription', 'LIKE', "%{$search}%")
            ->get();
        } else {
            $contest = ModelsContest::all();
        }
        
        return view('search', compact('contest', 'search'));
    }
}
