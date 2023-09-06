<?php

namespace Seb\GestionDeProjets\Entity;

use Seb\GestionDeProjets\Kernel\DataBase;


class Model
{
    public static $className;

    private static function getEntityName()
    {
        $classname = static::class;
        $tab = explode('\\', $classname);
        $entity = $tab[count($tab) - 1];
        return $entity;
    }

    private static function getClassName()
    {
        return static::class;
    }

    private static function Execute($sql, $params = [])
    {
        $db = DataBase::getInstance();
        $pdostatement = $db->prepare($sql);
        $pdostatement->execute($params);
        return $pdostatement->fetchAll(\PDO::FETCH_CLASS, self::getClassName());
    }

    public static function getAll()
    {
        $sql = "select * from " . self::getEntityName();
        return self::Execute($sql);
    }
}
