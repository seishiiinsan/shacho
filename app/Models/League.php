<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class League extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'scenario_id',
        'saison',
        'timezone',
        'statut',
        'options',
        'webhook_discord',
        'webhook_slack',
        'plan',
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

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'league_members')
            ->withPivot('role', 'objectif_secret_id', 'is_game_master')
            ->withTimestamps();
    }

    public function leagueMembers(): HasMany
    {
        return $this->hasMany(LeagueMember::class);
    }

    public function gameDays(): HasMany
    {
        return $this->hasMany(GameDay::class);
    }

    public function legacy(): HasOne
    {
        return $this->hasOne(Legacy::class);
    }
}
