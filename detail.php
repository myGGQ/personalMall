<?php
include_once './lib/fun.php';

if($login=checkLogin()){
    $user=$_SESSION['user'];
}

//检查 url中商品id
$goodsId=isset($_GET['id'])&&is_numeric($_GET['id'])?intval($_GET['id']):'';

//如果id不存在 跳转到商品界面
if(!$goodsId){
    msg(2,'参数非法','index.php');
}

//根据商品id查询商品信息
$con=mysqli_connect('localhost','root','','login');
mysqli_set_charset($con,'utf8');
//查询数据库中是否有指定id
$sql="SELECT * FROM gq_goods WHERE id=$goodsId";
$obj=mysqli_query($con,$sql);

//当根据id查询为空时，跳转到商品表页
if(!$goods=mysqli_fetch_assoc($obj)){
    msg(2,'商品不存在','index.php');
}

//根据用户id查询发布人
unset($sql,$obj);
$sql="SELECT * FROM gq_user WHERE id={$goods['user_id']}";
$obj=mysqli_query($con,$sql);
$user=mysqli_fetch_assoc($obj);

//更新浏览次数
unset($sql,$obj);
$sql="UPDATE gq_goods SET view=view+1 WHERE id={$goods['id']}";
mysqli_query($con,$sql);
//mysqli_close($con);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $goods['name']?></title>
    <link rel="stylesheet" href="./static/css/detail.css">
</head>
<body>
<div class="box">
    <div class="header">
        <div class="logo f1">
            <img src="./static/image/logo.png">
        </div>
        <div class="auth fr">
            <ul>
                <?php if($login):?>
                <li><a href="myCenter.php">我的发布</a></li>
                <li><span>用户: 11111</span></li>
                <li><a href="login_out.php">退出</a></li>
                <?php else:?>
                <li><a href="login.php">登录</a></li>
                <li><a href="register.php">注册</a></li>
                <?php endif;?>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="content-left">
            <img src="<?php echo $goods['pic']?>" alt="" class="image" width="100%" height="100%">
        </div>
        <div class="content-right">
            <div class="rig-top">
                <h1 class="title"><?php echo $goods['name']?></h1>
                <p class="username">发布人：<?php echo $user['username']?></p>
                <p class="time">发布时间：<?php echo date('Y年m月d日',$goods['create_time'])?></p>
                <p class="time">浏览次数：<?php echo $goods['view']?></p>
                <p class="text">商品简介：<?php echo $goods['des']?></p>
            </div>
            <div class="rig-bottom">
                <div class="price">售价：<?php echo $goods['price']?>元</div>
                <button class="but">立即购买</button>
            </div>
        </div>
    </div>
    <div class="footer"></div>
</div>
</body>
</html>
