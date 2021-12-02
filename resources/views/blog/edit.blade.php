@extends('layouts.app')

@section('content')

    <div class=" w-4/5 m-auto text-center">
        <div class="py-16 border-b border-gray-200">
            <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl">Edit Post</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mt-6 mb-4">
            <p class="text-base md:text-sm text-blue-500 font-bold">&lt <a href="{{ route('posts.workspace') }}" class="text-base md:text-sm text-blue-500 font-bold no-underline hover:underline">BACK</a></p>
        </div><br>
    </div>
    <br>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form id="form" action="{{ url('blog/workspace/'.$post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" value="{{$post->id}}" name="id">
                    <div class="mb-4">
                        <label class="text-xl text-gray-600">Title <span class="text-red-500">*</span>
                        </label>
                        </br>
                        <input type="text" class="border-2 border-gray-300 p-2 w-full" name="title" id="title" value="{{$post->title}}" required>
                    </div>
                    <div class="mb-8">
                        <label class="text-xl text-gray-600">Content <span class="text-red-500">*</span>
                        </label>
                        </br>
                        <div id="editor" name="editor" style="font-family: Georgia">

                        </div>
                        <input type="text" name="content" id="content" value="{!! html_entity_decode(htmlspecialchars($post->content)) !!}" hidden>
                    </div>
                    <div class="flex p-1">
                        <button type="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400" required>Save Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/quill-edit.js')}}"></script>
@endsection
