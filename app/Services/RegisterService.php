<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;
use App\Repositories\UserRepository;

class RegisterService
{
      public function __construct(protected UserRepository $userRepository)
      {
      }
      public function create_user($data)
      {
            return $this->userRepository->create($data);
      }
      public function register($guard, $data)
      {
            $user = $this->create_user($data);
            return auth($guard)->login($user);
      }
}
