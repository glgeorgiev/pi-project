<?php

namespace App\Helpers;

use File;
use Request;

trait Avatar
{
    public static $filepath = 'uploads/avatars';

    public static function getFilePath()
    {
        return public_path(static::$filepath);
    }

    public function getFileName()
    {
        return $this->getKey() . '.' . $this->getAttribute('avatar_ext');
    }

    public function getUrlAttribute()
    {
        return asset(static::$filepath . '/' . $this->getFileName());
    }

    public function getImagePathAttribute()
    {
        return static::getFilePath() . '/' . $this->getFileName();
    }

    public static function boot()
    {
        self::created(function($model) {
            if (Request::hasFile('avatar')) {
                $model->uploadFile();
            }
        });
        self::updated(function($model) {
            if (Request::hasFile('avatar')) {
                $model->deleteFile();
                $model->uploadFile();
            }
        });
        self::deleting(function($model) {
            $model->deleteFile();
        });
    }

    protected function uploadFile()
    {
        $file = Request::file('avatar');
        if (! $file->isValid()) {
            return null;
        }
        $this->avatar_ext = $file->getClientOriginalExtension();
        $file->move($this->getFilePath(), $this->getFileName());
        $this->save();
    }

    protected function deleteFile()
    {
        $file = $this->getFilePath() . '/' . $this->getFileName();
        if (File::isFile($file)) {
            File::delete($file);
        }
    }
}
