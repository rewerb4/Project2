<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 3/17/2015
 * Time: 7:08 PM
 */

namespace Common\Authentication;

use PDO;


class MySql implements IAuthentication
{
    /**
     * Function authenticate
     *
     * @param string $username
     * @param string $password
     * @return mixed
     *
     * @access public
     */
    public function authenticate($username, $password)
    {
        // TODO: Implement authenticate() method.
        //configuration
        $dbhost = "localhost";
        $dbname = "login";
        $dbuser = "root";
        $dbpass = "12qwaszx";


        //database connection

        try{
            $conn = new PDO("mysql:host = $dbhost;dbname=$dbname",$dbuser,$dbpass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            echo "connection failed:".$e->getMessage();
        }

        //no empty values
        if ($username == '')
        {
            echo "must enter user name";
            return false;
        }
        if ($password == '')
        {
            echo "must enter password";
            return false;
        }

        //query database
        $result = $conn->prepare("SELECT * FROM `users` WHERE BINARY `username` = '$username' AND BINARY password= '$password'");
        $result->execute();
        $count = $result->rowCount();

        //if record is present then authenticate
        if($count == 1)
        {

            echo "database authentication success - Welcome  ".$username;
            return true;
        }
        else
        {
            echo "database authentication failed";
            return false;
        }
    }

}