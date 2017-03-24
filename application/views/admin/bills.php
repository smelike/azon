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
						<a href="#">财务管理</a>
					</li>
					<li class="active">财务明细</li>
				</ul><!-- /.breadcrumb -->
			</div>

			<div class="page-content">
				<div class="row">
					<div class="col-xs-12">
						<div class="alert alert-info" role="alert">
							财务明细（ 冻结中:￥<?php echo $wallet['freezing']?>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;已提现:￥<?php echo $wallet['already']?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;余额:￥<?php echo $wallet['money']?>）
						</div>
					</div>
				</div>
				<!-- form-group-->
				<div class="row">
					<div class="col-xs-12">
						<form action="<?php echo site_url('bills/index');?>" class="form-horizontal" role="form" method="get">
							<div class="row">
								<div class="col-xs-12">
									<div class="col-sm-3 form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-finance-2">任务类型：</label>
										<div class="col-sm-6">
											<select class="form-control" id="form-finance-2" name="task_type">
												<option value="0" <?php if ($task_type == 0) echo 'selected="selected"';?>>==全部==</option>
												<option value="1" <?php if ($task_type == 1) echo 'selected="selected"';?>>刷单</option>
												<option value="2" <?php if ($task_type == 2) echo 'selected="selected"';?>>刷评</option>
												<option value="3" <?php if ($task_type == 3) echo 'selected="selected"';?>>点赞</option>
											</select>
										</div>
									</div>

									<div class="col-sm-3 form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-finance-3">财务类型：</label>
										<div class="col-sm-6">
											<select class="form-control" id="form-finance-3" name="type">
												<option value="0" <?php if ($type == 0) echo 'selected="selected"';?>>==全部==</option>
												<option value="1" <?php if ($type == 1) echo 'selected="selected"';?>>冻结</option>
												<option value="3" <?php if ($type == 3) echo 'selected="selected"';?>>入款</option>
											</select>
										</div>
									</div>
									<div class="col-sm-3 form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-finance-2">任务时间：</label>
										<div class="col-sm-9">
											<div class="input-daterange input-group">
												<input type="text" class="input-sm form-control" name="taskstart_time" value="<?php echo $taskstart_time;?>"/>
															<span class="input-group-addon">
																<i class="fa fa-exchange"></i>
															</span>
												<input type="text" class="input-sm form-control" name="taskend_time" value="<?php echo $taskend_time;?>"/>
											</div>
										</div>
									</div>
									
									
									<div class="col-sm-3 form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-finance-2">付款人：</label>
										<div class="col-sm-9">
											<select class="form-control" id="form-finance-3" name="userid">
											<option value="0" <?php if ($company_id_sel == 0) echo 'selected="selected"';?>>==全部==</option>
											<?php for ($i=0;$i<count($company);$i++): ?>

												<option value="<?php echo $company[$i]['company_id'];?>" <?php if ($company_id_sel == $company[$i]['company_id']) echo 'selected="selected"';?>><?php echo $company[$i]['name'];?></option>;
											<?php endfor?>
											</select>
										</div>
									</div>
								
								</div>
							</div>
							<div class="col-md-offset-5 col-md-7">
								<button class="btn btn-info" type="submit">
									<i class="ace-icon fa fa-search bigger-110"></i>
									查找
								</button>
								&nbsp; &nbsp; &nbsp;
								<button class="btn" type="reset">
									<i class="ace-icon fa fa-undo bigger-110"></i>
									重置
								</button>
							</div>
						</form>
					</div>
				</div>
				<!-- form-group-->
				<div class="row">
					<div class="col-xs-12 no-padding">
						<!-- PAGE CONTENT BEGINS -->
						<div class="col-sm-12">
							<table class="diy-table table table-bordered table-hover">
								<caption class="diy-table-caption">
									<span>财务明细</span>
								</caption>
								<thead>
								<tr>
									<th width="50">
										<input type="checkbox" class="table-selectAll"/>
									</th>
<!--									<th width="50">操作</th>-->
									<th>流水号</th>
									<th>任务编号</th>
									<th>任务类型</th>
									<th>财务类型</th>
									<th>金额(￥)</th>
									<th>余额(￥)</th>
									<th>创建时间</th>
									<th>付款人</th>
									<th>备注</th>
								</tr>
								</thead>
								<tbody>
								<?php for ($i=0;$i<count($data);$i++): ?>
								<tr>
									<td>
										<input class="hideBorder" type="checkbox"/>
									</td>
