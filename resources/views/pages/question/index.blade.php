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
                    <a href="/questions/{{$question->id}}">
                        <div class="flex justify-between">
                            <p class="text-slate-500 text-sm">Asked by {{$question->user->name}}</p>
                            <p>
                                {{$question->content}}
                            </p>
                            <div class="flex gap-x-2 items-center">
                                <a href="/questions/{{$question->id}}/edit" class="flex items-center">
                                    <button>
                                        <x-sui-pen class="w-6 h-6 text-slate-500"/>
                                    </button>
                                </a>
                                <form action="/questions/{{$question->id}}/delete" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <x-sui-trash class="w-6 h-6 text-slate-500"/>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach 
        </div>
    </div>
@endsection