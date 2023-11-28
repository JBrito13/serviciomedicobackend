<?php

namespace App\Http\Controllers;

use App\Http\Resources\UsuarioCollection;
use App\Http\Resources\UsuarioResource;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Illuminate\Http\Request;

use function Laravel\Prompts\password;

class UsuarioController extends Controller
{
    public function index(Request $request) {

        $username = $request->username;
        $password = $request->password;

        if ($username) {

            $usuarios = new UsuarioCollection(Usuario::all()->where('username', $username));

            $usuarios = $usuarios->first();

            if (!$usuarios) {
                return response()->json('No se encontró el usuario.', 404);
            }

            if ($password) {

                    if (Hash::check($password, $usuarios->password_hash)) {

                        return response()->json($usuarios, 200);

                    } else {
                        return response()->json('Contraseña incorrecta.', 404);
                    }
            }

            return response()->json($usuarios, 200);

        }

        $usuarios = new UsuarioCollection(Usuario::all());

        return response()->json($usuarios, 200);

    }

    public function show($id_usuario) {

        $usuario = new UsuarioResource(Usuario::where('id_usuario', $id_usuario)->first());

        if ($usuario->resource !== null) {
            return response()->json($usuario, 200);
        } else {
            return response()->json([
                'message' => 'Ocurrió un error al obtener el usuario.',
            ], 404);
        }

    }

    public function store(Request $request) {

        $newUsuario = new Usuario();

        $newUsuario->nombre = $request->nombre;
        $newUsuario->username = $request->username;
        $newUsuario->password_hash = Hash::make($request->password);
        $newUsuario->estado_usuario = 'A';
        $newUsuario->id_rol = $request->id_rol;

        $newUsuario->save();

        $usuario = new UsuarioResource(Usuario::find($newUsuario->id_usuario));

        return response()->json($usuario, 200);

    }

    public function update(Request $request, $id_usuario) {

        $usuario = Usuario::find($id_usuario);

        if ($usuario) {

            $usuario->nombre = $request->nombre;
            $usuario->username = $request->username;
            $usuario->password_hash = Hash::make($request->password_hash);
            $usuario->estado_usuario = $request->estado_usuario;
            $usuario->id_rol = $request->id_rol;

            $usuario->save();

            return response()->json($usuario, 200);

        } else {
            return response()->json('No se encontró el usuario', 404);
        }

    }
}
