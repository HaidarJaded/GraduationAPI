<?php

namespace App\Models;

use App\Enums\RuleNames;
use App\Traits\FirebaseNotifiable;
use App\Traits\PermissionCheckTrait;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Client extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,FirebaseNotifiable,PermissionCheckTrait;

    protected $fillable = [
        'name',
        'last_name',
        'rule_id',
        'center_name',
        'phone',
        'devices_count',
        'email',
        'password',
        'address',
        'national_id',
        'remember_token',
        'account_active',
    ];

    protected $relations = [
        'completed_devices',
        'devices',
        'permissions',
        'orders',
        'rule',
        'customers',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    protected static function boot(): void
    {
        parent::boot();
        static::creating(static function ($client) {
            $client_rule_id=Rule::where('name',RuleNames::Client)->first()->id;
            $client->rule_id = $client_rule_id;
        });
    }

    public function devices(): HasMany
    {
        return $this->hasMany(Device::class);
    }

    public function completed_devices(): HasMany
    {
        return $this->hasMany(CompletedDevice::class);
    }

    public function permissions(): BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'permission_clients');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function rule(): BelongsTo
    {
        return $this->belongsTo(Rule::class);
    }

    /**
     * Get the customers for the client.
     */
    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return  array<string, string>|string
     */
    public function routeNotificationForMail(Notification $notification): array|string
    {
        return $this->email;
    }
}
