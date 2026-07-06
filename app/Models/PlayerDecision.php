<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerDecision extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_day_id',
        'user_id',
        'decision_template_id',
        'option_choisie',
        'joue_at',
        'is_default',
    ];

    protected function casts(): array
    {
        return [
            'option_choisie' => 'array',
            'joue_at' => 'datetime',
            'is_default' => 'boolean',
        ];
    }

    public function gameDay(): BelongsTo
    {
        return $this->belongsTo(GameDay::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function decisionTemplate(): BelongsTo
    {
        return $this->belongsTo(DecisionTemplate::class);
    }
}
