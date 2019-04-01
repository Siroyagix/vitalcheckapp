@extends('layouts.app')

@section('content')
<div class="container">
    <table class="tabale">
        <tr><th>日付</th<th>体温</th><th>脈拍</th><th>収縮期血圧</th><th>拡張期血圧</th><th>排泄量</th><th>便の性状</th><th>フリーコメント</th></tr>
        @foreach($items as $item)
        <tr>
            <td>{{$item->日付}}</td>
            <td>{{$item->体温}}</td>
            <td>{{$item->脈拍}}</td>
            <td>{{$item->収縮期血圧}}</td>
            <td>{{$item->拡張期血圧}}</td>
            <td>{{$item->排泄量}}</td>
            <td>{{$item->便の性状}}</td>
            <td>{{$item->フリーコメント}}</td>
        </tr>
        @endforeach
    </table>
</div>
<div class="col-md-8 offset-md-4">                                                      
    <a href="{{route('fillrecord')}}" class="btn btn-primary">
        記録する
    </a>
</div>
@endsection
