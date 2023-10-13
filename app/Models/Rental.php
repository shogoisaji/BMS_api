<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'id',
        'stock_book_id',
        'user_id',
        'rental_date',
        'return_date',
        'returned_date',
    ];

    // StockBook relationship
    public function stockBook()
    {
        return $this->belongsTo(StockBook::class,'stock_book_id');
    }
}