<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Models\PostTag;

class TagRepository
{
    protected $tag;

    function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function getAllTags()
    {
        return $this->tag->all();
    }

    public function getTagById($id)
    {
        return $this->tag->find($id);
    }

    public function getTagByName($name)
    {
        return $this->tag->where('name', $name)->get();
    }

    public function createTag($request)
    {
        if (!$this->getTagByName($request->name)->count()) {
            return $this->tag->insert(
                [
                    'name' => $request->name,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]
            );
        }
    }

    public function updateTag($request, $id)
    {
        if (!$this->getTagByName($request->name)->count()) {
            $tag = $this->getTagById($id);
            if ($tag) {
                $tag->name = $request->name;
                $tag->updated_at = date('Y-m-d H:i:s');
                return $tag->save();
            }
        }
    }

    public function deleteTag($id)
    {
        $tag = $this->getTagById($id);
        if ($tag) {
            $postTag = new PostTag();
            $postTag->where('tag_id', $id)->delete();
            return $tag->delete();
        }
    }

}
