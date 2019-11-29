<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');

route::post('/login', 'AuthController@login')->name('fazer.login');

                                          //Sistema de mudança de senha.

//Rota de renderização de view de envio de código.
route::get('/esqueci_senha', 'AuthController@esqueciSenha')->name('esqueci.senha');

//Rota de renderização de envio de código.
route::post('/envioCodigo', 'AuthController@enviarCodigo')->name('enviar.codigo');

//Rota de envio de e-mail.
route::get('/enviarEmail/{email}/{code}/{name}', 'AuthController@enviarEmail');

//Rota de renderização de view de troca de senha.
route::get('/trocar_senha' , 'AuthController@trocarSenha')->name('trocar.senha');

//Rota de recebimento de senha e atualização.
route::post('/atualizar_senha', 'AuthController@atualizarSenha')->name('atualizar.senha');





//Rotas de renderização de views com erros.

//Rota de renderização de view de envio de código com erro.
route::get('/esqueci_senha_erro', 'AuthController@esqueciSenhaErro')->name('esqueci.senhaerro');

//Rota de renderização de view de troca de senha com erro.
route::get('/trocar_senha_erro' , 'AuthController@trocarSenhaErro')->name('trocar.senhaErro');

//Rota de senha alterada com sucesso e login.
route::get('/login', function (){
    return view('reset_senha.loginSucesso');
});




                                          //Sistema de autenticação.

//Middleware após autenticado.
Route::group(['middleware' => ['auth']], function() {

    Route::get('/logout', function(){

        Auth::logout();

        return redirect('/');
    })->name('logout');

    //Rota do dashboard após logado.
    Route::get('/dashboard', 'AuthController@dashboard')->name('dashboard');
});



