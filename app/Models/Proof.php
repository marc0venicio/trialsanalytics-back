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
        "subject",
        "discipline",
        "question_id",
    ];

    public function questions()
    {
        $this->belongsToMany(Question::class);
    }
}
