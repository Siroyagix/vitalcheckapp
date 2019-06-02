@extends('layouts.app')


@section('title','記録を編集する')

@section('content')
    <form action="{{route('vitaldatum.update',[$vitaldatum])}}" method="post">
        @method('PUT')
        @csrf
        
       @include('vitaldatum._input',[$vitaldatum])
    </form>
    <div class="col-md-8 offset-md-4">                                                      
            <a href="{{url('/')}}" class="btn btn-secondary">Home</a>
    </div>
@endsection