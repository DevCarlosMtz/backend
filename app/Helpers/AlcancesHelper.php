<?php

namespace App\Helpers;

use App\Services\AlcanceService;
use App\Traits\Log;
use App\Services\ImagenesService;
use Illuminate\Support\Facades\File;

class AlcancesHelper
{
    use Log;
    /**
     * Sirve para guardar muchas alcances en un solo proceso
     *
     * @param array $alcances
     * @return \Illuminate\Support\Collection<object> $alcances
     */
    public static function guardadoMasivo(array $alcances)
    {
        $self = new Self();
        $self->logInitMethod();

        $alcancesGuardados = collect();

        foreach ($alcances as $alcance) {
            $alcance = $alcance;

            $alcancesGuardados->push((object) [
                'nombre' => $alcance,
            ]);
        }

        $self->logEndMethod();
        return $alcancesGuardados;
    }
}
