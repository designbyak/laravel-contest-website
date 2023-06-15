<?php

namespace App\Http\Controllers;

use App\Models\Contestant;
use Illuminate\Http\Request;
use App\Models\Contest as ModelsContest;
use Illuminate\Support\Str;
use App\Models\Contestant as ModelsContestant;

class ContestantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contestant = ModelsContestant::paginate(15);
        return view('admin.contestant.index', compact('contestant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $contest = ModelsContest::all();
        return view('admin.contestant.create', compact('contest'), );
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
        
            "contestant_name" => 'required',
            "contestant_image" => 'required',
            "contest" => 'required',
        ]);
        $slug = Str::slug($request->get('contestant_name'), '-');
        //$input = 2;
        //$contestant_num = str_pad($input, 4, "0", STR_PAD_LEFT);  // produces "0001"
        $data = new ModelsContestant([
            "contestant_name" => $request->get('contestant_name'),
            "contestant_image" => $request->file('contestant_image'),
            "about_contestant" => $request->get('about_contestant'),
            "contest" => $request->get('contest'),
            "slug" => $slug
           ]);
           if($request->file('contestant_image')){
            $file= $request->file('contestant_image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/contestants'), $filename);
            $data['contestant_image']= $filename;
        }
        $data->save();
        return redirect()->back()->with('success','Contestant uploaded successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $input = $id;
        $contestant_num = str_pad($input, 4, "0", STR_PAD_LEFT);  // produces "0001"
        $contestant = ModelsContestant::find($id);
        $contest = ModelsContest::find($contestant->contest);
        return view('admin.contestant.show', compact('contestant', 'contest', 'contestant_num'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contestant = ModelsContestant::find($id);
        $contest_add = ModelsContest::find($contestant->contest);
        $contest = ModelsContest::all();
        return view('admin.contestant.edit', compact('contestant', 'contest_add', 'contest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $slug = Str::slug($request->get('contestant_name'), '-');
        if ($request->hasFile('contestant_image')) {
            $data = ModelsContestant::find($id);
            $data->contestant_name = $request->get('contestant_name');
            $data->contestant_image = $request->file('contestant_image');
            $data->about_contestant = $request->get('about_contestant');
            $data->contest = $request->get('contest');
            $data->slug = $request->get('slug');
            $imagePath = public_path('public/contestants/'.$data->contestant_image);
            $requestData = $request->all();
                $file= $request->file('contestant_image');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('public/contestants'), $filename);
                $requestData['contestant_image']= $filename;
                $data->update($requestData);
            return redirect()->back()->with('success','Contestant updated successfully.');
    
            }else{
            $data = ModelsContestant::find($id);
            $data->contestant_name = $request->get('contestant_name');
            $data->contestant_image = $data->contestant_image;
            $data->about_contestant = $request->get('about_contestant');
            $data->contest = $request->get('contest');
            $data->slug = $request->get('slug');
            $requestData = $request->all();
            $data->update($requestData);
            return redirect()->back()->with('success','Contestant updated successfully.');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contestant  $contestant
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = ModelsContestant::where('id', $id)->first();
        $imagePath = public_path('public/contestants/'.$data->contest_thumb);
                  if (file_exists($imagePath)) {

                  unlink($imagePath);

                  ModelsContestant::where('id', $id)->delete();
                  return redirect()->back()->with('success','Contestant Deleted successfully.');

       }else{

        ModelsContestant::where('id', $id)->delete();
        return redirect()->back()->with('success','Contestant Deleted successfully.');
       }


    }
}
