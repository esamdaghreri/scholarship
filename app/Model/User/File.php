<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = "files";

    protected $fillable = [
        'title', 'path', 'register_scholarship_id', 'cancel_scholarship_id', 'extend_scholarship_id', 'change_supervisor_scholarship_id', 'language_scholarship_id', 'change_fellowship_scholarship_id', 'user_id', 'created_by', 'created_at',
    ];
}
