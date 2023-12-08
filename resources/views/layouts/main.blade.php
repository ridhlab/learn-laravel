@extends('layouts.html')
@section('body')
    @include('components.notification')
    <div class="flex">
        <div class="w-48 h-[100vh] bg-slate-500 px-4 py-8 flex flex-col justify-between">
            <div class="flex flex-col gap-y-10">
                <div class="flex justify-center items-center">
                    @include('components.logo')
                </div>
                <div class="flex flex-col gap-y-4">
                    @if (Auth::check())
                        <a href="/profile/{{Auth::user()->profile->id}}" class="flex flex-col items-center">
                            <x-sui-user-male-circle class="w-10 h-10 text-white"/>
                            <p class="text-white">{{Auth::user()->name}}</p>
                        </a>
                    @endif
                    <ul>
                        <li class="text-white">
                            <a href="/questions" class="hover:font-medium">
                                Question
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @if (Auth::check())
                <form action="/auth/logout" method="POST">
                    @csrf
                    <button type="submit" class="text-white p-2 rounded-md border-2 border-white">Logout</button>
                </form>
            @endif
        </div>
        <div class="flex-1 p-8 bg-slate-200">
            @yield('mainContent')
        </div>
    </div>
@endsection