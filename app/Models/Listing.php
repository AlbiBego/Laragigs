<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory, Notifiable;

    //this is the safe way to allow for mass assignment
    protected $fillable = ['title', 'logo', 'company', 'email', 'website', 'tags', 'location', 'description'];
    //there is another way: to add to the AppServiceProvider.php file, in the boot method, Model::unguard()
    //but this way is not very safe in terms of security, and you will have to know what goes into your database more carefully

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

        return $query; //for clarity, because even without returning it, it will still work, becuase query is passed as reference and you modify it directly by reference
    }
}
