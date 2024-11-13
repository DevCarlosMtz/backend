<?php

namespace App\Helpers;

use App\Enums\TiposImagenesEnum;
use App\Models\Imagen;
use App\Models\Observacion;
use App\Models\OrdenTrabajo;
use App\Models\TipoImagen;
use App\Traits\Log;
use App\Services\ImagenesService;
use Illuminate\Support\Facades\File;

class ImagenesHelper
{
    use Log;

    /**
     * Sirve para guardar muchas imagenes en un solo proceso
     *
     * @param string $disk
     * @param array $imagenes
     * @return \Illuminate\Support\Collection<object> $imagenes
     * @author Ing. Benjamin Olvera Rosales
     */
    public static function guardadoMasivo(string $disk, array $imagenes)
    {
        $self = new Self();
        $self->logInitMethod();

        $imagenesGuardadas = collect();
        foreach ($imagenes as $imagen) {
            $nombreImagen = $imagen->getClientOriginalName();
            $imagen = File::get($imagen);
            $nombreFinalImagen = ImagenesService::guardar($disk, $imagen, $nombreImagen);

            $imagenesGuardadas->push((object) [
                'nombre' => $nombreFinalImagen,
            ]);
        }

        $self->logEndMethod();
        return $imagenesGuardadas;
    }
    public static function mostrarGaleria(string $ot, string $tipoImagen)
    {
        $ordenTrabajo = OrdenTrabajo::query()
            ->where('ot', $ot)
            ->first();

        $imagen = TiposImagenesEnum::getConstantValueByName($tipoImagen);
        $galeria = Imagen::query()
            ->where('id_orden_trabajo', $ordenTrabajo->id)
            ->where('id_tipo_imagen', $imagen)
            ->orderBy('id', 'DESC')
            ->get();
        return $galeria;
    }

    public static function mostrarObservaciones(string $ot, string $tipoObservacion)
    {
        $ordenTrabajo = OrdenTrabajo::query()
            ->where('ot', $ot)
            ->first();

        $observaciones = Observacion::query()
            ->where('id_orden_trabajo', $ordenTrabajo->id)
            ->where('tipo', TiposImagenesEnum::getConstantValueByName($tipoObservacion))
            ->orderBy('id', 'DESC')
            ->with([
                'usuario'
            ])
            ->get();
        return $observaciones;
    }
}
