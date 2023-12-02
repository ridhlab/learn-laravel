@extends('layouts.main')

@section('mainContent')
    <div class="flex flex-col gap-y-4">
        <div class="flex justify-end">
            <a href="/questions/create">
                <button class="bg-slate-500 text-white p-2 rounded-md">Add Question</button>
            </a>
        </div>
        <div class="flex flex-col gap-y-2">
            @foreach($questions as $question)
                <div class="rounded-md bg-white p-4">
                    <div class="flex justify-between">
                        <p>
                            {{$question->content}}
                        </p>
                        <a href="/questions/{{$question->id}}">
                            <button>
                                <x-sui-pen class="w-6 h-6 text-slate-500"/>
                            </button>
                        </a>
                    </div>
                </div>
            @endforeach 
        </div>
        </div>
@endsection