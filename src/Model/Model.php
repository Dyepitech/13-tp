<?php

namespace M2i\Mvc\Model;

use M2i\Mvc\DB;

class Model
{
    private $attributes = [];

    public function __set($attribute, $value)
    {
        $this->$attribute = $value;
        $this->attributes[$attribute] = $value;
    }

    public function __get($attribute)
    {
        return $this->$attribute;
    }

    public function __isset($attribute)
    {
        return $this->__get($attribute);
    }

    public function save()
    {
        $table = self::getTable();

        $columns = implode(', ', array_keys($this->attributes));
        $values = implode(', ', array_map(function () {
            return '?';
        }, $this->attributes));

        $sql = "INSERT INTO $table ($columns) VALUES ($values)";

        return DB::insert($sql, array_values($this->attributes));
    }

    public function update($id)
    {
        $table = self::getTable();
        $i = 0;
        foreach($this->attributes as $key => $attribute){
            $array_test = array($key . ' = ' . $json = json_encode($attribute));
            $tmp[$i++] = ' ' . implode("", $array_test);
        }

        $finalquery = null;
        foreach($tmp as $key => $tmp2)
        {
            $finalquery .= $tmp2 . ',';
        }
        
        $finalquery = substr($finalquery, 0, -1);
        
        $sql = "UPDATE $table SET $finalquery WHERE id=:id";
        return DB::update($sql, ['id' => $id], static::class);
    }

    public static function all()
    {
        $table = self::getTable();

        $sql = "SELECT * FROM $table";

        // static::class => User
        // self::class => Model
        // On passe la classe du modèle pour
        // récupérer une liste d'objets

        return DB::select($sql, [], static::class);
    }


    public static function delete($id)
    {
        $table = self::getTable();

        $sql = "DELETE FROM $table WHERE id=:id";

        // static::class => User
        // self::class => Model
        // On passe la classe du modèle pour
        // récupérer une liste d'objets

        return DB::select($sql, ['id' => $id], static::class);
    }

    public static function find($id)
    {
        $table = self::getTable();

        $sql = "SELECT * FROM $table WHERE id = :id";

        return DB::selectOne($sql, ['id' => $id], static::class);
    }

    public static function wherelike($column, $option)
    {
        $table = self::getTable();

        $sql = "SELECT * FROM $table WHERE $column LIKE '%$option%'";

        return DB::select($sql, [], static::class);
    }

    /**
     * Permet de récupérer le nom de la table.
     */
    private static function getTable()
    {
        return strtolower(substr(strrchr(get_called_class(), '\\'), 1)).'s';
    }
}
