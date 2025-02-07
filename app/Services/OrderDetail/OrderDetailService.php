<?php

namespace App\Services\OrderDetail;

use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Services\BaseService;

class OrderDetailService extends BaseService implements OrderDetailServiceInterface
{
    public $repository;
    public function __construct(OrderDetailRepositoryInterface $OrderRepository){
        $this->repository = $OrderRepository;
    }

}
