<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\Models\Makepayment as ModelsMakepayment;
use Paystack;

class PaymentController extends Controller
{

    public function earning(){
        $earning = ModelsMakepayment::paginate(15);
        return view('admin.earnings.index', compact('earning'));
    }


    public function destroy($id)
    {
        //
        ModelsMakepayment::where('id', $id)->delete();
        return redirect()->back()->with('success','Deleted successfully.');
       }


}