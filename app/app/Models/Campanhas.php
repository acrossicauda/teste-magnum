<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Campanhas extends Model
{
    use HasFactory;

    protected $table = 'campanhas';

    protected $fillable = [
        'name',
        'budget',
        'description',
        'initial_date',
        'final_date',
    ];

    public function influencers() : BelongsToMany
    {
        return $this->belongsToMany(Influencer::class, 'vinculo_influencers_campanhas', 'campanha_id', 'influencer_id');
    }
}
