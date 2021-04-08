<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tenant_id',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function search($filter = null)
    {
        $users = $this->join('tenants', 'tenants.id', '=', 'users.tenant_id')
            ->where(function ($query) use ($filter) {
                if ($filter) {
                    $query->where('users.name', 'LIKE', "%{$filter}%");
                    $query->orWhere('tenants.name', 'LIKE', "%{$filter}%");
                }
            })
            ->select('users.*')
            ->latest()
            ->with('tenant')
            ->tenantUser();
    
        return $users;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Scope a query to only include popular users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTenantUser(Builder $query)
    {
        // Retorna as usuarios da tenant atual
        return $query->where('tenant_id', auth()->user()->tenant_id);
    }

}
