@extends('layouts.html')
@section('body')
    <div class="flex">
        <div class="w-48 h-[100vh] bg-slate-500 px-4 py-8">
            <div class="flex justify-center items-center mb-10">
                @include('includes.logo')
            </div>
            <ul>
                <li class="text-white">
                    <a href="/questions" class="hover:font-medium">
                        Question
                    </a>
                </li>
            </ul>
        </div>
        <div class="flex-auto">

        </div>
    </div>
    @yield('mainContent')
@endsection