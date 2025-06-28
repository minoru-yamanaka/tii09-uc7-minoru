<?php
require 'Pizza.php';
require 'Conexao.php';

class PizzaDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Conexao::getBd();
    }

    public function getAll()
    {        
        $stmt = $this->db->query("SELECT * FROM pizza");
        $pizzas = [];

        while ($row = $stmt->fetch((PDO::FETCH_ASSOC))) {
            $pizzas[] = new Pizza(
                $row['id'],
                $row['sabor'],
                $row['tamanho'],
                $row['preco']
            );
        }
        return $pizzas;
    }

    public function create(Pizza $pizza) {
        $stmt = $this->db->prepare("INSERT INTO pizza (sabor, tamanho, preco)
            VALUES (:sabor, :tamanho, :preco)");
            
        $sabor = $pizza->getSabor();
        $tamanho = $pizza->getTamanho();
        $preco = $pizza->getPreco();

        $stmt->bindParam(':sabor', $sabor);
        $stmt->bindParam(':tamanho', $pizza->getTamanho());
        $stmt->bindParam(':preco', $pizza->getPreco());
        $stmt->execute();
    }
}
