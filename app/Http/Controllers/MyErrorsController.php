<?php

namespace App\Http\Controllers;

use App\Models\LangCoding;
use App\Models\MyErrors;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyErrorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $myErrors = MyErrors::all()->where('user_id' , '=', Auth::id());
        return view('front.index' , compact('myErrors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $langCoding = LangCoding::all();
        return view('front.create' , compact('langCoding') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'error_message' => 'required'
        ]);
        $user->myErrors()->create($request->all());
        return redirect()->to('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyErrors  $myerror
     * @return \Illuminate\Http\Response
     */
    public function show(MyErrors $myerror)
    {
        return view('front.show' , compact('myerror'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MyErrors  $myerror
     * @return \Illuminate\Http\Response
     */
    public function edit(MyErrors $myerror)
    {
        $langCoding = LangCoding::all();
        return view('front.edit' , compact('myerror' , 'langCoding'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyErrors  $myerror
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyErrors $myerror)
    {
        $request->validate([
            'error_message' => 'required'
        ]);
        $myerror->update($request->all());
        return redirect()->to('myerrors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyErrors  $myerror
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyErrors $myerror)
    {
        $myerror->delete();
        return redirect()->to('myerrors');
    }
}
