<?php

if (!isset($_SESSION)) {
    session_start();
}


class UsuarioController
{


    public function inserir($nome, $cpf, $email, $senha)
    {
        require "../Model/Usuario.php";
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setCpf($cpf);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);


        $response = $usuario->inserirBD();
        $_SESSION['Usuario'] = serialize($usuario);
        return $response;
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
};
