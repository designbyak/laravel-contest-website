<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;
use App\Models\Contest as ModelsContest;
use App\Models\User as ModelsUser;
use Illuminate\Support\Str;
use File;

class ContestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contest = ModelsContest::paginate(15);
        return view('admin.contest.index', compact('contest'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.contest.create');
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
        
            "contest_name" => 'required',
            "contact_email" => 'required',
            "contact_num" => 'required',
            "contest_type" => 'required',
            "start_date" => 'required',
            "end_date" => 'required',
            "vote_price" => 'required',
            "contest_thumb" => 'required',
            "contest_decription" => 'required',
        ]);
        $slug = Str::slug($request->get('contest_name'), '-');
        $data = new ModelsContest([
            "contest_name" => $request->get('contest_name'),
            "contact_email" => $request->get('contact_email'),
            "contact_num" => $request->get('contact_num'),
            "contest_type" => $request->get('contest_type'),
            "start_date" => $request->get('start_date'),
            "end_date" => $request->get('end_date'),
            "vote_price" => $request->get('vote_price'),
            "contest_thumb" => $request->file('contest_thumb'),
            "contest_decription" => $request->get('contest_decription'),
            "slug" => $slug
           ]);
           if($request->file('contest_thumb')){
            $file= $request->file('contest_thumb');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data['contest_thumb']= $filename;
        }
           $data->save();
           return redirect()->back()->with('success','Contest uploaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $contest = ModelsContest::find($id);
        return view('admin.contest.show', compact('contest'), );
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contest = ModelsContest::find($id);
        return view('admin.contest.edit', compact('contest'), );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $slug = Str::slug($request->get('contestant_name'), '-');
        if ($request->hasFile('contest_thumb')) {
        $data = ModelsContest::find($id);
        $data->contest_name = $request->get('contest_name');
        $data->contact_email = $request->get('contact_email');
        $data->contact_num = $request->get('contact_num');
        $data->contest_type = $request->get('contest_type');
        $data->start_date = $request->get('start_date');
        $data->end_date = $request->get('end_date');
        $data->vote_price = $request->get('vote_price');
        $data->contest_thumb = $request->file('contest_thumb');
        $data->slug = $request->get('slug');
        $data->contest_decription = $request->get('contest_decription');
        
        $imagePath = public_path('public/Image/'.$data->contest_thumb);
        $requestData = $request->all();
            $file= $request->file('contest_thumb');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $requestData['contest_thumb']= $filename;
            $data->update($requestData);
        return redirect()->back()->with('success','Contest updated successfully.');

        }else{
        $data = ModelsContest::find($id);
        $data->contest_name = $request->get('contest_name');
        $data->contact_email = $request->get('contact_email');
        $data->contact_num = $request->get('contact_num');
        $data->contest_type = $request->get('contest_type');
        $data->start_date = $request->get('start_date');
        $data->end_date = $request->get('end_date');
        $data->vote_price = $request->get('vote_price');
        $data->slug = $request->get('slug');
        $data->contest_thumb = $data->contest_thumb;
        $data->contest_decription = $request->get('contest_decription');
        $requestData = $request->all();
        $data->update($requestData);
        return redirect()->back()->with('success','Contest updated successfully.');
        }
        
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contest  $contest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = ModelsContest::where('id', $id)->first();
        $imagePath = public_path('public/Image/'.$data->contest_thumb);
                  if (file_exists($imagePath)) {

                  unlink($imagePath);

                  ModelsContest::where('id', $id)->delete();
                  return redirect()->back()->with('success','Contest Deleted successfully.');

       }else{

        ModelsContest::where('id', $id)->delete();
        return redirect()->back()->with('success','Contest Deleted successfully.');
       }


    }
}
