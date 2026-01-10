<?php

namespace app\Models;

use app\core\Database;
use PDO;

class Professores
{
    public static function contarProfessores()
    {
        $db = Database::getConnection();

        $msm = "SELECT COUNT(*) as total from professor";
        $stmt = $db->prepare($msm);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total'];
    }
}
