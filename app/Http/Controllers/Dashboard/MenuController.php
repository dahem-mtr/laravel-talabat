<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Menu;


class MenuController extends Controller
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
        $data = request()->validate([
            'name' => 'required',
        ]);
        
        $company =  Company::find($request->input('company_id'));

        
        
        
        

        $company->menus()->create($data);
        return redirect()->back()->with('success', 'Successfully crated');;

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
        $menu =  Menu::find($id);
        return view('dashboard.edit_menu',compact(['menu']));
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
        ]);
        $menu =  Menu::find($id);
        $menu->update($data);
        return redirect()->back()->with('success', 'Successfully update');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menu =  Menu::find($id);
        
        foreach ($menu->products as $product) {
            if ($product->hasImage()) {
            unlink(storage_path('app/public/' . $product->image->path));
            }
        }

        $menu->products()->delete();
        $menu->delete();
        return redirect()->back()->with('deleted', 'Successfully deleted');;
        
    }
}
