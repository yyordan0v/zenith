<?php

namespace App\Models\Utility;

use App\Enums\Game\AccountLevel;
use Illuminate\Database\Eloquent\Model;

class VipPackage extends Model
{
    protected $fillable = ['level', 'duration', 'cost', 'is_best_value', 'sort_order'];

    protected $casts = [
        'level' => AccountLevel::class,
        'is_best_value' => 'boolean',
    ];
}
