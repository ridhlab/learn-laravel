@extends('layouts.main')

@section('mainContent')
    <div class="flex flex-col gap-y-4">
        <a href="/questions" class="flex items-center gap-x-2"><x-sui-arrow-left-circle class="w-6 h-6"/>Back</a>
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
        <div>
            <div class="mb-2 border-b">
                <ul class="flex flex-wrap text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-2 border-b-2" id="answers-tab" data-tabs-target="#answers" type="button" role="tab" aria-controls="answers" aria-selected="false">Answers</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-2 border-b-2" id="questions-tab" data-tabs-target="#questions" type="button" role="tab" aria-controls="questions" aria-selected="false">Questions</button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="flex flex-col gap-y-2" id="answers" role="tabpanel" aria-labelledby="answers-tab">
                    @foreach (Auth::user()->answers as $answer)
                        <div class="rounded-md bg-white p-2 flex flex-col gap-y-1">
                            <h2 class="text-lg font-medium">{{$answer->question->content}}</h2>
                            <p>{{$answer->content}}</p>
                        </div>
                    @endforeach
                </div>
                <div class="flex flex-col gap-y-2" id="questions" role="tabpanel" aria-labelledby="questions-tab">
                    @foreach (Auth::user()->questions as $question)
                        <div class="rounded-md bg-white p-2 flex flex-col gap-y-1">
                            <h2 class="text-lg font-medium">{{$question->content}}</h2>
                            <p class="text-slate-500">
                                {{count($question->answers)}} answer    
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection