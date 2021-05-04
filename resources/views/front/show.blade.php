@extends('layouts.app')
@section('title' , __('Show Error'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-4">
                <div class="card ">
                       <div class="card-header border-success text-primary"> <h2>{{__('Error details')}}</h2></div>
                    <div class="card-body">
                        <h5 class="text-black-50">{{__('Error Message:')}}</h5>
                        <p>{!! nl2br(e($myerror->error_message)) !!}</p>
                        <hr>
                        <h5 class="text-black-50">{{__('Error Fix:')}}</h5>
                        <p>{!! nl2br(e($myerror->error_fix)) !!}</p>
                        <hr>
                        <h5 class="text-black-50">{{__('Programming Language:')}}</h5>
                        <p>{{$myerror->langCoding->lang_name}}</p>
                        <hr>
                        <h5 class="text-black-50">{{__('Created at:')}}</h5>
                        <p>{{$myerror->created_at}}</p>
                        <hr>
                        <h5 class="text-black-50">{{__('Updated at:')}}</h5>
                        <p>{{$myerror->updated_at}}</p>

                    </div>
                    <div class="card-footer border-success">
                        <a href="{{route('myerrors.edit' , $myerror)}}" class="btn btn-success">{{__('Edit')}}</a>

                        <form action="{{route('myerrors.destroy' , $myerror->id)}}" method="post" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">{{__('Delete')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
