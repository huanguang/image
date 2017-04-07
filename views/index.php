<?php
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
?>

<div class="div_sc">
				<h2>上传电脑中图片</h2>
				<div id="test1" ></div>
				<div class="parentFileBox" style="width: 180px;"> 						
					<ul class="fileBoxUl">
						
					</ul>					
				</div>
				<script type="text/javascript">
					/*
					* 服务器地址,成功返回,失败返回参数格式依照jquery.ajax习惯;
					* 其他参数同WebUploader
					*/
					$('#test1').diyUpload({
						url:"{:U('Sell/fileupload')}",
						success:function( data ) {
							var span =$("<input type='hidden' value='"+data.imgname+"' name='img[]'>");
							$("#tttt").val(1);
							$("#test1").append(span);
						},
						error:function( err ) {
							console.info( err );	
						}
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
				             url: "{:U('Sell/del_img')}",
				             data: {id:id,imgurl:imgurl},
				             dataType: "json",
				             success: function(datas){
				             		if(datas == '1'){
				             			$("#"+data).remove();
				             		}else if(datas == '0'){
				             			alert('删除失败，请稍后重试！！！');
				             		}else{
				             			alert('连接服务器失败，请稍后重试！！！');
				             		}
						           	                         	 		                         	 
		                      }
         				});
         				
					}
				</script>
                <div class="clear"></div>
	    	</div>