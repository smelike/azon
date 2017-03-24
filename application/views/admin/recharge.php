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
							<li class="active">充值中心</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						
						<!-- form-group-->
						<div class="row">
							<div class="col-xs-6">

								<div id="myTabContent" class="tab-content">
									<div class="row">
										<div class="col-xs-12">
											<form method="POST" name="form_login" target="_blank"  class="form-horizontal" role="form" action="<?php echo site_url('/recharge/pay');?>">
												<div class="col-sm-7 form-group" >
													<label class="col-sm-3 control-label no-padding-right"><b>支付方式</b></label>
												</div>
												<div class="col-sm-7 form-group" >
													<label class="col-sm-4 col-sm-offset-2 checkbox-inline">
														<input type="radio" name="payment" id="zhifubao" value="alipay" checked>
														<img src="/assets/images/zhifubao.png" width="80px"/>
													</label>
													<label class="col-sm-4 checkbox-inline">
														<input type="radio" name="payment" id="bankCard"  value="unionpay">
														<img src="/assets/images/yinhangka.jpg" width="80px"/>
													</label>
												</div>
												<div class="col-sm-7 form-group" >
													<label class="col-sm-3 control-label no-padding-right"><b>充值金额</b></label>
												</div>
												<div class="col-sm-7 form-group" >
													<label class="col-sm-3 control-label no-padding-right" for="finance-pay-1">人民币：</label>

													<div class="col-sm-9">
														<input type="text" id="finance-pay-1" class="col-xs-12" name='account'/>
													</div>
												</div>


												<div class="clearfix form-actions">
													<div class="col-md-offset-5 col-md-7">
														<button class="btn btn-info" type="submit">
															<i class="ace-icon fa fa-check bigger-110"></i>
															付款
														</button>
													</div>
												</div>
											</form>
										</div>
									</div>
									<div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>
									<div class="row">
										<div class="col-xs-12">
											<form class="form-horizontal" role="form">
												<div class="col-sm-7 form-group" >
													<label class="col-sm-3 control-label no-padding-right"><b>线下转账</b></label>
												</div>
												<div class="col-sm-7 form-group" >
													<label class="col-sm-3 control-label no-padding-right" for="finance-pay-2">充值单号：</label>

													<div class="col-sm-9">
														<input type="text" id="finance-pay-2" class="col-xs-12" />
													</div>
												</div>
												<div class="col-sm-5 form-group" style="line-height: 34px">
													转账备注请填写此充值单号，以便快速入账。
												</div>
												<div class="col-sm-7 form-group" >
													<label class="col-sm-3 control-label no-padding-right" for="finance-pay-3">支付方式：</label>

													<div class="col-sm-9">
														<input type="text" id="finance-pay-3" class="col-xs-12" value="银行卡转账" disabled/>
													</div>
												</div>
												<div class="col-sm-7 form-group" >
													<label class="col-sm-3 control-label no-padding-right" for="finance-pay-4">金额：</label>

													<div class="col-sm-9">
														<input type="text" id="finance-pay-4" class="col-xs-12"/>
													</div>
												</div>
												<div class="col-sm-7 form-group" >
													<label class="col-sm-3 control-label no-padding-right" for="finance-pay-5">收款人：</label>

													<div class="col-sm-9">
														<input type="text" id="finance-pay-5" class="col-xs-12"/>
													</div>
												</div>
												<div class="col-sm-7 form-group" >
													<label class="col-sm-3 control-label no-padding-right" for="finance-pay-6">银行卡帐号：</label>

													<div class="col-sm-9">
														<input type="text" id="finance-pay-6" class="col-xs-12" />
													</div>
												</div>
												<div class="col-sm-7 form-group" >
													<label class="col-sm-3 control-label no-padding-right" for="finance-pay-7">开户银行：</label>

													<div class="col-sm-9">
														<input type="text" id="finance-pay-7" class="col-xs-12" />
													</div>
												</div>
												<div class="col-sm-7 form-group" >
													<label class="col-sm-3 control-label no-padding-right" for="finance-pay-8">开户地址：</label>

													<div class="col-sm-9">
														<input type="text" id="finance-pay-8" class="col-xs-12" />
													</div>
												</div>
												<div class="col-sm-7 form-group" >
													<label class="col-sm-3 control-label no-padding-right" for="finance-pay-9">付款截图：</label>
													<div class="col-sm-9" style="margin-top: 8px">
														<input type="file" id="finance-pay-9" >
													</div>
												</div>

												<div class="clearfix form-actions">
													<div class="col-md-offset-5 col-md-7">
														<button class="btn btn-info" type="button">
															<i class="ace-icon fa fa-check bigger-110"></i>
															付款
														</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- form-group-->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

	<?php $this->load->view('common/footer');?>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	jQuery(function($) {
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
