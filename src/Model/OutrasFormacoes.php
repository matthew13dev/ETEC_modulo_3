<?php class OutrasFormacoes
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

    //Methods
    //Método INSERIR formacao
    public function inserirBD()
    {
        require_once 'ConexaoBD.php';

        //cria uma instância da classe ConexaoBD
        $conn = new ConexaoBD();
        //chama o método conectar() para obter a conexão com o banco de dados
        $conexao = $conn->conectar();

        // Prepara a consulta SQL para inserir os dados na tabela outras_formacoes

        $sql = "INSERT INTO outras_formacoes (idusuario, inicio, fim, descricao) VALUES ('"
            . $this->idusuario . ", '"
            . $this->inicio . "', '"
            . $this->fim . "', '"
            . $this->descricao . "')";

        // Prepara a consulta SQL
        if ($conexao->query($sql) === true) {
            $this->id = mysqli_insert_id($conexao);
            $conexao->close();
            return true;
        } else {
            $conexao->close();
            return false;
        }
    }



    //Método para EXCLUIR formacao
    public function excluirBD($id)
    {
        require_once 'ConexaoBD.php';
        $con = new ConexaoBD();
        $conexao = $con->conectar();
        if ($conexao->connect_error) {
            die("Connection failed: " . $conexao->connect_error);
        }

        // Prepara a consulta SQL para excluir os dados da tabela outras_formacoes
        $sql = "DELETE FROM outras_formacoes WHERE id = " . $this->id;

        if ($conexao->query($sql) === true) {
            $conexao->close();
            return true;
        } else {
            $conn->close();
            return false;
        }
    }





    //Método LISTAR formacoes
    public function listarFormacoes($idusuario)
    {
        require_once "ConexaoBD.php";
        $con = new ConexaoBD();
        $conexao = $con->conectar();

        // Verifica se a conexão foi bem-sucedida
        if ($conexao->connect_error) {
            die("Connection failed: " . $conexao->connect_error);
        }


        // Consulta SQL para selecionar os dados da tabela outras_formcoes
        $sql = "SELECT * FROM outrasformacoes WHERE idusuario = '" . $idusuario . "'";

        // Executa a consulta SQL
        $resultado = $conexao->query($sql);

        // Verifica se a consulta retornou resultados
        $conexao->close();
        return $resultado;
    }
}