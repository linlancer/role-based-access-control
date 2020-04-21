<?php
use PHPUnit\Framework\TestCase;

class DatabaseTest extends TestCase
{
    use \PHPUnit\DbUnit\TestCaseTrait;

    private static $pdo = null;
    private $conn = null;

    public function getConnection()
    {
        if($this->conn == null){
            if(self::$pdo == null){
                self::$pdo = new \PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD']);
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo,$GLOBALS['DB_DBNAME']);
        }
        return $this->conn;
    }

    public function getDataSet()
    {
        $dataSet = $this->createMySQLXMLDataSet(__dir__.'/files/rbac.xml');
        return $dataSet;
    }

    public function testInfo(){
        // 获取待插入的数据
        $dataset = $this->getDataSet()->getTable("rbac_user");
        // 获取数据库数据
        $databaseData = $this->getConnection()->createQueryTable("rbac_user","select * from rbac_user");
        // 设置断言，将两者比较
        $this->assertTablesEqual($dataset,$databaseData);
    }
}