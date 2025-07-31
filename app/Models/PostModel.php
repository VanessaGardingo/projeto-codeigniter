<?php

namespace App\Models;

use CodeIgniter\Model;

class PostModel extends Model
{
    // A tabela que este model representa
    protected $table            = 'posts';

    // A chave primária da tabela
    protected $primaryKey       = 'id';

    // Campos que são permitidos para inserção e atualização (medida de segurança)
    protected $allowedFields    = ['title', 'content'];

    // Habilita o uso dos timestamps 'created_at'
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // Não usamos a coluna 'updated_at'
}