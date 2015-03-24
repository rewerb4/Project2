<?php
/**
 * File name: AuthController.php
 *
 * Project: Project1
 *
 * PHP version 5
 *
 * $LastChangedDate$
 * $LastChangedBy$
 */

namespace Controllers;

use Common\Authentication\FileBased;
use Common\Authentication\InMemory;
use Common\Authentication\MySql;
use Common\Authentication\SqLite;



/**
 * Class AuthController
 */
class AuthController extends Controller
{
    /**
     * Function execute
     *
     * @access public
     */

    public function action()
    {
        $postData = $this->request->getPost();


       //echo 'Authenticate the above two different ways' . var_dump($postData);
        if($postData->authType ==="memory") {
            $authorize = new InMemory();
            $authorize->authenticate($postData->username, $postData->password);
        }
        if($postData->authType ==="file") {
            $authorize = new FileBased();
            $authorize->authenticate($postData->username, $postData->password);
        }
        if($postData->authType ==="db") {
            $authorize = new MySql();
            $authorize->authenticate($postData->username, $postData->password);
        }
        if($postData->authType ==="lite") {
            $authorize = new SqLite();
            $authorize->authenticate($postData->username, $postData->password);
        }

        //$authorize->authenticate($postData->username, $postData->password);

        // example code: $auth = new Authentication($postData['username'], $postData['password']);
    }
}
