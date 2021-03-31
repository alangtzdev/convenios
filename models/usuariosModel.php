<?php
require_once "../include/config.php";

class UsuariosModel extends Conexion
{
    // -------------------------------------------------------------------------------------------
    public static function getUsuarioMdl($arrDatos, $table)
    {
        try {
            $email = trim($arrDatos['email']);
            $password = trim($arrDatos['password']);
            // var_dump($arrDatos['nombre']);
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = $cxn->prepare("SELECT count(*) FROM $table where correo = :correo");
            $stmt->bindParam(":correo", $email, PDO::PARAM_STR);
            $stmt->execute();
            // $stmt->bindParam(":apellido",$arrDatos['apellido'], PDO::PARAM_STR);
            // $exeResult = $stmt->execute();
            // var_dump($stmt->fetchAll());

            // if(usarioexiste)
            if (($stmt->fetchColumn()) > 0) {
                // var_dump($stmt->fetchColumn());

                $stmt_ = $cxn->prepare("SELECT * FROM $table WHERE correo = :correo and contrasenia = :contrasenia");
                $stmt_->bindParam(":correo", $email, PDO::PARAM_STR);
                $stmt_->bindParam(":contrasenia", $password, PDO::PARAM_STR);
                $stmt_->execute();

                // if($stmt->fetchAll()) {
                $arrayResult = $stmt_->fetchAll();
                // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                //     $arrayResult[] = array(
                //         'idUsuario' => $row['idUsuario'],
                //         'nombre' => $row['nombre'],
                //         'apellido' => $row['apellido']
                //     );
                // }
                if (!empty($arrayResult)) {

                    return $arrayResult;
                } else {

                    throw new Exception("Contraseña o correo incoreccto");
                }
                $stmt_ = null;
                // }
            } else {
                throw new Exception("Este usuario " . $arrDatos['email'] . " no esta registrado");
            }
            $stmt = null;
        } catch (Exception $th) {
            http_response_code(401);
            return [
                'code' => http_response_code(),
                'message' => $th->getMessage()
            ];
            exit();
        }
    }
    public static function getPerfilMdl($email, $table)
    {
        try {

            // var_dump($arrDatos['nombre']);
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = $cxn->prepare("SELECT * FROM $table where correo = :correo");
            $stmt->bindParam(":correo", $email, PDO::PARAM_STR);
            $stmt->execute();
            $arrayResult = $stmt->fetchAll();
            if (!empty($arrayResult)) {

                return $arrayResult;
            } else {

                throw new Exception("No se pudieron obterner los datos");
            }
            $stmt = null;

        } catch (Exception $th) {
            http_response_code(401);
            return [
                'code' => http_response_code(),
                'message' => $th->getMessage()
            ];
            exit();
        }
    }
    // -------------------------------------------------------------------------------------------
    public static function getUsuariosMdl($table)
    {
        try {
            $roles = "roles";
            $cxn = Conexion::conectar();
            $arrayResult = array();
            $stmt = $cxn->prepare("SELECT *,u.idRol as idRol, r.rol as rol FROM $table as u 
            left join $roles as r on r.idRol = u.idRol");
            $stmt->execute();
            // if ($exeResult) {

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                    $arrayResult[] = array(
                        'idUsuario' => $row['idUsuario'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'correo' => $row['correo'] == null ?  "" : $row['correo'],
                        'isResponsable' => $row['isResponsable'] == null ?  "" : $row['isResponsable'],
                        'usuario' => $row['usuario'] == null ?  "" : $row['usuario'],
                        'rol' => $row['rol'] == null ?  "" : $row['rol'],
                    );
                }
                // $arrayResult = $stmt->fetchAll();
                // if (!empty($arrayResult)) {

                    return $arrayResult;
                // } else {

                //     throw new Exception("No se pudieron obterner los datos");
                // }
                
            // } else {
            //     return "No se pudieron obterner los datos";
            // }
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }
    // -------------------------------------------------------------------------------------------
    public static function actualizarPerfilMdl($arrDatos, $table)
    {
        // var_dump($arrDatos);
        try {
            $contrasenia = $arrDatos['contrasenia'];
            $contraHash = password_hash($contrasenia, PASSWORD_BCRYPT);
            $stmt = Conexion::conectar()->prepare("UPDATE  $table SET nombre = :nombre, apellido = :apellido, usuario = :usuario, contrasenia = 
            :contrasenia WHERE idUsuario = :idUsuario");

             $stmt->bindParam(":idUsuario", $arrDatos['idUsuario'], PDO::PARAM_INT);
             $stmt->bindParam(":nombre", $arrDatos['nombre'], PDO::PARAM_STR);
             $stmt->bindParam(":apellido", $arrDatos['apellido'], PDO::PARAM_STR);
            $stmt->bindParam(":usuario",$arrDatos['usuario'], PDO::PARAM_STR);
            $stmt->bindParam(":contrasenia",$arrDatos['contrasenia']);
            $exeResult = $stmt->execute();
            if($exeResult) {
               return "success";
             } else{
               return "Error";   
            }

            $stmt->close();
            $stmt = null;
   
         } catch (Exception $th) {
            return  $th->getMessage(); 
         }
         
    }
    // -------------------------------------------------------------------------------------------
    public static function saveUsuarioMdl($arrDatos, $table)
    {
        try {
            $today = date("Y-m-d H:i:s");

            if ($arrDatos['HFCommandName'] == 'ALTA' && $arrDatos['idUsuario'] == "") {
                //  if (pregmatch('/^[a-zA-ZáeíóúÁÉÍÓÚ ]+$/', $arrDatos['nombre'])) {
                //      # code...
                //  }
                $stmt = Conexion::conectar()->prepare("INSERT INTO $table (nombre, apellido, correo, usuario, isResponsable, idRol) 
             VALUES (:nombre, :apellido, :correo, :usuario, :isResponsable, :idRol)");
                $stmt->bindParam(":nombre", $arrDatos['nombre'], PDO::PARAM_STR);
                $stmt->bindParam(":apellido", $arrDatos['apellido'], PDO::PARAM_STR);
                 $stmt->bindParam(":idRol", $arrDatos['idRol'], PDO::PARAM_INT);
                 $stmt->bindParam(":correo", $arrDatos['correo'], PDO::PARAM_STR);
                 $stmt->bindParam(":usuario", $arrDatos['usuario'], PDO::PARAM_STR);
                 $stmt->bindParam(":isResponsable", $arrDatos['isResponsable'], PDO::PARAM_BOOL);
                if ($stmt->execute()) {
                    return "success";
                } else {
                    return "Error";
                }
                $stmt->close();
                $stmt = null;
            } else if ($arrDatos['HFCommandName'] == 'EDITAR' && $arrDatos['idUsuario'] != "") {

                $stmt = Conexion::conectar()->prepare("UPDATE  $table SET nombre = :nombre, apellido = :apellido,
                correo = :correo, usuario = :usuario, isResponsable = :isResponsable, idRol = :idRol 
            WHERE idUsuario = :idUsuario");

                $stmt->bindParam(":idUsuario", $arrDatos['idUsuario'], PDO::PARAM_INT);
                $stmt->bindParam(":nombre", $arrDatos['nombre'], PDO::PARAM_STR);
                $stmt->bindParam(":apellido", $arrDatos['apellido'], PDO::PARAM_STR);
                $stmt->bindParam(":idRol", $arrDatos['idRol'], PDO::PARAM_INT);
                $stmt->bindParam(":correo", $arrDatos['correo'], PDO::PARAM_STR);
                $stmt->bindParam(":usuario", $arrDatos['usuario'], PDO::PARAM_STR);
                $stmt->bindParam(":isResponsable", $arrDatos['isResponsable'], PDO::PARAM_BOOL);
                if ($stmt->execute()) {
                    return "success";
                } else {
                    return "Hubo un error al editar la institucion" .$arrDatos['nombre'];
                }
                $stmt->close();
                $stmt = null;
            } else {
                return "Hubo un problema: " + $arrDatos['HFCommandName'] + ", " + $arrDatos['idUsuario'];
            }
        } catch (Exception $th) {
            return $th->getMessage();
        }
    }

    public static function deleteUsuarioMdl($idUsuario, $table)
    {
        try {
            $stmt = Conexion::conectar()->prepare("DELETE FROM $table WHERE idUsuario = :id");
            $stmt->bindParam(":id", $idUsuario, PDO::PARAM_INT);
            if ($stmt->execute()) {
                return "success";
            } else {
                return "No se pudo eliminar el catalogo";
            }
            $stmt->close();
        } catch (Throwable $th) {
            return $th->getMessage();
        }
    }
}