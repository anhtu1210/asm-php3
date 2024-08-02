<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    const BANNER_TYPE = [
        'hot_deal' => 'hot deal',
        'good_deal' => 'good deal',
        'new_product' => 'new product',
        'best_sale' => 'best sale',
    ];

    const STATUS_BANNER_HOT_DEAL = 'hot_deal';
    const STATUS_BANNER_GOOD_DEAL = 'good_deal';
    const STATUS_BANNER_NEW_PRODUCT = 'new_product';
    const STATUS_BANNER_BEST_SALE = 'best_sale';

    protected $fillable = [
        'title',
        'image',
        'type_status',
        'links',
        'description',
        'is_active'
    ];

    protected $cats = [
        'is_active' => 'boolean',
    ];
}
