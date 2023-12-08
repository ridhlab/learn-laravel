<?php

namespace App\Applications\Profile;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;

class ProfileApplication
{
    public function updateProfile(UpdateProfileRequest $request)
    {
        $profileId = $request->route('id');
        $payload = $request->validated();

        $profile = Profile::findOrFail($profileId);
        $profile->bio = $payload['bio'];
        $profile->occupation = $payload['occupation'];
        $profile->gender = $payload['gender'];

        $profile->save();
    }
}
