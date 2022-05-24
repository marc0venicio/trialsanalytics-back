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

    public function proofs()
    {
        $this->belongsToMany(Proof::class);
    }
}
