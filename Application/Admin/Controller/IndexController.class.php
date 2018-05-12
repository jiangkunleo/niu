<?php
namespace Admin\Controller;
use Admin\Controller\CommonController;
class IndexController extends CommonController {
    public function index(){


        $this->display();
    }
     // 后台首页[下左侧菜单]
    public function left(){
      // 获取当前登录管理员的角色ID
      $role_id = session('role_id');

      // 根据角色id获取当前角色信息
      $RoleInfo = D('Role')->find( $role_id );

      // 根据对应的角色id获取对应的权限[权限分顶级权限和子权限]
      // 先查询当前管理员所拥有的顶级权限
      $where = "auth_pid=0 AND auth_id IN ({$RoleInfo['role_auth_ids']})";
      $this->topAuth = D('Auth')->getAuth($where);

      // 接下来查询当前管理员所拥有的子权限
      $where = "auth_pid!=0 AND auth_id IN ({$RoleInfo['role_auth_ids']})";
      $this->sonAuth = D('Auth')->getAuth($where);
      // dump($this->sonAuth);die;
      $this->display();
    }

    public function top(){
       $username = session('username');
        // dump($username);
        if($username == 'root'){
          // $this->show('<div style="padding: 0px 0px 0px 0px;text-align: center;font-size: 25px;"><p><a href="http://www.ecshop.com/index.php/Admin/Order/remind.html">提现提醒</a> <script type="text/javascript" charset="UTF-8"></script>','utf-8');
          $agency = D('agency');
          $username = session('username');
          $this->list = $agency->where("username = '$username'")->select();
          // dump($this->list);die;
          $this->display('tops');
        }else{
          $agency = D('agency');
          $username = session('username');
          $this->list = $agency->where("username = '$username'")->select();
          // dump($this->list);die;
          $this->display();
        }
        // $this->display();
    }
    public function main(){
        $agency = D('agency');
        $username = session('username');
        $this->list = $agency->where("username = '$username'")->select();
        // dump($this->list);die;
        $this->display();
    }

    // 登录页面
    public function login(){
        // $salt = mt_rand(10000,99999); //随机生成的密钥
        // dump($salt);
        // $password = '821210';//测试密码
        // dump(password($password,$salt));//加密成功的密码
        // die;

      // 如果有用户提交post数据
      if( IS_POST ){

        // 验证码验证
        // $code = I('post.verify');
        // // 借助 验证码类提供的 check方法来验证,check的返回值是 true/false
        // $Verify = new \Think\Verify();
        // if( !$Verify->check($code) ){
        //   $this->error( '验证码有误！' );die;
        // }

        $username = I('username');
        $password = I('password');

        // 验证密码和帐号是否正确，要进行密码验证，必须先知道盐值
        // 根据帐号进入数据库中查询
        $res = D('agency')->where("username = '$username'")->find();

        if( !$res ){// 帐号有误，查不出数据
          $this->error('帐号或密码有误！');die;
        }

        // 如果密码错误，则直接提示错误
        if( password( $password , $res['salt'] ) != $res['password'] ){
          $this->error('帐号或密码有误！');die;
        }

        // 保存用户的登录状态

        session('username', $res['username']);  // 管理员帐号
        // dump(session('username'));die;
        session('is_login', 1);                 // 登录状态
        session('role_id', $res['role_id']);    // 角色id
        // 更新最后登录时间
        $data = array(
          'login_time' => time(),
        );

        D('agency')->save($data);

        // 最后登录成功！
        $this->success('欢迎回来!', U('index') );die;

      }

      $this->display();
    }
    public function code(){
        ob_clean();//清除BOM信息
        //实例化验证码类
        $Verify = new \Think\Verify();
        $Verify->length = 4;
        $Verify->codeSet = '0123456789';
        //展示验证码
        $Verify->entry();
    }
    public function logout(){
        session(null);
        $this->success('退出登录成功！', U('Index/login') );

    }
    public function register(){
      // 修改密码
      $this->display();
    }
    public function register1(){

      // 判断是否是post
      if( IS_POST ){
        $agency = D('agency');
        $username = I('post.username');
        $data = $agency->where("username = '$username'")->select();
        $id = $data[0]['game_id'];
        $salt = $data[0]['salt'];
        $password = $data[0]['password'];
        $pwd = I('post.pwd');
        $password1 = password($pwd,$salt);
        $new = I('post.password');
        $new2 = password($new,$salt);
        if( $password != $password1 ){
          $this->error('原始用户名或密码不正确');die;
        }
        if( $password == $password1){
          // // 执行修改操作
          $data['username']=$username;
          $data['password']=$new2;
          $data['game_id']=$id;
          $res = D('agency')->save($data);
            if( $res){
              // 会员成功以后，就直接认为用户登录了。
              session('username',$username ); // 会员名称
              session('is_login',1);                    // 登录状态

              $this->success('修改密码成功！', U('Index/index') );die;
            }else{
              $this->error('修改密码失败！');die;
            }

          }
        }
        die;
      $this->display();
    }
    public function supple(){
      $username = $_SESSION['username'];
      $user = D('agency');
      $this->list = $user->where("username = '$username'")->select();
            // dump($this->list);die;

      $this->display();
    }
    //完善个人信息
    public function sup(){
      $username = $_SESSION['username'];
      $user = D('agency');
      $this->list = $user->where("username = '$username'")->select();
      $id = $this->list[0]['game_id'];
      // dump($id);die;
      // dump( Null == false );die;
      // $data = $user->find($id);
      $data = array(
          'game_id' => $id,
          'mobile' => I('post.mobile'),
          'wechat' => I('post.wechat'),
          'address' => I('post.address'),
          'real_name' => I('post.real_name'),
          'username' => I('post.username'),
        );

      $res = $user->save($data);
      // dump($res);die;
      if( $res !== false){

              $this->success('修改成功！', U('Index/index') );die;
            }else{
              $this->error('修改失败！');die;
            }
      $this->display();
    }
}