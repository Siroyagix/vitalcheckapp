@section('fillform')
<table>
    <tr>
        <th>日付：</th>
        <td>
            <input type="date" name="date" value="{{old('$today', $vitaldatum->date)}}"/>
        </td>
    </tr>
    <tr>
        <th>体温：</th>
        <td>
            <input type="number" step="0.1" name="bodytemperature" value="{{old('bodytemperature', $vitaldatum->bodytemperature)}}" class="form-control {{$errors->has('bodytemperature')? 'is-invalid': ''}}"/>
            <div class="invalid-feedback">{{collect($errors->get('bodytemperature'))->first()}}</div>
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
            <select name="excretion">
                <option value="">----</option>
                @foreach($excretions as $index => $name)
                    <option value="{{$index}}"{{isset($vitaldatum->excretion) && $index==$vitaldatum->excretion?'selected':""}}>{{$name}}</option>
                @endforeach
            </select>
        </td>
    </tr>
    <tr>
        <th>便の性状</th>
        <td>
            <select name="stoolform">
                <option value="">----</option>
                @foreach($stoolforms as $index => $name)
                   <option value="{{$index}}"{{isset($vitaldatum->stoolform)&& $index==$vitaldatum->stoolform?'selected':""}}>{{$name}}</option>
                @endforeach
            </select>               
        </td>
    </tr>
    <tr>
        <th>フリーコメント：</th>
        <td>
            <textarea class="form-control" name="freecomments"　rows="10" cols="35">
                {{$vitaldatum->freecomments}}
            </textarea>
        </td>
    </tr>
    <tr>
        <th></th>
        <td>
            <input type="submit" value="送信"/>
        </td>
    </tr>
</table>
@show