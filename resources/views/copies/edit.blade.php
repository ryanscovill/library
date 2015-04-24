@extends('app')

@section('nav')
    @include('nav/biblios')
@endsection

@section('content')

    <div class="col-sm-6">
        <h1>Edit Copy</h1>
        {!! Form::model($copy, ['method' => 'PATCH', 'route' => ['biblios.copies.update', $biblio->id, $copy->id]]) !!}
        @include('copies._form', ['submitText' => 'Edit Copy'])
        {!! Form::close() !!}
    </div>

@endsection
