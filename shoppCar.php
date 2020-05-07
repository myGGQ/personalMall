<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>购物车</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        header{
            width: 100%;
            height: 50px;
            border-bottom: 1px solid #000;
        }
        header h1{
            display: inline-block;
            margin-left: 200px;
        }
        header ul{
            float: right;
            display: table;
            margin-right: 300px;
            line-height: 50px;
        }
        header ul li{
            display: inline-block;
            padding-left: 20px;
        }
        
        .content{
            width: 80%;
            /*border: 1px solid #000;*/
            margin: 0 auto;
            line-height: 100px;
        }
        .content .commodity{
            width: 100%;
            /*border: 1px solid #000;*/
        }
        .content .commodity ul{
            display: table;
            width: 100%;
            /*height: 100px;*/
            border-bottom: 1px solid #00b3ff;
        }
        .content .commodity ul li{
            display: inline-block;
            width: 20%;
            /*border: 1px solid #000;*/
            overflow: hidden;
        }
        .content .commodity .logo{
            width: 100px;
            height: 100px;
            border: 1px solid #000;
            margin-top: 20px;
        }
        .content .commodity .wenzi{

        }
        .content .commodity .price{

        }
        .content .commodity .amount{

        }
        .content .commodity .buy button{
            width: 50px;
            height: 30px;
        }
    </style>
</head>
<body>
<header>
    <h1>购物车</h1>
    <ul>
        <li><a href="index.php">首页</a></li>
        <li><a href="login_out.php">退出</a></li>
    </ul>
</header>
<div class="content">
    <div class="commodity">
        <ul>
            <li><div class="logo"><img src="" alt=""></div></li>
            <li><span class="wenzi">ssssdasdsadadasd</span></li>
            <li><div class="amount">金额：</div></li>
            <li><div class="price">价格：</div></li>
            <li><div class="buy"><button>购买</button></div></li>
        </ul>
        <ul>
            <li><div class="logo"><img src="" alt=""></div></li>
            <li><span class="wenzi">ssssdasdsadadasd</span></li>
            <li><div class="amount">金额：</div></li>
            <li><div class="price">价格：</div></li>
            <li><div class="buy"><button>购买</button></div></li>
        </ul>





    </div>
</div>
</body>
</html>

