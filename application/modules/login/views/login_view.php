<?php $this->load->view('header-template');?>  

<script>
$(document).ready(function(){
alert('tes');
//		$("#notif").delay(1000).fadeIn();
//      $("#notif").delay(1000).fadeOut();
       
     
});
</script>

<style type="text/css">#captchaInput {

    margin-bottom: 10px;
    
      display: block;
    width: 100%;
    height: 25px;
    padding: 6px 12px;
    font-size: 11px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;

}
  input[type="submit"] {
    margin-left: 10px;
}</style>

 
</head>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.captcha.basic.js');?>" ></script>
  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.captcha.basic.min.js');?>" ></script>
   <script type="text/javascript">
      /* ===============
       *  DEMO EXAMPLE
       * =============== */
      $(document).ready(function () {

          $('#myform').captcha();

      });
  </script>
<body class="full-width page-condensed">


  
    <!-- Login wrapper -->
    <div class="login-wrapper">

    <h3 align="center" class="alert alert-danger" style="font-size:12px;" id="notif"><?php echo $this->session->flashdata('pesan');?> </h3>
                         
        <form  id="myform" action="<?php echo base_url('login/auth');?>" role="form" method="POST">
            <div class="popup-header">
            
                <span class="text-semibold">User Login</span>
                 
            </div>
            <div class="well">
                <div class="form-group has-feedback">
                    <label>Username</label>
                    <input type="text" name = "username" class="form-control" placeholder="Username"  id="text" style="margin:5px;">
                    <i class="icon-users form-control-feedback"></i>
                </div>

                <div class="form-group has-feedback">
                    <label>Password</label>
                    <input type="password" name = "password" class="form-control" placeholder="Password" style="margin:5px;">
                    <i class="icon-lock form-control-feedback"></i>
                </div>


                <div class="row form-actions">
                  
                    <div class="col-xs-12">
                       <input type="submit" value="Login" class="btn btn-block btn-warning pull-right" />
                        <!--button type="submit" class="btn btn-block btn-warning pull-right"><i class="icon-menu2"></i> Login</button-->
                    </div>
                </div>
            </div>
        </form>
    </div>  
    <!-- /login wrapper -->

        <!-- Footer -->
    <?php $this->load->view('footer-template');?>  
    <!-- /footer -->

 		 
</body>
</html>
