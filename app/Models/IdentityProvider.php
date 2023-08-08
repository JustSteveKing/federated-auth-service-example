<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

final class IdentityProvider extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function identities(): HasMany
    {
        return $this->hasMany(
            related: UserIdentity::class,
            foreignKey: 'identity_provider_id',
        );
    }
}
