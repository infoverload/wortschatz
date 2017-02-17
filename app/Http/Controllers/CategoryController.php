<?php

namespace App\Http\Controllers;

//use DB;
Use Auth;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
             'title' => 'required|min:1'
        ]);   

        $category = new Category;
        $category->user_id = Auth::user()->id;
        $category->title = $request->title;
        $category->colour = "White";
        $category->save();
        return back();
    }

    public function edit(Category $category) 
    {
        return view('category.edit', compact('category'));
    }

    public function update(Request $request, Category $category) 
    {
        //dd($request->all());
        $category->update($request->all());
        return redirect('dashboard');
        //return back();
    }

    public function delete(Category $category) 
    {
        Category::where('user_id', '=', Auth::user()->id )->where('id', '=', $category->id )->delete();
        return back();
    }

}
