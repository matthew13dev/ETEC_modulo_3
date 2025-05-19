<?php

if (!isset($_SESSION)) {
    session_start();
}

class OutrasFormacoesController
{

    public function inserir($inicio, $fim, $descricao, $idusuario)
    {
        require_once "../ModelOutrasFormacoes.php";
        $outraFormacao = new OutrasFormacoes();

        $outraFormacao->setInicio($inicio);
        $outraFormacao->setFim($fim);
        $outraFormacao->setDescricao($descricao);
        $outraFormacao->setID($idusuario);

        $response = $outraFormacao->inserirBD();
        return $response;
    }

    public function excluir($id)
    {
        require_once "../ModelOutrasFormacoes.php";
        $outraFormacao = new OutrasFormacoes();

        $response = $outraFormacao->excluirBD($id);
        return $response;
    }

    public function gerarLista($id)
    {
        require_once "../ModelOutrasFormacoes.php";
        $outraFormacao = new OutrasFormacoes();
        $response = $outraFormacao->listarFormacoes($id);
        return $response;
    }
}