<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Account;

class AccountService
{
  protected $accountAccess;

  public function __construct()
  {
    // DI if you need.
    $this->accountAccess = new Account();
    // $this->account_model = "App\Models\Account";
  }

  public function getList()
  {
    return $this->accountAccess->all();
    // return call_user_func("{$this->account_model}::all");
  }

  public function register()
  {
    // more complicated logic that shouldn't exist view logic.
    if (true) {
    } else {
    }
  }
}
