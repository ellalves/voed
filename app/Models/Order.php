<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory, TenantTrait;

    protected $fillable = [
        'tenant_id',
        'form_payment_id',
        'identify', 
        'client_id', 
        'table_id', 
        'total', 
        'total_paid', 
        'total_discount', 
        'status', 
        'address',
        'comment',
    ];

    /**
     * Options status
     */
    public $statusOptions = [
        'open' => 'Aberto',
        'done' => 'Completo',
        'rejected' => 'Rejeitado',
        'working' => 'Andamento',
        'canceled' => 'Cancelado',
        'delivering' => 'Em transito',
    ];
    
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function formPayment()
    {
        return $this->belongsTo(FormPayment::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class)->withDefault();
    }

    public function table()
    {
        return $this->belongsTo(Table::class)->withDefault();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot(['price', 'qty', 'coupon', 'discount', 'paid']);
    }
    
    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }
}
