<?php

namespace App\Http\Controllers\Tags;

use App\Contracts\Services\Tags\TagsServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Services\Tags\TagService;


class TagController extends Controller
{
    protected TagsServiceInterface $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }


    public function index()
    {
        $tags = $this->tagService->getAll();
        return view('tags.list', compact('tags'));
    }

    public function show(int $id)
    {
        $data = $this->tagService->getById($id);
        return view('tags.detail', compact('data'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(CreateTagRequest $request)
    {
        $data = $request->validated();
        $tags = $this->tagService->create($data);
        //return redirect('/tags/' . $task->id);
        return redirect()->route('tags.show', ['id' => $tags->id]);

    }

    public function edit(int $id)
    {
        $tag = $this->tagService->getById($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(CreateTagRequest $request)
    {
        $data = $request->validated();
        $tags = $this->tagService->update($request->id, $data);;
        //return redirect('/tags/' . $tag->id);
        return redirect()->route('tags.show', ['id' => $tags->id]);
    }

    public function destroy(int $id)
    {
        $this->tagService->delete($id);
        return redirect()->route('tags.index');
    }

}
