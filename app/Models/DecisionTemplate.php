<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DecisionTemplate extends Model
{
    use HasFactory;

    protected $fillable = [
        'scenario_id',
        'role',
        'jour_min',
        'jour_max',
        'options',
    ];

    protected function casts(): array
    {
        return [
            'options' => 'array',
        ];
    }

    public function scenario(): BelongsTo
    {
        return $this->belongsTo(Scenario::class);
    }

    public function playerDecisions(): HasMany
    {
        return $this->hasMany(PlayerDecision::class);
    }
}
