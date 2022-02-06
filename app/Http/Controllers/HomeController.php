<?php

namespace App\Http\Controllers;

use App\Models\LangCoding;
use App\Models\MyErrors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

        public function __construct(){
            $this->middleware('auth');
        }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $langCoding = LangCoding::all();
        return view('home' , compact('langCoding'));
    }
    public function search(Request $request){

        $request->validate([
            'error_message' => 'required'
        ]);


        isset($request->jostMe) ?  $allErrors = MyErrors::where('lang_id' ,$request->lang_id)
            ->where('user_id' , Auth::id())->get() : $allErrors = MyErrors::where('error_message' , "LIKE" , "%" . $request->error_message ."%")->get();

        $langCoding = LangCoding::all();
        return view('home' , compact('allErrors' , 'langCoding'));
    }



}
