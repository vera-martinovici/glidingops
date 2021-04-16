<?php
require_once  dirname(__FILE__) . "/interfaceIEnvironment.php";
class DevEnvironment implements IEnvironment
{
    private $primaryDBParams = null;
    
    function __construct()
    {
        $this->primaryDBParams = array();
        $this->primaryDBParams['dbname'] = $this->getkey("DATABASE_NAME");
        $this->primaryDBParams['username'] = $this->getkey("DATABASE_USER");
        $this->primaryDBParams['password'] = $this->getkey("DATABASE_PW");
        $this->primaryDBParams['hostname'] = $this->getkey("DATABASE_HOST");
    }

    public function getkey($keyname)
    {
        return getenv($keyname);
    }

    public function getDatabaseParameters()
    {
        return $this->primaryDBParams;
    }

    public function dumpAll()
    {
        //not implemented;
    }
}
?>