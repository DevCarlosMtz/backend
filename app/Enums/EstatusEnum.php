<?php

namespace App\Enums;
use App\Traits\Enums\ConstantsAccess;

class EstatusEnum
{
    use ConstantsAccess;

    const INICIADO = 1;
    const REVISION = 2;
    const PROCESO = 3;
    const FINALIZADO = 4;
    const ENTREGADO = 5;

}
