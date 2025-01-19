<?php

namespace App\Http\Controllers\Tags;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Models\Tags\Tag;

class TagController extends Controller
{
    public function createView()
    {
        return view('Tags.create');
    }

    public function create(CreateTagRequest $request)
    {
        $tag = new Tag();
        $tag->name = $request->input('name');
        $tag->save();

        return redirect('/Tags');
    }

    public function update(CreateTagRequest $request)
    {
        $tag = new Tag();
        $tag->name = $request->input('name');
        $tag->save();

        return redirect('/Tags');
    }

    public function list()
    {
        $tags = Tag::all();

        return view('Tags.list', ['Tags' => $tags]);
    }
}
