<?php namespace App\Models\Sample;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sample extends Model
{
    use Accessor,
        Mutator,
        Method,
        Scope,
        SoftDeletes;

    protected $table = '';
    protected $fillable = [
        //
    ];
}
