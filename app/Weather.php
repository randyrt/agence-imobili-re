<?php

namespace App;

use Illuminate\Support\Facades\App;

class Weather
{

  public function __construct(public string $apiKey)
  {

  }

  public function isSunnyTomorow(): bool
  {
    return true;
  }
}