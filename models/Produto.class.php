<?php

class Produto {
    public function __construct(private int $idproduto = 0, private string $nome = '', private string $descricao = '', private float $preco = 0.0, private string $imagem = '') {}

    public function getIdProduto(): int {
        return $this->idproduto;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function setNome(string $nome): void {
        $this->nome = $nome;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void {
        $this->descricao = $descricao;
    }

    public function getPreco(): float {
        return $this->preco;
    }

    public function setPreco(float $preco): void {
        $this->preco = $preco;
    }

    public function getImagem(): string {
        return $this->imagem;
    }

    public function setImagem(string $imagem): void {
        $this->imagem = $imagem;
    }

    // Método para listar produtos
    public static function listarProdutos(PDO $conn): array {
        try {
            $stmt = $conn->prepare("SELECT idproduto, nome, descricao, preco, imagem FROM produtos");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Erro ao buscar produtos: " . $e->getMessage());
        }
    }

    // Método para salvar um novo produto
    public function salvar(PDO $conn): void {
        try {
            $stmt = $conn->prepare("INSERT INTO produtos (nome, descricao, preco, imagem) VALUES (:nome, :descricao, :preco, :imagem)");
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':descricao', $this->descricao);
            $stmt->bindParam(':preco', $this->preco);
            $stmt->bindParam(':imagem', $this->imagem);
            $stmt->execute();
        } catch (PDOException $e) {
            die("Erro ao salvar o produto: " . $e->getMessage());
        }
    }
}
?>
