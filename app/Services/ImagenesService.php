<?php

namespace App\Services;

use Illuminate\Support\Str;
use App\Enums\HttpStatusEnum;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImagenesService extends Service
{
    /**
     * Construct
     *
     * @return void
     */
    public function _construct()
    {
        //
    }

    /**
     * Guardar imagen
     *
     * @param string $disk
     * @param string $fileContent
     * @param string $originalFileName
     * @return string $fileName
     */
    public static function guardar(string $disk, string $fileContent, string $originalFileName)
    {
        try {
            $extension        = pathinfo($originalFileName, PATHINFO_EXTENSION);
            $originalFileName = Str::replace(".{$extension}", '', $originalFileName);
            $now              = now()->format('YmdHis');
            $uuid             = Str::uuid();
            $appShortName     = config('app.short_name');
            $fileName         = Str::slug("{$now}_{$uuid}_{$appShortName}_{$originalFileName}", '_') . '.' . $extension;

            //Cambiar tamaño de imagen
            $imageIntervention = Image::make($fileContent)
                ->resize(null, 600, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });

            //Cambiar calidad de imagen
            $imageIntervention->encode($extension, 70);

            //Obtener contenido de imagen
            $fileContent = $imageIntervention->stream()->__toString();

            //Guardar imagen
            $guardar = Storage::disk($disk)->put($fileName, $fileContent);

            if (!$guardar) abort(HttpStatusEnum::INTERNAL_SERVER_ERROR, 'Error al guardar la imagen');
        } catch (\Throwable $th) {
            error_('Error al guardar la imagen', [
                'disk'     => $disk,
                'fileName' => $fileName,
                'error'    => $th->getMessage()
            ]);

            throw $th;
        }

        return $fileName;
    }
}
