<?php

namespace huanguang\image;

use Closure;
use Yii;
use yii\base\Action;
use yii\helpers\VarDumper;
use yii\validators\FileValidator;
use yii\web\HttpException;
use yii\web\UploadedFile;
use yii\base\Exception;
use huanguang\image\FileUpload;
use yii\helpers\FileHelper;//创建目录文件夹

/**
 * @author xjflyttp <xjflyttp@gmail.com>
 */
class UploadsAction extends Action
{

    /**
     * SavePath
     * @var string
     */
    public $basePath = '@webroot/upload';


    //存储目录格式
    public $CatalogFormat;
    //创建文件权限
    public $mode = '0777';
    //可以的文件格式
    public $allowtype = ['gif', 'png', 'jpg','jpeg'];
    //最大大小限制
    public $maxsize = 2000000;

    //保存后的图片名称是否随机/false
    public $israndname = true;
    /**
     * WebUrl
     * @var string
     */
    public $baseUrl = '@web/upload';

    //删除图片的操作方法




    public function init()
    {
        $this->basePath = Yii::getAlias($this->basePath);//获取实际磁盘
        $this->baseUrl = Yii::getAlias($this->baseUrl); //获取访问路径
        $this->fileupload();
        return parent::init();
    }

    public function run()
    {

    }

     //文件上传
    public function fileupload(){



            $up = new FileUpload;

            //设置属性(上传的位置， 大小， 类型， 名是是否要随机生成)

            $dir = $this->basePath.$this->CatalogFormat;
            if(FileHelper::createDirectory($dir,$this->mode,true)){

                $up -> set("path",$dir);
                $up -> set("maxsize", $this->maxsize);
                $up -> set("allowtype", $this->allowtype);
                $up -> set("israndname", $this->israndname);

                //使用对象中的upload方法， 就可以上传文件， 方法需要传一个上传表单的名子 pic, 如果成功返回true, 失败返回false
                if($up -> upload("file")) {
                    //获取上传后文件名子
                    $imgname = $up->getFileName();
                    $arr = array("imgname"=>$this->CatalogFormat.$imgname,'error'=>'0','msg'=>'上传成功！');
                } else {

                    //获取上传失败以后的错误提示

                    $arr = array("imgname"=>'','error'=>1,'msg'=>$up->getErrorMsg());
                }
            }else{
                $arr = array("imgname"=>'','error'=>1,'msg'=>'文件夹创建失败！！');
            }
        echo json_encode($arr);die;

    }

}