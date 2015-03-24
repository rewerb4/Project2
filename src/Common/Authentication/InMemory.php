<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 3/17/2015
 * Time: 6:44 PM
 */

namespace Common\Authentication;


class InMemory implements IAuthentication

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
        if ($username !== 'mat')
        {
            echo "Memory Authentication failed.";
            return false;
        }
        if ($password !== 'hello')
        {
            echo "Memory Authentication failed";
            return false;
        }
        echo 'Memory Authentication success'." - ".'Hello'." ".$username;
        return true;
    }


}