<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    
    protected $table            = 'posts';

    protected $primaryKey       = 'id';

    protected $allowedFields    = ['title', 'content'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = '';
}