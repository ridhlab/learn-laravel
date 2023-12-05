@extends('layouts.html')
@section('body')
    @include('components.notification')
    <div class="w-full h-[100vh] flex justify-center items-center bg-slate-200">
        <div class="bg-white w-96 p-4 rounded-md">
            <h2 class="text-2xl text-center">Welcome back</h2>
            <form action="/auth/login" method="POST" class="flex flex-col gap-y-2">
                @csrf
                <div class="flex flex-col gap-y-1">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Input email" class="rounded-md p-2 border-[1px] border-slate-500" >
                </div>
                <div class="flex flex-col gap-y-1">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Input password" class="rounded-md p-2 border-[1px] border-slate-500" >
                </div>
                <button class="bg-slate-500 text-white p-2 rounded-md mt-2" type="submit">Login</button>
            </form>
            <p class="mt-2 text-slate-500">Don't have account? Register <a href="/register" class="text-slate-800">here</a></p>
        </div>
    </div>
@endsection