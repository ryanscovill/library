@extends('app')

@section('nav')
    @include('nav/biblios')
@endsection

@section('content')
    <div class="col-sm-6">
        <h1>Create Copy</h1>
        {!! Form::model($copy = new \App\Copy, ['route' => ['biblios.copies.store',$biblio->id], 'class' => 'form-horizontal']) !!}
        @include('copies._form', ['submitText' => 'Create Copy'])
        {!! Form::close() !!}
    </div>


@endsection
