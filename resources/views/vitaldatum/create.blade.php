@extends('layouts.app')

@section('content')
<h1>バイタルデータを記録する</h1>
    
{{--  バリデーションエラーの表示  --}}
@if(count($errors)>0)
    <div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('vitaldatum.store', [], false)}}" method="post">
    {{ csrf_field() }}
    <table>
        <tr>
            <th>日付：</th>
            <td><input type="date" name="date" value="{{$today}}"/></td>
        </tr>
        <tr>
            <th>体温：</th>
            <td><input type="number"  step="0.1" name="bodytemperature" value="{{old('bodytemperature')}}"/></td>
        </tr>
        <tr>
            <th>脈拍：</th>
            <td><input type="number" name="pulse" value="{{old('pulse')}}"/></td>
        </tr>
        <tr>
            <th>収縮期血圧：</th>
            <td><input type="number" name="systolicbp" value="{{old('systolicbp')}}"/></td>
        </tr>
        <tr>
            <th>拡張期血圧：</th>
            <td><input type="number" name="diastlicbp" value="{{old('diastlicbp')}}"/></td>
        </tr>
        <tr>
            <th>排泄量：</th>
            <td>
                <select name="excretion">
                    @foreach($excretions as $index => $name)
                        <option value="{{$index}}">{{$name}}</option>
                    @endforeach
                        <option selected></option>
                </select>
            </td>
        </tr>
        <tr>
            <th>便の性状：</th>
            <td>
                <select name="stoolform">
                    @foreach($stoolforms as $index => $name)
                        <option value="{{$index}}">{{$name}}</option>
                    @endforeach
                        <option selected></option>  
                </select>               
            </td>
        </tr>
        <tr>
            <th>フリーコメント：</th>
            {{--※削除予定： <td><input type="text" name="freecomments" value="{{old('freecomments')}}"/></td> --}}
            <td><textarea class="form-control" name="freecomments" rows="10" cols="30"></textarea></td>
        </tr>
        <tr>
            <th></th>
            <td><input type="submit" value="送信"/></td>
        </tr>
    </table>
</form>
<div class="col-md-8 offset-md-4">                                                      
    <a href="{{url('/')}}" class="btn btn-secondary">Home</a>
</div>
@endsection