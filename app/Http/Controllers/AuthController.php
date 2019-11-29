<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        //Validação de login.
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        //Capturando credenciais de entrada.
        $credenciais = $request->only('email', 'password');

        //Processo de autenticação:
        if (Auth::attempt($credenciais)){
            return redirect()->intended('/dashboard');
        }else{
            return redirect()->back()->with('msg', 'Acesso negado. Verifique seu e-mail ou senha.');
        }
    }

    public function dashboard()
    {
        return view('auth.dashboard');
    }

    //Método da view de troca de senha.
    public function esqueciSenha()
    {
        return view('reset_senha.resetar_senha');
    }

    //Método da view de troca de senha com erro.
    public function esqueciSenhaErro()
    {
        return view('reset_senha.resetarSenhaErro');
    }

    public function enviarCodigo(Request $req)
    {
        //recuperando os dados do usuário por meio do e-mail recebido.
        $dados = DB::table('users')->where('users.email', '=', $req->emailUsuario)->get()->first();

        //Verificando se o e-mail existe na base de dados.
        if($dados == ''){
            return redirect('/esqueci_senha_erro');
        }

        //Dados que serão passados pela url para o envio de e-mail.
        $emailUsuario = $dados->email;
        $nomeUsuario = $dados->name;

        //Gerando novo código.
        $code = random_int(0,9999999);

        //Inserindo o código para o usuário.
        DB::table('users')->where('id', $dados->id)->update(['code' => $code]);

        //Enviando os parâmetros para a rota de envio.
        return redirect('/enviarEmail/' . $emailUsuario . '/' . $code . '/' . $nomeUsuario);
    }


    //Método de envio de e-mail
    public function enviarEmail(Request $request)
    {
        //Capturando o e-mail via requisição.
        $email = $request->email;

        //Atribuindo uma função anônima à uma variável.
        $envioEmail = function ($m) use ($email){

            $m->from('gabtec9@gmail.com', 'Suporte BrDeveloper');
            $m->to($email);
            $m->subject('Mudança de senha.');
        };


        Mail::send('mail.envioEmail', ['nome' => $request->name, 'code' => $request->code], $envioEmail);

        return redirect('/trocar_senha');
    }

    //Método que renderiza a view de troca de senha.
    public function trocarSenha()
    {
        return view('reset_senha.trocarSenha');
    }

    //Método que renderiza a view de troca de senha caso haja um erro.
    public function trocarSenhaErro()
    {
        return view('reset_senha.trocarSenhaErro');
    }

    //Método de atualização de senha.
    public function atualizarSenha(Request $req)
    {
      //Recuperando os dados do usuário por meio do e-mail recebido.
      $dadosUsuario = DB::table('users')->where('users.email', '=', $req->email)->get()->first();

      //Dados vindos da requisição.
      $dadosSenha = array('email' => $req->email, 'code' => $req->code, 'senha' => $req->newPassword, 'confSenha' => $req->confNP);

      $novaSenha = bcrypt($dadosSenha['confSenha']);

      //Tratamentos dos dados vindos do formulário.
      //Verificando se o e-mail existe.
      if ($dadosUsuario == ''){
          return redirect('/trocar_senha_erro');
      }
      //Verificação de código e senhas.
      else if($dadosSenha['code'] == $dadosUsuario->code && $dadosSenha['senha'] == $dadosSenha['confSenha']){
          //Inserindo o código para o usuário.
          DB::table('users')->where('id', $dadosUsuario->id)->update(['code' => null, 'password' => $novaSenha]);

          return redirect('/login');
      }
      else{
         return redirect('/trocar_senha_erro');
      }
   }
}
