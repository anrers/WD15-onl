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

    public function index()
    {
        $tags = $this->tagService->getAll();

        return view('tags.list', compact('tags'));
    }

    public function create()
    {
        return view('tags.create');
    }

    public function show(int $id)
    {
        $data = $this->tagService->getById($id);

        return view('tags.detail', ['model' => $data]);
    }

    public function store(CreateTagRequest $request)
    {
        $data = $request->validated();
        $tag = $this->tagService->create($data);

        return redirect('/tags/' . $tag->id);
    }

    public function edit(int $id)
    {
        $tag = $this->tagService->getById($id);

        return view('tags.edit', ['model' => $tag]);
    }

    public function update(CreateTagRequest $request, int $id)
    {
        $data = $request->validated();
        $tag = $this->tagService->update($id, $data);

        return redirect('/tags/' . $tag->id);
    }

    public function destroy(int $id)
    {
        $this->tagService->delete($id);
        return redirect('/tags');
    }
}
