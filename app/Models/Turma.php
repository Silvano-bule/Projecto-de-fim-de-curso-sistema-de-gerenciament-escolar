<?php 

namespace App\Models;
use app\core\Database;
use PDO;

class Turma
{
    public static function contarTurmas(){
        $db = Database::getConnection();
        $msm = "SELECT COUNT(*) as total from turma";
        $stmt = $db->prepare($msm);
        $stmt->execute();

        $resultado  = $stmt -> fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }
}