<?php

namespace App\Http\Controllers\Tags;

use App\Contracts\Services\TagServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Models\Tags\Tag;
use App\Services\Tags\TagService;


class TagController extends Controller
{
    protected TagServiceInterface $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }
    public function createView()
    {
        return view('tags.create');
    }

    public function create(CreateTagRequest $request)
    {
        $tag = new Tag();
        $tag->name = $request->input('name');
        $tag->save();
        return redirect('/tags');
    }

    public function list()
    {
        $tags = Tag::all();

      return  view('tags.list', ['tags' => $tags]);
    }

    public function edit(int $id)
    {
        $tag = $this->tagService->getById($id);

        return view('tags.edit', ['model' => $tag]);
    }

    public function update(CreateTagRequest $request, int $id)
    {
        $data = $request->validated();
        $tag = $this->tagService->update($data, $id);

        return redirect('/tags/' . $tag->id);
    }

    public function destroy(int $id)
    {
        $this->tagService->delete($id);
        return redirect('/tags');
    }


}
