<?php

namespace App\Helpers;

use Spatie\MediaLibrary\MediaCollections\Models\Media;

class HelperMethods
{
    /**
     * Return true if is an image
     * Can be called like this \App\Facades\HelperMethods::isImage($user->getFirstMedia('avatar'))
     * @param Media $media
     * @return bool
     */
    public static function isImage(Media $media){
        return str_contains($media->mime_type , 'image');
    }

    /**
     * Return true if is a video
     * Can be called like this \App\Facades\HelperMethods::isVideo($user->getFirstMedia('file'))
     * @param Media $media
     * @return bool
     */
    public static function isVideo(Media $media) : bool
    {
        return str_contains($media->mime_type , 'video') || str_contains($media->mime_type , 'application/x-mpegURL');
    }

    /**
     * Return the file size in human readable format
     * @param $size in bytes
     * @param int $precision
     * @return string
     */
    public static function bytesToHuman($bytes, $precision = 2) : string
    {
        $units = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
        $step = 1024;
        $i = 0;
        while (($bytes / $step) > 0.9) {
            $bytes = $bytes / $step;
            $i++;
        }
        return round($bytes, $precision) . ' ' . $units[$i];
    }

    /**
     * Return the languages available on the platform
     * @return array
     */
    public static function getLangArray() : array
    {
        return [
            'PT' => __('Portuguese'),
            'EN' => __('English'),
        ];
    }

    /**
     * Return the language that the user want
     * @return String
     * @throws \Psr\Container\ContainerExceptionInterface
     * @throws \Psr\Container\NotFoundExceptionInterface
     */
    public static function getLang() : String
    {
        //check lang if requested on request otherwise check if user is logged in and use the lang options
        if(empty($lang = request()->get('lang',null))){
            if(auth()->guest()){
                $lang = 'PT';
            }else{
                $lang = auth()->user()->lang;
            }
            return $lang;
        }
        //check if the requested lang is valid otherwise use PT
        if(isset(self::getLangArray()[$lang]))
            return $lang;
        else
            return 'PT';
    }
}
