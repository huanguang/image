<?php
namespace huanguang\image;
/**
 * 设置挂件
 * @author huanguang （923414405@qq.com）
 * @copyright 
 */
use Yii;
use yii\bootstrap\Widget;
use huanguang\image\assets\UploadAsset;
use yii\base\Object;

class UploadWidget extends Widget
{    
    public $imageUrl = '';
    
    public function run()
    {
        $this->registerClientScript();
        $model = new UploadForm();        
        return $this->render('index',['model'=>$model]);
    }
    
    public function registerClientScript()
    {
        AvatarAsset::register($this->view);
        //$script = "FormFileUpload.init();";
        //$this->view->registerJs($script, View::POS_READY);
    }
}