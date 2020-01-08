<?php namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Accessor,
        Mutator,
        Method,
        Scope,
        SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'persian_name','english_name','persian_slug','english_slug','store_id',
        'user_id','category_id','brand_id','sku','description',
        'confirmation_status','in_stock','warranty_name',
        'warranty_text','current_price','view_count','comment_count'
    ];
}
