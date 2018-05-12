<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class CommissionController extends CommonController {

    public function index(){
        $agency = D('agency');
        $username = session('username');
        $agencys = $agency->where("username = '$username'")->select();
        $agency_id = $agencys[0]['agency_id'];
        $list = $agency->where("username ='root'")->select();
        $commission_one = $list[0]['commission_one'];
        $commission_two = $list[0]['commission_two'];
        $commission_three = $list[0]['commission_three'];
        $commission_four = $list[0]['commission_four'];



        // $invitation_codes = $agency->where("username = '$username'")->select();
        // $invitation_code = $invitation_codes[0]['invitation_code'];
        // $torderlist =D('t_order_list');
        // $this->tlist = $torderlist->where("p_code = '$invitation_code'")->select();



        // $price = $tlist[0]['price'];
        // dump($invitation_code);
        // dump($this->tlist);
        // dump($price);
        // dump($commission_one);
        // dump($agencys);
        // dump($agency_id);
        if($agency_id == 1){
            $this->info = $commission_one;
            echo 1;
            dump($commission_one);
            // dump($this->commission);
        }else if($agency_id == 2){
            echo 2;
            dump($commission_two);
            $this->info = $commission_two;
        }else if($agency_id == 3){
            echo 3;
            dump($commission_three);
            $this->info = $commission_three;
        }else{
            echo 4;
            dump($commission_four);
            $this->info = $commission_four;
        }

        // dump($this->info);
        $torderlist = D('t_order_list');

        // $list = $torderlist->select();
        $username = session('username');
        $this->agency_id=$invitation_codes = D('agency')->where("username ='$username' || invitation_code=p_code  ")->select();
        $invitation_code = $invitation_codes[0]['invitation_code'];//admin1de yaoqingma
        $this->list = $torderlist->where("p_code = '$invitation_code' " )->select();

        $this->display();
        // dump($invitation_codes);

        // dump($username);
        // dump($this->agency_id);
    }


    public function setcommission(){
        $agency = D('agency');
        $username = session('username');
        // dump($username);
        $list = $agency->where("username = '$username'")->select();
        // dump($list);
        $commission_one = $list[0]['commission_one'];
        $commission_two = $list[0]['commission_two'];
        $commission_three = $list[0]['commission_three'];
        $commission_four = $list[0]['commission_four'];
        dump($commission_one);
        if($commission_one != '' || $commission_two != '' || $commission_three != '' || $commission_four != ''){
            $this->list = $agency->where("username = '$username'")->select();

            // echo 111;
            $this->display('setcommissions');
        }else{
            // echo 222;
            $this->display('setcommission');
        }
    }
    public function set(){
        $agency = D('agency');
        $username = session('username');
        $game = $agency->where("username = '$username'")->select();
        $game_id = $game[0]['game_id'];
        if ($_POST['select']){
            $list['game_id'] = $game_id;
            $list['Commission_one'] = I('post.select');
            $list['Commission_two'] = I('post.select1');
            $list['Commission_three'] = I('post.select2');
            $list['Commission_four'] = I('post.select3');
            // dump($list);die;
            $res=$agency->save($list);
            // dump( 0 === false);
            // dump($res);
            if( $res === false){
                $this->error('添加失败,错误:' . $agency->getError());die;
            }else{
                $this->success('添加成功',U('index'));die;
            }
        }
    }


    // public function commission(){
    //     $agency = D('agency');
    //     $username = session('username');
    //     $list = $agency->select();
    //     $game_id = $list[0]['game_id'];
    //     dump($game_id);
    // }

}