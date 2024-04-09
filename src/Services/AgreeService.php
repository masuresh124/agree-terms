<?php

namespace Masuresh124\AgreeTerms\Services;

class AgreeService
{
    const IS_AGREED_APPROVE = 1;
    public function agree($user)
    {
        $user->is_agreed = self::IS_AGREED_APPROVE;
        $user->save();
    }
}
