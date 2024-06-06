<?php


namespace App\Repositories;

use App\Models\Log;
use App\Repositories\ModelRepository;

class LogRepository extends ModelRepository
{
      public function __construct(Log $log)
      {
            parent::__construct($log);
      }
}
