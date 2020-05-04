<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Group;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $groups = Group::all();
        
        return view('dashboard.show_user', compact(['user', 'groups']));
        
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
        

        $data = request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        //dd($data);
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        if( $request->has('group_id') ){
            $user->group_id = $request->input('group_id');
         }
        $user->save();
        return redirect()->back()->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('deleted', 'Successfully deleted');;
    }
}
