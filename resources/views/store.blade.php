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
    <table>
        <form action="/store/add" method="post">
            {{ csrf_field() }}
            <tr>
                <th>日付：</th>
                <td><input type="date" name="date" value="{{old('date')}}"></td>
            </tr>
            <tr>
                <th>体温：</th>
                <td><input type="number" name="bodytemperature" value="{{old('bodytemperature')}}"></td>
            </tr>
            <tr>
                <th>脈拍：</th>
                <td><input type="number" name="pulse" value="{{old('pulse')}}"></td>
            </tr>
            <tr>
                <th>収縮期血圧：</th>
                <td><input type="number" name="systolicbp" value="{{old('systolicbp')}}"></td>
            </tr>
            <tr>
                <th>拡張期血圧：</th>
                <td><input type="number" name="diastlicbp" value="{{old('diastlicbp')}}"></td>
            </tr>
            <tr>
                <th>排泄量：</th>
                <td>
                    <input type="text" list="excretion" name="excretion">
                        <datalist id="excretion">
                            <option value="少"></option>
                            <option value="中"></option>
                            <option value="多"></option>
                        </datalist>
                </td>
            </tr>
            <tr>
                <th>便の性状</th>
                <td>
                    <input type="text" name="stoolform" list="stoolform">
                        <datalist id="stoolform">
                            <option value="下痢"></option>
                            <option value="普通"></option>
                            <option value="硬い"></option>
                        </datalist>
                </td>
            </tr>
            <tr>
                <th>フリーコメント：</th>
                <td><input type="text" name="freecomments" value="{{old('freecomments')}}"></td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="send"></td>
            </tr>
        </form>
    </table>
@endsection