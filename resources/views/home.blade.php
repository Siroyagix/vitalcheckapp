@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vital Check</div>
                    <div class="form-group row mb-0" style="height: 200px;">
                        <div class="col-md-8 offset-md-4">                                                      
                            <a href="{{route('fillrecord')}}" class="btn btn-primary">
                                記録する
                            </a>
                            <a href="{{url('showrecord')}}" class="btn btn-primary" >
                                記録をみる
                            </a>                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
