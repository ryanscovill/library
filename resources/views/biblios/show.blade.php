@extends('app')

@section('nav')
    @include('nav/biblios')
@endsection

@section('content')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title">Biblography Information</h1>
            </div>
            <div class="panel-body">
                <div class="row">
                  <div class="col-lg-2">
                        <img src="{{$biblio->thumbnail}}">
                    </div>
                    <div class="col-lg-10">
                                <h3 style="margin-top:0">{{$biblio->title}}</h3>
                                <table class="table">
                                    <tr>
                                        <td style="width:150px">Title Remainder:</td>
                                        <td>{{$biblio->subtitle}}</td>
                                    </tr>
                                    <tr>
                                        <td>ISBN:</td>
                                        <td>{{$biblio->isbn}}</td>
                                    </tr>
                                    <tr>
                                        <td>Author:</td>
                                        <td>{{$biblio->author}}</td>
                                    </tr>
                                    <tr>
                                        <td>Publisher:</td>
                                        <td>{{$biblio->publisher}}</td>
                                    </tr>
                                    <tr>
                                        <td>Published Date:</td>
                                        <td>{{$biblio->publishedDate}}</td>
                                    </tr>
                                    <tr>
                                        <td>Categories:</td>
                                        <td>{{$biblio->categoryString}}</td>
                                    </tr>
                                    <tr>
                                        <td>Description:</td>
                                        <td>{{{$biblio->description}}}</td>
                                    </tr>

                                </table>
                        </div>
                </div>
                </div>
            </div>
    </div>
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h1 class="panel-title">Copies ({{count($biblio->copies)}})</h1>
            </div>
            <div class="panel-body">
                <div class="row">
                    @if($biblio->copies->count())
                    <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered table-condensed" id="copiesTable">
                        <thead>
                        <tr>
                            <th>Barcode</th>
                            <th>Library</th>
                            <th>Status</th>
                            <th>User</th>
                            <th>Due Back</th>
                            <th style="width:150px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($biblio->copies as $copy)
                            <tr>
                                <td> {{$copy->barcode}}</td>
                                <td> {{$copy->library->name}}</td>
                                <td> {{$copy->status->name}}</td>
                                <td> {{$copy->user}}</td>
                                <td> {{$copy->dueBack}}</td>
                                <td>
                                    <span class="form-inline">
                                        <a class="btn btn-primary btn-xs" href="{{route('biblios.copies.edit',[$biblio,$copy])}}"><span class="glyphicon glyphicon-edit"></span></a>
                                        <a class="btn btn-primary btn-xs" href="#"><span class="glyphicon glyphicon-move"></span></a>
                                        <a class="btn btn-danger btn-xs" data-text="{{$copy->barcode}}" data-method="delete" href="{{route('biblios.copies.destroy',[$biblio->id,$copy->id])}}"><span class="glyphicon glyphicon-trash"></span></a>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                        </div>
                    @else
                        <a class="btn btn-success" href="{{route('biblios.copies.create',[$biblio])}}">Add Copy</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(document).ready(function(){
            $('#copiesTable').DataTable({
                "searching":false,
                "paging":false
            });
        });
        $('a.delete-copy').click(function(event){
            event.preventDefault();
            $(this).deleteModel();
        });
    </script>
@stop