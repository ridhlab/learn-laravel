<?php

namespace App\Http\Controllers;

use App\Applications\Profile\ProfileApplication;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    private ProfileApplication $profileApplication;

    public function __construct(ProfileApplication $profileApplication)
    {
        $this->profileApplication = $profileApplication;
    }

    public function profilePage()
    {
        return view('pages.profile')->with('profile_picture_url', '/storage/profile-picture/' . Auth::user()->profile->profile_picture);
    }

    public function update(UpdateProfileRequest $request)
    {
        try {
            $this->profileApplication->updateProfile($request);
            return redirect()->route('question.index')->with('success', 'Profile has been successfully updated');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
