@extends('layouts.main')

@section('mainContent')
    <div class="flex flex-col gap-y-4">
        <form action="/profile/{{Auth::user()->profile->id}}/update" method="POST" class="flex flex-col gap-y-2">
            @csrf
            @method('PUT')
            <div class="flex flex-col gap-y-1">
                <label for="bio">Bio</label>
                <textarea id="bio" name="bio" placeholder="Input bio" class="rounded-md p-2 border-[1px] border-slate-500" >{{Auth::user()->profile->bio}}</textarea>
            </div>
            <div class="flex flex-col gap-y-1">
                <label for="occupation">Occupation</label>
                <input id="occupation" name="occupation" placeholder="Input occupation" class="rounded-md p-2 border-[1px] border-slate-500"  value="{{old('bio', Auth::user()->profile->occupation)}}" >
            </div>
            <div class="flex flex-col gap-y-1">
                <label for="gender">Gender</label>
                <div class="flex items-center gap-x-2">
                    <input type="radio" name="gender" id="male" value="male" {{Auth::user()->profile->gender->value == 'male' ? 'checked' : ''}} >
                    <label for="male">Male</label>
                </div>
                <div class="flex items-center gap-x-2">
                    <input type="radio" name="gender" id="female" value="female" {{Auth::user()->profile->gender->value == 'female' ? 'checked' : ''}}>
                    <label for="female">Female</label>
                </div>
            </div>
            <button class="bg-slate-500 text-white p-2 rounded-md" type="submit">Submit</button>
        </form>
    </div>
@endsection