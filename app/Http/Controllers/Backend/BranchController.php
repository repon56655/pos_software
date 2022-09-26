<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Branch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view("backend.pages.branch.add");
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
        $request->validate([
            'name'=>'required',
            'manager'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'status'=>'required'
        ]);

        $branch = new Branch;
        $branch->name =$request->name;
        $branch->manager=$request->manager;
        $branch->phone=$request->phone;
        $branch->email=$request->email;
        $branch->status=$request->status;
        $branch->save();
        return redirect()->route("branch.manage")->with('message','Branch Addedd Successfull');
    }
    public function manage(){
        $branch = Branch::all();
        return view("backend.pages.branch.manage",compact("branch"));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::find($id);
        return view("backend.pages.branch.edit",compact("branch"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $branch =  Branch::find($id);
        $branch->name =$request->name;
        $branch->manager=$request->manager;
        $branch->phone=$request->phone;
        $branch->email=$request->email;
        $branch->status=$request->status;
        $branch->update();
        return redirect()->route("branch.manage")->with('message','Branch Update Successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch =  Branch::find($id);
        $branch->delete();
        return redirect()->route("branch.manage")->with('message','Branch Delete Successfull');
    }

    public function status($id){
        $branch =  Branch::find($id);
        if($branch->status==2){
        $branch->status="1";
        }
        else{
            $branch->status="2";
        }
        $branch->update();
        return redirect()->route("branch.manage")->with('message','Status Update Successfull');
    }
}
