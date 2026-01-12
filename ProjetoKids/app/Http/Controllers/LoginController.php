<?php

namespace App\Http\Controllers;


use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function loginProcess(LoginRequest $request)
    {
        $request->validated();

        $autenticated = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if (!$autenticated) {
            return back()->withInput()->with('error', 'Email ou senha inválidos');
        }

        $user = Auth::user();
        $user = User::find($user->id);

        if($user->hasRole('admin')){
            $permissions = Permission::pluck('name')->toArray();
        }else{
            $permissions = $user->getAllPermissions()->pluck('name')->toArray();
        }
        $user->syncPermissions($permissions);

        return redirect()->route('dashboard.index')->with('success', 'Login realizado com sucesso!')->with('user', $user);
        
    }

    public function create(){
        $roles = Role::pluck('name')->all();
        return view("login.create-user", ['menu'=>'users','roles'=>$roles]);
    }

    public function store(Request $request){ 
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // Validação para confirmar senha
        ]);

        $imageName = null;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $requestImage = $request->file('image');

        $extension = $requestImage->extension();

        $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

        $requestImage->move(public_path('IMG/'), $imageName);
        }
    
        // Criação do usuário
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'image' => $imageName,
        ]);

        $user->assignRole('professor'); // Atribuindo a role 'admin' ao usuário

        return redirect()->route('login')->with("success", "Usuario cadastrado");
    }
}
