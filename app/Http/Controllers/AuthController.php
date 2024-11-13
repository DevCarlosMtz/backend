<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Enums\HttpStatusEnum;
use App\Helpers\ResponseHelper;
use App\Services\ImagenesService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Auth as RulesRequest;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    /**
     * Remember me var
     *
     * @var bool
     */
    private $rememberMe = false;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(RulesRequest\Login $request)
    {
        $user = Usuarios::query()
            ->where('email', $request->email)
            ->first();

        if (!$user) {
            throw ValidationException::withMessages([
                'email' => [
                    'No se encontró al usuario.'
                ]
            ]);
        }

        if (!password_verify($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => [
                    'La contraseña es incorrecta.'
                ]
            ]);
        }
        if (!$user->email_verified_at) {
            throw ValidationException::withMessages([
                'email' => [
                    'El correo electrónico no ha sido verificado.'
                ]
            ]);
        }
        if ($user->activo == false) {
            throw ValidationException::withMessages([
                'email' => [
                    'El usuario se encuentra bloqueado por el administrador del sistema.'
                ]
            ]);
        }
        $this->rememberMe = $request->input('rememberMe') ? $request->rememberMe : $this->rememberMe;
        $token = Auth::login($user, $this->rememberMe);

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $userId = auth()->id();
        $user = Usuarios::query()
            ->where('id', $userId)
            ->with([
                'empresa',
                'perfil'
            ])
            ->first();

        return response()->json($user);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        return ResponseHelper::json(null);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        $expiresIn = auth()->factory()->getTTL() * 60;
        if ($this->rememberMe == true) {
            $expiresIn = auth()->factory()->getTTL() * 9999999;
        }

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => $expiresIn
        ]);
    }

    /**
     * Actualizar perfil
     *
     * @param \App\Http\Requests\Auth\ActualizarPerfil $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function actualizarPerfil(RulesRequest\ActualizarPerfil $request)
    {
        DB::beginTransaction();
        try {
            $usuario = Usuarios::query()
                ->where("id", "=", auth()->user()->id)
                ->first();

            if (!$usuario) {
                abort(HttpStatusEnum::NOT_FOUND, "El usuario recibido no existe");
            }

            $usuarioConCorreoIgual = Usuarios::query()
                ->where('id', '!=', $usuario->id)
                ->where('email', '=', $request->email)
                ->first();

            if ($usuarioConCorreoIgual) {
                abort(HttpStatusEnum::CONFLICT, "El correo ingresado ya se encuentra registrado");
            }

            if ($request->file('foto')) {
                $foto = File::get($request->foto);
                $guardarFoto = ImagenesService::guardar('usuarios', $foto, $request->file('foto')->getClientOriginalName());
                if ($usuario->foto) {
                    Storage::disk('usuarios')->delete($usuario->foto);
                }

                $usuario->update([
                    'foto' => $guardarFoto
                ]);
            }

            if ($request->password) {
                $usuario->update([
                    'password' => bcrypt($request->password)
                ]);
            }

            $usuario->update([
                'nombre' => $request->nombre,
                'ap_pat' => $request->ap_pat,
                'ap_mat' => $request->ap_mat,
                'email'  => $request->email
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }

        return ResponseHelper::json($usuario, "Perfil actualizado correctamente");
    }
}
