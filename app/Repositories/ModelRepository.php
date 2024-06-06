<?php

namespace App\Repositories;

use App\Repositories\IRepository;
use Illuminate\Database\Eloquent\Model;

abstract class ModelRepository implements IRepository
{
      protected $model;

      public function __construct(Model $model)
      {
            $this->model = $model;
      }

      public function all($relations = null, $columns = ['*'])
      {
            if ($relations) {
                  return $this->model->with($relations)->get($columns);
            } else {
                  return $this->model->get($columns);
            }
      }

      public function find($id)
      {
            return $this->handleResponse($this->model->find($id));
      }
      public function myModel()
      {
            return $this->model;
      }
      public function create($data)
      {
            return $this->handleResponse($this->model->create($data));
      }
      public function update($id, $data)
      {
            return $this->handleResponse($this->model->where('id', $id)->update($data));
      }
      public function delete($id)
      {
            return $this->handleResponse($this->model->where('id', $id)->delete());
      }
      public function handleResponse($operation)
      {
            try {
                  return $operation;
            } catch (\Throwable $th) {
                  return response()->json([
                        'code' => $th->getCode(),
                        'message' => 'Invalid Operation',
                        'data' => $th->getMessage(),
                  ], $th->getCode());
            }
      }
}
