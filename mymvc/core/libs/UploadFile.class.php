<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/10/31
 * Time: 18:30
 * 借鉴于网上
 */

class UploadFile {
    //可以在外面自己设置的值，通过set（）函数
    private $path = "./uploads";          //上传文件保存的路径
    private $allowtype = array('jpg','gif','png','jpeg'); //设置限制上传文件的类型
    private $maxsize = 2097152;           //限制文件上传大小（字节）
    private $israndname = true;           //设置是否随机重命名文件， false不随机
    //内部保存的值，可以调用
    private $originName;              //源文件名
    private $tmpFileName;              //临时文件名
    private $fileType;               //文件类型(文件后缀)
    private $fileSize;               //文件大小
    private $newFileName;              //新文件名
    private $errorNum = 0;             //错误号
    private $errorMess="";             //错误报告消息

    /**
     * 用于设置成员属性（$path, $allowtype,$maxsize, $israndname）
     * 可以通过连贯操作一次设置多个属性值
     *@param  string $key  成员属性名(不区分大小写)
     *@param  mixed  $val  为成员属性设置的值
     *@return  object     返回自己对象$this，可以用于连贯操作
     */
    function set($key, $val){
        $key = strtolower($key);  //全部转换为小写
        /**
         * array_key_exists判断第一个值是不是在第二个数组中的值
         * get_class_vars 返回一个由 类 的属性组成的数组
         * get_class($this) 可以得到当前 类 的名字
         */
        if( array_key_exists( $key, get_class_vars(get_class($this) ) ) ){
            //调用一个函数,对传入的属性名进行赋值
            $this->setOption($key, $val);           // function setOption($key, $val) {
        }                                            //$this->$key = $val;
        //将赋值后的结果反馈回去                       //  }
        return $this;
    }

    /**
     * 调用该方法上传文件
     * @param  string $fileFile  上传文件的表单名称
     * @return bool        如果上传成功返回数true
     */

    function upload($fileField) {
        $return = true;  //定义一个反馈值
        /* 检查文件路径是滞合法 */
        if( !$this->checkFilePath() ) {
            //记录错误号并结束
            $this->errorMess = $this->getError();
            return false;
        }
        /* 将文件上传的信息取出赋给变量 */
        $name = $fileField['name']; //上传文件的文件名 'Chrysanthemum.jpg'
        $tmp_name = $fileField['tmp_name']; //服务器端临时文件存放路径 'D:\wamp\tmp\php71E6.tmp'
        $size = $fileField['size']; //上传文件的大小 879394   858 KB (879,394 字节)
        $error = $fileField['error']; //错误信息 0

        /* 如果是多个文件上传则$file["name"]会是一个数组 */
        if(is_Array($name)){    //判断其是不是一个数组
            $errors=array();
            /*多个文件上传则循环处理 ， 这个循环只有检查上传文件的作用，并没有真正上传 */
            for($i = 0; $i < count($name); $i++){
                /*设置文件信息 */
                if($this->setFiles($name[$i],$tmp_name[$i],$size[$i],$error[$i] )) {
                    //判断大小或类型是否正确
                    if(!$this->checkFileSize() || !$this->checkFileType()){//如果其中有一个错误
                        //保存错误号，结束
                        $errors[] = $this->getError();
                        $return=false;
                    }
                }else{
                    //如果设置不成功，保存错误号，结束
                    $errors[] = $this->getError();
                    $return=false;
                }
                /* 如果有问题，则重新初使化属性 */
                if(!$return)
                    $this->setFiles();
            }
            //只要有一个上传失败则反馈错误信息
            //上面把所以的数据都保存在属性中，
            if($return){
                /* 存放所有上传后文件名的变量数组 */
                $fileNames = array();
                /* 如果上传的多个文件 都是 合法的，则通过循环向服务器上传文件 */
                for($i = 0; $i < count($name); $i++){
                    if($this->setFiles($name[$i], $tmp_name[$i], $size[$i], $error[$i] )) {
                        //设置新的文件名
                        $this->setNewFileName();
                        if(!$this->copyFile()){  //移动文件，判断移动失败则记录错误号
                            $errors[] = $this->getError();
                            $return = false;
                        }
                        //保存新文件名到一个数组中
                        $fileNames[] = $this->newFileName;
                    }
                }
                //将全部的新名字都保存到属性中
                $this->newFileName = $fileNames;
            }
            //将所有的错误信息都保存到属性中
            $this->errorMess = $errors;
            return $return;
            /*上传单个文件处理方法*/
        } else {
            /* 设置文件信息 */
            if($this->setFiles($name,$tmp_name,$size,$error)) {
                /* 上传之前先检查一下大小和类型 */
                if($this->checkFileSize() && $this->checkFileType()){
                    /* 为上传文件设置新文件名 */
                    $this->setNewFileName();
                    /* 上传文件  返回0为成功， 小于0都为错误 */
                    if($this->copyFile()){
                        return true;
                    }else{
                        $return=false;
                    }
                }else{
                    $return=false;
                }
            } else {
                $return=false;
            }
            //如果$return为false, 则出错，将错误信息保存在属性errorMess中
            if(!$return)
                $this->errorMess=$this->getError();

            return $return;
        }
    }

