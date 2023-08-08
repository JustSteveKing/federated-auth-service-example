<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Scope extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function identities(): BelongsToMany
    {
        return $this->belongsToMany(
            related: UserIdentity::class,
            table: 'identity_scope',
        )->using(
            class: IdentityScope::class,
        )->withTimestamps();
    }
}
