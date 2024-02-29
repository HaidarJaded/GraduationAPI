<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'status',
        'date',
        'client_id',
        'user_id',
    ];
    protected $relations = [
        'client',
        'user',
        'services',
        'products',
    ];

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'service_orders');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_orders');
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
