<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Legacy extends Model
{
    use HasFactory;

    protected $table = 'legacy';

    protected $fillable = [
        'league_id',
        'points',
        'bonus_debloques',
    ];

    protected function casts(): array
    {
        return [
            'bonus_debloques' => 'array',
        ];
    }

    public function league(): BelongsTo
    {
        return $this->belongsTo(League::class);
    }
}
