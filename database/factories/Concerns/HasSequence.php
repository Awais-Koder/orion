<?php

namespace Database\Factories\Concerns;

use Illuminate\Database\Eloquent\Factories\Sequence;

trait HasSequence
{
    public function inSequence(): self
    {
        return $this->sequence(fn(Sequence $sequence) => [
            'sequence' => $sequence->index + 1,
        ]);
    }

    public function inReverseSequence(): self
    {
        return $this->sequence(fn(Sequence $sequence) => [
            'sequence' => 100_000 - $sequence->index,
        ]);
    }
}
