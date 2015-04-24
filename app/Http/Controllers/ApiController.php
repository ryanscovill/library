<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ApiController extends Controller {

	public function getBooks()
    {
        $query = urlencode(Input::get('q'));
        $array = json_decode(file_get_contents('https://www.googleapis.com/books/v1/volumes?q=' . $query),true);
        $books = array();
        if(!isset($array['items'])){
            return $books;
        }else {
            $i = 0;
            foreach ($array['items'] as $book) {
                $obj = array();
                $obj['title'] = (isset($book['volumeInfo']['title']) ? $book['volumeInfo']['title'] : '');
                $obj['subTitle'] = (isset($book['volumeInfo']['subtitle']) ? $book['volumeInfo']['subtitle'] : '');
                $obj['author'] = '';
                if(isset($book['volumeInfo']['authors'])) {
                    $obj['author'] = implode(" | ",array_values($book['volumeInfo']['authors']));
                }
                $obj['publisher'] = (isset($book['volumeInfo']['publisher']) ? $book['volumeInfo']['publisher'] : '');
                $obj['publishedDate'] = (isset($book['volumeInfo']['publishedDate']) ? $book['volumeInfo']['publishedDate'] : '');
                $obj['description'] = (isset($book['volumeInfo']['description']) ? $book['volumeInfo']['description'] : '');
                $obj['thumbnail'] = (isset($book['volumeInfo']['imageLinks']['thumbnail']) ? $book['volumeInfo']['imageLinks']['thumbnail'] : '');
                $obj['isbn'] = '';
                if(isset($book['volumeInfo']['industryIdentifiers'])) {
                    foreach ($book['volumeInfo']['industryIdentifiers'] as $isbn) {
                        if ($isbn['type'] == "ISBN_13") {
                            $obj['isbn'] = $isbn['identifier'];
                            break;
                        }
                    }
                }
                $obj['categories'] = (isset($book['volumeInfo']['categories']) ? $book['volumeInfo']['categories'] : '');
                $books[$i] = $obj;
                $i ++;
            }
            return json_encode($books,JSON_UNESCAPED_SLASHES | JSON_FORCE_OBJECT);
        }
    }
}
