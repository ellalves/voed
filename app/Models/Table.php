<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    use HasFactory, TenantTrait;

    protected $fillable = ['identify','description','uuid'];

    public function tenants() {
        return $this->belongsTo(Tenant::class);
    }

    public function search($filter = null) {
        $tables = $this->where('identify', 'LIKE', "%{$filter}%")
                    ->orWhere('description', 'LIKE', "%{$filter}%");
        return $tables;
    }
}
