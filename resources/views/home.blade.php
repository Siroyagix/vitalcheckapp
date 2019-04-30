@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table">
        <tr>
            <th>日付</th>
            <th>体温</th>
            <th>脈拍</th>
            <th>収縮期血圧</th>
            <th>拡張期血圧</th>
            <th>排泄量</th>
            <th>便の性状</th>
            <th>フリーコメント</th>
        </tr>
        @foreach($items as $item)
        <tr>
            <td>{{$item->date}}</td>
            <td>{{$item->bodytemperature}}</td>
            <td>{{$item->pulse}}</td>
            <td>{{$item->systolicbp}}</td>
            <td>{{$item->diastlicbp}}</td>
            <td>{{$excretions[$item->excretion]}}</td>
            <td>{{$stoolforms[$item->stoolform]}}</td>
            <td>{{$item->freecomments}}</td>
            <td>
                <div class="col-md-8 offset-md-4">                                                      
                    <a href="{{route('vitaldatum.edit',[$item])}}" class="btn btn-primary">編集</a>
                </div>
            </td>
            <td>
                <div class="col-md-8 offset-md-4">                                                      
                    <form action="{{route('vitaldatum.destroy',[$item])}}" method="post">
                        <input type="submit" value="削除" class="btn btn-danger"/>
                        @method('DELETE')
                        @csrf
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
<div class="col-md-8 offset-md-4">                                                      
    <a href="{{route('vitaldatum.create')}}" class="btn btn-primary">
        記録する
    </a>
</div>
@endsection
