<?php
namespace huanguang\image;
/**
 * 设置挂件
 * @author huanguang （923414405@qq.com）
 * @copyright 
 */
use Yii;
use yii\bootstrap\Widget;
use huanguang\image\assets\UploadsAsset;
use yii\base\Object;

class UploadWidget extends Widget
{    
    public $imageUrl = [];//图片数据
    public $imgpath;//图片所在磁盘
    public $title = '上传电脑中的图片';//标题
    public $imgtile = 'images/sctp.jpg';//选择按钮背景图片
    public $buttonText = '';//一般为空，无需填写
    public $fileNumLimit = 10;//最大上传文件数量
    public $fileSizeLimit = 512000000;//所有上传文件大小
    public $fileSingleSizeLimit = 51200000;//单个文件大小限制
    public $chunkSize = 524288;//分片大小
    public function run()
    {
        //print_r($this->imageUrl);die;
        $this->registerClientScript();
        //$model = new UploadForm();

        $config = [
            'imgpath' => $this->imgpath,
            'title' => $this->title,
            'imgtile' => $this->imgtile,
            'buttonText' => $this->buttonText,
            'fileNumLimit' => $this->fileNumLimit,
            'fileSizeLimit' => $this->fileSizeLimit,
            'fileSingleSizeLimit' => $this->fileSingleSizeLimit,
            'chunkSize' => $this->chunkSize,
        ];        
        return $this->render('index',['model'=>$this->imageUrl,'data'=>$config]);
    }
    
    public function registerClientScript()
    {
        UploadsAsset::register($this->view);
    }
}