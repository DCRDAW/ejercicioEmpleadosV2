<?php
    class Conexion
    {
        public $mysqli;
        public $resultado;

        function __construct(){
            $this->mysqli = new mysqli('esvirgua.com', 'user2daw_08', 'GVQ^L{v97.eO','user2daw_BD1-08');
        }
        function consulta($consulta){
            $this->resultado = $this->mysqli->query($consulta);
            return $this->resultado;
        }
        function sacar(){
            $fila = $this->resultado->fetch_assoc();
            return $fila;
        }
        function nfilas($resultado){

        }
        function error($resultado){
            
        }
    }
    
    
?>