<?php namespace App\Http\Controllers;

use App\Biblio;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class AutoCompleteController extends Controller {

    public function getBiblio()
    {
        $term = Input::get('term');
        $type = Input::get('type');

        $result = array();

        $query = Biblio::query();
        switch($type){
            case 'title':
                $query->where('title','LIKE','%'.$term.'%');
                break;
            case 'author':
                $query->where('author','LIKE','%'.$term.'%');
                break;
            default:
                App::abort(404,'Missing Query Type');
        }

        $array = $query->get();

        foreach($array as $item){
            $result[] = ['id'=>$item->id, 'value'=>$item->title];
        }
        return Response::json($result);
    }

}
