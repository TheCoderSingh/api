<?php

namespace Alunos\Guardians\Enums;

use BenSampo\Enum\Enum;

final class RelationType extends Enum
{
    const PARENT = 1;
    const GRANDPARENT = 2;
    const SIBLING = 3;
    const LEGAL_GUARDIAN = 4;
    const OTHER = 5;
}
