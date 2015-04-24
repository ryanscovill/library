@extends('app')

@section('scripts')
@stop

@section('content')

    @foreach($books as $book)
        <div>
            <div class="row">
            <div class="col-xs-2">
            <img src="{{$book['smallThumbnail']}}">
            </div>
                <div class="col-xs-8">
                    {{$book['title']}}
                     {{$book['subTitle']}}
                    {{$book['author']}}
                    </div>
                </div>

        </div>
    @endforeach

@stop