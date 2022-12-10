<?php

namespace timeuh\spotifree\exception;

use JetBrains\PhpStorm\NoReturn;

class PasswordNotStrongException extends \Exception {

    #[NoReturn] public function __construct() {
        parent::__construct();
        header("Location: ../pages/register.php?error=passwordForce");
        exit();
    }
}