@extends('layouts.main')

@section('mainContent')
    <div class="flex flex-col gap-y-4">
        <a href="/questions" class="flex items-center gap-x-2"><x-sui-arrow-left-circle class="w-6 h-6"/>Back</a>
        <div class="flex flex-col gap-y-8">
            <div class="rounded-md bg-white p-4">
                <div class="flex flex-col gap-y-2">
                    <h2 class="font-medium text-2xl">{{$data->content}}</h2>
                    <a href="/answers/create/{{$data->id}}" class="w-full">
                        <button class="bg-white border-slate-500 border-2 p-2 rounded-md w-full">Answer</button>
                    </a>
                </div>
            </div>
            <div class="flex flex-col gap-y-2">
                <h4 class="text-lg font-medium">List Answers</h4>
                @if (count($answers) > 0)
                    <div class="flex flex-col gap-y-2">
                        @foreach ($answers as $answer)
                            <div class="rounded-md bg-white p-4">
                                <p>{{$answer->content}}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-center italic text-slate-500">Empty Answers</p>
                @endif
            </div>
        </div>
    </div>
@endsection