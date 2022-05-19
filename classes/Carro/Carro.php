<?php

class Carro {

    private $id;
    private $nome;
    private $valor;
    private $km;
    private $dataFabricacao;

    public function __construct($id, $nome, $valor, $km, $dataFabricacao) {
        $this->setId($id);
        $this->setNome($nome);
        $this->setValor($valor);
        $this->setKm($km);
        $this->setDataFabricacao($dataFabricacao);
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        if ($id > 0) {
            $this->id = $id;
        }
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        if (strlen($nome) > 0) {
            $this->nome = $nome;
        }
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        if ($valor > 0) {
            $this->valor = $valor;
        }
    }

    public function getKm() {
        return $this->km;
    }

    public function setKm($km) {
        if ($km > 0) {
            $this->km = $km;
        }
    }

    public function getDataFabricacao() {
        return $this->dataFabricacao;
    }

    public function setDataFabricacao($dataFabricacao) {
        if (strlen($dataFabricacao) > 0) {
            $this->dataFabricacao = $dataFabricacao;
        }
    }

    public function getAnosUso()  {
        return intval(date("Y")) - intval(date("Y", strtotime($this->getDataFabricacao())));
    }

    public function getMediaKmAno() {
        return ceil($this->getKm()/$this->getAnosUso());
    }

    public function getRevendaDesconto() {
        $retorno = 'R$'.$this->getValor();
        if ($this->getKm() > 100000 || $this->getAnosUso() > 10) {
            $retorno = '<span style="color:red">R$'.$this->getValor() - ($this->getValor() * 0.1).'</span>';
        }
        return $retorno;
    }

    public function toTable() {
        return  '<tr>'
                .   '<td>'  .$this->getId()             .'</td>'
                .   '<td>'  .$this->getNome()           .'</td>'
                .   '<td>R$'.$this->getValor()          .'</td>'
                .   '<td>'  .$this->getKm()             .'</td>'
                .   '<td>'  .$this->getDataFabricacao() .'</td>'
                .   '<td>'  .$this->getAnosUso()        .'</td>'
                .   '<td>'  .$this->getMediaKmAno()     .'</td>'
                .   '<td>'  .$this->getRevendaDesconto().'</td>'
                .'</tr>';
    }


}