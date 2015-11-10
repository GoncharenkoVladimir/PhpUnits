<?php

namespace Layer\Manager;

use PDO;

/**
 * Class Manager
 * @package Layer\Manager
 */
class ManagerTriangle implements ManagerInterface
{
    private $dbh;
    /**
     * @param $dbh
     */
    public function __construct($dbh)
    {
        $this->dbh = $dbh;
    }

    /**
     * @param $dbh
     * @return bool
     */
    public function list_tables($dbh)
    {
        $sql = 'SHOW TABLES';
        if($dbh)
        {
            $query = $dbh->query($sql);
            $resalt = $query->fetchAll(PDO::FETCH_COLUMN);
            $exist = false;
            foreach($resalt as $value){
                if ($value == 'Triangle')
                {
                    $exist = true;
                }
            }
            if(!$exist){
                $sqlCreateTable = 'CREATE TABLE Triangle (
                                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                    sideA INT(6),
                                    sideB INT(6),
                                    sideC INT(6),
                                    perimeter INT(6),
                                    square DECIMAL(5,2)
                                    )';
                $dbh->query($sqlCreateTable);
            }
        }
        return FALSE;
    }

    /**
     * Insert new entity data to the DB
     * @param mixed $entity
     * @return mixed
     */
    public function insert($entity)
    {
        $sideA = $entity->getA();
        $sideB = $entity->getB();
        $sideC = $entity->getC();
        $perimeter = $entity->getP();
        $square = $entity->getS();
        $sth = $this->dbh->prepare('INSERT INTO Triangle (sideA, sideB, sideC, perimeter, square) VALUES (:sideA,:sideB,:sideC,:perimeter,:square)');
        return $sth->execute(array(':sideA' => $sideA, ':sideB' => $sideB, ':sideC' => $sideC, ':perimeter' => $perimeter, ':square' => $square));
    }

    /**
     * Update exist entity data in the DB
     * @param $entity
     * @return mixed
     */
    public function update($entity)

    {
        $sideA = $entity->getA();
        $sth = $this->dbh->prepare('UPDATE Triangle SET sideB = 5 WHERE sideA = :sideA');
        return $sth->execute(array(':sideA' => $sideA));
    }

    /**
     * Delete entity data from the DB
     * @param $entity
     * @return mixed
     */
    public function remove($entity)
    {
        $sideA = $entity->getA();
        $sth = $this->dbh->prepare('DELETE FROM Triangle WHERE sideA = :sideA');
        return $sth->execute(array(':sideA' => $sideA));
    }

    /**
     * Search entity data in the DB by Id
     * @param $entityName
     * @param $id
     * @return mixed
     */
    public function find($entityName, $id)
    {
        if ($entityName == 'Triangle')
        {
            $sth = $this->dbh->prepare('SELECT * FROM Triangle WHERE id = :id');
            $sth->execute(array(':id' => $id));
            return $resalt = $sth->fetch(\PDO::FETCH_ASSOC);
        }
    }

    /**
     * Search all entity data in the DB
     * @param $entityName
     * @return array
     */
    public function findAll($entityName)
    {
        if ($entityName == 'Triangle')
        {
            $sth = $this->dbh->prepare('SELECT * FROM Triangle');
            $sth->execute();
            return $resalt = $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }

    /**
     * Search all entity data in the DB like $criteria rules
     * @param $entityName
     * @param array $criteria
     * @return mixed
     */
    public function findBy($entityName, $criteria = [])
    {
        $param1 = $criteria[0];
        $param2 = $criteria[1];
        if($entityName == 'Triangle')
        {
            $sth = $this->dbh->prepare("SELECT $param1, $param2 FROM Triangle");
            $sth->execute();
            return $resalt = $sth->fetchAll(\PDO::FETCH_ASSOC);
        }
    }


}