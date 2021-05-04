@extends('layouts.app')
@section('title' , __('My Errors'))
@section('content')
    <a href="{{route('home')}}" class="btn btn-primary mb-2">{{__('Back')}}</a>
    <div class="row">

        @forelse($myErrors as $myError)
        <div class="col-lg-12 col-md-4 mb-3">

                <div class="card">
                    <div class="card-header border-success">
                        <span class="text-primary"> {{__('Programming Language')}} : {{$myError->langCoding->lang_name}}</span>
                        <span class="float-right">{{__('Created at')}} : {{$myError->created_at}}</span>
                    </div>

                    <div class="card-body">
                   {{$myError->error_message}}
                        <a href="{{route('myerrors.show' , $myError)}}" class="btn btn-success float-right">Show</a>
                    </div>
                </div>
        </div>
            @empty

               <div class="alert alert-success w-100 text-center">
                   <p> {{__("You don't have error yet")}}</p>
               </div>
            @endforelse


    </div>
@endsection
