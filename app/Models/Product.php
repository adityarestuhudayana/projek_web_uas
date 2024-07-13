<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopeFilters($query, array $filters)
    {
        if ($filters) {
            $query->when($filters['category'] ?? false, function ($query, $category) {
                $c = Category::query()->firstWhere('category_name', $category);
                $query->where('category_id', $c->id)->get();
            });
            $query->when($filters['search'] ?? false, function ($query, $search) {
                $query->where('product_name', 'like', '%'. $search .'%');
            });
        }
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
