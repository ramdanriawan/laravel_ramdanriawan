<?php


namespace App\Services\env;


interface EnvService
{
    public static function getNoImageFilePath();

    public static function getImageUploadDirectory();
}
