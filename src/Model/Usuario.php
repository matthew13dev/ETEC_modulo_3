<?php

class Usuario
{
    private $id;
    private $nome;
    private $cpf;
    private $email;
    private $dataNascimento;
    private $senha;

    // Getters and Setters
    // Getters

    public function getId()
    {
        return $this->id;
    }
    public function getNome()
    {
        return $this->nome;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getDataNascimento()
    {
        return $this->dataNascimento;
    }
    public function getSenha()
    {
        return $this->senha;
    }

    // Setters

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setDataNascimento($dataNascimento)
    {
        $this->dataNascimento = $dataNascimento;
    }
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    // Método para exibir os dados do usuário
    public function __toString()
    {
        return "ID: " . $this->id . ", Nome: " . $this->nome . ", CPF: " . $this->cpf . ", Email: " . $this->email . ", Data de Nascimento: " . $this->dataNascimento . ", Senha: " . $this->senha;
    }

    // Método para inserir o usuário no banco de dados
    public function inserirBD()
    {
        require_once 'ConexaoBD.php';
        $conexao = new ConexaoBD();
        $conn = $conexao->conectar();

        if ($conn->connect_errno) {
            die("Falha na conexão: " . $conn->connect_error);
        }

        $sql = "INSERT INTO usuario (nome, cpf, email, senha)VALUES (
        '" . $this->nome . "', '" . $this->cpf . "', '" . $this->email . "','" . $this->senha . "')";

        if ($conn->query($sql) === TRUE) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }

    // Método para verificar se o usuário existe no banco de dados
    public function carregarUsuario($cpf)
    {
        require_once "./ConexaoDB.php";
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM usuario WHERE cpf = " . $cpf;
        $re = $conn->query($sql);
        $r = $re->fetch_object();
        if ($r != null) {
            $this->id = $r->idusuario;
            $this->nome = $r->nome;
            $this->email = $r->email;
            $this->cpf = $r->cpf;
            $this->dataNascimento = $r->dataNascimento;
            $this->senha = $r->senha;
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    //  Método para atualizar o usuário no banco de dados
    public function atualizarBD()
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "UPDATE usuario SET nome = '" . $this->nome . "', cpf = '" . $this->cpf . "', dataNascimento = '" . $this->dataNascimento . "', email='" . $this->email . "' WHERE idusuario ='" . $this->id . "'";


        if ($conn->query($sql) === TRUE) {
            $conn->close();
            return TRUE;
        } else {
            $conn->close();
            return FALSE;
        }
    }


    public function listaCadastrados()
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT idusuario, nome FROM usuario;";
        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }


    /*adicionado na agenda 14*/
    public function listaUsuarios()
    {
        require_once 'conexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            $sql = "SELECT * FROM usuario";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result;
        }
    }
}
