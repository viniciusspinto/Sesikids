<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Spatie\Permission\Contracts\Role;

use App\Http\Controllers\FeedbackController;

Route::get('/erro401', function () {
    abort(401);
});

Route::get('/erro503', function () {
    abort(503);
});

Route::get('/erro429', function () {
    abort(429);
});

Route::get('/erro404', function () {
    abort(404);
});

Route::get('/erro500', function () {
    abort(500);
});

//login

Route::get('/professor', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/create-user-login', [LoginController::class, 'create'])->name('login.create-user');
Route::post('/storage-create', [LoginController::class, 'store'])->name('login.storage');

//logout
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login')->with('success', 'Logout realizado com sucesso!');
})->name('logout');

Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/menu-jogos', [UserController::class, 'menuJogos'])->name('user.menuJogos');
Route::get('/jogosBio-user', [UserController::class, 'jogosBio'])->name('user.jogosBio');
Route::get('/anfibios', [UserController::class, 'anfibios'])->name('user.anfibios');
Route::get('/repteis', [UserController::class, 'repteis'])->name('user.repteis');
Route::get('/mamiferos', [UserController::class, 'mamiferos'])->name('user.mamiferos');
Route::get('/artropodes', [UserController::class, 'artropodes'])->name('user.artropodes');




Route::group(['middleware' => 'auth'], function () {

    Route::get('/painel', [UserController::class, 'painel'])->name('dashboard.index');

    //perfis
    Route::get('/index-role', [RoleController::class, 'index'])->name('role.index')->middleware('permission:index-role');
    Route::get('/create-role', [RoleController::class, 'create'])->name('role.create')->middleware('permission:create-role');
    Route::post('/store-role', [RoleController::class, 'store'])->name('role.store')->middleware('permission:create-role');
    Route::get('/edit-role/{role}', [RoleController::class, 'edit'])->name('role.edit')->middleware('permission:edit-role');
    Route::put('/update-role/{role}', [RoleController::class, 'update'])->name('role.update')->middleware('permission:edit-role');
    Route::delete('/destroy-role/{role}', [RoleController::class, 'destroy'])->name('role.destroy')->middleware('permission:destroy-role');

    
    // rota para exibir as permissões do papel
    Route::get('role-permission/{role}', [RolePermissionController::class, 'index'])->name('role-permission.index');

    Route::get('/update-role-permission/{role}/{permission}', [RolePermissionController::class, 'update'])->name('role-permission.update')->middleware('permission:role-permission');


    Route::get('/cadastrados-user', [UserController::class, 'usuarioCadastrado'])->name('user.usuarioCadastrado')->middleware('permission:cadastrados-user');

    // esta rota é para mostrar o usuário
    Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show')->middleware('permission:show-user');

    // esta rota é para editar o usuário
    Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware('permission:edit-user');

    // esta rota é para atualizar o usuário
    Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update')->middleware('permission:edit-user');

    //rota para deletar o usuário
    Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('permission:destroy-user');

    Route::get('/generate-pdf-user', [UserController::class, 'generatePDF'])->name('user.generate-pdf');

    Route::get('/generate-pdf-comentario', [UserController::class, 'comentarioPDF'])->name('user.comentario-pdf');


});

// Dashboard

Route::middleware(['auth'])->group(function () {
    // formulário para criar feedback
    Route::get('/painel', [FeedbackController::class, 'index'])->name('feedback.dashboard');

    // salvar feedback
    Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

    // página de comentários (usuários autenticados que acessam o painel podem ver)
    Route::get('/dashboard/comentarios', [FeedbackController::class, 'comentarios'])->name('dashboard.comentarios');

    // gerar PDF com formatação específica
    Route::get('/feedback/pdf', [FeedbackController::class, 'pdfGerar'])->name('comentario-pdfgerar');
});

