<?php

namespace App\Models;

use CodeIgniter\Model;

class Status extends Model
{
    protected $table            = 'type';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name'];

    // Validation
    protected $validationRules      = [
        'id'    => 'permit_empty|is_natural_no_zero',
        'name' => 'required|alpha|max_length[20]',
    ];
    protected $validationMessages   = [
        'id' => [
            'is_natural_no_zero'=> 'Invalid ID.',
        ],
        'name' => [
            'required' => 'Name is required.',
            'alpha' => 'Use only allowed characters.',
            'max_length' => 'Name must be under 20 characters.'
        ]
    ];
}
