<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class OrderScholarship extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'country_id', 'university_id', 'college_id', 'degree_id', 'university_order', 'specialist_id', 'attachment', 'created_by', 'created_at',
    ];

    protected $table = 'order_scholarships';
}
