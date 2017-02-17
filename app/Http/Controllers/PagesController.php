<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use Session;
use App\User;
use App\Category;
use Illuminate\Http\Request;

class PagesController extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'about', 'contact', 'postcontact']]);
    }

    public function index()
    {
        return view('welcome');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function postcontact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'required|min:3',
            'message' => 'required|min:10'
        ]); 

        $data = array (
            'email' => $request->email,
            'subject' => $request->subject,
            'bodymessage' => $request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from($data['email']);
            $message->to('daisyts@gmx.com');
            $message->subject($data['subject']);
        }); 

        Session::flash('success', 'Your message was sent!');

        return redirect('/');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $user =  Auth::user();
        $category = Category::where('user_id', '=', Auth::user()->id )->get()->load('words');
        return view('pages.dashboard', compact('user', 'category'));
    }

}
