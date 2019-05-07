@extends('layouts.app')

@section('title','記録を編集する')
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
    <form action="{{route('vitaldatum.update',[$vitaldatum])}}" method="post">
        @method('PUT')
        @csrf
        <table>
            <tr>
                <th>日付：</th>
                <td><input type="date" name="date" value="{{$vitaldatum->date}}"/></td>
            </tr>
            <tr>
                <th>体温：</th>
                <td>
                    <input type="number"  step="0.1" name="bodytemperature" value="{{$vitaldatum->bodytemperature}}"/>
                </td>
            </tr>
            <tr>
                <th>脈拍：</th>
                <td>
                    <input type="number" name="pulse" value="{{$vitaldatum->pulse}}"/>
                </td>
            </tr>
            <tr>
                <th>収縮期血圧：</th>
                <td>
                    <input type="number" name="systolicbp" value="{{$vitaldatum->systolicbp}}"/>
                </td>
            </tr>
            <tr>
                <th>拡張期血圧：</th>
                <td>
                    <input type="number" name="diastlicbp" value="{{$vitaldatum->diastlicbp}}"/>
                </td>
            </tr>
            <tr>
                <th>排泄量：</th>
                <td>
                    <select name="excretion" value="{{$excretions[$vitaldatum->excretion]}}">
                        @foreach($excretions as $index => $name)
                            <option value="{{$index}}">{{$name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>便の性状</th>
                <td>
                    <select name="stoolform" value="{{$stoolforms[$vitaldatum->stoolform]}}">
                        @foreach($stoolforms as $index => $name)
                           <option value="{{$index}}">{{$name}}</option>
                        @endforeach
                    </select>               
                </td>
            </tr>
            <tr>
                <th>フリーコメント：</th>
                <td>
                    <input type="text" name="freecomments" value="{{$vitaldatum->freecomments}}"/>
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