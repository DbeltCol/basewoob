<?php

namespace Interfaces;

interface IUser
{

    public function execute(array $array);

    public function userWithSpecificPermission(int $permission);
}
