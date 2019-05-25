@extends('layouts.app')


@section('content')

<div class="col-md-8 offset-md-4">                                                      
    <a href="{{route('vitaldatum.create')}}" class="btn btn-primary btn-lg btn-success float-right">記録する</a>
</div>

<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#search">検索</button>

<div id="search" class="collapse">
    {{--  バリデーションエラー表示  --}}
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
    {{ csrf_field() }}
        <table>
            <tr>
                <th>日付：</th>
                <td><input type="date" name="datefrom" value="{{$input['datefrom']}}"/></td>
                <td>～<input type="date" name="dateto" value="{{$input['dateto']}}"/></td>
            </tr>
            <tr>
                <th>体温：</th>
                <td><input type="number"  step="0.1" name="bodytemperaturefrom" value="{{$input['bodytemperaturefrom']}}"/></td>
                <td>～<input type="number"  step="0.1" name="bodytemperatureto" value="{{$input['bodytemperatureto']}}"/></td>
            </tr>
            <tr>
                <th>脈拍：</th>
                <td><input type="number" name="pulsefrom" value="{{$input['pulsefrom']}}"/></td>
                <td>～<input type="number" name="pulseto" value="{{$input['pulseto']}}"/></td>
            </tr>
            <tr>
                <th>収縮期血圧：</th>
                <td><input type="number" name="systolicbpfrom" value="{{$input['systolicbpfrom']}}"/></td>
                <td>～<input type="number" name="systolicbpto" value="{{$input['systolicbpto']}}"/></td>
            </tr>
            <tr>
                <th>拡張期血圧：</th>
                <td><input type="number" name="diastlicbpfrom" value="{{$input['diastlicbpfrom']}}"/></td>
                <td>～<input type="number" name="diastlicbpto" value="{{$input['diastlicbpto']}}"/></td>
            </tr>
            <tr>
                <th>排泄量：</th>
                <td>
                    @foreach($excretions as $index => $name)
                        <label class="checkbox-inline">
                            <input type="checkbox" name="excretion[]" value="{{$index}}">{{$name}}
                        </label>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>便の性状</th>
                <td>
                    @foreach($stoolforms as $index => $name)
                        <label class="checkbox-inline">
                            <input type="checkbox" name="stoolform[]" value="{{$index}}">{{$name}}
                        </label>
                    @endforeach             
                </td>
            </tr>
            <tr>
                <th></th>
                <td><input type="submit" value="検索する"/></td>
            </tr>
        </table>
    </form>
</div>

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
        <th></th>
        <th></th>
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
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deletemodal{{$item->id}}">
                {{'削除'}}
            </button>
                {{--   モーダルウィンドウ  --}}
            <div class="modal" id="deletemodal{{$item->id}}" tabindex="-1" role="dialog">
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
        </td>
    </tr>
    @endforeach
</table>
          

<div class="pagination justify-content-center">
    {{$items->links('vendor.pagination.bootstrap-4')}}
</div>

@endsection


