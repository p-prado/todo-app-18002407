<?php

namespace App\Models;

use CodeIgniter\Model;

class Task extends Model
{
    protected $table            = 'tasks';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['title', 'description', 'status_id'];

    // Validation
    protected $validationRules      = [
        'id'    => 'permit_empty|is_natural_no_zero',
        'title' => 'required|alpha_numeric_punct|max_length[100]',
        'description' => 'required',
        'status_id' => 'permit_empty|is_natural_no_zero'
    ];
    protected $validationMessages   = [
        'id' => [
            'is_natural_no_zero'=> 'Invalid ID.',
        ],
        'title' => [
            'required' => 'Title is required.',
            'alpha_numeric_punct' => 'Use only allowed characters.',
            'max_length' => 'Title must be under 100 characters.'
        ],
        'description' => [
            'required' => 'Description is required.'
        ],
        'status' => [
            'is_natural_no_zero' => 'Invalid Status ID',
        ]
    ];
}
