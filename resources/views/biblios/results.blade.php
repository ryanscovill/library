@extends('app')
@section('nav')
    @include('nav/biblios')
@endsection

@section('content')
    <h3>Search Results</h3>
    <div class="row">
    @foreach($biblios as $biblio)
        <h3><a href="{{route('biblios.show',$biblio)}}">{{$biblio->title}}</a></h3>
        <img src="{{$biblio->thumbnail}}">
        {{$biblio->author}}
            In: {{$biblio->copies()->in()->count()}}
            Out: {{$biblio->copies()->out()->count()}}
            Hold: {{$biblio->copies()->hold()->count()}}
    @endforeach
    </div>

    <div class="row">
        {!! $biblios->appends(Input::query())->render() !!}
    </div>
@stop
@section('scripts')
    @parent

@stop