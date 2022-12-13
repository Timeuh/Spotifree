<?php

namespace timeuh\spotifree\exception;

class AlreadyRegisteredException extends \Exception {

    public function __construct() {
        parent::__construct();
        header("Location: ../pages/register.php?error=alreadyExist");
        exit();
    }
}