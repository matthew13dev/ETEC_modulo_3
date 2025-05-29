<?php

if (!isset($_SESSION)) {
    session_start();
}
class UsuarioController
{
    public function inserir($nome, $cpf, $dataNascimento, $email, $senha)
    {
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setCPF($cpf);
        $usuario->setEmail($email);
        $usuario->setDataNascimento($dataNascimento);
        $usuario->setSenha($senha);
        $r = $usuario->inserirBD();
        $_SESSION['Usuario'] = serialize($usuario);
        return $r;
    }
    public function atualizar($id, $nome, $cpf, $email, $dataNascimento)
    {
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();
        $usuario->setId($id);
        $usuario->setNome($nome);
        $usuario->setCPF($cpf);
        $usuario->setEmail($email);
        $usuario->setDataNascimento($dataNascimento);
        $usuario->atualizarBD();
        $_SESSION['Usuario'] = serialize($usuario);
        // No return value since atualizarBD() is void
    }


    public function carregarUsuario($cpf)
    {
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();
        $usuario->carregarUsuario($cpf);
        $_SESSION['Usuario'] = serialize($usuario);
        return $usuario;
    }



    public function login($cpf, $senha)
    {
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();
        $usuario->carregarUsuario($cpf);
        $verSenha = $usuario->getSenha();
        if ($senha == $verSenha) {
            $_SESSION['Usuario'] = serialize($usuario);
            return true;
        } else {
            return false;
        }
    }

    public function gerarLista()
    {
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();
        return $results = $usuario->listaUsuarios();
    }
    public function vizualizarusuario($cpf)
    {
        require_once '../Model/Usuario.php';
        $usuario = new Usuario();
        $usuario->carregarUsuario($cpf);
        $_SESSION['UsuarioVisualizado'] = serialize($usuario);
    }
}
