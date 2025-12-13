<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Zadatak extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naslov',
        'opis',
        'lokacija',
        'datum_kreiranja',
        'status',
        'upit_id',
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
            'datum_kreiranja' => 'datetime',
            'upit_id' => 'integer',
        ];
    }

    public function upit(): BelongsTo
    {
        return $this->belongsTo(Upit::class);
    }

    public function slikas(): HasMany
    {
        return $this->hasMany(Slika::class);
    }

    public function porukaMolbes(): HasMany
    {
        return $this->hasMany(PorukaMolbe::class);
    }
}
