<?php

class Database {

    private $db;

    public function __construct($config) {

        $dsn = $this->getDsn($config);
        
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        if ($config['driver'] == 'mysql') {
            $this->db = new PDO($dsn, $config['user'], $config['password'], $options);
        } else {
            $this->db = new PDO($dsn, null, null, $options);
        }

    }

    private function getDsn($config) {

        $driver = $config['driver'];

        if ($driver == 'sqlite') {
            return 'sqlite:' . $config['database'];
        }

        if ($driver == 'mysql') {
            return "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        }

        return $driver . ':' . http_build_query($config, '', ';');

    }

    public function query($query, $class = null, $params = []) {

        $prepare = $this->db->prepare($query);

        if ($class) {

            $prepare->setFetchMode(PDO::FETCH_CLASS, $class);

        }

        $prepare->execute($params);

        return $prepare;

    }

}

$database = new Database(config('database'));
