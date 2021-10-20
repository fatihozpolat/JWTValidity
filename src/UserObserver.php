<?php

namespace FatihOzpolat\JWTValidity;

class UserObserver
{
    public function deleted(User $user)
    {
        Manager::blockTokens($user);
    }
}
