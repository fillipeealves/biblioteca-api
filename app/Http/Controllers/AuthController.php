<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    public function register(Request $req) {
        $data = $req->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|min:6|confirmed'
        ]);
        $user = User::create(['name'=>$data['name'],'email'=>$data['email'],'password'=>Hash::make($data['password'])]);
        $token = auth('api')->login($user);
        return response()->json(['user'=>$user,'token'=>$token]);
    }

    public function login(Request $req) {
        $credentials = $req->only(['email','password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error'=>'Credenciais inválidas'],401);
        }
        return response()->json(['token'=>$token,'user'=>auth('api')->user()]);
    }

    public function me() { return response()->json(auth('api')->user()); }

    public function logout() { auth('api')->logout(); return response()->json(['message'=>'Deslogado']); }
}
