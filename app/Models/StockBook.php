<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockBook extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'stock_book_id');
    }public function rentals()
    {
        return $this->hasMany(Rental::class, 'stock_book_id');
    }
    protected $primaryKey = 'stock_book_id';
    protected $fillable = [
        'id',
        'title' => 'nullable',
        'author' => 'nullable',
        'isbn' => 'nullable',
        'image' => 'nullable',
    ];
}