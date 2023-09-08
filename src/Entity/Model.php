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


    public static function getById(int $id)
    {
        $sql = "select * from " . self::getEntityName() . " where id=:id";
        $result = self::Execute($sql, ['id' => $id]);
        return $result[0];
    }

    public static function insert(array $datas)
    {
        $keys = array_keys($datas);
        $fields = implode(",", $keys);
        $placeholders = ':' . implode(', :', $keys);

        $sql = "insert into " . self::getEntityName() . " ($fields) values ($placeholders)";

        $db = DataBase::getInstance();
        $pdostatement = $db->prepare($sql);
        return $pdostatement->execute($datas);
    }

    public static function delete(int $id)
    {
        $sql = "update " . self::getEntityName() . " set is_deleted = true where id=:id";
        $db = DataBase::getInstance();
        $pdostatement = $db->prepare($sql);
        return $pdostatement->execute(['id' => $id]);
    }

    public static function update(int $id, array $datas)
    {
        $setClauses = [];
        foreach ($datas as $key => $value) {
            $setClauses[] = "$key=:$key";
        }
        $sql = "update " . self::getEntityName() . " set " . implode(", ", $setClauses) . " where id=:id";

        $datas['id'] = $id;
        $db = DataBase::getInstance();
        $pdostatement = $db->prepare($sql);
        return $pdostatement->execute($datas);
    }
}
