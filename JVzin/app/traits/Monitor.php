<?php

namespace app\traits;

trait monitor
{
    public function monitor($returnAll = true)
    {
        try {
            $query = $this->connection->query("SELECT DISTINCT turma, (SELECT COUNT(turma) FROM students WHERE turma=S.turma) AS total FROM {$this->table} S GROUP BY turma");
                return $returnAll ? $query->fetchAll() : $query->fetch();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
