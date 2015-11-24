<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Media;

class AjaxController extends Controller
{
    
    public function updateOwned(Request $request, $mediaId) {
        
        $isOwned = $request->has('consumed');
        
        Media::findOrFail($mediaId)
               ->update(['consumed' => $isOwned]);
        
    }
    
    
    public function updateRating(Request $request, $mediaId) {
        
        $rating = $request->except('_token', '_method');
        
        Media::findOrFail($mediaId)
               ->update(['rating' => last($rating)]);
        
    }
    
}
