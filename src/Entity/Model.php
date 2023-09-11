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
        $sql = "SELECT * FROM " . self::getEntityName();
        return self::Execute($sql);
    }

    public static function getById(int $id)
    {
        $primaryKey = static::getPrimaryKeyName();
        $sql = "SELECT * FROM " . self::getEntityName() . " WHERE {$primaryKey}=:id";
        $result = self::Execute($sql, ['id' => $id]);
        return $result[0];
    }

    protected static function getPrimaryKeyName()
    {
        return "id";
    }

    public static function getByField(string $field, $value)
    {
        $sql = "SELECT * FROM " . self::getEntityName() . " WHERE $field = :value";
        $result = self::Execute($sql, [':value' => $value]);
        return $result ? $result[0] : null;
    }

    public static function getAllByField(string $field, $value)
    {
        $sql = "SELECT * FROM " . self::getEntityName() . " WHERE $field = :value";
        return self::Execute($sql, [':value' => $value]);
    }

    public static function insert(array $datas)
    {
        $keys = array_keys($datas);
        $fields = implode(",", $keys);
        $placeholders = ':' . implode(', :', $keys);

        $sql = "INSERT INTO " . self::getEntityName() . " ($fields) VALUES ($placeholders)";

        $db = DataBase::getInstance();
        $pdostatement = $db->prepare($sql);
        return $pdostatement->execute($datas);
    }

    public static function delete(int $id)
    {
        // Utilisez la méthode getPrimaryKeyName pour obtenir le nom correct de la clé primaire.
        $primaryKey = static::getPrimaryKeyName();

        // Modifiez la requête SQL pour utiliser le bon nom de clé primaire.
        $sql = "update " . self::getEntityName() . " set is_deleted = true where {$primaryKey}=:{$primaryKey}";

        $db = DataBase::getInstance();
        $pdostatement = $db->prepare($sql);
        return $pdostatement->execute([$primaryKey => $id]);
    }


    public static function update(int $id, array $datas)
    {
        $setClauses = [];
        foreach ($datas as $key => $value) {
            $setClauses[] = "$key=:$key";
        }

        // Utilise la méthode getPrimaryKeyName pour obtenir le nom correct de la clé primaire.
        $primaryKey = static::getPrimaryKeyName();

        // Modifie la requête SQL pour utiliser le bon nom de clé primaire.
        $sql = "update " . self::getEntityName() . " set " . implode(", ", $setClauses) . " where {$primaryKey}=:{$primaryKey}";

        // Met à jour le tableau $datas avec le bon nom de clé primaire.
        $datas[$primaryKey] = $id;

        $db = DataBase::getInstance();
        $pdostatement = $db->prepare($sql);
        return $pdostatement->execute($datas);
    }
}
