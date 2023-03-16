<?php

include '../config.php';
include '../businessLogic/Generators.php';
class Test
{
    public static function testClass(): string
    {
        return "Hey! I'm working! :D".Generators::generateUUID();
    }

}
