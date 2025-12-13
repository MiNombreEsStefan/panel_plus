<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PorukaMolbe extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'zadatak_id',
        'user_id',
        'tekst',
        'datum_vreme',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'id' => 'integer',
            'zadatak_id' => 'integer',
            'user_id' => 'integer',
            'datum_vreme' => 'datetime',
        ];
    }

    public function zadatak(): BelongsTo
    {
        return $this->belongsTo(Zadatak::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
