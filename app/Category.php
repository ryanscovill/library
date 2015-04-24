<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function biblios(){
        return $this->hasMany('App\Biblio');
    }

    /**
     * Get Categories in alphabetical order
     *
     * @param $query
     * @return mixed
     */
    public function scopeAlphabetical($query){
        return $query->orderBy('name','ASC');
    }

    /**
     * Returns categories formatted for select box
     *
     * @return mixed
     */
    public static function getNameList(){
        return Category::alphabetical()->lists('name','id');
    }

    /**
     * Takes a array of category ids mixed with new categories and
     * creates the new categories
     *
     * @param $categoryList
     * @return array of category ids
     */
    public static function getOrCreate($categoryList)
    {
        if (count($categoryList) > 0) {
            foreach ($categoryList as $key => $value) {
                if (!(Category::find($value))) {
                    $category = Category::create(array('name' => $value));
                    $categoryList[$key] = $category->id;
                }
            }
        }else{
            $categoryList = array();
        }
        return $categoryList;
    }
}
