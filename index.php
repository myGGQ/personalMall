<?php
error_reporting(0);
header('content-type:text/html;charset=utf-8');
include_once './lib/fun.php';

if($login=checkLogin()){
    $user=$_SESSION['user'];
}

//获取用户输入需要搜索的商品名
$keywords=trim($_POST['keywords']);

//检查page参数
$page=isset($_GET['page'])?intval($_GET['page']):1;
//$page与1对比 取最大值
$page=max($page,1);
//每页显示的条数
$pageSize=6;

$offset=($page-1)*$pageSize;


$con=mysqli_connect('localhost','root','','login');
mysqli_set_charset($con,'utf8');
if(!$con){
    die('Could not connect'.mysqli_error());
}

$goods=array();

if(!$keywords){
    $sql="SELECT COUNT(id) as total FROM gq_goods";
    $obj=mysqli_query($con,$sql);
    $result=mysqli_fetch_assoc($obj);
    $total=isset($result['total'])?$result['total']:0;

    unset($sql,$obj,$result);
//BY id asc,view desc
    $sql="SELECT id,name,pic,des,price FROM gq_goods limit $offset,$pageSize";

    if($obj=mysqli_query($con,$sql)){
        while($result=mysqli_fetch_assoc($obj)){
            $goods[]=$result;
        }
    }
}else{
    $sql="SELECT * FROM gq_goods WHERE name like '%$keywords%'";
    if($obj=mysqli_query($con,$sql)){
        while($result=mysqli_fetch_assoc($obj)){
            $goods[]=$result;
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="./static/css/common.css" />
    <link rel="stylesheet" type="text/css" href="./static/css/index1.css" />

</head>
<body>
<div class="header">
    <div class="logo f1">
        <img src="./static/image/logo.png">
    </div>
    <div class="auth fr">
        <ul>
            <?php if($login):?>
            <li><a href="myCenter.php">我的发布</a></li>
            <li><span>用户: <?php echo $user['username']?></span></li>
            <li><a href="login_out.php">退出</a></li>
            <?php else:?>
            <li><a href="login.php">登录</a></li>
            <li><a href="register.php">注册</a></li>
            <?php endif;?>
        </ul>
    </div>
</div>
<div class="content">
    <div class="banner">
        <img class="banner-img" src="./static/image/welcome.png" width="732px" height="372" alt="图片描述">
    </div>
    <div class="search">
        <a href="index.php" class="entire">全部商品</a>
        <form action="index.php" method="post" class="form">
            <input type="text" name="keywords" placeholder="请输入搜索商品" class="text">
            <input type="submit" value="搜索" class="sub">
        </form>
    </div>
    <div class="img-content">
        <ul>
            <?php foreach($goods as $v):?>
            <li>
                <img class="img-li-fix" src="<?php echo $v['pic']?>" alt="<?php echo $v['name']?>" height="300px">
                <div class="info">
                    <a href="detail.php?id=<?php echo $v['id']?>"><h3 class="img_title"><?php echo $v['name']?></h3></a>
                    <div class="btn">
                        <p class="price">售价：<?php echo $v['price']?>元</p>
                        <a href="#" class="edit">购买</a>
                    </div>
                </div>
            </li>
            <?php endforeach;?>


        </ul>
    </div>
    <?php echo pages($total,$page,$pageSize,6);?>
</div>

<div class="footer">
</div>
</body>
</html>
