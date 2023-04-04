<?php

use utils\Generators;
use webParticle\Sections;

include '../config.php';
include '../businessLogic/utils/Generators.php';
include '../businessLogic/database/Generic.php';
include '../businessLogic/database/Inventory.php';
include '../businessLogic/database/Labs.php';
include '../businessLogic/database/Management.php';
include '../businessLogic/database/User.php';
include '../businessLogic/webParticle/Components.php';


class Test
{
    public static function testClass(): string
    {
        return "Hey! I'm working! :D" . Generators::generateUUID();
    }

}
