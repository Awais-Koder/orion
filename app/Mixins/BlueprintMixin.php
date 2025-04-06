<?php

namespace App\Mixins;

use Illuminate\Database\Schema\Blueprint;

class BlueprintMixin
{
    public function translatable(): \Closure
    {
        return function (string $name) {
            return $this->json($name);
        };
    }
}
