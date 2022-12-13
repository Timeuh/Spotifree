<?php

namespace timeuh\spotifree\exception;

use JetBrains\PhpStorm\NoReturn;

class AlreadyRegisteredException extends \Exception {

    #[NoReturn] public function __construct() {
        parent::__construct();
        header("Location: ../pages/register.php?error=alreadyExist");
        exit();
    }
}