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
        <form action="/Vitaldatum/create" method="post">
            {{ csrf_field() }}
            <tr><th>日付：</th><td><input type="date" name="日付"
                value="{{old('日付')}}"></td></tr>
            <tr><th>体温：</th><td><input type="number" name="体温"
                value="{{old('体温')}}"></td></tr>
            <tr><th>脈拍：</th><td><input type="number" name="脈拍"
                value="{{old('脈拍')}}"></td></tr>
            <tr><th>収縮期血圧：</th><td><input type="number" name="収縮期血圧"
                value="{{old('収縮期血圧')}}"></td></tr>
            <tr><th>拡張期血圧：</th><td><input type="number" name="拡張期血圧"
                value="{{old('拡張期血圧')}}"></td></tr>
            <tr><th>排泄量：</th><td><input type="text" list="排泄量" name="排泄量">
                <datalist id="排泄量">
                    <option value="少"></option>
                    <option value="中"></option>
                    <option value="多"></option>
                </datalist>
                        </td></tr>
            <tr><th>便の性状</th><td><input type="text" name="便の性状" list="便の性状">
                <datalist id="便の性状">
                    <option value="下痢"></option>
                    <option value="普通"></option>
                    <option value="硬い"></option>
                </datalist>
                        </td></tr>
            <tr><th>フリーコメント：</th><td><input type="text" name="フリーコメント"
                value="{{old('フリーコメント')}}"></td></tr>
            <tr><th></th><td><input type="submit"
                value="send"></td></tr>
        </form>
    </table>
@endsection