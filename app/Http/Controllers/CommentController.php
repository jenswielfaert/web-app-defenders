<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $input = $request->all();

        $input['user_id'] = auth()->user()->id;

        Comment::create($input);

        return back();
    }
}
