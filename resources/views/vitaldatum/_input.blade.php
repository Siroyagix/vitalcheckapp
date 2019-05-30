<div class="form-group row">
    <label for="dt" class="col-sm-2 col-form-label">日付</label>
    <div class="col-sm-10">
        <input type="date" id="dt" name="date" value="{{old('date', $vitaldatum->date)}}" class="form-control {{$errors->has('date')? 'is-invalid':''}}"/>
    </div>
    <div class="invalid-feedback">
        {{collect($errors->get('date'))->first()}}
    </div>
</div>
<div class="form-group row">        
    <label for="bd" class="col-sm-2 col-form-label">体温</label>
    <div class="col-sm-10">
        <input type="number" id="bd" step="0.1" name="bodytemperature" value="{{old('bodytemperature', $vitaldatum->bodytemperature)}}" class="form-control {{$errors->has('bodytemperature')? 'is-invalid': ''}}"/>
        <div class="invalid-feedback">
            {{collect($errors->get('bodytemperature'))->first()}}
        </div>
    </div>
</div>
<div class="form-group row">
    <label for="pl" class="col-sm-2 col-form-label">脈拍</label>
    <div class="col-sm-10">
        <input type="number" id="pl"  name="pulse" value="{{old('pulse', $vitaldatum->pulse)}}" class="form-control {{$errors->has('pulse')? 'is-invalid':''}}"/>
    </div>
    <div class="invalid-feedback">
        {{collect($errors->get('pulse'))->first()}}
    </div>
</div> 
<div class="form-group row">
    <label for="sbp" class="col-sm-2 col-form-label">収縮期血圧</label>
    <div class="col-sm-10">
        <input type="number" id="sbp"  name="systolicbp" value="{{old('systolicbp', $vitaldatum->systolicbp)}}" class="form-control {{$errors->has('systolicbp')?'is-invalid':''}}"/>
    </div>
    <div class="invalid-feedback">
        {{collect($errors->get('systolicbp'))->first()}}
    </div>
</div> 
<div class="form-group row">
    <label for="dbp" class="col-sm-2 col-form-label">拡張期血圧</label>
    <div class="col-sm-10">
        <input type="number" id="dbp"  name="diastlicbp" value="{{old('diastlicbp', $vitaldatum->diastlicbp)}}" class="form-control {{$errors->has('diastlicbp')?'is-invalid':''}}"/>
    </div>
    <div class="invalid-feedback">
        {{collect($errors->get('diastlicbp'))->first()}}
    </div>
</div>
<div class="form-group row">
    <label for="exn" class="col-sm-2 col-form-label">排泄量</label>
    <div class="col-sm-10">
        <select id="exn" name="excretion" class="form-control {{$errors->has('$vitaldatum->excretion')?'is-invalid':''}}">
            <option value="">----</option>
            @foreach($excretions as $index => $name)
                <option value="{{$index}}"{{isset($vitaldatum->excretion) && $index==$vitaldatum->excretion?'selected':""}}>{{$name}}</option>
            @endforeach
        </select>
    </div>
    <div class="invalid-feedback">
        {{collect($errors->get('excretion'))->first()}}
    </div>
</div>
<div class="form-group row">
    <label for="stm" class="col-sm-2 col-form-label">便の性状</label>
    <div class="col-sm-10">
        <select id="stm" name="stoolform" class="form-control {{$errors->has('$vitaldatum->stoolform')?'is-invalid':''}}">
            <option value="">----</option>
            @foreach($stoolforms as $index => $name)
                <option value="{{$index}}"{{isset($vitaldatum->stoolform) && $index==$vitaldatum->excretion?'selected':""}}>{{$name}}</option>
            @endforeach
        </select>
    </div>
    <div class="invalid-feedback">
        {{collect($errors->get('stoolform'))->first()}}
    </div>
</div>
<div class="form-group row">
    <label for="free"  class="col-sm-2 col-form-label">フリーコメント</label>
    <div class="col-sm-10">
        <textarea id="free" class="form-control {{$errors->has('$vitaldatum->freecomments')?'is-invalid':''}}"　name="freecomments"　rows="10" cols="35"> {{$vitaldatum->freecomments}}</textarea>
    </div>
</div>
<div class="invalid-feedback">
    {{collect($errors->get('freecomments'))->first()}}
</div>
<div class="col-auto">
    <button type="submit" class="btn btn-primary mb-2">送信</button>
</div>