@extends('layouts.app')
@section('title' , __('Home Page'))
@section('content')
<div class="container">
    <div>
       <a href="{{route('myerrors.create')}}" class="btn btn-primary mb-3">Create New Error</a>
        <a href="{{route('myerrors.index')}}" class="btn btn-secondary mb-3">Show all my Errors</a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5 ">
            <div class="card">
                <div class="card-header"><h4 style="display: inline-block">{{ __('Custom search') }}</h4> : <span class="text-black-50">{{__('With this form, you can search for an error that you recorded or a programmer recorded')}}</span></div>

                <div class="card-body">
                    <form action="{{route('search')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="error_message">{{__('Error Message')}}</label>
                            <textarea class="form-control" name="error_message" cols="3" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="lang_id"> {{__('Programming Language')}}</label>
                            <select class="form-control" name="lang_id" >
                                @foreach($langCoding as $lang)
                                    <option value="{{$lang->id}}"> {{$lang->lang_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <input class="mr-1" type="checkbox" name="jostMe">

                            <label for="jostMe"> {{__('Just look in the list of my Errors')}}</label>

                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">{{__('Search')}}</button>

                        </div>

                    </form>
                </div>
            </div>
        </div>
        <hr>
        <div class="col-md-12">
            @if(isset($myErrors))
                @forelse($myErrors as $myError)
                    <div class="card mb-3">
                        <div class="card-header">{{$myError->user->name}}</div>
                        <div class="card-body">
                            <p>{{$myError->error_message}}</p>
                            <p>{{$myError->error_fix}}</p>
                        </div>
                    </div>
                @empty
                    <div class="alert alert-success w-100 text-center">
                        <p> {{__("There are no results")}}</p>
                    </div>
                @endforelse
            @endif


        </div>

    </div>
</div>
@endsection
