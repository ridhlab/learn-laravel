@extends('layouts.main')

@section('mainContent')
    <div class="flex flex-col gap-y-4">
        <a href="/questions" class="flex items-center gap-x-2"><x-sui-arrow-left-circle class="w-6 h-6"/>Back</a>
        <div class="rounded-md bg-white p-4">
            <form action="/questions/{{$data->id}}/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-col gap-y-4">
                    <div class="flex flex-col gap-y-2">
                        <label for="question">Question</label>
                        <textarea name="content" id="question" cols="30" rows="5" class="border-2 rounded-md p-2">{{old('content', $data->content)}}</textarea>
                    </div>
                    <button class="bg-slate-500 text-white p-2 rounded-md" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection