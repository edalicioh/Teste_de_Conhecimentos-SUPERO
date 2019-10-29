<?php
/* 
Pergunta Três
Refatore o código abaixo, fazendo as alterações que julgar necessário.
    class MyUserClass
    {
        public function getUserList()
        {
            $dbconn = new DatabaseConnection('localhost','user','password');
            $results = $dbconn->query('select name from user');

            sort($results);

            return $results;
        }

    } 
*/
class MyUserClass
{
    private $host = "mysql:host=localhost;" ;
    private $db = "dbname=dataclick" ;
    private $user = "root" ;
    private $pass = null ;
    private function conenction () {
        try {
            $con = new PDO($this->host . $this->db , $this->user , $this->pass);
            return $con ;
        } catch (PDOException $e) {
            echo "erro___=>";
            print($e->getMessage() );
        }
    }
    public function getUserList()
    {
        $sql = "SELECT name FROM  user";
        $stm = $this->conenction()->prepare($sql);
        $stm->execute();
        $results = $stm->fetchAll(PDO::FETCH_ASSOC);
        $stm->closeCursor();
        sort($results);
        return $results;
    }
}