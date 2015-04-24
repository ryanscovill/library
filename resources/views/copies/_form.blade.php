<div class="form-group">
    {!! Form::label('barcode', 'Barcode:',array('class' =>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('barcode',null,array('class'=>'form-control','required')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('library', 'Library:',array('class' =>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('library_id',$libraries,null,array('class'=>'form-control','required')) !!}
    </div>
</div>
<div class="form-group">
@include('partials.errors')
</div>
<div class="form-group">
<div class="col-sm-offset-2 col-sm-10">
    {!! Form::submit($submitText, array('class'=>'btn btn-primary')) !!}
</div>
</div>
