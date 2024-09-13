<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Civilite extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['libelle'];
    
    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }
}
