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
        
        $media = Media::findOrFail($mediaId);
        
        $this->authorize('updateOwned', $media);
        
        $media->update(['consumed' => $isOwned]);
        
    }
    
    
    public function updateRating(Request $request, $mediaId) {
        
        $rating = $request->except('_token', '_method');
        
        $media = Media::findOrFail($mediaId);
        
        $this->authorize('updateRating', $media);
        
        $media->update(['rating' => last($rating)]);
        
    }
    
}
