<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Access');
    }

    public function register(Request $request)
    {
        //nama key untuk api
        $username = $request->input('username');
        $is_admin = $request->input('is_admin');
        $password = $request->input('password');

        $register = User::create([
            //yang tadi dimasukkan ke file User.php
            'username' => $username,
            'password' => $password,
            'is_admin' => $is_admin
        ]);

        if($register){
            return response()->json([
                'success' => true,
                'message' => 'User Berhasil Dibuat',
                'data' => $register
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'gagal Membuat User',
                'data' => ''
            ]);
        }
    }

    public function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        $user = User::where('username', $username)->first();

        // $validasi = $request->validate([
        //     $password => $user->password
        // ]);
        if($user && Hash::check($password, $user->password)){
        // if($user->password == $password){
            $api_token = Str::random(32);

            $user->update([
                'api_token' => $api_token
            ]);

            return response()->json([
                'success' => true,
                'message' => 'berhasil login',
                'data' => $user,
                // 'test'=> $user->value('id')
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'password Atau username salah',
                'data' => $password
            ]);
        }
        // }} else {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'username salah',
        //         'data' => ''
        //     ]);
        // }

        // return DB::table('username')->where('name', 'luthfi')->first();

        // return User::pluck('password', 'username');



    }

    public function delete($username){
        $user = User::where('username', $username)->first();

        if($user){
            $user->delete();

            return response()->json([
                'success' => true,
                'message' => 'berhasil menghapus'
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'gagal menghapus'
            ]);
        }

   }

   public function getUser(){
        $users = User::get();

        if($users){
            return response()->json([
                'success' => true,
                'message' => 'data found',
                'users' => $users
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'data not found'
            ]);
        };
   }

   public function TEST(){
    echo 'testing';
    }
}
