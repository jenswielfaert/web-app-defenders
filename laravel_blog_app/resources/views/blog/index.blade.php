@extends('layouts.app')

@section('content')

<div class=" w-4/5 m-auto text-center">
    <div class="py-16 border-b border-gray-200">
        <h1 class="text-6xl">
            Blog Posts
        </h1>
    </div>
</div>

@if (session()->has('message')) 
    <div class="w-4/5 m-auto mt-10 pl-2">
        <p class="w-1/6 mb-4 text-gray-50 bg-green-500 rounded-2xl py-4"> {{session()->get('message')}} </p>
    </div>
@endif

@if (Auth::check())
    <div class="pt-15 <-4/5 m-auto"> 
        <a href="/blog/create" class="bg-blue-500 uppercase bg-transparent test-gray-100 text-xs font-extrabold py-3 px-5 "> Create a Post </a>
    </div>
@endif
<br>
@foreach ($posts as $post)
    <br>
    <div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
        <div>
            <img src="https://cdn.pixabay.com/photo/2016/11/22/21/26/notebook-1850613_960_720.jpg" width="600" alt=""/>
        </div>

        <div>
            <h2 class="text-gray-700 font-bold text-5xl pb-4"> {{$post->title}} </h2>
            <span class="text-gray-700"> 
                By <span class="font-bold italic text-gray-700"> {{$post->user->name}}  {{date('jS M Y', strtotime($post->updated_at)) }} </span> 
            </span>

            <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light"> {{$post->description}} </p>

            <a href="/blog/{{$post->id}}" class="bg-blue-500 uppercase font-extrabold rounded-3xl py-4 px-8 text-lg"> Keep Reading</a>
        </div>
    </div>
@endforeach
@endsection
