<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
// use huanguang\image\assets\UploadsAsset;
// UploadsAsset::register($this);
// UploadsAsset::addscript($this,'/js/jquery.js');
// UploadsAsset::addscript($this,'/css/diyupload/js/webuploader.html5only.min.js');
// UploadsAsset::addscript($this,'/css/diyupload/js/diyUpload.js');
?>

<div class="div_sc form-group">
				<h2><?=$data['title']?></h2>
				<div id="test1" style="    background: url(<?=$data['imgtile']?>) no-repeat center center;" ></div>
				<div class="parentFileBox" style="width: 180px;"> 						
					<ul class="fileBoxUl">
					<?php if(!empty($model)):?>
					<?php foreach($model as $key => $value):?>
						<li class="diyUploadHover" id="aaa<?=$value['id']?>"> 
							<div class="viewThumb">
								<?= Html::img($data['imgpath'].$value['imgurl'])?>
							</div>
							<div class="diyCancel" onclick="del_img(<?=$value['id']?>,'<?=$value['imgurl']?>','aaa<?=$value['id']?>');"></div> 			
						</li>
					<?php endforeach;?>
				<?php endif;?>
					</ul>					
				</div>
				<script type="text/javascript">
					/*
					* 服务器地址,成功返回,失败返回参数格式依照jquery.ajax习惯;
					* 其他参数同WebUploader
					*/
					$('#test1').diyUpload({
						url:"<?= Url::to(['image-upload']);?>",
						success:function( data ) {
							if(data.error == 0){
								var span =$("<input type='hidden' value='"+data.imgname+"' name='img[]'>");
								//$("#tttt").val(1);
								$("#test1").append(span);
							}
						},
						error:function( err ) {
							console.info( err );	
						},
						buttonText : '<?=$data['buttonText']?>',
						chunked:true,
						// 分片大小
						chunkSize:<?=$data['chunkSize']?>,
						//最大上传的文件数量, 总文件大小,单个文件大小(单位字节);
						fileNumLimit:<?=$data['fileNumLimit']?>,
						fileSizeLimit:<?=$data['fileSizeLimit']?>,
						fileSingleSizeLimit:<?=$data['fileSingleSizeLimit']?>,
						accept: {}
					});

					$('#as').diyUpload({
						url:'server/fileupload.php',
						success:function( data ) {
							console.info( data );
						},
						error:function( err ) {
							console.info( err );	
						},
						buttonText : '选择文件',
						chunked:true,
						// 分片大小
						chunkSize:512 * 1024,
						//最大上传的文件数量, 总文件大小,单个文件大小(单位字节);
						fileNumLimit:50,
						fileSizeLimit:500000 * 1024,
						fileSingleSizeLimit:50000 * 1024,
						accept: {}
					});


					function del_img(id,imgurl,data){

						
							$.ajax({
				             type: "POST",
				             url: "<?= Url::to(['image-del']);?>",
				             data: {id:id,imgurl:imgurl},
				             dataType: "json",
				             success: function(datas){
				             		if(datas.error == 0){
				             			$("#"+data).remove();
				             		}else if(datas.error == 1){
				             			alert('删除失败，请稍后重试！！！');
				             		}else{
				             			alert('连接服务器失败，请稍后重试！！！');
				             		}
						           	                         	 		                         	 
		                      }
         				});
         				
					}
				</script>
                <div class="clear" style="clear: both;"></div>
	    	</div>