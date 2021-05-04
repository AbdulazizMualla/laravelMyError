@extends('layouts.app')
@section('title' , __('New Error'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-4">
                <div class="card ">
                    <div class="card-body">
                        <form action="{{route('myerrors.store')}}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="error_message"> {{__('Error Message')}}</label>
                                <textarea class="form-control" name="error_message" cols="3" rows="6"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="error_fix"> {{__('Error Fix')}}</label>
                                <textarea class="form-control" name="error_fix" cols="3" rows="6"></textarea>
                            </div>
                            <div class="form-group">
                               <label for="lang_id"> {{__('Programming Language')}}</label>
                                <select class="form-control" name="lang_id">
                                    @foreach($langCoding as $lang)
                                        <option value="{{$lang->id}}"> {{$lang->lang_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">{{ __('Save')}}</button>
                                <a href="{{route('home')}}" class="btn btn-primary ">{{__('Back')}}</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
