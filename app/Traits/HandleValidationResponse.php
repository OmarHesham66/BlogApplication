<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;

trait HandleValidationResponse
{
      public function failedValidation(Validator $validator)
      {
            if ($this->expectsJson()) {
                  $errors = $validator->errors();
                  return response()->json([
                        'errors' => $errors->toArray(),
                        'code' => 404,
                        'message' => 'Validation Error'
                  ]);
            } else {
                  $exception = $validator->getException();
                  throw (new $exception($validator))
                        ->errorBag($this->errorBag)
                        ->redirectTo($this->getRedirectUrl());
            }
      }
}
