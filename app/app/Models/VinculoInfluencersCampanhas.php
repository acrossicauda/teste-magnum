<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class VinculoInfluencersCampanhas extends Model
{
    use HasFactory;

    protected $table = 'vinculo_influencers_campanhas';
    protected $fillable = ['influencer_id', 'campanha_id'];

    public function influencers() : HasMany
    {
        return $this->hasMany(Influencers::class, 'id', 'influencer_id');
    }

    public function campanhas() : HasMany
    {
        return $this->hasMany(Campanhas::class, 'id', 'campanha_id');
    }
}
