<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/24
 * Time: 15:10
 */
error_reporting(0);
header('content-type:text/html;charset=utf-8');
session_start();
$files = $_FILES['files'];
$photosName = $_POST['photosName'];
$_SESSION['photosName']=$photosName;
$water = $_POST['water'];

/*var_dump($photosName);
echo count($files['name']);
echo '<hr/>','<pre>';
var_dump($files);
exit;*/




//将图片移动到文件夹中
function mov($file){
    $num= count($file['name']);
    $nfiles=[];

    for($i=0;$i<$num;$i++){
        if($file['error'][$i]){ // 防止上传失败
            continue;
        }
        //将得到的数据整理
        $nfiles[$i]['name'] = $file['name'][$i];
        $nfiles[$i]['type'] = $file['type'][$i];
        $nfiles[$i]['tmp_name'] = $file['tmp_name'][$i];
        $nfiles[$i]['error'] = $file['error'][$i];
        $nfiles[$i]['size'] = $file['size'][$i];
    }
    $files = [];
    foreach ($nfiles as $key=>$file){
        $style=['jpeg','png','gif'];
        $ext=trim(strstr($file['type'],'/'),'/');
        if(!in_array($ext,$style)){
            continue;
        }
        if($file['size']>(1024*1024*2)){
            continue;
        }
        global $photosName;
        //移动文件
        $newFile =date('YmdHi').mt_rand(1000,9999).'.'.$ext;
        $ul="../photoDatabase/".$_SESSION['name']."/".$photosName."/".$newFile;
        if(move_uploaded_file($file['tmp_name'],'../photoDatabase/'.iconv('utf-8', 'gbk',$_SESSION['name']).'/'.iconv('utf-8', 'gbk',$photosName).'/'.$newFile)){

            $files[$key][] = $newFile;
            $files[$key][] = $ul;
        }
    }
    return $files;
}
/*echo "<pre>";
var_dump($rows);
    exit;*/
$rows=mov($files);
//保存各种数据
$link=mysqli_connect('localhost','root','root','work');
if(mysqli_connect_errno()){
    exit('数据库连接失败'.mysqli_connect_error());
}
mysqli_set_charset($link,'utf8');
$resul=mysqli_query($link,"select aid from album where aname='{$photosName}'");
/*var_dump($resul);
exit;*/
$aid = mysqli_fetch_assoc($resul)['aid'];

/*echo $aid;
exit;*/
$kongzhi=0;
foreach ($rows as $val){
    $rest=mysqli_query($link,"insert into photo values(null,{$aid},'{$val[0]}','{$val[1]}')");
    if($rest){
        $kongzhi=1;
    }
}
mysqli_close($link);


if($water=='是'){
    $position = $_POST['position'];
    $cont = (string)$_POST['cont'];
    //获取文件并打开资源
    foreach ($rows as $val){
        $img=imagecreatefromjpeg(iconv('utf-8','gbk',$val[1]));
        $imgXY = getimagesize(iconv('utf-8','gbk',$val[1]));
        //cd水印图片，并保存
        $imgNew = imagecreatetruecolor(350,50);
        $white = imagecolorallocate($imgNew,255,255,255);
        $black = imagecolorallocate($imgNew,0,0,0);
        imagefill($imgNew,0,0,$white);

        imagefttext($imgNew,18,0,5,30,$black,'./fonts/FZLTCXHJW.TTF',$cont);
        /*imagecopymerge($img,$imgNew,50,50,0,0,350,50,100);
        //输出图片
        header("Content-Type:image/jpeg");
        imagejpeg($img);
        //关闭资源
        imagedestroy($imgNew);
        imagedestroy($img);
        exit;*/
        if($position==1){
            //拷贝并合并图像的一部分(图片水印)
            imagecopymerge($img,$imgNew,50,50,0,0,350,50,50);
            //输出图片

            $rest=imagejpeg($img,iconv('utf-8','gbk',$val[1]));
            if($rest){
                echo "<script>alert('水印添加成功');window.location.href='../photo.php?right=1'</script>";
            }else{
                echo "<script>alert('水印添加失败');window.location.href='../photo.php?right=1'</script>";
            }
            //关闭资源
            imagedestroy($imgNew);
            imagedestroy($img);
        }elseif ($position==2){
            imagecopymerge($img,$imgNew,0,($imgXY[1]-100),0,0,350,50,50);

            $rest=imagejpeg($img,iconv('utf-8','gbk',$val[1]));
            if($rest){
                echo "<script>alert('水印添加成功');window.location.href='../photo.php?right=1'</script>";
            }else{
                echo "<script>alert('水印添加失败');window.location.href='../photo.php?right=1'</script>";
            }
            imagedestroy($imgNew);
            imagedestroy($img);
        }elseif ($position==3){
            imagecopymerge($img,$imgNew,($imgXY[0]-400),0,0,0,350,50,50);

            $rest=imagejpeg($img,iconv('utf-8','gbk',$val[1]));
            if($rest){
                echo "<script>alert('水印添加成功');window.location.href='../photo.php?right=1'</script>";
            }else{
                echo "<script>alert('水印添加失败');window.location.href='../photo.php?right=1'</script>";
            }
            imagedestroy($imgNew);
            imagedestroy($img);
        }elseif ($position==4){
            imagecopymerge($img,$imgNew,($imgXY[0]-400),($imgXY[1]-100),0,0,350,50,50);
            $rest=imagejpeg($img,iconv('utf-8','gbk',$val[1]));
            if($rest){
                echo "<script>alert('水印添加成功');window.location.href='../photo.php?right=1'</script>";
            }else{
                echo "<script>alert('水印添加失败');window.location.href='../photo.php?right=1'</script>";
            }
            imagedestroy($imgNew);
            imagedestroy($img);
        }
    }


}
if($kongzhi==1){
    echo "<script>alert('图片上传成功');window.location.href='../photo.php?right=1'</script>";
}else{
    echo "<script>alert('图片上传失败');window.location.href='../photo.php?right=1'</script>";
}