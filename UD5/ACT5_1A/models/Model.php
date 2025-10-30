<?php

namespace models;

use config\Database;

abstract class Model
{
    public static function all()
    {

        $config = Database::loadConfig('C:/temp2/config.db');
        $db = new Database(
            $config['DB_HOST'],
            $config['DB_PORT'],
            $config['DB_DATABASE'],
            $config['DB_USERNAME'],
            $config['DB_PASSWORD']
        );

        $db->connectDB();

        $table = static::$table;

        $sql = "SELECT * FROM $table";
        $result = $db->conn->query($sql);

        $rows = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $employee = new static(...array_values($row));
                $rows[] = $employee;
            }
        }
        $db->closeDB();

        return $rows;
    }
}
