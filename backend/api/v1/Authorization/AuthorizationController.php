<?php

namespace api\v1\Authorization;
use Models\Authorization\Authorization;
class AuthorizationController{
    public function __construct(private Authorization $inMemory) {}

    private function confirmCredentialsController(string $email, string $password){
        echo $this->inMemory->confirmUserCredentials($email, $password);
    }
}