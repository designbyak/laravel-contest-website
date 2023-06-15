<?php

namespace App\Http\Controllers;
use App\Models\ContactForm as ModelsContactForm;
use Illuminate\Http\Request;

class ContactFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contact = ModelsContactForm::paginate(15);
        return view('admin.contact.index', compact('contact'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = request()->validate([
            "w3lName" => 'required',
            "w3lSender" => 'required',
            "w3lSubject" => 'required',
            "w3lPhone" => 'required',
            "w3lMessage" => 'required',
            ]);
    
            $data = new ModelsContactForm([
                "name" => $request->get('w3lName'),
                "email" => $request->get('w3lSender'),
                "subject" => $request->get('w3lSubject'),
                "phone" => $request->get('w3lPhone'),
                "message" => $request->get('w3lMessage')
        
               ]);
              $data->save();
             return redirect()->back()->with('success','Contact Information Sent successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
          //
          ModelsContactForm::where('id', $id)->delete();
          return redirect()->back()->with('success','Deleted successfully.');
    }
}
