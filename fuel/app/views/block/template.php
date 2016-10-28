<!DOCTYPE html>
<html>
    <head>
        <title>Đồng hồ đếm ngược bằng </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <style>
            span{border: solid 1px #ACACAC; padding: 2px;}
        </style>
        <script language="javascript">
 
            var h = 0; // Giờ
            var m = 0; // Phút
            var s = 10; // Giây
            var timeout = null; // Timeout
             
            function start()
            {
                if (h === null)
			    {
			        h = parseInt(document.getElementById('h_val').value);
			        m = parseInt(document.getElementById('m_val').value);
			        s = parseInt(document.getElementById('s_val').value);
			    }
			    if (s === -1){
			        m -= 1;
			        s = 59;
			    }
			    if (m === -1){
			        h -= 1;
			        m = 59;
			    }
			    if (h == -1){
			        clearTimeout(timeout);
			        // alert('Hết giờ Click dang nhap lai');
                    document.forms[0].action = '/block/restart';
                    document.forms[0].submit();
			        // return false;
			    }
			 
			    /*BƯỚC 1: HIỂN THỊ ĐỒNG HỒ*/
			    document.getElementById('h').innerText = h.toString();
			    document.getElementById('m').innerText = m.toString();
			    document.getElementById('s').innerText = s.toString();
			 
			    /*BƯỚC 1: GIẢM PHÚT XUỐNG 1 GIÂY VÀ GỌI LẠI SAU 1 GIÂY */
			    timeout = setTimeout(function(){
			        s--;
			        start();
                     
			    }, 1000);
                    
            }
            function stop(){
                clearTimeout(timeout);
            }
           
        </script>
         <?php echo Asset::css('bootstrap.css'); ?>
    <?php echo Asset::css('blog.css'); ?>


    </head>
    <body>
    <div class="container noidung ">
    <div class="row">
        <div class="col-md-4"><a href="register" title="">Đăng kí tài khoản tại đây</a></div>
        <div class="col-md-4">
              <strong>
                Click để đăng nhập lại
                <br>
                <br>
            </strong>
            <form action="" method="post" accept-charset="utf-8" name="form1"> 
                <input type="button" value="Start" onclick="start()"/>
                <br>
                <br>

                <!-- <input type="button" value="Stop" onclick="stop()"/>  <br/> <br/> -->
            </form>
        
        <div>
            <span id="h">Giờ</span> :
            <span id="m">Phút</span> :
            <span id="s">Giây</span>
        </div>
        </div>
        <div class="col-md-4"></div>



    </div>
          
        
        </div>
    </body>
</html>