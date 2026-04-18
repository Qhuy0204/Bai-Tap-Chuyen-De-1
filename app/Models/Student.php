<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
<<<<<<< HEAD
    protected $fillable = ['name', 'major', 'email'];

public function enrollments() {
    return $this->hasMany(Enrollment::class);
}
=======
    protected $fillable = [
        'name',
        'major'
    ];
>>>>>>> a82435391ceea19b1bb587b982fffff116369fd6
}
