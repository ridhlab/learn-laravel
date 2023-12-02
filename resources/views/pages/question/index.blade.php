@extends('layouts.main')

@section('mainContent')
    <div class="flex flex-col gap-y-4">
        <div class="flex justify-end">
            <a href="/questions/create">
                <button class="bg-slate-500 text-white p-2 rounded-md">Add Question</button>
            </a>
        </div>
        @foreach($questions as $question)
            <div class="rounded-md bg-white p-4">
            {{-- TODO : List table --}}
                {{$question->content}}
            </div>
        @endforeach 
        </div>
@endsection