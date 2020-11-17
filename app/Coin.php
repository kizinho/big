<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $fillable = [
        'name', 'address','photo','q_code','slug','api_key',
    ];
    
    public function usercoin() {
        return $this->hasMany(UserCoin::class, 'coin_id')->with('user');
    }

}
