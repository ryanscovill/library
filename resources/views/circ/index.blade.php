@extends('app')

@section('content')
<h2>Search Patron</h2>
    <div class="form-inline">
        <div class="form-group">
            {!! Form::open(array('method'=> 'GET')) !!}
            {!! Form::label('term', 'Name:', array('class' =>' control-label')) !!}
            {!! Form::text('name',null,array('class'=>'form-control','id'=>'searchInput')) !!}
            {!! Form::submit('Go',array('class'=>'btn btn-primary')) !!}
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        $(function () {
            $("#searchInput").autocomplete({
                source: "/ac/user",
                minLength: 3,
                delay: 50
            });
        })
    </script>
@endsection