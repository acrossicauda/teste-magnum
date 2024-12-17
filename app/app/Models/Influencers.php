<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Influencers extends Model
{
    use HasFactory;

    protected $table = 'influencers';

    protected $fillable = [
        'name',
        'username',
        'qtd_followers',
        'category',
    ];

    public function campanhas() : BelongsToMany
    {
        return $this->belongsToMany(Campanha::class, 'vinculo_influencers_campanhas', 'influencer_id', 'campanha_id');
    }
}
