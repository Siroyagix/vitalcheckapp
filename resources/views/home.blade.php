@extends('layouts.app')


@section('content')

<div class="container">
    <h1 class="my-box mb-5 ml-2">
        <span class="badge badge-dark">{{$whoesdata}}のバイタルデータ</span>
    </h1>
    <canvas id="vc_chart"></canvas>
    <div class="d-flex justify-content-between">                                                      
        <button type="button" class="btn btn-info btn-lg m-2 mt-5" data-toggle="collapse" data-target="#search">検索窓を開く　▼</button>
        <a href="{{route('vitaldatum.create')}}" class="btn btn-success btn-lg m-2 mt-5">記録する</a>
    </div>
    
    <div id="search" class="collapse {{count(array_filter($input))>0?'show':''}}">
        <form action="{{route('home')}}" method="get">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="dt" class="col-sm-2 col-form-label">日付</label>
                <div class="col-sm-5">
                    <input type="date" id="dt" name="datefrom" value="{{$input['datefrom']}}" class="form-control"/>
                </div>
                <div class="col-sm-5">
                    <input type="date" id="dt" name="dateto" value="{{$input['dateto']}}"  class="form-control"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="bt" class="col-sm-2 col-form-label">体温</label>
                <div class="col-sm-5">
                    <input type="number" step="0.1" name="bodytemperaturefrom" value="{{$input['bodytemperaturefrom']}}" id="bt"　placeholder="（例：小数第一位まで入力可）36.5" class="form-control"/>
                </div>
                <div class="col-sm-5">
                    <input type="number" step="0.1" name="bodytemperatureto" value="{{$input['bodytemperatureto']}}" id="bt" class="form-control"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="pl" class="col-sm-2 col-form-label">脈拍</label>
                <div class="col-sm-5">
                    <input type="number" name="pulsefrom" value="{{$input['pulsefrom']}}" id="pl" placeholder="（例：回/分）60" class="form-control"/>
                </div>
                <div class="col-sm-5">
                    <input type="number" name="pulseto" value="{{$input['pulseto']}}" id="pl" class="form-control"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="sbp" class="col-sm-2 col-form-label">収縮期血圧</label>
                <div class="col-sm-5">
                    <input type="number" name="systolicbpfrom" value="{{$input['systolicbpfrom']}}" id="sbp" placeholder="（例）120" class="form-control"/>
                </div>
                <div class="col-sm-5">
                    <input type="number" name="systolicbpto" value="{{$input['systolicbpto']}}" id="sbp" class="form-control"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="dbp" class="col-sm-2 col-form-label">収縮期血圧</label>
                <div class="col-sm-5">
                    <input type="number" name="diastlicbpfrom" value="{{$input['diastlicbpfrom']}}" id="dbp"　placeholder="（例）60" class="form-control"/>
                </div>
                <div class="col-sm-5">
                    <input type="number" name="diastlicbpto" value="{{$input['diastlicbpto']}}" id="dbp" class="form-control"/>
                </div>
            </div>
            <div class="form-group row">
                <label for="exn" class="col-sm-2 col-form-label">排泄量</label>
                <input type="hidden" name="excretion" value="">
                @foreach($excretions as $index => $name)
                    <div class="col-sm-2">
                        <input type="checkbox" name="excretion[]" value="{{$index}}" id="exn" {{is_array($input['excretion']) && in_array($index,$input['excretion'])? 'checked':''}}>{{$name}}
                    </div>
                @endforeach
            </div>
            <div class="form-group row">
                <label for="stm" class="col-sm-2 col-form-label">便の性状</label>
                <input type="hidden" name="stoolform" value="">
                @foreach($stoolforms as $index => $name)
                    <div class="col-sm-2">
                        <input type="checkbox" name="stoolform[]" value="{{$index}}" id="stm" {{is_array($input['stoolform']) && in_array($index,$input['stoolform'])? 'checked':''}}>{{$name}}
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg mb-2" id="searchbutton">検索する</button>
            </div>             
        </form>
    </div>

    <table class="table">
        <thead class="thead-dark">
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
        </thead>
        @foreach($items as $item)
        <tr>
            <td id="item_date">{{$item->date}}</td>
            <td>{{$item->bodytemperature}}</td>
            <td>{{$item->pulse}}</td>
            <td>{{$item->systolicbp}}</td>
            <td>{{$item->diastlicbp}}</td>
            <td>{{isset($item->excretion)?$excretions[$item->excretion]:""}}</td>
            <td>{{isset($item->stoolform)?$stoolforms[$item->stoolform]:""}}</td>
            <td>{{$item->freecomments}}</td>
            <td>
                <a href="{{route('vitaldatum.edit',[$item])}}" class="btn btn-primary">編集</a>
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
</div>

@endsection


