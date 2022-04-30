<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;
use App\Models\taminotchi;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function taminotchi(){
        return $this->belongsTo(taminotchi::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

}
