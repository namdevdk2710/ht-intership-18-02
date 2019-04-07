<table class="table" id="js-import-bloodbag-result">
    <tbody>
        <tr>
            <td class="col-sm-4">
                {!! Form::label('hbsag', 'Hbs Ag (ELISA)', ['class' =>
                'col-sm-6']) !!}
                {!! Form::select('hbsag',['1'=>'Dương tính', '0'=>'Âm
                tính'],0,['class'=>'col-sm-6']) !!}
            </td>
            <td class="col-sm-4">
                {!! Form::label('antihiv', 'Anti HIV (ELISA)', ['class' =>
                'col-sm-6']) !!}
                {!! Form::select('antihiv',['1'=>'Dương tính', '0'=>'Âm
                tính'],0,['class'=>'col-sm-6']) !!}
            </td>
            <td class="col-sm-4">
                {!! Form::label('antihcv', 'Anti HCV (ELISA)', ['class' =>
                'col-sm-6']) !!}
                {!! Form::select('antihcv',['1'=>'Dương tính', '0'=>'Âm
                tính'],0,['class'=>'col-sm-6']) !!}
            </td>
        </tr>
        <tr>
            <td class="col-sm-4">
                {!! Form::label('hbvnat', 'HBVNAT', ['class' =>
                'col-sm-6']) !!}
                {!! Form::select('hbvnat',['1'=>'Dương tính', '0'=>'Âm
                tính'],0,['class'=>'col-sm-6']) !!}
            </td>
            <td class="col-sm-4">
                {!! Form::label('hivnat', 'HIVNAT', ['class' =>
                'col-sm-6']) !!}
                {!! Form::select('hivnat',['1'=>'Dương tính', '0'=>'Âm
                tính'],0,['class'=>'col-sm-6']) !!}
            </td>
            <td class="col-sm-4">
                {!! Form::label('hcvnat', 'HCVNAT', ['class' =>
                'col-sm-6']) !!}
                {!! Form::select('hcvnat',['1'=>'Dương tính', '0'=>'Âm
                tính'],0,['class'=>'col-sm-6']) !!}
            </td>
        </tr>
        <tr>
            <td class="col-sm-4">
                {!! Form::label('syphilis', 'Giang mai', ['class' =>
                'col-sm-6']) !!}
                {!! Form::select('syphilis',['1'=>'Dương tính', '0'=>'Âm
                tính'],0,['class'=>'col-sm-6']) !!}
            </td>
            <td class="col-sm-4">
                {!! Form::label('malaria', 'Sốt rét', ['class' =>
                'col-sm-6']) !!}
                {!! Form::select('malaria',['1'=>'Dương tính', '0'=>'Âm
                tính'],0,['class'=>'col-sm-6']) !!}
            </td>
            <td class="col-sm-4">
                {!! Form::label('other', 'Ghi chú', ['class' =>
                'col-sm-6']) !!}
                {!! Form::text('other', null, ['class' => 'col-sm-6']) !!}
            </td>
        </tr>
        <tr>
            <td class="col-sm-4">
                {!! Form::label('unit', 'Lượng máu', ['class' =>
                'col-sm-6']) !!}
                {!! Form::text('unit', null, ['class' => 'col-sm-6']) !!}
            </td>
            <td class="col-sm-4">
                {!! Form::label('blood_group', 'Nhóm máu', ['class' =>
                'col-sm-6']) !!}
                {!! Form::select('blood_group', $bloodGroups->pluck('name', 'id')->toArray(),null,['class'=>'col-sm-6']) !!}
            </td>
            <td class="col-sm-4">
            </td>
        </tr>
    </tbody>
</table>
<div id="js-import-bloodbag-no-result" class=" text-center">
    Mã này đã nhập dữ liệu.
</div>
