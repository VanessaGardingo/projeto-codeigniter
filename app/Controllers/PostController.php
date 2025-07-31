<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class PostController extends ResourceController
{
    // Define o model que este controller vai usar
    protected $modelName = 'App\Models\PostModel';
    // Define que o formato padrão de resposta será JSON
    protected $format    = 'json';

    // GET /v1/posts: Listar todos os posts
    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // GET /v1/posts/1: Exibir um post
    public function show($id = null)
    {
        $post = $this->model->find($id);
        if ($post) {
            return $this->respond($post);
        }
        return $this->failNotFound('Post não encontrado com o ID ' . $id);
    }

    // POST /v1/posts: Criar um novo post
    public function create()
    {
        $data = $this->request->getJSON(true);
        $id = $this->model->insert($data);

        if ($this->model->errors()) {
            return $this->fail($this->model->errors());
        }

        $response = [
            'status'   => 201,
            'messages' => ['success' => 'Post criado com sucesso.'],
            'post_id' => $id
        ];
        return $this->respondCreated($response);
    }

    // PUT /v1/posts/1: Atualizar um post
    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        $this->model->update($id, $data);
        $response = [
            'status'   => 200,
            'messages' => ['success' => 'Post atualizado com sucesso.']
        ];
        return $this->respond($response);
    }

    // DELETE /v1/posts/1: Deletar um post
    public function delete($id = null)
    {
        if ($this->model->find($id)) {
            $this->model->delete($id);
            return $this->respondDeleted(['message' => 'Post deletado com sucesso.']);
        }
        return $this->failNotFound('Post não encontrado com o ID ' . $id);
    }
}