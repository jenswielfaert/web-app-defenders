@extends('layouts.app')

@section('content')

<div class=" w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Create Post
        </h1>
    </div>
</div>

<br>

@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 py-4">
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
<div class="w-4/5 m-auto pt-20">
    <form action="/blog" method="POST" enctype="multipart/form-data">
        @csrf

        <label  class="block text-gray-700 text-sm font-bold mb-2" for="email">Title: </label>
        <input type="text" name="title" placeholder="Title..." class=" hover:border-gray-300 bg-transparent border-light-blue-500  py-20 block border-b-2 w-full h-60 text-xl outline-border">
        <label  class="block text-gray-700 text-sm font-bold mb-2" for="email">Description</label>
        <textarea name="description" placeholder="Description..." class="hover:border-gray-300 py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-border"> </textarea>
        <div class="bg-grey-lighter pt-15">
            <label class="w-44 flex flex-col items-center px-2 py-3 bg-white-rounded-lg shadow-lg tracking-wide uppercase border border-blue cursor-pointer">
            <span class="mt-2 text-base leading-normal"> Upload an image (jpg,png,jpeg) </span>

            <div class="flex items-center justify-center w-full">
                <label class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                    <div class=" flex flex-col items-center justify-center pt-7">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="w-125 h-12 text-gray-400 group-hover:text-gray-600" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z"
                                clip-rule="evenodd" />
                        </svg>
                        <p class="pt-1 text-sm tracking-wider w-full text-gray-400 group-hover:text-gray-600">
                            </p>
                    </div> 
                    <input value="Select" type="file" class="opacity-50  mt-15 bg-blue-500 text-gray-100" name="image" accept=".png, .jpg, .jpeg" >
                    <!-- <input type="file" class="opacity-0" /> -->
                </label>
            </div>
        </div>

        </div><br>
        <button type="submit" class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Submit Post</button>
    </form>
</div>

@endsection
