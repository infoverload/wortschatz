<?php

namespace App\Http\Controllers;

Use Auth;
use App\User;
use App\Category;
use App\Word;
use Illuminate\Http\Request;

class WordsController extends Controller
{
    public function store(Request $request, Category $category)
    {

        $this->validate($request, [
             'gender' => 'required',
             'body' => 'required|min:1',
             'translation' => 'required|min:1'
        ]);   

        $word = new Word($request->all());
        $word->user_id = Auth::user()->id;

    	$category->addWord($word);
    	return back();
    }

    public function edit(Word $word) 
    {
        return view('words.edit', compact('word'));
    }

    public function update(Request $request, Word $word) 
    {
        //dd($request->all());
        $word->update($request->all());
        return redirect('dashboard');
    }

    public function delete(Word $word) 
    {
        Word::where('user_id', '=', Auth::user()->id )->where('id', '=', $word->id )->delete();
        return back();
    }

    public function train() 
    {
        $words = Word::where('user_id', '=', Auth::user()->id )->get();
        return view('words.train', compact('words'));
        //dd( json_encode( $words->toArray()) );
    }

}
