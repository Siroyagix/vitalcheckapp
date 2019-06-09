@extends('layouts.app')


@section('content')

<div class="container">
    <h1 class="text-center">バイタルデータを記録する</h1>
    <form action="{{route('vitaldatum.store', [], false)}}" method="post">
        {{ csrf_field() }}
        @include('vitaldatum._input')
    </form>
</div>

@endsection