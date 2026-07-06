<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameDay extends Model
{
    use HasFactory;

    protected $fillable = [
        'league_id',
        'jour_n',
        'etat_avant',
        'etat_apres',
        'events_tires',
        'rapport_narratif',
        'resolu_at',
    ];

    protected function casts(): array
    {
        return [
            'etat_avant' => 'array',
            'etat_apres' => 'array',
            'events_tires' => 'array',
            'resolu_at' => 'datetime',
        ];
    }

    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }

    public function playerDecisions(): HasMany
    {
        return $this->hasMany(PlayerDecision::class);
    }
}
