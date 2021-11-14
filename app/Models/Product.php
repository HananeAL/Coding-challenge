<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mehradsadeghi\FilterQueryString\FilterQueryString;

class Product extends Model
{
    use FilterQueryString;
    use HasFactory;

    protected $filters = ['sort'];

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        // 'pivot',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
