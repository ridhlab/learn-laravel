@extends('layouts.main')

@section('mainContent')
    <div class="flex flex-col gap-y-4">
        <a href="/questions" class="flex items-center gap-x-2"><x-sui-arrow-left-circle class="w-6 h-6"/>Back</a>
        <div class="flex flex-col gap-y-2">
            <div class="rounded-md bg-white p-4">
                <div class="flex flex-col gap-y-2">
                    <h2 class="font-medium text-2xl">{{$data->content}}</h2>
                    <button class="bg-white border-slate-500 border-2 p-2 rounded-md">Answer</button>
                </div>
            </div>
        </div>
    </div>
@endsection