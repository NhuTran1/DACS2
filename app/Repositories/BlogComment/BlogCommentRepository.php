<?php


namespace App\Repositories\BlogComment;

use App\Models\BlogComment;
use App\Repositories\BaseRepository;

class BlogCommentRepository extends BaseRepository implements BlogCommentRepositoryInterface
{

    public function getModel()
    {
        return BlogComment::class;
    }
}


