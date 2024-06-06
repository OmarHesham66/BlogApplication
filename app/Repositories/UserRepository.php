<?php


namespace App\Repositories;

use App\Models\User;
use App\Repositories\ModelRepository;

class UserRepository extends ModelRepository
{
      public function __construct(User $user)
      {
            parent::__construct($user);
      }
}
