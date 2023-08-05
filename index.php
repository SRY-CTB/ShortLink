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

	    <link type="text/css" rel="stylesheet" href="asset/css/main.css">
	    <link rel="stylesheet" href="//assets.shanrenyi.top/css/sk-main/gg/vue.css">
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
        
        
          .link-area {
            position: relative;
            z-index: 1;

          }
          
              .aq span {
        letter-spacing: 13px;
        font-size: 45px;;
        animation-delay: 0s;
        color: #fff;
        text-shadow: 0 0 0 #444;
        animation: start 1s ease-in-out infinite alternate;
        font-size: 38px;
            position: sticky;
            
            z-index: 99;

    }

    @keyframes start {
        to {
            text-shadow: 0 0 5px #fff,
                0 0 5px #fff,
                0 0 10px #fff,
                0 0 18px #126fcc,
                0 0 20px #126fcc,
                0 0 40px #126fcc;
            color: #fff;
        }
    }

    .aq span:nth-child(1) {
        animation-delay: 0.1s;
    }

    .aq span:nth-child(2) {
        animation-delay: 0.2s;
    }

    .aq span:nth-child(3) {
        animation-delay: 0.3s;
    }

    .aq span:nth-child(4) {
        animation-delay: 0.4s;
    }

    .aq span:nth-child(5) {
        animation-delay: 0.5s;
    }

    .aq span:nth-child(6) {
        animation-delay: 0.6s;
    }

    .aq span:nth-child(7) {
        animation-delay: 0.7s;
    }

    .aq span:nth-child(8) {
        animation-delay: 0.8s;
    }

    .aq span:nth-child(9) {
        animation-delay: 0.9s;
    }

    .aq span:nth-child(10) {
        animation-delay: 1s;
    }
    
    .wrap {
    padding-top: 200px;
}

.copy-notification {
  background-color: #42b983;
  color: white;
  border: none;
  padding: 10px;
  font-size: 16px;
  border-radius: 4px;
  position: fixed;
  top: 20px;
  right: 20px;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s ease;
}

.show-notification {
  opacity: 1;
  pointer-events: auto;
    }
    </style>
	</head>
	<body>
	    <div class="wrap">
  			<!--动态标题-->
 <div class="aq">

        <span>S</span>
        <span>H</span>
        <span>O</span>
        <span>R</span>
        <span>T</span>

        <span>L</span>
        <span>I</span>
        <span>N</span>
        <span>K</span>
</div>

			<br><br>

  			<!--显示-->
			<div class="link-area" id="app">
     <input id="url" type="text" placeholder="原网址" />
      <input id="submit" type="button" value="生成" onclick="APP.fn.setUrl(this)" />
      <br><br>
      <input id="shorturl" type="text" placeholder="短网址" readonly/>
      <input id="shorturlcopy" type="button" value="复制" @click="copyText" />
    <div class="copy-notification" :class="{ 'show-notification': showNotification }">
      已复制文本: {{ copiedText }}
    </div>
    </div>
			
			<br><br><br>
			
			<div class="vue-footer" style="position: fixed; bottom: 0; left: 0; right: 0;">
				<span class="vue-footer-left">原项目&nbsp;&nbsp;From <a href="https://github.com/renbaoshuo/Shortlink">&nbsp;&nbsp;renbaoshuo/Shortlink</a></span><span class="vue-footer-right">UI&nbsp;&nbsp;By&nbsp;&nbsp;<a href="https://star-skin.cn/">SRY_CTB</a></span>
			</div>
	    </div>
		


		<script type="text/javascript" src="asset/js/app.js"></script>
        <script src="https://jsd.onmicrosoft.cn/npm/vue@2.6.14/dist/vue.js"></script>

<script>
  var app = new Vue({
    el: "#app",
    data: {
      copiedText: "",
      showNotification: false,
    },
    methods: {
      copyText() {
        const textToCopy = document.getElementById("shorturl").value;

        const tempInput = document.createElement("textarea");
        tempInput.value = textToCopy;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);

        this.copiedText = textToCopy;
        this.showNotification = true;

        setTimeout(() => {
          this.showNotification = false;
        }, 2000);
      },
    },
  });
</script>
	</body>
	
</html>