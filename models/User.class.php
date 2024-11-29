<?php
    Class Usuario{
        public function __construct(private int $idusuario = 0, private string $nome = '', private string $email = '', private string $senha = '', private string $data_nascimento = '', private string $perfil = ''){}

        public function getIdUsuario(){
            return $this -> idusuario;
        }

        public function getNome(){
            return $this -> nome;
        }

        public function getEmail(){
            return $this -> email;
        }

        public function getSenha(){
            return $this -> senha;
        }
        
        public function getDataNascimento(){
            return $this -> data_nascimento; // -> format('d/m/Y');
        } 
    }
?>