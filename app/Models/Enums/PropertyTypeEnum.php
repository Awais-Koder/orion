<?php

namespace App\Models\Enums;

use ArchTech\Enums\Values;

enum PropertyTypeEnum: string
{
    use Values;

    case Choice = 'choice';
    case Option = 'option';
    case Slider = 'slider';
    case Number = 'number';
    case Text = 'text';

}
