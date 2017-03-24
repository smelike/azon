<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('common/header');?>

</head>

<body class="login-layout">
<div class="main-container">
	<div class="main-content">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">
				<div class="login-container">
					<div class="center">
						<h1>
							<i class="ace-icon fa fa-leaf green"></i>
							<span class="red">创客</span>
							<span id="id-text2 white">ERP 系统 - 中介</span>
						</h1>
					</div>
					<div class="space-6"></div>
					<div class="position-relative">
						<div id="login-box" class="login-box visible widget-box no-border">
							<div class="widget-body">
								<div class="widget-main">
									<h4 class="header blue lighter bigger">
										<i class="ace-icon fa fa-coffee green"></i>
										请输入您的信息
									</h4>

									<div class="space-6"></div>
									<?php if (isset($msg)):?>
										<?php if(is_array($msg)):?>
											<p style="color:red;">
												<?php foreach ($msg as $v):?>
													<?php echo $v.';'?>
												<?php endforeach;?>
											</p>
										<?php else:?>
											<?php echo $msg;?>
										<?php endif;?>
									<?php endif;?>
									<?php echo form_open(); ?>
									<fieldset>
										<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="username" placeholder="用户名/邮箱/手机号" value="<?php echo set_value('username'); ?>" />
															<i class="ace-icon fa fa-user"></i>
														</span>
										</label>

										<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" class="form-control" name="password" placeholder="密码" />
															<i class="ace-icon fa fa-lock"></i>
														</span>
										</label>

										<label class="block clearfix">
														<span  style="width: 100px;display: inline-block">
															<input type="text" class="form-control"  name="captcha" placeholder="验证码" maxlength="4" />
														</span>
											<a href="javascript:;">
												<img src="<?php echo site_url('/login/showCaptcha');?>" onclick="changeCaptcha(this)">
											</a>
										</label>

										<div class="space"></div>

										<div class="clearfix">
											<label class="inline">
												<input type="checkbox" class="ace" checked/>
												<span class="lbl">记住密码</span>
											</label>

											<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
												<i class="ace-icon fa fa-key"></i>
												<span class="bigger-110">登陆</span>
											</button>
										</div>

										<div class="space-4"></div>
									</fieldset>
									</form>

								</div><!-- /.widget-main -->
							</div><!-- /.widget-body -->
						</div><!-- /.login-box -->
					</div><!-- /.position-relative -->

					<div class="navbar-fixed-top align-right">
						<br />
						&nbsp;
						<a id="btn-login-dark" href="#">Dark</a>
						&nbsp;
						<span class="blue">/</span>
						&nbsp;
						<a id="btn-login-blur" href="#">Blur</a>
						&nbsp;
						<span class="blue">/</span>
						&nbsp;
						<a id="btn-login-light" href="#">Light</a>
						&nbsp; &nbsp; &nbsp;
					</div>
				</div>
			</div><!-- /.col -->
		</div><!-- /.row -->
	</div><!-- /.main-content -->
</div><!-- /.main-container -->
<?php $this->load->view('common/footer');?>
<script type="text/javascript">
	// 点击更换验证码
	function changeCaptcha(that) {
		var a = that.src;
		if(a.indexOf('?') > 0){
			a = a.split('?');
			$(that).attr('src',a[0]+'?'+Math.random());
		}else{
			$(that).attr('src',a+'?'+Math.random());
		}

	}
</script>
</body>
</html>
