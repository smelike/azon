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
					<li class="active">重要通知</li>
				</ul><!-- /.breadcrumb -->
			</div>

			<div class="page-content">
				
				<!-- form-group-->
				<div class="row">
					<div class="col-xs-12">
						<form class="form-horizontal" role="form" action="<?php echo site_url('/message/index');?>">
							<div class="col-sm-4 form-group">
								<label class="col-sm-3 control-label no-padding-right" for="form-sd-2">通知类型</label>
								<div class="col-sm-9">
									<select class="chosen-select form-control" id="form-sd-2" name="type">
										<option value="0">全部消息</option>
										<?php for ($i=0;$i<count($msg_type);$i++): ?>
										<option value="<?php echo $msg_type[$i]['id'];?>"><?php echo $msg_type[$i]['name'];?></option>
										<?php endfor; ?>
									</select>
								</div>
							</div>
							<div class="col-sm-4 form-group" >
								<label class="col-sm-3 control-label no-padding-right" for="form-sd-1">标题</label>
								<div class="col-sm-9">
									<input type="text" name="name" id="form-sd-1" class="col-xs-12" />
								</div>
							</div>
							<div class="col-sm-4 form-group">
								<label class="col-sm-3 control-label no-padding-right">发布时间</label>
								<div class="col-sm-9">
									<div class="input-daterange input-group">
										<div class="input-daterange input-group">
											<input type="text" class="input-sm form-control" name="start_time" />
														<span class="input-group-addon">
															<i class="fa fa-exchange"></i>
														</span>
											<input type="text" class="input-sm form-control" name="end_time" />
										</div>
									</div>
								</div>
							</div>
							<div class="clearfix form-actions">
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
							</div>
						</form>
					</div>
				</div>
				<!-- form-group-->
				<div class="row">
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->
						<table class="table table-hover" id="message-table" style="border: 1px solid #ddd;">
							<thead>
							<tr>
								<th class="col-sm-1">通知类型</th>
								<th class="col-sm-6">标题</th>
								<th class="col-sm-2">发布时间</th>
								<th class="col-sm-1">发布者</th>
								<th class="col-sm-1">阅读数量</th>
								<th class="col-sm-1">操作</th>
							</tr>
							</thead>
							<tbody>
							<?php for ($i=0;$i<count($data);$i++): ?>
							<tr>
								<td>
									<?php if($data[$i]['type_id'] == 1):?>
										<i class="ace-icon fa fa-volume-up sm green"></i>
									<?php elseif ($data[$i]['type_id'] == 2): ?>
										<i class="ace-icon fa fa-cog sm orange"></i>
									<?php else: ?>
										<i class="ace-icon fa fa-envelope-o sm blue"></i>
									<?php endif;?>
									<?php echo $data[$i]['type_name'];?>
								</td>
								<td><?php echo $data[$i]['title'];?></td>
								<td><?php echo $data[$i]['create_time'];?></td>
								<td><?php echo $data[$i]['username'];?></td>
								<td><?php echo $data[$i]['view_times'];?></td>
								<td><a class="user" onclick="seeDatial(<?php echo $data[$i]['id'];?>,<?php echo $data[$i]['message_id'];?>)" href="javascript:;">查看</a></td>
							</tr>
							<?php endfor; ?>
							</tbody>
						</table>
						<!-- 分页-->
						<?php echo $page;?>
						<!-- 分页-->
						<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->
<!-- 通知详情 -->
<!-- Modal -->
<div class="modal fade" id="msg_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog" style="margin: 2% auto 0;width: 1024px">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        	<h4 class="modal-title" id="myModalLabel">通知详情</h4>
	      	</div>
	     	<div class="modal-body" id="msg-content">
	     		
	     	</div>
	     	<div class="modal-footer">
	       	 	<button type="button" class="btn btn-default" data-dismiss="modal">我知道了</button>
	      	</div>
	    </div>
  	</div>
</div>
<script id="msg-form" type="text/html">
	<div class="tc_login">
		<div class="row">
			<div class="col-xs-12">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">{{list.name}}</h3>
					</div>
					<div class="panel-body">
						<h5>标题：{{list.title}}</h5>
						<div>内容：</div>
						<div style="padding-left:40px;">{{#list.content}}</div>
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
		<style>#show_view_people{width: 100%!important;}</style>
		<div class="col-sm-12" style="margin-bottom: 30px">
			<table id="show_view_people" class="table table-hover" align="center" style="border: 1px solid #ddd;">
				<thead>
				<tr>
					<th class="col-sm-4" align="center">ID</th>
					<th class="col-sm-4" align="center">操作人员</th>
					<th class="col-sm-4" align="center">查看时间</th>
				</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</script>

	<?php $this->load->view('common/footer');?>

<!-- inline scripts related to this page -->
<script type="text/javascript">

function seeDatial(id,message_id) {
	var data = {};
	data.list = '';
	var url = '<?php echo site_url('home/get_notice');?>';
	$.post(url,{'id':id,'meg_id':message_id},function(res){
		if(res.s == 1){
			data.list = res.data;
			var html = template('msg-form', data);
			$('#msg-content').html(html);
			$('#msg_Modal').modal();
			seePeople(message_id);
		}else{
			layer.alert(res.msg);
		}
	},'json')
	// 查看浏览的人数
}

function seePeople(message_id){
	// 表格显示
	var show_url = '<?php echo site_url('/message/show_view')?>';
    var table = showTable('show_view_people',show_url,function(d){
    	d.id = message_id;
    },function(data){})
}
</script>
<!-- popup-->
</body>
</html>
