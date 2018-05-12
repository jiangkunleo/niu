<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class AgencyController extends CommonController {
    public function index(){
        $Goods = D('agency');
        //获取所有的商品总数
        $count=$this->count = $Goods->count();
        //实例化分页类[分页数据的总数，每一页显示的数据量]
        $Page = new \Think\Page($count, 10);
        $this->style = $Page->show(); //分页样式的代码
        //获取分页的数据
        $this->list = $Goods->limit($Page->firstRow . ',' . $Page->listRows)->select();
        if(isset($_POST["username"])){
            $username = $_POST["username"];
            $Goods = D('agency');
            $res = $Goods->where("username = '$username'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $res2 = $Goods->where("real_name = '$username'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $res3 = $Goods->where("game_id = '$username'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            if($res){
                $this->list = $Goods->where("username = '$username'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }else if($res2){
                $this->list = $Goods->where("real_name = '$username'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }else if($res3){

                $this->list = $Goods->where("game_id = '$username'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
           }
        }
        $this->display();
    }
    public function add(){
        if(IS_POST){
            $Agency = D('Agency');
            $username = $_SESSION['username'];
            $code = $Agency->field('code')->where("username = '$username'")->find();
            $p_name = $Agency->field('p_name')->where("username = '$username'")->find();
            $salt = mt_rand(10000,99999); //随机生成的密钥
            $mycode = mt_rand(100000,999999); //随机生成的密钥
            $password = I('post.password');//测试密码
            $data['agency_id'] = I('post.role_id')-1;
            $data['role_id'] = I('post.role_id');
            $data['mobile'] = I('post.mobile');
            $data['code'] = $mycode;
            $data['create_time'] =date("Y:m:d H:i:s");
            $data['login_time'] = date("Y:m:d H:i:s");
            $data['login_ip'] = $_SERVER['REMOTE_ADDR'];
            $data['p_name'] = $p_name;
            $data['p_code'] = $code['code'];
            $data['real_name'] = I('post.real_name');
            $data['username'] = I('post.username');
            $data['salt'] = $salt;
            $data['password'] = password($password,$salt);
            if($data['agency_id']==0){
                $level='总代理';
            }else if($data['agency_id']==1){
                $level='一级代理';
            }else if($data['agency_id']==2){
                $level ='二级代理';
            }else{
                $level ='三级代理';
            }
            $data['level'] = $level;
            // dump($level);die;
            //接收$_POST数据并帮我们验证
            if (!$Agency->create()) {
                $this->error($Agency->getError());
            }
            //添加数据到Agency表中
            $res = $Agency->add($data);
            if ($res) {
                $this->success("添加成功!此次生成的邀请码是.'$mycode'", U('index'),10);
                die();
            } else {
                $this->error('添加失败。');
            }
        }
        $this->display();
    }
    public function add1(){
        //查询所有角色
        $this->RoleList = D('Role')->select();
        $this->display();
    }
    public function show(){
        $Agency = D('Agency');
        $id = I('get.game_id');
        $this->list = $Agency->where("game_id = '$id'")->select();
        $this->display();
    }
    public function edit(){
        $Agency = D('Agency');
        $id = I('get.game_id');
        $this->list = $Agency->where("game_id = '$id'")->select();
        if(IS_POST){
            $Agency = D('Agency');
            //接收$_POST数据并帮我们验证
            if (!$Agency->create()) {
                $this->error($Agency->getError());
            }
            //添加数据到Agency表中
            $res = $Agency->save();
            if ($res !== false) {
                $this->success('修改成功。', U('index'));
                die();
            } else {
                $this->error('修改失败。');
            }
        }
        $this->display();
    }

    public function del(){
        $id = I('get.game_id');
        $Agency = D('Agency');
        $res = $Agency->delete($id);
        if( $res ){
            $this->success('删除成功！',U('index'),3);die;
        }else{
            $this->error('删除失败！');die;
        }
        $this->display();
    }


    public function order(){
        $order_list = D('TOrderList');
        $this->count=$count = $order_list->count();
        $Page = new \Think\Page($count, 5);
        $this->style = $Page->show();
        $this->list = $order_list ->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $begin_time = $_POST['begin_time'];
        $end_time = $_POST['end_time'];
        $map['timestamp'] = array(array('gt',$begin_time),array('lt',$end_time)) ;
        if(isset($begin_time) && $end_time){
            $res = $order_list->where($map)->limit($Page->firstRow . ',' . $Page->listRows)->select();
            if($res){
                    $this->list = $order_list->where($map )->limit($Page->firstRow . ',' . $Page->listRows)->select();
                }else{
                    $this->error( '此时间段没有订单存在');
                }

        }
        $amount = $order_list->field('pre_amount,after_amount')->select();
        // dump($amount);die;
        // if($amount['for(i=1;i<=$count;i++)']['pre_amount'] > $amount['for(i=1;i<=$count;i++)']['after_amount']){
        //     echo 111;
        // }else{
        //     echo 222;
        // }
        $this->display();

    }


    //Excal导出
    public function export()
    {
        Vendor("PHPExcel.IOFactory");
        Vendor("PHPExcel/Writer/Excel5");
        //创建一个excel
        $objPHPExcel = new \PHPExcel();
        $objWriter = new \PHPExcel_Writer_Excel5($objPHPExcel);

        //设置sheet名称
        $sheets=$objPHPExcel->getActiveSheet()->setTitle('sheet_name');

        //设置sheet列头信息
        $objPHPExcel->setActiveSheetIndex()->setCellValue('A1', 'ID')->setCellValue('B1', '用户名')->setCellValue('C1', '真实姓名')->setCellValue('D1', '手机号')->setCellValue('E1', '创建时间')->setCellValue('F1', '邀请码');
        //导出用户表的十条数据
        $users=D("Agency")->limit(10)->Select();
        // dump($users);die;
        $i=2;
        foreach($users as $v){
            //设置单元格的值
            $sheets=$objPHPExcel->getActiveSheet()->setCellValue('A'.$i,$v['game_id']);
            $sheets=$objPHPExcel->getActiveSheet()->setCellValue('B'.$i,$v['username']);
            $sheets=$objPHPExcel->getActiveSheet()->setCellValue('C'.$i,$v['real_name']);
            $sheets=$objPHPExcel->getActiveSheet()->setCellValue('D'.$i,$v['mobile']);
            $sheets=$objPHPExcel->getActiveSheet()->setCellValue('E'.$i,date("Y-m-d",$v['login_time']));
            $sheets=$objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$v['code']);
            $i++;
        }

        //整体设置字体和字体大小
        $objPHPExcel->getDefaultStyle()->getFont()->setName( 'Arial');
        $objPHPExcel->getDefaultStyle()->getFont()->setSize(10);


        // $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); //单元格宽度自适应
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20); //设置列宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20); //设置列宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20); //设置列宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20); //设置列宽度
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20); //设置列宽度
        $objPHPExcel->getActiveSheet()->getStyle('B3')->getFont()->setBold(true); //设置单元格字体加粗

        // 输出Excel表格到浏览器下载
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="代理信息.xls"'); //excel表格名称
        header('Cache-Control: max-age=0');
        header('Cache-Control: max-age=1');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter->save('php://output');

    }






    //发放房卡
     public function send(){
        $Goods = D('agency');
        //获取所有的商品总数
        $count=$this->count = $Goods->count();
        //实例化分页类[分页数据的总数，每一页显示的数据量]
        $Page = new \Think\Page($count, 10);
        $this->style = $Page->show(); //分页样式的代码
        //获取分页的数据
        $this->list = $Goods->limit($Page->firstRow . ',' . $Page->listRows)->select();
        // dump($this->list);die;
        if(isset($_POST["username"])){
            $username = $_POST["username"];
            $Goods = D('agency');
            $res = $Goods->where("username = '$username'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $res2 = $Goods->where("real_name = '$username'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $res3 = $Goods->where("game_id = '$username'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            if($res){
                $this->list = $Goods->where("username = '$username'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }else if($res2){
                $this->list = $Goods->where("real_name = '$username'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }else if($res3){

                $this->list = $Goods->where("game_id = '$username'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
           }
        }
        $this->display('send');
    }

    //充值
    public function f_edit(){

        $Agency = D('Agency');
        $id = I('get.game_id');
        $this->list = $Agency->where("game_id = '$id'")->select();
        if(IS_POST){
            $Agency = D('Agency');
            //接收$_POST数据并帮我们验证
            if (!$Agency->create()) {
                $this->error($Agency->getError());
            }
            //添加数据到Agency表中
            $add_number = $_POST['add_number'];
            $data['game_id'] = $_POST['game_id'];
            $data['total_money'] = $_POST['total_money']+$add_number;
            $data['rest_money'] = $_POST['rest_money']+$add_number;
            if($data['rest_money'] >  $add_number){

            $data['record'] = '房卡充值';
            }
            // dump($data);die();
            $res = $Agency->save($data);
            if ($res !== false) {
                $this->success('充值成功。', U('Agency/send'));
                die();
            } else {
                $this->error('充值失败。');
            }
        }
        $this->display('f_edit');
    }

 }