<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class JuniorController extends CommonController {
    public function Index(){

        $Agency = D('agency');
        //获取所有的代理总数
        $count=$this->count = $Agency->count();
        //实例化分页类[分页数据的总数，每一页显示的数据量]
        $Page = new \Think\Page($count, 10);
        $this->style = $Page->show(); //分页样式的代码
        //获取分页的数据
        $this->list = $Agency->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->display();
    }
    public function show(){
        $username = $_SESSION['username'];
        $Agency = D('agency');
        $invitation_code = $Agency->field('invitation_code')->where("username = '$username'")->select();
        if($_GET["select1"] == "1"){
            // dump($_GET['select1']);die;
            $Agency = D('agency');
            //获取所有的代理总数
            $count = $Agency->where("agency_id=1 and invitation_code != 0")->count();
            //实例化分页类[分页数据的总数，每一页显示的数据量]
            $Page = new \Think\Page($count, 5);
            $this->style = $Page->show(); //分页样式的代码
            //获取分页的数据
            $p=$_GET['p']?$_GET['p']:1;
            $this->list = $Agency->where("agency_id=1 and invitation_code != 0")->page($p.',5')->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $this->count=$count;
       }else if($_GET["select1"] == "2"){
            $Agency = D('agency');
            $count = $Agency->where("agency_id=2 and invitation_code != 0")->count();
            $Page = new \Think\Page($count, 5);
            $this->style = $Page->show();
            $p=$_GET['p']?$_GET['p']:1;
            $this->list = $Agency->where("agency_id=2 and invitation_code != 0")->page($p.',5')->select();
            $this->count=$count;
       }else if($_GET["select1"] == "3"){
            $Agency = D('agency');
            $count= $Agency->where("agency_id=3 and invitation_code != 0")->count();
            $Page = new \Think\Page($count, 5);
            $this->style = $Page->show();
            $p=$_GET['p']?$_GET['p']:1;
            $this->list = $Agency->where("agency_id=3 and invitation_code != 0")->page($p.',5')->select();
            $this->count=$count;

       }else{
            $Agency = D('agency');
            $count= $Agency->count();
            $Page = new \Think\Page($count, 5);
            $this->style = $Page->show();
            $this->list = $Agency->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $this->count = $count;
       }
       if(isset($_GET["invitation_code"])){
            $invitation_code = $_GET["invitation_code"];
            $Agency = D('agency');
            $res = $Agency->where("invitation_code = '$invitation_code'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            if($res){
                $this->list = $Agency->where("invitation_code = '$invitation_code'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }
        }
        if(isset($_GET["real_name"])){
            $real_name = $_GET["real_name"];
            $res = $Agency->where("real_name = '$real_name'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            if($res){
                $this->list = $Agency->where("real_name = '$real_name'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }
        }
        $this->display();
    }

    //三级代理
    public function show1(){
        $username = $_SESSION['username'];
        $Agency = D('agency');
        $invitation_codes = $Agency->field('invitation_code')->where("username = '$username'")->select();
        $invitation_code=$invitation_codes[0]['invitation_code'];
            $Agency = D('agency');
            //获取所有的代理总数
            $count=$this->count = $Agency->where("agency_id>='3' and p_invitation_code='$invitation_code' and invitation_code=0")->count();
            //实例化分页类[分页数据的总数，每一页显示的数据量]
            $Page = new \Think\Page($count, 5);
            $this->style = $Page->show(); //分页样式的代码
            //获取分页的数据
            $this->list = $Agency->where("agency_id>='3' and p_invitation_code='$invitation_code' and invitation_code=0")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        if(isset($_GET["p_invitation_code"])){
                $p_invitation_code = $_GET["p_invitation_code"];
                $Agency = D('agency');
                $res = $Agency->where("p_invitation_code = '$p_invitation_code'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            if($res){
                $this->list = $Agency->where("p_invitation_code = '$p_invitation_code'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }
        }
        if(isset($_GET["real_name"])){
                $real_name = $_GET["real_name"];
                $res = $Agency->where("real_name = '$real_name'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
                if($res){
                    $this->list = $Agency->where("real_name = '$real_name'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }
        }
        $this->display();
    }
    //二级代理
    public function show2(){
        $username = $_SESSION['username'];
        $Agency = D('agency');
        $invitation_codes = $Agency->field('invitation_code')->where("username = '$username'")->select();
        $invitation_code=$invitation_codes[0]['invitation_code'];
        $this->res = $_GET["select1"];
        if($_GET["select1"] == "2"){
            $Agency = D('agency');
            //获取所有的代理总数
            $count=$this->count = $Agency->where("agency_id>='2' and p_invitation_code='$invitation_code' and invitation_code=0 ")->count();
            //实例化分页类[分页数据的总数，每一页显示的数据量]
            $Page = new \Think\Page($count, 5);
            $this->style = $Page->show(); //分页样式的代码
            $p=$_GET['p']?$_GET['p']:1;
            //获取分页的数据
            $this->list = $Agency->where("agency_id>='2' and p_invitation_code='$invitation_code' and invitation_code=0 ")->page($p.',5')->limit($Page->firstRow . ',' . $Page->listRows)->select();
       }else{
            $Agency = D('agency');
            $count=$this->count = $Agency->where("agency_id>='2' and p_invitation_code='$invitation_code'")->count();
            $Page = new \Think\Page($count, 5);
            $this->style = $Page->show(); //分页样式的代码
            $p=$_GET['p']?$_GET['p']:1;
            $this->list = $Agency->where("agency_id>='2' and p_invitation_code='$invitation_code'")->page($p.',5')->limit($Page->firstRow . ',' . $Page->listRows)->select();
       }
       if(isset($_GET["invitation_code"])){
            $invitation_code = $_GET["invitation_code"];
            $Agency = D('agency');
            $res = $Agency->where("invitation_code = '$invitation_code'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            if($res){
                $this->list = $Agency->where("invitation_code = '$invitation_code'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }
        }
        if(isset($_GET["real_name"])){
            $real_name = $_GET["real_name"];
            $res = $Agency->where("real_name = '$real_name'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            if($res){
                $this->list = $Agency->where("real_name = '$real_name'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }
        }
        $this->display();
    }
    //一级代理
    public function show3(){
        $username = $_SESSION['username'];
        $Agency = D('agency');
        $invitation_codes = $Agency->field('invitation_code')->where("username = '$username'")->select();
        $invitation_code=$invitation_codes[0]['invitation_code'];
        if($_GET["select1"] == "2"){
            $Agency = D('agency');
            $count = $Agency->where("p_invitation_code='$invitation_code' and invitation_code =0")->count();
            $Page = new \Think\Page($count, 5);
            $this->style = $Page->show();
            $p=$_GET['p']?$_GET['p']:1;
            $this->list = $Agency->where("p_invitation_code='$invitation_code' and invitation_code =0")->page($p.',5')->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $this->count=$count;

       }else{
            $Agency = D('agency');
            $count = $Agency->where("agency_id>='1' and p_invitation_code='$invitation_code'")->count();
            $Page = new \Think\Page($count, 5);
            $this->style = $Page->show();
            $p=$_GET['p']?$_GET['p']:1;
            $this->list = $Agency->where("agency_id>='1' and p_invitation_code='$invitation_code'")->page($p.',5')->limit($Page->firstRow . ',' . $Page->listRows)->select();
            $this->count=$count;
       }
       if(isset($_GET["invitation_code"])){
            $invitation_code = $_GET["invitation_code"];
            $Agency = D('agency');
            $res = $Agency->where("invitation_code = '$invitation_code'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            if($res){
                $this->list = $Agency->where("invitation_code = '$invitation_code'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }
        }
        if(isset($_GET["real_name"])){
            $real_name = $_GET["real_name"];
            $res = $Agency->where("real_name = '$real_name'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            if($res){
                $this->list = $Agency->where("real_name = '$real_name'" )->limit($Page->firstRow . ',' . $Page->listRows)->select();
            }
        }
        $this->display();
    }
}