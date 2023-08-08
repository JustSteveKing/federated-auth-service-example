<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserIdentity extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'provider_unique_id',
        'token',
        'user_id',
        'identity_provider_id',
    ];

    protected $casts = [
        'token' => 'encrypted',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(
            related: User::class,
            foreignKey: 'user_id',
        );
    }

    public function provider(): BelongsTo
    {
        return $this->belongsTo(
            related: IdentityProvider::class,
            foreignKey: 'identity_provider_id',
        );
    }

    public function scopes(): BelongsToMany
    {
        return $this->belongsToMany(
            related: Scope::class,
            table: 'identity_scope',
        )->using(
            class: IdentityScope::class,
        )->withTimestamps();
    }

    public function tokens(): HasMany
    {
        return $this->hasMany(
            related: AccessToken::class,
            foreignKey: 'user_identity_id',
        );
    }
}
