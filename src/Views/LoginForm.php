<?php

namespace Views;


class LoginForm extends View
{
    public function __construct()
    {
        $this->content = <<<LOGIN_FORM
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Example Login Form</title>
    </head>
    <body>
    <link rel="stylesheet" type="text/css" href="style.css">
        <div align="center">
            <form method="POST" action="/auth">
                Username: <input type="text" name="username" size="15" /><br />
                Password: <input type="password" name="password" size="15" /><br />
                <input type="radio" name="authType" value="file" checked>File Based
                <input type="radio" name="authType" value="memory" >In Memory
                <input type="radio" name="authType" value="db" >Data Base
                <input type="radio" name="authType" value="lite" >SQLite
                <p><input type="submit" value="Login" /></p>
            </form>
        </div>
    </body>
</html>
LOGIN_FORM;
    }
}
