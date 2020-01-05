<?php namespace App\Models;

use App\Services\Helpers\SlugHandler;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $fillable = [
        'persian_name','english_name','persian_slug','english_slug','store_id',
        'user_id','category_id','brand_id','sku','description',
        'confirmation_status','in_stock','warranty_name',
        'warranty_text','current_price','view_count','comment_count'
    ];

    public function setPersianNameAttribute($value): void
    {
        $this->attributes['persian_name'] = str_replace('ي', 'ی', $value);
        $this->setPersianSlugAttribute($value);
    }

    public function setEnglishNameAttribute($value): void
    {
        $this->attributes['english_name'] = $value;
        $this->setEnglishSlugAttribute($value);
    }

    public function setPersianSlugAttribute($value): void
    {
        $this->attributes['persian_slug'] = (new SlugHandler())->slugify($value);
    }

    public function setEnglishSlugAttribute($value): void
    {
        $this->attributes['english_slug'] = (new SlugHandler())->slugify($value);
    }
}
