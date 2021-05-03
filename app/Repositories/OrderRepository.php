<?php
namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Contracts\OrderRepositoryInterface;

class OrderRepository implements OrderRepositoryInterface
{
    protected $entity;

    public function __construct(Order $order)
    {
        $this->entity = $order;
    }

    public function newOrder(
        string $identify,
        float $total,
        string $status,
        int $tenantId,
        string $comment = '',
        $clientId = '',
        $tableId = ''
    )
    {
        $data = [
            'identify' => $identify,
            'total' => $total,
            'status' => $status,
            'tenant_id' => $tenantId,
            'comment' => $comment,
            // 'client_id' => $clientId,
            // 'table_id' => $tableId,
        ];

        if($clientId != 0) $data['client_id'] = $clientId;
        if($tableId != '') $data['table_id'] = $tableId;

        $order = $this->entity->create($data);

        return $order;
    }

    public function getOrderByIdentify(string $identify)
    {
        return $this->entity->where('identify', $identify)->first();
    }

    public function registerProductsOrder(int $orderId, array $products)
    {
        $order = $this->entity->find($orderId);

        foreach($products as $product) {
            $order->products()->attach($product['id'], [
                'price' => $product['price'], 
                'qty'   => $product['qty']
            ]);
        }
    }

    public function getOrdersByClientId(int $idClient)
    {
        $orders = $this->entity
                            ->where('client_id', $idClient)
                            ->paginate();
        return $orders;
    }

    public function getOrdersByTenantId(int $idTenant, string $status, string $date = null)
    {

    }

    public function updateStatusOrder(string $identify, string $status){

    }
}