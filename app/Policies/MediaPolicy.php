<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\User;
use App\Media;

class MediaPolicy
{
    use HandlesAuthorization;
    
    
    public function destroy(User $user, Media $media) {
        return $user->id === $media->user_id;
    }
    
    public function edit(User $user, Media $media) {
        return $user->id === $media->user_id;
    }
    
    public function update(User $user, Media $media) {
        return $user->id === $media->user_id;
    }
    
    public function updateOwned(User $user, Media $media) {
        
        return $user->id === $media->user_id;
    }
    
    public function updateRating(User $user, Media $media) {
        
        return $user->id === $media->user_id;
    }
}
