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
		<!-- 弹出层-->
		<div id="gray"></div>
		<div class="popup" id="popup-edit">
			<div class="top_nav" id='top_nav' style="width: 100%;">
				<span>修改平台</span>
				<a class="guanbi" id="guanbi3"></a>
			</div>
			<div class="min">
				<div class="tc_login">
					<form method="POST" name="form_login" target="_top" class="form-horizontal" role="form" action="<?php echo site_url('/platform/edit_platform');?>">
						<!-- form-group-->
						<div class="row">
							<div class="col-xs-12">
								<div class="col-sm-6 form-group" >
									<input name="id" type="hidden" value="" id="hide_input">
									<label class="col-sm-3 control-label no-padding-right" for="form-platform-1">平台名称</label>
									<div class="col-sm-9">
										<input readonly="readonly" type="text" id="edit_name" class="col-xs-12" required/>
									</div>
								</div>
								<div class="col-sm-6 form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-platform-2">平台网址</label>
									<div class="col-sm-9">
										<input readonly="readonly" type="text" id="edit_url" class="col-xs-12" required/>
									</div>
								</div>
								<div class="col-sm-6 form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-platform-3">币种</label>
									<div class="col-sm-9">
										<input readonly="readonly" type="text" id="edit_currency" class="col-xs-12" required/>
									</div>
								</div>
								<div class="col-sm-6 form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-platform-4">激活</label>
									<div class="col-sm-9">
										<select class="chosen-select form-control" id="edit_status" name="status">
											<option value="1">是</option>
											<option value="2">否</option>
										</select>
									</div>
								</div>
							</div>
						</div>

						<div align="center">
							<input type="submit" class="button btn btn-success" title="Sign In" value="提交">
						</div>
					</form>
					<!-- form-group-->
				</div>
			</div>
		</div>
		<!-- 弹出层-->
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
					<li class="active">平台设置</li>
				</ul><!-- /.breadcrumb -->
			</div>

			<div class="page-content">
				<!-- form-group-->
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<table class="diy-table table table-bordered table-hover">
							<caption class="diy-table-caption">
								<span>平台列表</span>
							</caption>
							<thead>
							<tr>
								<th width="50">操作</th>
								<th>平台名称</th>
								<th>平台网址</th>
								<th>币种</th>
								<th>激活状态</th>
							</tr>
							</thead>
							<tbody>
							<?php for ($i=0;$i<count($data);$i++): ?>
							<tr>
								<td>
									<button class="btn-link tc-edit" value="<?php echo $data[$i]['id'];?>">
										修改
									</button>
								</td>
								<td>
									<input class="hideBorder m-input" type="text" value="<?php echo $data[$i]['name'];?>"/>
								</td>
								<td>
									<input class="hideBorder l-input" type="text" value="<?php echo $data[$i]['url'];?>"/>
								</td>
								<td>
									<input class="hideBorder x-input" type="text" value="<?php echo $data[$i]['currency'];?>"/>
								</td>
								<td>
									<input class="hideBorder m-input" type="text" value="<?php echo $data[$i]['status'];?>"/>
								</td>
							</tr>
							<?php endfor; ?>
							</tbody>
						</table>
						<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->

	<?php $this->load->view('common/footer');?>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {
		$(".tc-edit").click(function () {
			var id = $(this).attr('value');
			$('#hide_input').val(id);
			$("#gray").fadeIn(500);
			$("#popup-edit").fadeIn(500);

			$.getJSON('<?php echo site_url('/platform/edit_platform');?>',{id:id},function(res){
				var name = res.name;
				var url = res.url;
				var currency = res.currency;
				var status = res.status;
				$("#edit_name").val(name);
				$("#edit_url").val(url);
				$("#edit_currency").val(currency);
				$("#edit_status").val(status);
			});

			tc_center();
		});
		$("#guanbi3").click(function () {
			$("#gray").fadeOut(500);
			$("#popup-edit").fadeOut(500);
		});
		//
		$('#timepicker1').timepicker({
			minuteStep: 1,
			showSeconds: true,
			showMeridian: false,
			disableFocus: true,
			icons: {
				up: 'fa fa-chevron-up',
				down: 'fa fa-chevron-down'
			}
		}).on('focus', function() {
			$('#timepicker1').timepicker('showWidget');
		}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});

		$('#timepicker2').timepicker({
			minuteStep: 1,
			showSeconds: true,
			showMeridian: false,
			disableFocus: true,
			icons: {
				up: 'fa fa-chevron-up',
				down: 'fa fa-chevron-down'
			}
		}).on('focus', function() {
			$('#timepicker2').timepicker('showWidget');
		}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});

		$('#edit_task_start').timepicker({
			minuteStep: 1,
			showSeconds: true,
			showMeridian: false,
			disableFocus: true,
			icons: {
				up: 'fa fa-chevron-up',
				down: 'fa fa-chevron-down'
			}
		}).on('focus', function() {
			$('#edit_task_start').timepicker('showWidget');
		}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});

		$('#edit_task_end').timepicker({
			minuteStep: 1,
			showSeconds: true,
			showMeridian: false,
			disableFocus: true,
			icons: {
				up: 'fa fa-chevron-up',
				down: 'fa fa-chevron-down'
			}
		}).on('focus', function() {
			$('#edit_task_end').timepicker('showWidget');
		}).next().on(ace.click_event, function(){
			$(this).prev().focus();
		});

		

		//add
		//or change it into a date range picker
		$('.input-daterange').datepicker({todayHighlight : true,autoclose:true});


		//to translate the daterange picker, please copy the "examples/daterange-fr.js" contents here before initialization
		$('input[name=date-range-picker]').daterangepicker({
					'applyClass' : 'btn-sm btn-success',
					'cancelClass' : 'btn-sm btn-default',
					locale: {
						applyLabel: 'Apply',
						cancelLabel: 'Cancel',
					}
				})
				.prev().on(ace.click_event, function(){
			$(this).next().focus();
		});
	});
</script>
<!-- popup-->
</body>
</html>
