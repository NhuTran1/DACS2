<?php

namespace App\Services\Order;

use App\Services\ServiceInterface;

interface OrderServiceInterface extends ServiceInterface
{
    public function getOrderUserId($userId);
}
