<?php

namespace App\Helpers;

class Upload
{

    private $path;

    private $fullpath;


    public function __construct()
    {
        $this->path = 'assets/uploads/'.date('Y/m/d/');
    }

    public function setPath($path)
    {
        return $this->path = $path;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function setFullPath($fullpath)
    {
        return $this->fullpath = $this->path.$fullpath;
    }

    public function getFullPath()
    {
        return $this->fullpath;
    }

    public function move($file, $fileName = 'filename')
    {
        $fileName = (is_bool($fileName) && $fileName = true)
            ? $file->getClientOriginalName()
            : $fileName.'.'.$file->extension();

        $this->setFullPath($fileName);
        return $file->move($this->path, $this->fullpath);
    }

    public function moveEncrypt($file)
    {
        $this->setFullPath($file->hashName());
        return $file->move($this->path, $this->fullpath);
    }

    public function delete($paths)
    {
        $path = is_array($paths)
            ? $paths
            : public_path($paths);

        return \Illuminate\Support\Facades\File::delete(
            $path
        );
    }
}
