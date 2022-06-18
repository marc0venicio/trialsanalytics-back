<?php

namespace App\Models;

use App\Models\Traits\Tenantable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proof extends Model
{
    use Tenantable, SoftDeletes;

    protected $fillable = [
        "id",
        "tenant_id",
        "subject",
        "discipline",
    ];

    // protected $appends = ['questions'];

    public function questions()
    {
        return $this->belongsToMany(Question::class);
    }
}
