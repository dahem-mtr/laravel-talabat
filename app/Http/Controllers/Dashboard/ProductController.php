<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Menu;
use App\Product;

class ProductController extends Controller
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
            'price' => 'required',
            'image' => '',
        ]);
        $menu =  Menu::find($request->input('menu_id'));

       $product =  $menu->products()->create([
            'name' => $data['name'],
            'price' => $data['price'],
        ]);

        if ($request->hasFile('image')) {

           $path = Storage::disk('public')->put('uploads/products', $data['image']);

            $product->image()->create([
                'path' => $path,
                'type' => $data['image']->getClientMimeType(),
            ]);
        }
        return redirect()->back()->with('success', 'Successfully created');

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
        $product =  Product::find($id);
        return view('dashboard.edit_product',compact(['product']));
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
            'price' => 'required',
            'image' => '',
        ]);
        $product =  Product::find($id);

        $product->update([
            'name' => $data['name'],
            'price' => $data['price'],
        ]);

        if ($request->hasFile('image')) {

            if ($product->hasImage()) {
                // If the product has a image  , delete old image then set new image 
                unlink(storage_path('app/public/' . $product->image->path));
                $path = Storage::disk('public')->put('uploads/products', $data['image']);
                $product->image()->update([
                    'path' => $path,
                    'type' => $data['image']->getClientMimeType(),
                ]);
            } else {

                $path = Storage::disk('public')->put('uploads/products', $data['image']);
                $product->image()->create([
                    'path' => $path,
                    'type' => $data['image']->getClientMimeType(),
                ]);
            }
             
         }
        return redirect()->back()->with('success', 'Successfully update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product =  Product::find($id);

        if ($product->hasImage()) {
            unlink(storage_path('app/public/' . $product->image->path));
            }
            $product->delete();
        return redirect()->back()->with('deleted', 'Successfully deleted');;
    }
}