<!--									<td>-->
<!--										<button class="btn-link" data-toggle="modal" data-target="#myModal" value="--><?php //echo $data[$i]['id'];?><!--">-->
<!--											修改-->
<!--										</button>-->
<!--									</td>-->
									<td>
										<input class="hideBorder m-input" type="text" value="<?php echo date('YmdHis',strtotime($data[$i]['create_time'])).$data[$i]['id'];?>"/>
									</td>
									<td>
										<input class="hideBorder m-input" type="text" value="<?php echo $data[$i]['tasknumber'];?>"/>
									</td>
									<td>
										<input class="hideBorder m-input" type="text" value="<?php echo $data[$i]['task_type'];?>"/>
									</td>
									<td>
										<input class="hideBorder x-input" type="text" value="<?php echo $data[$i]['type'];?>"/>
									</td>
									<td>
										<input class="hideBorder l-input" type="text" value="<?php echo $data[$i]['money'];?>"/>
									</td>
									<td>
										<input class="hideBorder l-input" type="text" value="<?php echo $data[$i]['balance'];?>"/>
									</td>
									<td>
										<input class="hideBorder l-input" type="text" value="<?php echo $data[$i]['create_time'];?>"/>
									</td>
									<td>
										<input class="hideBorder l-input" type="text" value="<?php echo $data[$i]['user_name'];?>"/>
									</td>
									<td>
										<input class="hideBorder l-input" type="text" value="<?php echo $data[$i]['dnote'];?>"/>
									</td>
								</tr>
								<?php endfor; ?>
								</tbody>
							</table>
							<!-- 分页-->
							<?php echo $page;?>
							<!-- 分页-->
						</div>

						<!-- 模态框（Modal） -->
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<form method="POST" action="<?php echo site_url('/bills/edit_bills');?>">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										<h4 class="modal-title" id="myModalLabel">详情</h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<div class="col-sm-7 form-group" >
												<input name="id" type="hidden" value="" id="hide_input">
												<label class="col-sm-3 control-label no-padding-right" align="right">订单号：</label>
												<div class="col-sm-9">
													<span id="edit_order_num"></span>
												</div>
											</div>
											<div class="col-sm-7 form-group" >
												<label class="col-sm-3 control-label no-padding-right" align="right">项目：</label>
												<div class="col-sm-9">
													<span id="edit_type"></span>
												</div>
											</div>
											<div class="col-sm-7 form-group" >
												<label class="col-sm-3 control-label no-padding-right" align="right">时间：</label>
												<div class="col-sm-9">
													<span id="edit_create_time"></span>
												</div>
											</div>
											<div class="col-sm-7 form-group" >
												<label class="col-sm-3 control-label no-padding-right" align="right">金额：</label>
												<div class="col-sm-9">
													<span id="edit_money"></span>
												</div>
											</div>
											<div class="col-sm-7 form-group" >
												<label class="col-sm-3 control-label no-padding-right" align="right">结余：</label>
												<div class="col-sm-9">
													<span id="edit_balance"></span>
												</div>
											</div>
											<div class="col-sm-7 form-group" >
												<label class="col-sm-3 control-label no-padding-right" align="right" for="form-finance-detail-1">附件：</label>
												<div class="col-sm-9">
													<img src="" id="edit_file" width="400" height="400">
												</div>
											</div>
											<div class="col-sm-7 form-group">
												<label class="col-sm-3 control-label no-padding-right" align="right" for="form-finance-detail-2">状态：</label>
												<div class="col-sm-9">
													<select class="form-control" id="edit_status" name="status">
														<option value="1">处理中</option>
														<option value="2">成功</option>
														<option value="3">失败</option>
													</select>
												</div>
											</div>
										</div>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary">提交更改</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
									</div>
								</form>
								</div><!-- /.modal-content -->
							</div><!-- /.modal -->
						</div>

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
		
		
		$('.input-daterange').datepicker({
            todayBtn : "linked",
            autoclose : true,
            format: 'yyyy-mm-dd',
            todayHighlight : true,
            //startDate : new Date()
        }).on('changeDate',function(e){
            var startTime = e.date;
            $('.input-daterange').datepicker('setStartDate',startTime);
        });
        //
        $(".diy-table").find("button[disabled]").css("color","#999");
		
		$(".btn-link").click(function () {
			var id = $(this).attr('value');
			$('#hide_input').val(id);
			$.getJSON('<?php echo site_url('/bills/edit_bills')?>',{id:id},function(res){
				var order_num = res.order_num;
				var type = res.type;
				var create_time = res.create_time;
				var money = res.money;
				var balance = res.balance;
				var accessory = res.accessory;
				var status = res.status;
				$('#edit_order_num').text(order_num);
				$('#edit_type').text(type);
				$('#edit_create_time').text(create_time);
				$('#edit_money').text(money);
				$('#edit_balance').text(balance);
				if(accessory == null || accessory == ''){
					$("#edit_file").attr('style',"display:none;");
				}else{
					$("#edit_file").attr('style',"display:block;");
					$("#edit_file").attr('src',accessory);
				}
				$("#edit_status").val(status);
			});
		});

		function style_edit_form(form) {
			//enable datepicker on "sdate" field and switches for "stock" field
			form.find('input[name=sdate]').datepicker({todayHighlight : true,format:'yyyy-mm-dd' , autoclose:true})

			form.find('input[name=stock]').addClass('ace ace-switch ace-switch-5').after('<span class="lbl"></span>');
			//don't wrap inside a label element, the checkbox value won't be submitted (POST'ed)
			//.addClass('ace ace-switch ace-switch-5').wrap('<label class="inline" />').after('<span class="lbl"></span>');


			//update buttons classes
			var buttons = form.next().find('.EditButton .fm-button');
			buttons.addClass('btn btn-sm').find('[class*="-icon"]').hide();//ui-icon, s-icon
			buttons.eq(0).addClass('btn-primary').prepend('<i class="ace-icon fa fa-check"></i>');
			buttons.eq(1).prepend('<i class="ace-icon fa fa-times"></i>')

			buttons = form.next().find('.navButton a');
			buttons.find('.ui-icon').hide();
			buttons.eq(0).append('<i class="ace-icon fa fa-chevron-left"></i>');
			buttons.eq(1).append('<i class="ace-icon fa fa-chevron-right"></i>');
		}

		function style_delete_form(form) {
			var buttons = form.next().find('.EditButton .fm-button');
			buttons.addClass('btn btn-sm btn-white btn-round').find('[class*="-icon"]').hide();//ui-icon, s-icon
			buttons.eq(0).addClass('btn-danger').prepend('<i class="ace-icon fa fa-trash-o"></i>');
			buttons.eq(1).addClass('btn-default').prepend('<i class="ace-icon fa fa-times"></i>')
		}

		function style_search_filters(form) {
			form.find('.delete-rule').val('X');
			form.find('.add-rule').addClass('btn btn-xs btn-primary');
			form.find('.add-group').addClass('btn btn-xs btn-success');
			form.find('.delete-group').addClass('btn btn-xs btn-danger');
		}
		function style_search_form(form) {
			var dialog = form.closest('.ui-jqdialog');
			var buttons = dialog.find('.EditTable')
			buttons.find('.EditButton a[id*="_reset"]').addClass('btn btn-sm btn-info').find('.ui-icon').attr('class', 'ace-icon fa fa-retweet');
			buttons.find('.EditButton a[id*="_query"]').addClass('btn btn-sm btn-inverse').find('.ui-icon').attr('class', 'ace-icon fa fa-comment-o');
			buttons.find('.EditButton a[id*="_search"]').addClass('btn btn-sm btn-purple').find('.ui-icon').attr('class', 'ace-icon fa fa-search');
		}

		function beforeDeleteCallback(e) {
			var form = $(e[0]);
			if(form.data('styled')) return false;

			form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
			style_delete_form(form);

			form.data('styled', true);
		}

		function beforeEditCallback(e) {
			var form = $(e[0]);
			form.closest('.ui-jqdialog').find('.ui-jqdialog-titlebar').wrapInner('<div class="widget-header" />')
			style_edit_form(form);
		}



		//it causes some flicker when reloading or navigating grid
		//it may be possible to have some custom formatter to do this as the grid is being created to prevent this
		//or go back to default browser checkbox styles for the grid
		function styleCheckbox(table) {
			/**
			 $(table).find('input:checkbox').addClass('ace')
			 .wrap('<label />')
			 .after('<span class="lbl align-top" />')


			 $('.ui-jqgrid-labels th[id*="_cb"]:first-child')
			 .find('input.cbox[type=checkbox]').addClass('ace')
			 .wrap('<label />').after('<span class="lbl align-top" />');
			 */
		}


		//unlike navButtons icons, action icons in rows seem to be hard-coded
		//you can change them like this in here if you want
		function updateActionIcons(table) {
			/**
			 var replacement =
			 {
                 'ui-ace-icon fa fa-pencil' : 'ace-icon fa fa-pencil blue',
                 'ui-ace-icon fa fa-trash-o' : 'ace-icon fa fa-trash-o red',
                 'ui-icon-disk' : 'ace-icon fa fa-check green',
                 'ui-icon-cancel' : 'ace-icon fa fa-times red'
             };
			 $(table).find('.ui-pg-div span.ui-icon').each(function(){
						var icon = $(this);
						var $class = $.trim(icon.attr('class').replace('ui-icon', ''));
						if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
					})
			 */
		}

		//replace icons with FontAwesome icons like above
		function updatePagerIcons(table) {
			var replacement =
			{
				'ui-icon-seek-first' : 'ace-icon fa fa-angle-double-left bigger-140',
				'ui-icon-seek-prev' : 'ace-icon fa fa-angle-left bigger-140',
				'ui-icon-seek-next' : 'ace-icon fa fa-angle-right bigger-140',
				'ui-icon-seek-end' : 'ace-icon fa fa-angle-double-right bigger-140'
			};
			$('.ui-pg-table:not(.navtable) > tbody > tr > .ui-pg-button > .ui-icon').each(function(){
				var icon = $(this);
				var $class = $.trim(icon.attr('class').replace('ui-icon', ''));

				if($class in replacement) icon.attr('class', 'ui-icon '+replacement[$class]);
			})
		}

		function enableTooltips(table) {
			$('.navtable .ui-pg-button').tooltip({container:'body'});
			$(table).find('.ui-pg-div').tooltip({container:'body'});
		}

		//var selr = jQuery(grid_selector).jqGrid('getGridParam','selrow');

		$(document).one('ajaxloadstart.page', function(e) {
			$.jgrid.gridDestroy(grid_selector);
			$('.ui-jqdialog').remove();
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
