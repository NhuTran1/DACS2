<?php

namespace App\Services\BlogComment;

use App\Repositories\BlogComment\BlogCommentRepositoryInterface;
use App\Services\BaseService;

class BlogCommentService extends BaseService implements BlogCommentServiceInterface
{
    public $repository;

    public function __construct(BlogCommentRepositoryInterface $BlogCommentRepository)
    {
        $this->repository = $BlogCommentRepository;
    }

}
