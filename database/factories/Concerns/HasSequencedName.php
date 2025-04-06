<?php

namespace Database\Factories\Concerns;

use Illuminate\Database\Eloquent\Factories\Sequence;

trait HasSequencedName
{
    public function sequencedName(): static
    {
        return $this->sequence(fn(Sequence $sequence) => [
            'name' => str($this->modelName())->afterLast('\\') . ' ' . ($sequence->index + 1),
        ])
            ->when(array_key_exists('sequence', $this->definition()), fn(self $factory) => $factory->sequence(fn(Sequence $sequence) => [
                'sequence' => $sequence->index + 1,
            ]));
    }
}
