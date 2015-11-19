<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MediaType extends Model
{
    protected static $types;
    
    public function media() {
        return $this->belongsTo('App\Media');
    }
    
    public static function getTypes() {
        self::$types = MediaType::orderBy('name')->lists('name', 'id');
        
        return static::$types;
    }
}
