<?php
class Usuario {
    public function AutentificarUsuario($correo,$password){
        try {
            include 'conexion.php';
            $conectar= new Conexion();
            $consulta=$conectar->prepare("SELECT * FROM login WHERE 
                      usuario=:correo AND nip=:password");
            $consulta->bindParam(":correo",$correo,PDO::PARAM_STR);
            $consulta->bindParam(":password",$password,PDO::PARAM_INT); 
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            return $consulta->fetchAll();         
        } catch (Exception $e) {
            return 0;
        }
    }
}


?>