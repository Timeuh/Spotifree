<?php

namespace exception;

use JetBrains\PhpStorm\NoReturn;

class PasswordNotStrongException extends \Exception {

    #[NoReturn] public function __construct() {
        parent::__construct();
        header("GET: ../pages/register.php?error=passwordForce");
        exit();
    }
}