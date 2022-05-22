<?php
namespace App\Models\Traits;

use App\Models\Tenant;
use App\Scopes\TenantScope;
use Illuminate\Support\Facades\Auth;

trait Tenantable
{
    protected static function bootTenantable()
    {
        static::addGlobalScope(new TenantScope);
        if(auth()->check()){
            static::creating(function($model){
                $model->tenant_id = auth()->user()->tenant_id;
            });
        }
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
