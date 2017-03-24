<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('common/header');?>
</head>

<body class="no-skin">
<?php $this->load->view('common/navbar');?>

<div class="main-container ace-save-state" id="main-container">
	<?php $this->load->view('common/sidebar');?>

	<div class="main-content">
		<div class="main-content-inner">
			<div class="breadcrumbs ace-save-state" id="breadcrumbs">
				<ul class="breadcrumb">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="#">主页</a>
					</li>

					<li>
						<a href="#">系统设置</a>
					</li>
					<li class="active">修改密码</li>
				</ul><!-- /.breadcrumb -->
			</div>

			<div class="page-content">
				
				<!-- form-group-->
				<div class="row">
					<div class="col-xs-6">
						<div class="col-xs-12">
							<?php if (isset($msg)):?>
								<?php if(is_array($msg)):?>
									<div class="alert alert-danger" role="alert">
										<?php foreach ($msg as $v):?>
											<?php echo $v.';'?>
										<?php endforeach;?>
									</div>
								<?php else:?>
									<?php echo $msg;?>
								<?php endif;?>
							<?php endif;?>
							<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('/Setting/changePassword');?>">
								<div class="col-sm-12 alert alert-warning">
									友情提示：建议密码长度在8位以上，大小写混合+数字，切勿使用简单的单词或数字作为密码！
								</div>
								<div class="col-sm-7 form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-info-1">旧密码</label>
									<div class="col-sm-9">
										<input type="password" id="form-info-1" class="col-xs-12" name="password_o" value="" />
									</div>
								</div>
								<div class="col-sm-7 form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-info-2">新密码</label>
									<div class="col-sm-9">
										<input type="password" id="form-info-2" class="col-xs-12" name="password" value="" />
									</div>
								</div>
								<div class="col-sm-7 form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-info-3">确认密码</label>
									<div class="col-sm-9">
										<input type="password" id="form-info-3" class="col-xs-12" name="passconf" value="" />
									</div>
								</div>
								<div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>
								<div class="clearfix form-actions">
									<div class="col-md-offset-5 col-md-7">
										<button class="btn btn-info" type="submit">
											<i class="ace-icon fa fa-check bigger-110"></i>
											保存
										</button>
										&nbsp; &nbsp; &nbsp;
										<button class="btn" type="reset">
											<i class="ace-icon fa fa-undo bigger-110"></i>
											重置
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- form-group-->
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->

	<?php $this->load->view('common/footer');?>


<!-- popup-->
</body>
</html>
