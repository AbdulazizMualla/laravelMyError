@extends('layouts.app')
@section('title' , __('Show Error'))
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-4">
                <div class="card ">
                    <div class="card-body">
                        <form action="{{route('myerrors.update' , $myerror)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="error_message"> {{__('Error Message')}}</label>
                                <textarea class="form-control" name="error_message" cols="3" rows="6">{{$myerror->error_message}}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="error_fix"> {{__('Error Fix')}}</label>
                                <textarea class="form-control" name="error_fix" cols="3" rows="6">{{$myerror->error_fix}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="lang_id"> {{__('Programming Language')}}</label>
                                <select class="form-control" name="lang_id">
                                    @foreach($langCoding as $lang)
                                        <option value="{{$lang->id}}"
                                                @if($myerror->lang_id == $lang->id) selected="selected" @endif>
                                            {{$lang->lang_name}}
                                        </option>

                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">{{ __('Update')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

@endsection
