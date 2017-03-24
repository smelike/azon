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
						<a href="#">创客&nbsp;ERP&nbsp;系统</a>
					</li>
					<li class="active">主页</li>
				</ul><!-- /.breadcrumb -->

			</div>
			<div class="page-content">
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<div class="alert alert-block alert-success">

							<i class="ace-icon fa fa-check green"></i>

							欢迎使用
							<strong class="green">
								赛酷营销系统 V 1.0
								<small>(v1.0)</small>
							</strong>
						</div>

						<div class="row">
							<div class="space-6"></div>

							<div class="col-sm-12 infobox-container">

								<div class="infobox infobox-red">
									<div class="infobox-icon">
										<i class="ace-icon fa fa-flask"></i>
									</div>

									<div class="infobox-data">
										<span class="infobox-data-number"><?php echo $await_info['brush_order']; ?></span>
										<div class="infobox-content">待刷单数</div>
									</div>
								</div>
								<div class="infobox infobox-red">
									<div class="infobox-icon">
										<i class="ace-icon fa fa-flask"></i>
									</div>

									<div class="infobox-data">
										<span class="infobox-data-number"><?php echo $await_info['brush_comment']; ?></span>
										<div class="infobox-content">待刷评数</div>
									</div>
								</div>
								<div class="infobox infobox-red">
									<div class="infobox-icon">
										<i class="ace-icon fa fa-flask"></i>
									</div>

									<div class="infobox-data">
										<span class="infobox-data-number"><?php echo $await_info['add_comment']; ?></span>
										<div class="infobox-content">待上评数</div>
									</div>
								</div>
								<div class="space-6"></div>

							</div>
						</div><!-- /.row -->

						<div class="hr hr32 hr-dotted"></div>

						<div class="row">
							<!-- 数据统计-->
							<div class="col-xs-6">
								<div class="panel panel-info">
									<!-- Default panel contents -->
									<div class="panel-heading">数据统计</div>
									<!-- Table -->
									<table class="table table-striped">
										<thead>
										<tr>
											<th>项目</th>
											<th>今日</th>
											<th>昨日</th>
											<th>30天</th>
											<th>说明</th>
										</tr>
										</thead>
										<tbody>
										<?php if(isset($totals) && count($totals) > 0):?>
											<?php foreach ($totals as $k => $item):?>
											<tr>
												<td><?php echo $k;?></td>
												<td>¥<span><?php echo $item['now'];?></span></td>
												<td>¥<span><?php echo $item['yes'];?></span></td>
												<td>¥<span><?php echo $item['mon'];?></span></td>
												<td><?php echo $item['tip'];?></td>
											</tr>
											<?php endforeach;?>
										<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
							<!-- 数据统计-->
							<!-- 系统通知-->
							<div class="col-xs-6">
								<div class="col-xs-12">
									<div class="widget-box transparent">
										<div class="widget-header widget-header-small">
											<h4 class="widget-title blue smaller">
												<i class="ace-icon fa fa-bell orange"></i>
												重要通知
											</h4>

											<div class="widget-toolbar action-buttons">
												<a href="#" data-action="reload">
													<i class="ace-icon fa fa-refresh blue"></i>
												</a>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main padding-8">
												<div id="profile-feed-1" class="profile-feed" style="height: 350px;overflow: auto">
													<?php for ($i=0;$i<count($msg_info);$i++): ?>
													<div class="profile-activity clearfix">
														<div>
															<?php if($msg_info[$i]['type_id'] == 1):?>
																<i class="pull-left thumbicon fa fa-volume-up btn-warning no-hover"></i>
															<?php elseif ($msg_info[$i]['type_id'] == 2): ?>
																<i class="pull-left thumbicon fa fa-cog btn-success no-hover"></i>
															<?php else: ?>
																<i class="pull-left thumbicon fa fa-envelope-o btn-info no-hover"></i>
															<?php endif;?>
															<a class="user" style="<?php echo (intval($msg_info[$i]['status']) == 1) ? 'color:#999' : '' ?>" href="javascript:;" onclick="seeDetail(this,<?php echo $msg_info[$i]['id'];?>,<?php echo $msg_info[$i]['message_id'];?>)"> <?php echo $msg_info[$i]['title'];?> </a>

															<div class="time">
																<i class="ace-icon fa fa-clock-o bigger-110"></i>
																<?php echo $msg_info[$i]['create_time'];?>
																&nbsp;&nbsp;
																<i class="ace-icon fa fa-user bigger-110"></i>
																<?php echo $msg_info[$i]['username'];?>
															</div>
														</div>
													</div>
													<?php endfor; ?>
												</div>
											</div>
										</div>
									</div>

									<div class="hr hr2 hr-double"></div>

									<div class="space-6"></div>

									<div class="center">
										<a href="<?php echo site_url('/message/index');?>" class="btn btn-sm btn-primary btn-white btn-round">
											<span class="bigger-110">点击查看更多</span>
											<i class="icon-on-right ace-icon fa fa-arrow-right"></i>
										</a>
									</div>
								</div>
							</div><!-- 系统通知-->
						</div>

						<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->
