<?php

namespace Masuresh124\AgreeTerms\Traits;

trait AgreeTermsTrait
{

    /**
     * This function is used to validate is agreed or not
     */
    public function hasAgreedTerms()
    {
        return $this->is_agreed ? true : false;
    }

    /**
     * This function is used to add some other addtional condition
     */
    public function skipAgreedTerms()
    {
        return false;
    }
}
