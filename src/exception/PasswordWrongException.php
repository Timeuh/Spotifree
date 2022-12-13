<?php

namespace timeuh\spotifree\exception;

use JetBrains\PhpStorm\NoReturn;

class PasswordWrongException extends \Exception {

    #[NoReturn] public function __construct() {
        parent::__construct();
        header("Location: ../pages/login.php?error=wrongPassword");
        exit();
    }
}