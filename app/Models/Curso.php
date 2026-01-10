<?php

namespace App\Models;

use App\core\Database;
use PDO;

class Curso
{
    public static function contarCursos()
    {

        $db = Database::getConnection();
        $msm = "SELECT COUNT(*) as total from curso";
        $stmt = $db->prepare($msm);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }
}
