<div class="form-group form-inline">
    {!! Form::label('isbn', 'ISBN (13):',array('class' =>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('isbn',null,array('class'=>'form-control input-group','id'=>'isbn')) !!}
        <button type="button" class="btn btn-primary" id="lookupBtn">Lookup</button>
    </div>
</div>
<div class="form-group">
    {!! Form::label('title', 'Title:',array('class' =>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('title',null,array('class'=>'form-control','required')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('subTitle', 'Title Remainder:',array('class' =>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('subTitle',null,array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('author', 'Author:',array('class' =>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('author',null,array('class'=>'form-control')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('publisher', 'Publisher:',array('class' =>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('publisher',null,array('class'=>'form-control input-group')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('publishedDate', 'Published Date:',array('class' =>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::text('publishedDate',null,array('class'=>'form-control input-group')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('categoryList', 'Categories:',array('class' =>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::select('categoryList[]',$categories,null,array('class'=>'form-control','multiple','id'=>'categories')) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('description', 'Description:',array('class' =>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::textarea('description',null,array('class'=>'form-control','rows'=>'3')) !!}
    </div>
</div>
{!! Form::hidden('thumbnail',null,array('class'=>'form-control')) !!}
<div class="form-group">
    {!! Form::label('Image', 'Image:',array('class' =>'col-sm-2 control-label')) !!}
    <div class="col-sm-10">
        {!! Form::file('thumbnailFile',null,array('class'=>'form-control','accept'=>'image/*','capture')) !!}
    </div>
</div>



@include('partials/errors')
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {!! Form::submit($submitText, array('class'=>'btn btn-primary')) !!}
    </div>
</div>

@section('scripts')
    @parent
    <script>
        $('#categories').select2({tags:true, escapeMarkup: function (text) { return text }});

        $('#lookupBtn').click(function(){
            $('#isbn').val($('#isbn').val().replace(/\D/g,''));
            var isbn = $('#isbn').val();
            var html = '';
            if(isbn != '') {
                $.get('/api/books', {q:'isbn:'+isbn},
                        function (data, status) {
                            if(data.length == 0){
                                alert('No Matches Found!');
                                return false;
                            }
                            data = $.parseJSON(data);
                            $.each(data[0], function(key,value) {
                                $('#newBiblioForm input[name='+key+'],textarea[name='+key+']').val(value);
                            });
                            $.each(data[0].categories, function(key,value) {
                                if($('#categories option:selected').filter(function () { return $(this).html() == value; }).length == 0) {
                                    $('#categories').append('<option selected value="' + value + '">' + value + '</option>');
                                }
                            });
                            $('#categories').select2({tags:true, escapeMarkup: function (text) { return text }});

                            $('#biblioThumbnail').hide();
                            $('#biblioThumbnail').html('<img src="'+data[0].thumbnail+'">').fadeIn(300);
                        });
            }
        });
    </script>
@endsection