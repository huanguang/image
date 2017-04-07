<?php

namespace huanguang\image;
use Yii;
use yii\web\AssetBundle;

/**
 * @link http://www.yii-china.com/
 * @copyright Copyright (c) 2015 Yii中文网
 * @author Xianan Huang <xianan_huang@163.com>
 */
class UploadyAsset extends AssetBundle
{
    public $css = [
        'css/diyupload/css/webuploader.css',
    	'css/diyupload/css/diyUpload.css',
    ];
    
    public $js = [
        'js/jquery.js',
    	'css/diyupload/js/diyUpload.js',
    	'css/diyupload/js/webuploader.html5only.min.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
    ];
    
    /**
     * 初始化：sourcePath赋值
     * @see \yii\web\AssetBundle::init()
     */
    public function init()
    {
        $this->sourcePath = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR . 'statics';
    }
}