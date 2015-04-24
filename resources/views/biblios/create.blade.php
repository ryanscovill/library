@extends('app')
@section('nav')
    @include('nav/biblios')
@endsection

@section('content')

<h1>Create Bibliography Entry</h1>
<div class="col-md-8">
{!! Form::model($biblio = new \App\Biblio, ['action' => 'BiblioController@store', 'class' => 'form-horizontal', 'id' => 'newBiblioForm']) !!}
    @include('biblios._form',['submitText'=>'Create'])
{!! Form::close() !!}
    </div>
<div class="col-md-4" id="biblioThumbnail">
</div>

@endsection