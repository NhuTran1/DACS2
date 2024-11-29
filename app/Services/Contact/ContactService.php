<?php

namespace App\Services\Contact;

use App\Repositories\Contact\ContactRepositoryInterface;
use App\Services\BaseService;

class ContactService extends BaseService implements ContactServiceInterface
{
    public $repository;

    public function __construct(ContactRepositoryInterface $ContactRepository)
    {
        $this->repository = $ContactRepository;
    }

}
