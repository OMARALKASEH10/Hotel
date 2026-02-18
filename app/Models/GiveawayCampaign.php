<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiveawayCampaign extends Model
{
    protected $fillable = ['name', 'description', 'draw_done', 'start_date', 'end_date', 'winner_id'];

    public function entries() {
        return $this->hasMany(Giveaway::class, 'campaign_id');
    }


    public function winner()
    {
        return $this->belongsTo(Giveaway::class, 'winner_id');
    }


    public function status()
    {
        if ($this->draw_done) return 'منتهية';
        $now = now();
        if ($now->lt($this->start_date)) return 'قادمة';
        if ($now->between($this->start_date, $this->end_date)) return 'نشطة';
        return 'منتهية';
    }



}
