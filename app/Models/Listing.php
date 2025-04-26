<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory, Notifiable;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . $filters['tag'] . '%');
        }

        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('description', 'like', '%' . $filters['search'] . '%')
                ->orWhere('tags', 'like', '%' . $filters['search'] . '%')
                ->orWhere('location', 'like', '%' . $filters['search'] . '%')
                ->orWhere('company', 'like', '%' . $filters['search'] . '%');
        }

        return $query; //for clarity, because even without returning it, it will still work, becuase you query is passed as reference and you modify it directly by reference
    }
}
