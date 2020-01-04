<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'persian_name','english_name','store_id',
        'category_id','brand_id','sku','description',
        'confirmation_status','in_stock','warranty_name',
        'warranty_text','current_price','view_count','comment_count'
    ];
}
