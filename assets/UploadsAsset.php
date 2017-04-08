<?php

namespace huanguang\image\assets;
use Yii;
use yii\web\AssetBundle;

/**
 * @link http://www.yii-china.com/
 * @copyright Copyright (c) 2015 Yii中文网
 * @author Xianan Huang <xianan_huang@163.com>
 */
class UploadsAsset extends AssetBundle
{
    public $css = [
        'css/diyupload/css/webuploader.css',
    	'css/diyupload/css/diyUpload.css',
    ];
    
    public $js = [
        //'js/jquery.js',
        'css/diyupload/js/webuploader.html5only.min.js',
    	'css/diyupload/js/diyUpload.js',
    	
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
    ];
    public $jsOptions = [  
        'position' => \yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置  
    ]; 
 
    
    /**
     * 初始化：sourcePath赋值
     * @see \yii\web\AssetBundle::init()
     */
    public function init()
    {
        $this->sourcePath = dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR . 'statics';
    }

    // public static function addscript($view, $jsfile) { 
    // $view->registerJsFile($jsfile, [UploadsAsset::className(), 'depends' => 'vendor\huanguang\image\assets\UploadsAsset']); 
    // } 

     public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [UploadsAsset::className(),]);
    }

}