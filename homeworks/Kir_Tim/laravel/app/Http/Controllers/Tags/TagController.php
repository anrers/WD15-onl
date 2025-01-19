<?php

namespace App\Http\Controllers\Tags;

use App\Contracts\Services\Tags\TagServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\CreateTagRequest;
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
        return view('tags.createView');
    }

    public function create(CreateTagRequest $request)
    {
        $data = $request->validated();
        $tag = $this->tagService->create($data);

        return redirect()->route('tags.create', ['id' => $tag->id]);
    }

    public function list()
    {
        $tags = $this->tagService->getAll();

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

        return redirect()->route('tags.update', ['id' => $tag->id]);
    }

    public function destroy(int $id)
    {
        $this->tagService->delete($id);
        return redirect()->route('tags.list');
    }


}
