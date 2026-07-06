<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'scenario_id',
        'type',
        'conditions',
        'effets',
        'poids',
        'texte_seed',
    ];

    protected function casts(): array
    {
        return [
            'conditions' => 'array',
            'effets' => 'array',
        ];
    }

    public function scenario(): BelongsTo
    {
        return $this->belongsTo(Scenario::class);
    }
}