    /**
     * 获取上传后的文件名称
     * @param  void   没有参数
     * @return string 上传后，新文件的名称， 如果是多文件上传返回数组
     */
    public function getFileName(){  //可以调用的方法，查询所有创建好的文件的新名字
        return $this->newFileName;
    }

    /**
     * 上传失败后，调用该方法则返回，上传出错信息
     * @param  void   没有参数
     * @return string  返回上传文件出错的信息报告，如果是多文件上传返回数组
     */
    public function getErrorMsg(){
        return $this->errorMess;
    }

    /* 设置上传出错信息 */
    private function getError() {

        $str = "上传文件<font color='red'>{$this->originName}</font>时出错 : ";
        switch ($this->errorNum) {
            case 4: $str .= "没有文件被上传"; break;
            case 3: $str .= "文件只有部分被上传"; break;
            case 2: $str .= "上传文件的大小超过了HTML表单中MAX_FILE_SIZE选项指定的值"; break;
            case 1: $str .= "上传的文件超过了php.ini中upload_max_filesize选项限制的值"; break;
            case -1: $str .= "未允许类型"; break;
            case -2: $str .= "文件过大,上传的文件不能超过{$this->maxsize}个字节"; break;
            case -3: $str .= "上传失败"; break;
            case -4: $str .= "建立存放上传文件目录失败，请重新指定上传目录"; break;
            case -5: $str .= "必须指定上传文件的路径"; break;
            default: $str .= "未知错误";
        }
        return $str.'<br>';
    }

    /* 设置和$_FILES有关的内容 */
    private function setFiles($name="", $tmp_name="", $size=0, $error=0) {
        $this->setOption('errorNum', $error);// 1-4的值都是在这里获得的
        if($error){     //上传的号码对应不同的原因
            return false;
        }
        //拿到每一个值
        $this->setOption('originName', $name); //老名
        $this->setOption('tmpFileName',$tmp_name);//临时地址
        //获取类型名称
        $aryStr = explode(".", $name);
        $this->setOption('fileType', strtolower($aryStr[count($aryStr)-1]));//处理类型，并保存
        $this->setOption('fileSize', $size);
        return true;
    }

    /* 为单个成员属性设置值 */
    private function setOption($key, $val) {
        $this->$key = $val;
    }

    /* 设置上传后的文件名称 */
    private function setNewFileName() {
        if ($this->israndname) {
            //设置一个新的名称
            $this->setOption('newFileName', $this->proRandName());
        } else{
            //运用老名称
            $this->setOption('newFileName', $this->originName);
        }
    }

    /* 检查上传的文件是否是合法的类型  类型错误，错误号设为-1*/
    private function checkFileType() {
        if (in_array(strtolower($this->fileType), $this->allowtype)) {
            return true;
        }else {
            $this->setOption('errorNum', -1);
            return false;
        }
    }

    /* 检查上传的文件是否是允许的大小  大小不对，错误号设为-2*/
    private function checkFileSize() {
        if ($this->fileSize > $this->maxsize) {
            $this->setOption('errorNum', -2);
            return false;
        }else{
            return true;
        }
    }

    /* 检查是否有存放上传文件的目录  */
    private function checkFilePath() {
        //检查文件是否为空   目录路径不对设置错误号-5
        if(empty($this->path)){
            //设置错误信息
            $this->setOption('errorNum', -5);
            //结束本次验证
            return false;
        }
        //file_exists — 检查文件或目录是否存在||||is_writable — 判断给定的文件名是否可写
        if (!file_exists($this->path) || !is_writable($this->path)) {
            //文件创建失败  设置错误号为-4
            if (!@mkdir($this->path, 0755)) {
                $this->setOption('errorNum', -4);
                return false;
            }
        }
        return true;
    }

    /* 设置随机文件名 */
    private function proRandName() {
        $fileName = date('YmdHis')."_".rand(1000,9999);
        return $fileName.'.'.$this->fileType;
    }

    /* 复制上传文件到指定的位置 */
    private function copyFile() {
        if(!$this->errorNum) {
            $path = rtrim($this->path, '/').'/';
            $path .= $this->newFileName;
            if (@move_uploaded_file($this->tmpFileName, $path)) {
                return true;
            }else{
                //无法移动到指定目录则上传失败
                $this->setOption('errorNum', -3);
                return false;
            }
        } else {
            return false;
        }
    }
}