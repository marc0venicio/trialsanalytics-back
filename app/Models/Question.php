<?php

namespace App\Models;

use App\Models\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use Tenantable, SoftDeletes;

    protected $fillable = [
        "id",
        "tenant_id",
        "description",
        "alternatives",
        "answer"
    ];

    protected $casts = [
        "alternatives" => 'array'
    ];

    public function proofs()
    {
        return $this->belongsToMany(Proof::class);
    }
}
