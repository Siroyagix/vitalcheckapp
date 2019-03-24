@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vital Check</div>
                    <div class="form-group row mb-0" style="height: 200px;">
                        <div class="col-md-8 offset-md-4">                                                      
                            <a href="{{url('fillrecord')}}" button type="submit" class="btn btn-primary" style="position:relative;" >記録する</button>
                            <a href="{{url('showrecord')}}" button type="submit" class="btn btn-primary" style="position:relative;" >記録をみる</button>                             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
