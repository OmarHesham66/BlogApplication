<?php

namespace App\Repositories;

interface IRepository
{
      public function all($relations = null, $columns = ['*']);
      public function myModel();
      public function find($id);
      public function create($data);
      public function update($id, $data);
      public function delete($id);
}
