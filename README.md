# image
图片上传
====
多图上传yii2组件,


Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require huanguang/image=1.1.0
```

or add

```
"huanguang/image": "1.1.0"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php

//在当前控制器的actions中添加如下配置
  public function actions()
        {
            return [
                'image-upload' => [
                        'class' => UploadsAction::className(),
                        //磁盘目录
                        'basePath' => '@webroot/upload',
                        //访问目录
                        'baseUrl' => '@web/upload',
                        //配置目录，注意前后加“/”
                        'CatalogFormat' => '/'.date('Y/m/d').'/',
                        //允许上传文件的格式
                        'allowtype' => ['gif', 'png', 'jpg','jpeg'],
                        //上传文件大小限制
                        'maxsize' =>2000000,
                        //保存后的图片名称是否随机true/false
                        'israndname' => true,
                ],
                //删除文件
                'image-del' => [
                        'class' => ImgdelAction::className(),
                        //磁盘目录
                        'basePath' => '@webroot/upload',
                        'baseUrl' => '@web/upload',
                ],
        ];
}
 
//调用方式,imageUrl为默认图地址
<?= \huanguang\image\UploadWidget::widget([
    'imageUrl' => [['id'=>1,'imgurl'=>'/2017/04/08/20170408032608_916.jpg'],['id'=>2,'imgurl'=>'/2017/04/08/20170408031527_697.jpg'],['id'=>3,'imgurl'=>'/2017/04/08/20170408031927_169.jpg']],//图片数据
    'imgpath'=>'@web/upload',//磁盘目录
    'title'=>'上传电脑中的图片',//标题
    'imgtile'=>'images/sctp.jpg',//选择按钮背景图片
    'buttonText'=>'',//选择按钮标题，此处为图片，默认为空
    'fileNumLimit'=>10,//允许上传文件数量
    'fileSizeLimit'=>512000000,//允许总的文件大小
    'fileSingleSizeLimit'=>51200000,//允许单个文件上传大小
    'chunkSize'=>524288,//分片大小
    ]); ?>
