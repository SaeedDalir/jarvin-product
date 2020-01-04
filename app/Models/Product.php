<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'persian_name','english_name','store_id',
        'user_id','category_id','brand_id','sku','description',
        'confirmation_status','in_stock','warranty_name',
        'warranty_text','current_price','view_count','comment_count'
    ];

    public function setPersianNameAttribute($value): void
    {
        $this->attributes['persian_name'] = str_replace('ي', 'ی', $value);
    }
}
