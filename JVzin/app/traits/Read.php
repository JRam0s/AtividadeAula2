<?php

namespace app\traits;

trait Read
{
    public function all($returnAll = true)
    {
        try {
            $query = $this->connection->query("SELECT * FROM {$this->table}");
            //$query = $this->connection->query("SELECT DISTINCT turma COUNT(*) AS total_por_alunos FROM students {$this->table}");
            //$query = $this->connection->query("SELECT turma COUNT(nome) AS quantidade FROM students GROUP BY turma{$this->table} ");
            return $returnAll ? $query->fetchAll() : $query->fetch();
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}
