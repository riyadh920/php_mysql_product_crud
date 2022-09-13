<?php

namespace Project\Controllers;

use Exception;
use PDO;

class Product
{
    public $id;
    public $name;
    public $conn;

    private $dbUserName = 'root';
    private $dbPassword = '';
    private $dbName = 'Product';

    public function __construct()
    {
        session_start();
        try {
            $this->conn = new PDO('mysql:host=localhost;dbname=' . $this->dbName, $this->dbUserName, $this->dbPassword);
        } catch (Exception $ex) {
            echo 'Database connection failed. Error: ' . $ex->getMessage();
            die();
        }
    }

    public function index()
    {
        // select query
        $statement = $this->conn->query("SELECT * FROM products ORDER BY id desc");
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }

    public function store(array $data)
    {
        try {
            $_SESSION['old'] = $data;

            if (empty($data['product_id'])) {
                $_SESSION['errors']['product_id'] = 'Required';
            } elseif (!is_numeric($data['product_id'])) {
                $_SESSION['errors']['product_id'] = 'Must be an integer';
            }

            if (empty($data['name'])) {
                $_SESSION['errors']['name'] = 'Required';
            }

            if (isset($_SESSION['errors'])) {
                return false;
            }

            // todo database insert
            $statement = $this->conn->prepare("INSERT INTO products (name, product_id) VALUES (:p_name, :p_id)");

            $statement->execute([
                'p_name' => $data['name'],
                'p_id' => $data['product_id']
            ]);

            unset($_SESSION['old']);
            $_SESSION['message'] = 'Successfully Created';
            return true;
        } catch (Exception $th) {
            $_SESSION['errors']['sqlError'] = $th->getMessage();
        }
    }

    public function details(int $id)
    {
        // select query
        $statement = $this->conn->query("SELECT * FROM products where id=$id");
        $data = $statement->fetch(PDO::FETCH_ASSOC);
        return $data;
    }

    public function update(array $data, int $id)
    {
        // todo database insert
        $statement = $this->conn->prepare("UPDATE products set name=:p_name, product_id=:p_id WHERE id=:r_id");

        $statement->execute([
            'r_id' => $id,
            'p_name' => $data['name'],
            'p_id' => $data['product_id']
        ]);

        $_SESSION['message'] = 'Successfully Updated';
    }

    public function destroy(int $id)
    {
        $statement = $this->conn->prepare("DELETE FROM  products where id=:p_id");
        $statement->execute([
            'p_id' => $id
        ]);

        $_SESSION['message'] = 'Successfully Deleted';
    }
}
