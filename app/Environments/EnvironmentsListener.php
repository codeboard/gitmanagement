<?php namespace Codeboard\Environments;

interface EnvironmentsListener
{
    public function environmentRedirect($data = null);
}