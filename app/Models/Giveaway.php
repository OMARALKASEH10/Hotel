<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Giveaway extends Model
{
     protected $table = 'giveaways'; 
     

    protected $fillable = ['name', 'phone', 'campaign_id'];

    public function campaign() {
        return $this->belongsTo(GiveawayCampaign::class, 'campaign_id');
    }


}
