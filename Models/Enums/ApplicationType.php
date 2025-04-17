<?php

namespace App\Models\Enums;

use ArchTech\Enums\Values;

enum ApplicationType: string
{
    use Values;

    case Included = 'included';
    case Excluded = 'excluded';

}