<!-- 通知详情 -->
<!-- Modal -->
<div class="modal fade" id="tip_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog" style="margin: 2% auto 0;width: 1024px">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        	<h4 class="modal-title" id="myModalLabel">通知详情</h4>
	      	</div>
	     	<div class="modal-body" id="tip-content"></div>
	     	<div class="modal-footer">
	       	 	<button type="button" class="btn btn-default" data-dismiss="modal">我知道了</button>
	      	</div>
	    </div>
  	</div>
</div>
<script id="tip-form" type="text/html">
	<div class="tc_login">
		<!-- form-group-->
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">{{list.name}}</h3>
					</div>
					<div class="panel-body">
						<h5>标题：{{list.title}}</h5>
						<div style="margin-bottom: -20px;">内容：</div>
						<div style="padding-left: 46px;">{{#list.content}}</div>
					</div>
					<div class="panel-footer">
						<div style="display: inline-block;">
							发布人：<b>{{list.real_name}}</b>
						</div>
						<div style="display: inline-block;margin-left: 100px">
							浏览次数：<p style="display: inline-block">{{list.num}}次</p>
						</div>
						<div style="display: inline-block;margin-left: 100px">
							发布通知时间：<span>{{list.create_time}}</span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- form-group-->
	</div>
</script>

	<?php $this->load->view('common/footer');?>

	<!-- page specific plugin scripts -->

	<!--[if lte IE 8]>
	<script src="/assets/js/excanvas.min.js"></script>
	<![endif]-->
	<script src="/assets/js/jquery-ui.custom.min.js"></script>
	<script src="/assets/js/jquery.ui.touch-punch.min.js"></script>
	<script src="/assets/js/jquery.easypiechart.min.js"></script>
	<script src="/assets/js/jquery.sparkline.index.min.js"></script>
	<script src="/assets/js/jquery.flot.min.js"></script>
	<script src="/assets/js/jquery.flot.pie.min.js"></script>
	<script src="/assets/js/jquery.flot.resize.min.js"></script>
<!-- inline scripts related to this page -->
<script type="text/javascript">
	// 弹窗查看详情
	function seeDetail(that,id,message_id) {
		// 获取数据
		var data = {};
		var url = '<?php echo site_url('home/get_notice');?>';
		$.post(url,{'id':id,'meg_id':message_id},function(res){
			if(res.s == 1){
				data.list = res.data;
				var html = template('tip-form', data);
				$('#tip-content').html(html);
				$(that).attr('style','color:#999;');
				$('#tip_Modal').modal();
			}else{
				layer.alert(res.msg);
			}
		},'json')
	}
</script>
</body>
</html>
