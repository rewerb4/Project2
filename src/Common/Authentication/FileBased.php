<?php
/**
 * Created by PhpStorm.
 * User: Owner
 * Date: 3/17/2015
 * Time: 6:44 PM
 */

namespace Common\Authentication;


class FileBased implements IAuthentication
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
        $productFile = file_get_contents('../src/Common/Authentication/auth');

        $status = $username.':'.$password;

        //check that both username and password are present
        if (''=== $username || '' === $password )
        {
            echo "incomplete credentials";
            return false;
        }

        //if string is present in file
        if (strpos($productFile, $status) !== false)
        {
            echo 'File Authentication success'." - ".'Hello'." ".$username;
            return true;
        }
        else
        {
            echo 'File Authentication failed';
            return false;
        }

    }

}

?>