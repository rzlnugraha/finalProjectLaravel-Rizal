<?php


namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    public function users()
    {
        return $this->BelongsToMany(User::class);
    }
}
