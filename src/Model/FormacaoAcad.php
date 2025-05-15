<?php class FormacaoAcad
{
    private $id;
    private $idusuario;
    private $inicio;
    private $fim;
    private $descricao;

    // Getters and Setters

    // Getters
    public function getID()
    {
        return $this->id;
    }
    public function getIdUsuario()
    {
        return $this->idusuario;
    }
    public function getInicio()
    {
        return $this->inicio;
    }
    public function getFim()
    {
        return $this->fim;
    }
    public function getDescricao()
    {
        return $this->descricao;
    }

    // Setters    
    public function setID($id)
    {
        $this->id = $id;
    }
    public function setIdUsuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }
    public function setInicio($inicio)
    {
        $this->inicio = $inicio;
    }
    public function setFim($fim)
    {
        $this->fim = $fim;
    }
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    // Método para INSERIR os dados da formação acadêmica
    public function inserirBD()
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "INSERT INTO formacaoAcademica (idusuario, inicio, fim, descricao)VALUES ('" . $this->idusuario . "','" . $this->inicio . "','" . $this->fim . "','" . $this->descricao . "')";
        if ($conn->query($sql) === true) {
            $this->id = mysqli_insert_id($conn);
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }



    // Método para EXCLUIR os dados da formação acadêmica
    public function excluirBD($id)
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "DELETE FROM formacaoAcademica WHERE idformacaoAcademica = '" . $id . "';";
        if ($conn->query($sql) === true) {
            $conn->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }

    // Método para LISTAR os dados da formação acadêmica
    public function listaFormacoes($idusuario)
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conn = $con->conectar();
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM formacaoAcademica WHERE idusuario = '" . $idusuario . "'";
        $re = $conn->query($sql);
        $conn->close();
        return $re;
    }
}
