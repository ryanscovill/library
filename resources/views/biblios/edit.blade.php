@extends('app')

@section('nav')
    @include('nav/biblios')
@endsection

@section('content')
    <h3>Edit: {{$biblio->title}}</h3>
    <div class="col-md-8">

        {!! Form::model($biblio, ['method'=>'PATCH','action' => ['BiblioController@update',$biblio->id], 'class' => 'form-horizontal']) !!}
            @include('biblios._form',['submitText'=>'Update'])
        {!! Form::close() !!}
    </div>
    <div class="col-md-4" id="biblioThumbnail">
        <img src="{{$biblio->thumbnail}}">
    </div>
@endsection