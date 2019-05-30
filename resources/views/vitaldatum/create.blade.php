@extends('layouts.app')


@section('content')

<div class="container">
    <h1>バイタルデータを記録する</h1>
    <form action="{{route('vitaldatum.store', [], false)}}" method="post">
        {{ csrf_field() }}
        @include('vitaldatum._input')
    </form>
    <div class="col-md-8 offset-md-4">                                                      
        <a href="{{url('/')}}" class="btn btn-secondary">Home</a>
    </div>
</div>

@endsection