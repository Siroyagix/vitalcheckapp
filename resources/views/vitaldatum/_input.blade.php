<div class="form-group row">
    <label for="dt" class="col-sm-2 col-form-label">日付</label>
    <div class="col-sm-10">
        <input type="date" id="dt" name="date" value="{{isset($vitaldatum)? old('date', $vitaldatum->date):$today}}" class="form-control {{$errors->has('date')? 'is-invalid':''}}"/>
        <div class="invalid-feedback">
            {{collect($errors->get('date'))->first()}}
        </div>
    </div>
</div>
<div class="form-group row">        
    <label for="bt" class="col-sm-2 col-form-label">体温</label>
    <div class="col-sm-10">
        <input type="number" step="0.1" placeholder="小数点一位以下まで入力可：例）36.5"　name="bodytemperature" value="{{old('bodytemperature', $vitaldatum->bodytemperature)}}" id="bt" class="form-control {{$errors->has('bodytemperature')? 'is-invalid': ''}}"/>
        <div class="invalid-feedback">
            {{collect($errors->get('bodytemperature'))->first()}}
        </div>    
    </div>
</div>
<div class="form-group row">
    <label for="pl" class="col-sm-2 col-form-label">脈拍</label>
    <div class="col-sm-10">
        <input type="number" id="pl" placeholder="1分間の回数で入力：例）60" name="pulse" value="{{old('pulse', $vitaldatum->pulse)}}" class="form-control {{$errors->has('pulse')? 'is-invalid':''}}"/>
        <div class="invalid-feedback">
            {{collect($errors->get('pulse'))->first()}}
        </div>
    </div>
</div> 
<div class="form-group row">
    <label for="sbp" class="col-sm-2 col-form-label">収縮期血圧</label>
    <div class="col-sm-10">
        <input type="number" id="sbp" placeholder="例）120" name="systolicbp" value="{{old('systolicbp', $vitaldatum->systolicbp)}}" class="form-control {{$errors->has('systolicbp')?'is-invalid':''}}"/>
        <div class="invalid-feedback">
            {{collect($errors->get('systolicbp'))->first()}}
        </div>
    </div>
</div> 
<div class="form-group row">
    <label for="dbp" class="col-sm-2 col-form-label">拡張期血圧</label>
    <div class="col-sm-10">
        <input type="number" id="dbp"  placeholder="例）60" name="diastlicbp" value="{{old('diastlicbp', $vitaldatum->diastlicbp)}}" class="form-control {{$errors->has('diastlicbp')?'is-invalid':''}}"/>
        <div class="invalid-feedback">
            {{collect($errors->get('diastlicbp'))->first()}}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="exn" class="col-sm-2 col-form-label">排泄量</label>
    <div class="col-sm-10">
        <select id="exn" name="excretion" onchange="remove_under(this)" class="form-control {{$errors->has('excretion')?'is-invalid':''}}">
            <option value="">----</option>
            @foreach($excretions as $index => $name)
                <option value="{{$index}}"{{isset($vitaldatum->excretion) && $index==$vitaldatum->excretion?'selected':""}}>{{$name}}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            {{collect($errors->get('excretion'))->first()}}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="stm" class="col-sm-2 col-form-label">便の性状</label>
    <div class="col-sm-10">
        <select id="stm" name="stoolform"  class="form-control {{$errors->has('stoolform')?'is-invalid':''}}">
            <option value="">----</option>
            @foreach($stoolforms as $index => $name)
                <option value="{{$index}}"{{isset($vitaldatum->stoolform) && $index==$vitaldatum->excretion?'selected':""}}>{{$name}}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            {{collect($errors->get('stoolform'))->first()}}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="free"  class="col-sm-2 col-form-label">フリーコメント</label>
    <div class="col-sm-10">
        <textarea id="free" placeholder="30字以内で記録" name="freecomments"　rows="5" cols="5" class="form-control {{$errors->has('freecomments')? 'is-invalid': ''}}"> {{$vitaldatum->freecomments}}</textarea>
        <div class="invalid-feedback">
            {{collect($errors->get('freecomments'))->first()}}
        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    <a href="{{url('/')}}" class="btn btn-secondary btn-lg m-3">戻る</a>
    <button type="submit" class="btn btn-primary btn-lg m-3">送信</button>
</div>
