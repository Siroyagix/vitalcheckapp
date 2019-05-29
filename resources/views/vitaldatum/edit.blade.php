@extends('layouts.app')


@section('title','記録を編集する')
@section('content')
    <form action="{{route('vitaldatum.update',[$vitaldatum])}}" method="post">
        @method('PUT')
        @csrf
        <div class="form-group row">
            <label for="divのIDと合わせる" class="col-sm-2 col-form-label">
                First Name
            </label>
            <div class="col-sm-10">
                <input type="text" id="labelのforと合わせる" class="form-control">
            </div>        
        </div>
       @include('vitaldatum._input',[$vitaldatum])
    </form>
@endsection