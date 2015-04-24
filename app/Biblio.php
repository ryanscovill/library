<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Biblio extends Model {

    protected $fillable = ['title', 'subTitle','isbn','publisher','publishedDate','author','thumbnail','description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
	public function copies()
    {
        return $this->hasMany('App\Copy');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category')->withTimestamps();
    }
    public function getCategoryListAttribute()
    {
        return $this->categories->lists('id');
    }
    public function getCategoryStringAttribute()
    {
        return implode(', ',$this->categories->lists('name'));
    }
}
