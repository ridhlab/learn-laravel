@extends('layouts.main')

@section('mainContent')
    <div class="flex flex-col gap-y-4">
        <a href="/questions/{{$questionId}}" class="flex items-center gap-x-2"><x-sui-arrow-left-circle class="w-6 h-6"/>Back</a>
        <div class="rounded-md bg-white p-4">
            <div class="flex flex-col gap-y-4">
                <h2 class="font-medium text-2xl">{{$questionContent}}</h2>
                <form action="/answers/store" method="POST" class="flex flex-col gap-y-2">
                    @csrf
                    <textarea name="content" id="answer" cols="30" rows="5" class="border-2 rounded-md p-2"></textarea>
                    <input type="hidden" name="question_id" value="{{'asas'}}">
                    <button type="submit" class="bg-slate-500 text-white p-2 rounded-md">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection