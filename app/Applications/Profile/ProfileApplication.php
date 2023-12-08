<?php

namespace App\Applications\Profile;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileApplication
{
    public function updateProfile(UpdateProfileRequest $request)
    {
        $profileId = $request->route('id');
        $payload = $request->validated();

        $profilePictureFile = $request->file('profile_picture');
        $profilePictureFileName = now()->timestamp . '-' .  $profileId . '-' .  $profilePictureFile->getClientOriginalName();

        $profile = Profile::findOrFail($profileId);
        $profile->bio = $payload['bio'];
        $profile->occupation = $payload['occupation'];
        $profile->gender = $payload['gender'];

        $profile->profile_picture = $profilePictureFileName;
        $profilePictureFile->storeAs('/public/profile-picture/', $profilePictureFileName);

        $profile->save();
    }
}
