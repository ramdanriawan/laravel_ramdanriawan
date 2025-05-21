<?php


namespace App\Services\ServiceImpl\env;


class EnvServiceImpl implements EnvService
{
    public static function getNoImageFilePath()
    {
        return env('NO_IMAGE_FILE_PATH');
    }

    public static function getImageUploadDirectory()
    {
        return env('IMAGE_UPLOAD_DIR');
    }
}
