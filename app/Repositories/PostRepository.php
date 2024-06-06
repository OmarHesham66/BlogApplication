<?php


namespace App\Repositories;

use App\Models\Post;
use App\Repositories\ModelRepository;

class PostRepository extends ModelRepository
{
      public function __construct(Post $post)
      {
            parent::__construct($post);
      }
}
