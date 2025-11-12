<?php

namespace App\Services;

use App\Models\File as FileModel;


class FileService
{
    public function createFile(array $data): FileModel
    {
        return FileModel::create($data);
    }
}