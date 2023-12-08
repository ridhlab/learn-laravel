<?php

namespace App\Http\Controllers;

use App\Applications\Profile\ProfileApplication;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
{

    private ProfileApplication $profileApplication;

    public function __construct(ProfileApplication $profileApplication)
    {
        $this->profileApplication = $profileApplication;
    }

    public function profilePage()
    {
        return view('pages.profile');
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
