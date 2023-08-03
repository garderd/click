<?php 
    namespace Database;
	use PDO;
    
    class Database{
    private $pdo;
    private $isConnected;
    protected $settings = [];
    public function __construct(array $settings)
    {
        $this->settings = $settings;

        $this->connect();
    }

    private function connect()
    {
        $dsn = 'mysql:dbname=' . $this->settings['dbname'] . ';host=' . $this->settings['host'];

        try {
            $this->pdo = new \PDO($dsn, $this->settings['user'], $this->settings['password'], [
                \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES ' .$this->settings['charset']
            ]);

            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC);

            $this->isConnected = true;

        } catch (\PDOException $e) {
            exit($e->getMessage());
        }
    }

    public function closeConnection()
    {
        $this->pdo = null;
    }
    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
    public function query($query, $data = [])
    {
        if(!$this->isConnected){
            $this->connect();
        }
        $query = trim(str_replace('\r', '', $query));
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($data);
        return $stmt;
    }
}
