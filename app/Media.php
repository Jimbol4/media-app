<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'media';
    
    protected $dates = ['release_date'];
    
    protected $fillable = [
        'title', 'author', 'type_id', 'release_date', 'rating'
    ];
    
    public function setReleaseDateAttribute($date) {
            $this->attributes['release_date'] = Carbon::createFromFormat('m/d/Y', $date);
        }
        
    public function getReleaseDateAttribute($date) {
       return new Carbon($date); 
    }
    
    public function user() {
        return $this->belongsTo('App\User');
    }
    
    public function type() {
        return $this->hasOne('App\MediaType');
    }
}
