@extends('layouts.app')


@section('content')
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
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal">
                    {{'削除'}}
                </button>
            </td>
        </tr>
        @endforeach
    </table>
           {{--   モーダルウィンドウ  --}}
           <div class="modal" id="deletemodal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">確認画面</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>本当に削除しますか？</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                  <form action="{{route('vitaldatum.destroy',[$item])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        {{'削除'}}
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
<div class="col-md-8 offset-md-4">                                                      
    <a href="{{route('vitaldatum.create')}}" class="btn btn-primary">
      記録する
    </a>
<div class="pagination justify-content-center">
    {{$items->links()}}
</div>

@if(count($errors)>0)
<div>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{route('home')}}" method="get">
    @csrf
    <table>
      <tr>
          <th>日付：</th>
          <td>
              いつから<input type="date" name="datefrom" value="{{$today}}"/>
          </td>
          <td>
              いつまで<input type="date" name="dateto" value="{{$today}}"/>
          </td>
      </tr>
      <tr>
          <th>体温：</th>
          <td>
              <input type="number"  step="0.1" name="bodytemperaturefrom" value="{{old('bodytemperature')}}"/>
          </td>
          <td>
              <input type="number"  step="0.1" name="bodytemperatureto" value="{{old('bodytemperature')}}"/>
          </td>
      </tr>
      <tr>
          <th>脈拍：</th>
          <td>
              <input type="number" name="pulsefrom" value="{{old('pulse')}}"/>
          </td>
          <td>
              <input type="number" name="pulseto" value="{{old('pulse')}}"/>
          </td>
      </tr>
      <tr>
          <th>収縮期血圧：</th>
          <td>
              <input type="number" name="systolicbpfrom" value="{{old('systolicbp')}}"/>
          </td>
          <td>
              <input type="number" name="systolicbpto" value="{{old('systolicbp')}}"/>
          </td>
      </tr>
      <tr>
          <th>拡張期血圧：</th>
          <td>
              <input type="number" name="diastlicbpfrom" value="{{old('diastlicbp')}}"/>
          </td>
          <td>
              <input type="number" name="diastlicbpto" value="{{old('diastlicbp')}}"/>
          </td>
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
          <th>便の性状</th>
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
          <td>
              <input type="text" name="freecomments">
          </td>
      </tr>
      <tr>
          <th></th>
          <td>
              <input type="submit" value="検索する">
          </td>
      </tr>
  </table>
</form>
@endsection


