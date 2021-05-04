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
        if(isset($request->jostMe)){
            $allErrors = MyErrors::all()->where('lang_id' , '=' ,$request->lang_id)
                                        ->where('user_id' , '=' , Auth::id());
        }elseif (!isset($request->jostMe)){
            $allErrors = MyErrors::all()->where('lang_id' , '=' ,$request->lang_id);
        }

        $myErrors = $this->replaceError($request ,$allErrors );

        $langCoding = LangCoding::all();
        return view('home' , compact('myErrors' , 'langCoding'));
    }

    protected function replaceError($request , $errorMessage){
        $myError = [];
        $req = str_replace(' ' , '' ,$request->error_message);

        foreach ($errorMessage as $error){

            $er = str_replace(' ','' , $error->error_message);

            if($req == $er){

                array_push($myError , $error);
            }
        }

        return $myError;
    }

}
