<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'issue_type',
        'subject',
        'description',
        'key',
        'assignee',
        'status',
        'priority',
        'due_date',
        'registed_by'
        
    ];

}
