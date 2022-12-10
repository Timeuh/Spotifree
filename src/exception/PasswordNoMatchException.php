<?php

namespace exception;

use JetBrains\PhpStorm\NoReturn;

class PasswordNoMatchException extends \Exception {

    #[NoReturn] public function __construct() {
        parent::__construct();
        header("GET: ../pages/register.php?error=passwordDiff");
        exit();
    }
}