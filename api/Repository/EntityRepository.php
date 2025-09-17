<?php

abstract class EntityRepository {
    protected $cnx;

    protected function __construct(){
        try {
            $this->cnx = new PDO(
                "mysql:host=localhost;dbname=nuxo7214_lajudie6;charset=utf8mb4",
                "nuxo7214_teste",
                "x37p-h4wV-Kb7}",
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (PDOException $e) {
            http_response_code(500);
            header("Content-type: application/json;charset=utf-8");
            echo json_encode([
                "error" => "PDO_CONNECTION_FAILED",
                "message" => $e->getMessage()
            ]);
            exit;
        }
        // "mysql:host=mmi.unilim.fr;dbname=lemesle8", "lemesle8","lemesle8"
        // "mysql:host=mmi.unilim.fr;dbname=lajudie6", "lajudie6","lajudie6"
    }

    abstract public function find($id);

    abstract public function findAll();

    abstract public function findType();

    abstract public function findbyAttribute($entity);

    abstract public function save($entity);

    abstract public function saveAll($entity);

    abstract public function delete($entity);

    abstract public function update($entity);
}