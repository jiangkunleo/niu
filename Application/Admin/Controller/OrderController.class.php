<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class OrderController extends CommonController {
    public function index(){
        $username = session('username');
        $list = D('agency')->where("username = '$username'")->select();
        $code = $list[0]['invitation_code'];
        $p_code = $list[0]['p_code'];
        $map = array(
            'code' =>$list[0]['invitation_code'],
            'p_code' => $list[0]['p_code'],
        );
        $tcode = $map['code'];
        $tlist = D('TOrderList')->where("invitation_code = '$tcode'")->find();
        $id = $tlist['id'];
        $data['id'] = $tlist['id'];
        $data['p_code'] = $list[0]['p_code'];

        $res = D('TOrderList')->where("id = '$id'")->setField($data);

        $info = D('agency')->where($map)->select();
        $data = D('TOrderList');

        $tdata = D('TOrderList as a')->join('agency as b on b.invitation_code = a.invitation_code')->select();

        $tp_code = array_column($tdata, 'p_code');

        $TOrderList = D('TOrderList');

        $result['invitation_code'] = $code;
        $result['p_code'] = $tp_code;
        $res = $TOrderList ->where($result)->addAll($tp_code);
        // dump($res);
        // dump($tp_code);
        // dump($code);
        // dump($tdata);die;


        $order_list = D('TOrderList');
        $this->count=$count = $order_list->where(" invitation_code = '$code' || p_code = '$code'")->limit($Page->firstRow . ',' . $Page->listRows)->count();
        $Page = new \Think\Page($count, 5);
        $this->style = $Page->show();
        $this->list = $order_list->where(" invitation_code = '$code' || p_code = '$code'")->limit($Page->firstRow . ',' . $Page->listRows)->select();
        // dump($code);
        // dump($p_code);
        // dump($this->list);
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

    public function reference(){
        $orderlist = D('order_list');
        $ids = $_GET['ids'];
        // dump($ids);
        if(IS_POST){
                if( !$orderlist->create() ){
                    $this->error('提交失败,参数错误' );die;
                }
            if($ids == 1){
                $username = session('username');
                $info = D('agency')->where("username = '$username' ")->select();
                $code = $info[0]['invitation_code'];
                $exist = $orderlist->where("invitation_code = '$code'")->select();
                $id = $exist[0]['id'];
                $data['id'] = $id;
                $data['account_style'] = I('post.account_style');
                $data['account_number'] = I('post.account_number');
                $data['account_sum'] = I('post.account_sum');
                $data['alipay_name'] = I('post.alipay_name');
                $data['information'] = I('post.information');
                $res = $orderlist->add($data);
                // echo 111;
                // dump($res);
                if($res !== false){
                   $this->success('提现申请成功,等待管理员处理',U('index'));die;
                }
            }else{
                $data['id'] = I('post.id');
                $data['account_style'] = I('post.account_style');
                $data['account_number'] = I('post.account_number');
                $data['account_sum'] = I('post.account_sum');
                $data['alipay_name'] = I('post.alipay_name');
                $data['information'] = I('post.information');
                $data['status'] = 1;
                $res = $orderlist->save($data);
                // echo 222;
                // dump($res );
                if($res !== false){
                   $this->success('提现申请成功,等待管理员处理',U('index'));die;
                }
            }
        }
        // dump($res);
        // $this->display('index');
    }
    public function add(){
        $orderlist = D('order_list');

            $username = session('username');
            $info = D('agency')->where("username = '$username' ")->select();
            $code = $info[0]['invitation_code'];
            //通过当前的登陆用户名查询和代理表相同的唯一邀请码
            // dump($code);
            //匹配订单表的邀请码
            $exist = $orderlist->where("invitation_code = '$code'")->select();
            // dump($exist);die;
            if(!$exist){

                $this->display('reference');
                // echo 222;
            }else{
                $this->list = $orderlist->where("invitation_code = '$code'")->select();
                // dump($this->list);die;
                $this->display('references');

                // echo 111;
            }




    }

    public function remind(){

        $order_list = D('order_list');
        //获取所有的代理总数
        $count=$this->count = $order_list->count();
        //实例化分页类[分页数据的总数，每一页显示的数据量]
        $Page = new \Think\Page($count, 5);
        $this->style = $Page->show(); //分页样式的代码
        //获取分页的数据
        $this->list = $order_list->limit($Page->firstRow . ',' . $Page->listRows)->select();
         // $this->result = D('agency')->where("invitation_code = '$code'")->select();
        // dump($this->result);
        $this->res = D('agency')->select();
        // dump($this->res);

        $this->display('remind');
    }

    public function edit(){
        $id = I('get.id');
        $status = I('get.status');
        // dump($status);die;
        $order_list = D('order_list');
        $list = $order_list->where("id = '$id'")->find();
        $account_sum = $list['account_sum'];
        $code = $list['invitation_code'];
        $info = D('agency')->where("invitation_code = '$code'")->select();
        $data['rest_money'] =$info[0]['rest_money']-$account_sum;
        $data['total_money'] =$info[0]['total_money'];
        $data['game_id'] =$info[0]['game_id'];
        $data['status'] = I('get.status');
        $res = D('agency')->save($data);
        D('order_list')->delete($id);
        if($res && $data['rest_money']>=$account_sum  && $_GET['status'] == 1){
            $this->success('操作成功',U('Order/remind'),3);die;
        }else if($_GET['status']  ==2 ){
            $data['rest_money'] =$info[0]['rest_money'];
            $data['total_money'] =$info[0]['total_money'];
            $data['game_id'] =$info[0]['game_id'];
            $data['status'] = I('get.status');
            D('agency')->save($data);
            D('order_list')->delete($id);
            $this->error('已拒绝');die;
        }else{
            $data['rest_money'] =$info[0]['rest_money'];
            $data['total_money'] =$info[0]['total_money'];
            $data['game_id'] =$info[0]['game_id'];
            $data['status'] = I('get.status');
            D('agency')->save($data);
            D('order_list')->delete($id);
            $this->error('操作失败');die;
        }
    }

    public function done(){
        $this->list = D('agency')->query('select * from agency where status is not null');
        // dump($this->list);die;
        $this->display('done');
    }













}