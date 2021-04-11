<?php

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Session\DatabaseSessionHandler as BaseDatabaseSessionHandler;

class DatabaseSessionHandler extends BaseDatabaseSessionHandler
{

  /**
   * Get the currently authenticated user's type.
   *
   * @return mixed
   */
  // protected function userType()
  // {
  //   $user = $this->container->make(Guard::class)->user();
  //   return optional($user)->getMorphClass();
  // }

  /**
   * Add the user information to the session payload.
   *
   * @param array $payload
   * @return $this
   */
  protected function addUserInformation(&$payload)
  {
    if ($this->container->bound(Guard::class)) {
      $payload['account_id'] = $this->userId();
    }

    return $this;
  }
}
