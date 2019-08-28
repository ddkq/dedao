<?php
define('WATER_PATH','public/images/logo.png');//水印图地址
function sp_get_url_route(){
	$apps=sp_scan_dir(SPAPP."*",GLOB_ONLYDIR);
	$host=(is_ssl() ? 'https' : 'http')."://".$_SERVER['HTTP_HOST'];
	$routes=array();
	foreach ($apps as $a){
	
		if(is_dir(SPAPP.$a)){
			if(!(strpos($a, ".") === 0)){
				$navfile=SPAPP.$a."/nav.php";
				$app=$a;
				if(file_exists($navfile)){
					$navgeturls=include $navfile;
					foreach ($navgeturls as $url){
						//echo U("$app/$url");
						$nav= file_get_contents($host.U("$app/$url"));
						$nav=json_decode($nav,true);
						if(!empty($nav) && isset($nav['urlrule'])){
							if(!is_array($nav['urlrule']['param'])){
								$params=$nav['urlrule']['param'];
								$params=explode(",", $params);
							}
							sort($params);
							$param="";
							foreach($params as $p){
								$param.=":$p/";
							}
							
							$routes[strtolower($nav['urlrule']['action'])."/".$param]=$nav['urlrule']['action'];
						}
					}
				}
					
			}
		}
	}
	
	return $routes;
}

/*
 文件上传

 */
function uploads($filedata){
	$types = array(
		'.png','.jpg','.jpeg','.gif','.bmp','.ico'
	);
	if(!empty($filedata)){
		$fileName = $filedata['name'];
		$tmpName = $filedata['tmp_name'];
		$size = $filedata['size'];
			
		if($filedata['error'] == 0){
			$dirName = 'upload/'.date('Y-m-d').'/';
			//var_dump($dirName);exit;
			$predix = mb_substr($fileName,mb_strrpos($fileName,'.','0','utf-8'),mb_strlen($fileName,'utf-8'),'utf-8');
			if(!in_array($predix,$types)){
				return '不支持该'.$predix.'文件格式';
			}
			$destinationName = time().rand().$predix;
			if(!file_exists($dirName)){
				mkdir($dirName);
			}
			if(move_uploaded_file($tmpName,$dirName.$destinationName)){
				$filedata['realPath'] = $dirName.$destinationName;
				$filedata['realDir'] = $dirName;
				$filedata['realName'] = $destinationName;
				return $filedata;
			}else{
				return "上传失败";
			}
		}else{
			return "上传发生错误，请稍后重试!!";
		}
	}
}

/**
 * 图片加水印
 * @param String $filename 原图地址
 * @param String $watername 水印图地址
 * @param String $path 合成后的图片保存地址，若为空则覆盖原图
 * @param Int $offset [1-9]水印在图片的位置
 */
function watermark($filename, $watername, $path = '', $offset = 9){
	//获取原图信息
	$img_info = getimagesize($filename);

	$w = $img_info[0]; //原图宽度
	$h = $img_info[1]; //原图高度

	//定义新图片名称
	$newImage = 'thumb_' . date('YmdHis') . rand(1000,9999);
	//echo $newImage;

	//根据原图类型加载原图
	switch($img_info[2]){
		case 1:
			$imgCreate = imagecreatefromgif($filename);
			$newImage = $newImage . '.gif';
			break;
		case 2:
			$imgCreate = imagecreatefromjpeg($filename);
			$newImage = $newImage . '.jpg';
			break;
		case 3:
			$imgCreate = imagecreatefrompng($filename);
			$newImage = $newImage . '.png';
			break;
		default:
			return false;
	}

	//获取水印图信息
	$water_info = getimagesize($watername);
	$width = $water_info[0]; //水印图片宽度
	$height = $water_info[1]; //水印图片高度

	//var_dump($water_info);
	//根据水印图类型加载水印图
	switch($water_info[2]){
		case 1:
			$waterCreate = imagecreatefromgif($watername);
			break;
		case 2:
			$waterCreate = imagecreatefromjpeg($watername);
			break;
		case 3:
			$waterCreate = imagecreatefrompng($watername);
			break;
		default:
			return false;
	}

	if($width>$w || $height>$h){
		//水印图宽高超过原图一半，则无法生成水印！
		//echo 'aaa';
		return false;
	}

	//定位水印图在原图中的位置
	switch($offset){
		case 0://随机
			$posX = rand(0,($w - $width));
			$posY = rand(0,($h - $height));
			break;
		case 1://1为顶端居左
			$posX = 0;
			$posY = 0;
			break;
		case 2://2为顶端居中
			$posX = ($w - $width) / 2;
			$posY = 0;
			break;
		case 3://3为顶端居右
			$posX = $w - $width;
			$posY = 0;
			break;
		case 4://4为中部居左
			$posX = 0;
			$posY = ($h - $height) / 2;
			break;
		case 5://5为中部居中
			$posX = ($w - $width) / 2;
			$posY = ($h - $height) / 2;
			break;
		case 6://6为中部居右
			$posX = $w - $width;
			$posY = ($h - $height) / 2;
			break;
		case 7://7为底端居左
			$posX = 0;
			$posY = $h - $height;
			break;
		case 8://8为底端居中
			$posX = ($w - $width) / 2;
			$posY = $h - $height;
			break;
		case 9://9为底端居右
			$posX = $w - $width;
			$posY = $h - $height;
			break;
		default://随机
			$posX = rand(0,($w - $width));
			$posY = rand(0,($h - $height));
			break;
	}

	//设定图像的混色模式
	imagealphablending($imgCreate, true);
	//拷贝水印到目标文件
	imagecopy($imgCreate, $waterCreate, $posX, $posY, 0, 0, $width,$height);

	//生成加了水印的图片，如果$path为空则覆盖原图
	switch($img_info[2]){
		case 1:
			if(empty($path))
				imagegif($imgCreate, $filename);
				else
					imagegif($imgCreate, $path.$newImage);
				break;
		case 2:
			if(empty($path))
				imagejpeg($imgCreate, $filename);
				else
					imagejpeg($imgCreate, $path.$newImage);
				break;
		case 3:
			if(empty($path))
				imagepng($imgCreate, $filename);
				else
					imagepng($imgCreate, $path.$newImage);
				break;
	}

	//如果$path为空则输出true，否则输出新的水印图名称
	return empty($path) ? true : $newImage;
}

/**
 * 获取配置详细列表
 */
function sp_cat_list($id){
	$obj = D("Common/ArticleCat");
	$list=$obj->where("cat_value=".$id)->select();
	return $list;
}
