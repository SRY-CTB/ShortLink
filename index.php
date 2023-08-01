<?php
  	// 引入类
	require_once('inc/require.php');
	
	// 重定向
  	if(isset($_GET['id'])) {
    	$url_c = new url();
    	// 获取目标网址
    	$url = $url_c->get_url($_GET['id']);
    	// 重定向至目标网址
    	if($url) {
      		header('Location: ' . $url);
      		exit;
    	}
  	}
?>

<!DOCTYPE HTML>
<html>
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<!--标题-->
	    <title><?php echo get_title() . ' - ' . get_description(); ?></title>
		<!--介绍、关键词的放置处（SEO优化）-->
	    <meta name="description" content="ShortLink 短链接服务">
	    <meta name="keyword" content="短链接,ShortLink,Link,链接缩短,短网址">
		<!--引入 CSS 文件-->
	    <link type="text/css" rel="stylesheet" href="asset/css/main.css">
	        <style>
        .vue-footer {
            background-color: #f0f0f0;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #666;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.46);
        }

        .vue-footer-left {
            margin-right: auto;
        }

        .vue-footer-right {
            margin-left: auto;
        }
        
        a:link,
        a:visited {
          color: rgb(0 0 0);
          text-decoration: none;
        }
        
        a:hover,
        a:active {
          color: rgb(0 0 0);
          text-decoration: none;
        }
        
        body {
          height: 680px;
          background-image: url("https://api-view.star-skin.cn/img");
          background-size: cover;
          position: relative;
          color: #ffffff;
        }
        
        body::before {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-image: inherit; 
          background-size: cover;
          filter: blur(10px);
          z-index: 0; 
        }
        
            /* 第一个段落样式 */
        .title-line {
          font-size: 35px;
          text-align: center;
          letter-spacing: 10px;
          background: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
          font-weight: bold;
        }
    
        /* 第二个段落样式 */
            .sub-title-line {
              font-size: 16px;
              text-align: left; /* 左对齐 */
              letter-spacing: 20px;
              background: linear-gradient(to right top, #ac78e1, #9596f2, #89aff9, #8fc4f8, #a7d6f3);
          -webkit-background-clip: text;
          -webkit-text-fill-color: transparent;
              display: inline; /* 将段落设置为行内元素 */
              font-weight: bold;
              
        }
        
          .link-area {
            position: relative;
            z-index: 1; /* 设置较高的z-index值 */
            /* 其他样式 */
          }
          
            blockquote {
                background-color: #ffffff40;
                border-left: .4rem solid #9a9b9b;
                margin: 1.5em .7rem;
                padding: .5em .7rem;
                position: relative;
                width: 600px;
                z-index: 3;
            }
    </style>
	</head>
	<body>
	    <div class="wrap">
  			<!--网页显示标题-->
			<div class="meta" >
                <p class="title-line cn-font">· 短链生成 ·</p>
                <p class="sub-title-line cn-font">缩短超长链接</p>
			</div>
			<br><br>

  			<!--链接显示区-->
			<div class="link-area">
				<input id="url" type="text" placeholder="原网址" />
				<input id="submit" type="button" value="生成" onclick="APP.fn.setUrl(this)" />
				<br><br>
				<input id="shorturl" type="text" placeholder="短网址" readonly/>
				<input id="shorturlcopy" type="button" value="复制" onclick="copyText()" />
			</div>
			
			<br><br><br>
			<center>
			<blockquote>
            <p>XXXXXX</a>
                <br><br>
                XXX
                <br>
                XXX
                <br></p>
            </blockquote>
            </center>
			<div class="vue-footer" style="position: fixed; bottom: 0; left: 0; right: 0;">
				<span class="vue-footer-left">原项目&nbsp;&nbsp;From <a href="https://github.com/renbaoshuo/Shortlink">&nbsp;&nbsp;renbaoshuo/Shortlink</a></span><span class="vue-footer-right">UI&nbsp;&nbsp;By&nbsp;&nbsp;<a href="https://star-skin.cn/">SRY_CTB</a></span>
			</div>
	    </div>
		<!--嵌入 JS 代码-->
		<script>
			shorturl.oncopy = function() {
				Swal.fire({
					allowOutsideClick:false,
					type:'success',
					title: '复制成功！',
					showConfirmButton: false,
					timer: 3000
				});
			};
		</script>
		<!--引入 JS 文件-->
		<script type="text/javascript" src="asset/js/app.js"></script>
		<script src="https://jsd.onmicrosoft.cn/npm/sweetalert2@8"></script>
	</body>
	
</html>
