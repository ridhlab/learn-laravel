@extends('layouts.html')
@section('body')
    @include('components.notification')
    <div class="flex">
        <div class="w-48 h-[100vh] bg-slate-500 px-4 py-8 flex flex-col justify-between">
            <div>
                <div class="flex justify-center items-center mb-10">
                    @include('components.logo')
                </div>
                <ul>
                    <li class="text-white">
                        <a href="/questions" class="hover:font-medium">
                            Question
                        </a>
                    </li>
                </ul>
            </div>
            <form action="/auth/logout" method="POST">
                @csrf
                <button type="submit" class="text-white p-2 rounded-md border-2 border-white">Logout</button>
            </form>
        </div>
        <div class="flex-1 p-8 bg-slate-200">
            @yield('mainContent')
        </div>
    </div>
@endsection