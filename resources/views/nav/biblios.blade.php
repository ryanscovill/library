<li><a href="{{route('biblios.index')}}"><span class="glyphicon glyphicon-search"></span>Search</a></li>

@if(isset($biblio))
<li class="panel panel-default" id="dropdown">

        <a href="{{route('biblios.show',$biblio)}}"><span class="glyphicon glyphicon-book"></span> Bibliography <span class="caret"></span></a>
    <!-- Dropdown level 1 -->
    <div id="dropdown-lvl1" class="panel-collapse">
        <div class="panel-body">
            <ul class="nav navbar-nav">
                <li><a href="{{route('biblios.copies.create',$biblio)}}"> Add Copy</a></li>
                <li><a href="{{route('biblios.edit',$biblio)}}"><span class="text-success"><span class="glyphicon glyphicon-edit"></span></span> Edit</a></li>
                <li><a href="{{route('biblios.destroy',$biblio)}}" data-text="{{$biblio->title}}" data-method="delete" class="js-delete"><span class="text-danger"><span class="glyphicon glyphicon-trash"></span></span> Delete</a></li>

            </ul>
        </div>
        </div>

</li>
@endif
<li><a href="{{route('biblios.create')}}"><span class="glyphicon glyphicon-plus"></span>New Bibliography</a></li>

@if(isset($biblio))
    @section('scripts')
        @parent
<script>
    $(document).ready(function(){
        $.fn.deleteModel = function(){
            var o = $(this[0]);
            if (!confirm('Are you sure you want to delete '+ o.data('text') +' ?')){
                return;
            }
            o.append(function(){
                return "\n"+
                        "<form id='deleteForm' action='"+o.attr('href')+"' method='POST' style='display:none'>\n"+
                        "<input type='hidden' name='_method' value='DELETE'>\n"+
                        "<input type='hidden' name='_token' value='{{csrf_token()}}'>\n"+
                        "</form>\n";
            });
            $('#deleteForm', o).submit();
        };
    });
    $('a[data-method="delete"]').click(function(event){
        event.preventDefault();
        $(this).deleteModel();
    });
</script>
    @stop
@endif