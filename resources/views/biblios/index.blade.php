@extends('app')
@section('nav')
    @include('nav/biblios')
@endsection

@section('content')
    <h3>Search</h3>
    <div class="col-md-6">
    <div class="form-inline">
    <div class="form-group">
        {!! Form::open(array('action' => 'BiblioController@results','method'=> 'GET')) !!}
        {!! Form::label('term', 'Title:', array('class' =>' control-label')) !!}
            {!! Form::text('title',null,array('class'=>'form-control','id'=>'searchInput')) !!}
            {!! Form::submit('Go',array('class'=>'btn btn-primary')) !!}
    </div>
        <div class="form-group">
            <a id="advanced" class="">Advanced</a>
        </div>
    </div>
        <div>
            <div id="advancedSearch">
            <div class="form-inline">
            <div class="form-group">
            {!! Form::label('isbn', 'ISBN:', array('class' =>' control-label')) !!} {!! Form::text('isbn',null,array('class'=>'form-control')) !!}
                </div>
            <div class="form-group">
            {!! Form::label('author', 'Author:', array('class' =>' control-label')) !!} {!! Form::text('author',null,array('class'=>'form-control')) !!}
                </div>
            </div>
                <div class="form-group">
                    {!! Form::label('categoryList', 'Categories:',array('class' =>'control-label')) !!}
                    {!! Form::select('categoryList[]',$categories,null,array('class'=>'form-control','multiple','id'=>'categories','style="width:300px"')) !!}
                </div>
        </div>
            </div>
        {!! Form::close() !!}
        </div>
@stop
@section('scripts')
    @parent
    <script>
        $('#advanced').click(function(){
           $('#advancedSearch').toggle();
        });
        $(function () {
            $("#selectType").change();
            $('#advancedSearch').hide();
            $('#categories').select2({escapeMarkup: function (text) { return text }});
            $("#searchInput").autocomplete({
                source: "/ac/biblio?type=title",
                minLength: 2,
                delay: 50
            });
        })
    </script>
@stop