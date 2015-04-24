<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Copy extends Model {

    protected $table = 'copies';

    protected $fillable = ['barcode','library_id'];

	public function book()
    {
        return $this->belongsTo('App\Book');
    }
    public function library()
    {
        return $this->belongsTo('App\Library');
    }
    public function status()
    {
        return $this->belongsTo('App\CopyStatus');
    }
    public function scopeIn($query)
    {
        $query->where('status_id','=','1');
    }
    public function scopeOut($query)
    {
        $query->where('status_id','=','2');
    }
    public function scopeHold($query)
    {
        $query->where('status_id','=','3');
    }
}
