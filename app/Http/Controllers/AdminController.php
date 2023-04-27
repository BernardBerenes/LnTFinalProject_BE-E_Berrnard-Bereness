<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $item = Item::all();
        return view('admin.index', [compact('item')]);
    }

    public function create(){
        return view('admin.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'category' => 'required|string',
            'product_name' => 'required|string|min:5|max:80',
            'price' => 'required|integer',
            'amount' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $request->category.'_'.$request->product_name.'.'.$extension;
        $request->file('image')->storeAs('/public/image/', $fileName);

        Item::create([
            'category' => $request->category,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'amount' => $request->amount,
            'image' => $fileName
        ]);
        return redirect('/item');
    }

    public function edit($id){
        $item = Item::find($id);
        return view('admin.edit', compact(['item']));
    }

    public function update(Request $request, $id){
        $item = Item::find($id);

        $this->validate($request, [
            'category' => 'required|string',
            'product_name' => 'required|string|min:5|max:80',
            'price' => 'required|integer',
            'amount' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096'
        ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = $request->category.'_'.$request->product_name.'.'.$extension;
        $request->file('image')->storeAs('/public/image', $fileName);

        $item -> update([
            'category' => $request->category,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'amount' => $request->amount,
            'image' => $fileName
        ]);
        return redirect('/item');
    }

    public function destroy($id){
        $item = Item::find($id);
        $item->delete();
        return redirect('item');
    }
}
