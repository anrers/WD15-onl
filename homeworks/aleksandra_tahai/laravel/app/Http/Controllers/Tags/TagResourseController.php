<?php

namespace App\Http\Controllers\Tags;

use App\Contracts\Services\Tags\TagServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Tags\CreateTagRequest;
use App\Services\Tags\TagService;
use Illuminate\Http\Request;

class TagResourseController extends Controller
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateTagRequest $request)
    {
        $data = $request->validated();
        $tag = $this->tagService->create($data);
        return redirect('/tags/' . $tag->id);
    }

    public function show(string $id)
    {
        $tag = $this->tagService->getById($id);
        return view('tags.detail', compact('tag'));
    }

    public function edit(string $id)
    {
        $tag = $this->tagService->getById($id);
        return view('tags.edit', compact('tag'));
    }

    public function update(CreateTagRequest $request, string $id)
    {
        $tag = $request->validated();
        $this->tagService->update($id, $tag);
        return redirect('/tags/' . $id);
    }

    public function destroy(string $id)
    {
        $this->tagService->delete($id);
    }
}
