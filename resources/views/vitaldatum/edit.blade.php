@extends('layouts.app')


@section('title','記録を編集する')

@section('content')
<div class="container">
    <h1 class="text-center">記録を編集する</h1>
    <form action="{{route('vitaldatum.update',[$vitaldatum])}}" method="post">
        @method('PUT')
        @csrf
        
       @include('vitaldatum._input',[$vitaldatum])
    </form>
    <div class="d-flex justify-content-center">                                                      
        <a href="{{url('/')}}" class="btn btn-secondary btn-lg">Home</a>
    </div>
</div>
@endsection