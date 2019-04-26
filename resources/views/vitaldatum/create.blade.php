@extends('layouts.app')

@section('title','バイタルデータを記録する')
@section('content')
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
                <td>
                    <input type="number"  step="0.1" name="bodytemperature" value="{{old('bodytemperature')}}"/>
                </td>
            </tr>
            <tr>
                <th>脈拍：</th>
                <td>
                    <input type="number" name="pulse" value="{{old('pulse')}}"/>
                </td>
            </tr>
            <tr>
                <th>収縮期血圧：</th>
                <td>
                    <input type="number" name="systolicbp" value="{{old('systolicbp')}}"/>
                </td>
            </tr>
            <tr>
                <th>拡張期血圧：</th>
                <td>
                    <input type="number" name="diastlicbp" value="{{old('diastlicbp')}}"/>
                </td>
            </tr>
            <tr>
                <th>排泄量：</th>
                <td>
                    <select name="excretion">
                        @foreach($excretions as $index => $name)
                            <option value="{{$index}}">{{$name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>便の性状</th>
                <td>
                    <select name="stoolform">
                        @foreach($stoolforms as $index => $name)
                           <option value="{{$index}}">{{$name}}</option>
                        @endforeach
                    </select>               
                </td>
            </tr>
            <tr>
                <th>フリーコメント：</th>
                <td>
                    <input type="text" name="freecomments" value="{{old('freecomments')}}"/>
                </td>
            </tr>
            <tr>
                <th></th>
                <td>
                    <input type="submit" value="送信"/>
                </td>
            </tr>
        </table>
    </form>
@endsection