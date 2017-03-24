<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('common/header');?>
	<style>
		table.diy-table td:nth-child(2){
			text-align: left;
		}
	</style>
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
					<li class="active">发布通知</li>
				</ul><!-- /.breadcrumb -->
			</div>

			<div class="page-content">
				<div class="row">
					<div class="col-xs-12">
						<div class="alert alert-info" role="alert">
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-sm" onclick="openModal(this)" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;">
									<span class="glyphicon glyphicon-plus"></span>&nbsp发布通知
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- form-group-->
				<div class="row">
							<div class="col-xs-12">
								<form class="form-horizontal" role="form" method="GET">
									<div class="row">
										<div class="col-xs-12">
											<div class="col-sm-4 form-group">
												<label class="col-sm-3 control-label no-padding-right" for="type_s">通知类型</label>
												<div class="col-sm-9">
													<select class="form-control" name="type">
														<option value="">全部类型</option>
														<?php if(count($type)>0):?>
															<?php foreach ($type as $item):?>
																<option value="<?php echo $item['id'];?>" <?php echo isset($gets['type']) && $gets['type'] == $item['id'] ? ' selected' : ''?>><?php echo $item['name'];?></option>
														    <?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="col-sm-4 form-group">

												<div class="space-2"></div>

												<label class="col-sm-3 control-label no-padding-right" for="form-notice-2">发件人</label>
												<div class="col-sm-9">
													<select multiple="" class="chosen-multiple form-control" name="accepter[]" data-placeholder="选择发件人">
														<?php if(count($sender)>0):?>
															<?php foreach ($sender as $v):?>
																<option value="<?php echo $v['id'];?>" <?php echo isset($gets['accepter']) && in_array($v['id'],$gets['accepter']) ? 'selected':'';?>><?php echo $v['username'];?></option>
															<?php endforeach;?>
														<?php endif;?>
													</select>
												</div>
											</div>
											<div class="col-sm-4 form-group">
												<label class="col-sm-3 control-label no-padding-right" for="keyword_s">关键词</label>
												<div class="col-sm-9">
													<input type="text" name="keyword" class="col-xs-12" value="<?php echo isset($gets['keyword']) ? $gets['keyword'] : '';?>">
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
					<div class="col-xs-12">
						<!-- PAGE CONTENT BEGINS -->

						<table id="notice_info" class="diy-table table table-bordered table-hover">
							<caption class="diy-table-caption"><span>通知列表</span></caption>
						       <thead>
						       <tr>
						       		<th width="60" align="left">查看</th>
						            <th width="220" align="left">通知类型</th>
						            <th align="left">标题</th>
						            <th>发送人</th>
						            <th>发送时间</th>
						       </tr>
						       </thead>
						       <tbody>
							   <?php if(isset($notices) && count($notices) > 0):?>
								   <?php foreach ($notices as $item):?>
									   <tr>
									   		<td><button class="btn-link" onclick="seeDetail(<?php echo $item['id'];?>)">查看</button></td>
										    <td><?php echo $item['name'];?></td>
										    <td><?php echo $item['title'];?></td>
										    <td><?php echo $item['username'];?></td>
										    <td><?php echo $item['create_time'];?></td>
									   </tr>
								   <?php endforeach;?>
							   <?php endif;?>
							   </tbody>
						</table>
                        <?php echo $pagetext;?>
						<!-- PAGE CONTENT ENDS -->
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.page-content -->
		</div>
	</div><!-- /.main-content -->
<!-- 弹出层-->
	<div class="modal fade" id="notice_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" style="margin: 2% auto 0;width: 1024px">
		    <div class="modal-content">
		    	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        	<h4 class="modal-title" id="myModalLabel">发布通知</h4>
		    	</div>
		      	<div class="modal-body" id="modal_content">
		        	<div class="tc_login">
							<form method="post" id="notice-form" action="<?php echo site_url('/notice/add')?>" class="form-horizontal" role="form">
								<!-- form-group-->
								<div class="row">
									<div class="col-xs-9">
										<div class="col-sm-12 form-group">
											<label class="col-sm-2 control-label no-padding-right" for="notice_type_s">通知类型</label>
											<div class="col-sm-10">
												<select class="form-control" id="notice_type_s" name="notice_type_s">
													<?php if(count($type)>0):?>
														<?php foreach ($type as $item):?>
															<option value="<?php echo $item['id'];?>"><?php echo $item['name'];?></option>
													    <?php endforeach;?>
													<?php endif;?>
												</select>
											</div>
										</div>
										<div class="col-sm-12 form-group" >
											<label class="col-sm-2 control-label no-padding-right" for="form-notice-add-2">收信人</label>
											<div class="col-sm-10">
												<input type="text" id="form-notice-add-2" class="col-xs-12" readonly placeholder="请从联系人列表添加收信人"/>
												<input type="hidden" id="form-notice-add-hide" name="accepters_s" class="col-xs-12"/>
											</div>
										</div>
										<div class="col-sm-12 form-group" >
											<label class="col-sm-2 control-label no-padding-right" for="title_s">标题</label>
											<div class="col-sm-10">
												<input type="text" name="title_s" id="title_s" class="col-xs-12" required />
											</div>
										</div>
										<div class="col-sm-12 form-group">
											<label class="col-sm-2 control-label no-padding-right" for="editor_id">内容</label>
											<div class="col-sm-10">
												<textarea id="editor_id" name="content" class="autosize-transition form-control" style="width: 100%;height: 400px" required>
												</textarea>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<div class="directories">
											<div class="alert alert-info" style="height: 30px;margin-bottom: 0;padding-top: 2px"><b>联系人</b></div>
											<h4 class="all-title">
												<label class="checkbox-inline">
													<input type="checkbox" value="option1" class="all-list" style="margin-top: 0; ">选择所有用户
												</label>
											</h4>
											<div class="panel-group  father-box" id="accordion">
											<?php if(count($accepter)>0):?>
												<?php if(intval($Administrator['id']) != $this->uid):?>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
																<label class="checkbox-inline">
																	<input type="checkbox" class="selectAll" value="all" style="margin-top: 0; ">
																	<a data-toggle="collapse" data-parent="#accordion"
																	   href="#collapse<?php echo $Administrator['id'];?>">初始管理员</a>
																</label>
															</h4>
														</div>
														<div id="collapse<?php echo $Administrator['id'];?>" class="panel-collapse collapse in">
															<div class="panel-body no-padding">
																<div class="col-sm-12 child-box">
																	<ul>
																		<li>
																			<label class="checkbox-inline">
																				<input type="checkbox" value="<?php echo $Administrator['id'];?>"><?php echo $Administrator['username'];?>
																			</label>
																		</li>
																	</ul>
																</div>
															</div>
														</div>
													</div>
												<?php endif;?>
												<?php foreach ($accepter as $v):?>	
												<div class="panel panel-default">
													<div class="panel-heading">
														<h4 class="panel-title">
															<label class="checkbox-inline">
																<input type="checkbox" class="selectAll" value="all" style="margin-top: 0; ">
																<a data-toggle="collapse" data-parent="#accordion"
																   href="#collapse<?php echo $v['id'];?>"><?php echo $v['name'];?></a>
															</label>
														</h4>
													</div>
													<div id="collapse<?php echo $v['id'];?>" class="panel-collapse collapse in">
														<div class="panel-body no-padding">
															<div class="col-sm-12 child-box">
																<ul>
																<?php if(count($v['child'])>0):?>
																	<?php foreach ($v['child'] as $b):?>
																		<?php if(intval($b['id']) != $this->uid):?>
																			<li>
																				<label class="checkbox-inline">
																					<input type="checkbox" value="<?php echo $b['id'];?>"><?php echo $b['username'];?>
																				</label>
																			</li>
																		<?php endif;?>
																	<?php endforeach;?>
																<?php endif;?>
																</ul>
															</div>
														</div>
													</div>
												</div>
												<?php endforeach;?>
											<?php endif;?>
											</div>
										</div>
										<h4 class="all-footer center">
											<span class="btn-group">
												<button type="button" id="contactsBtn">添加收信人</button>
												<button type="button" id="contactsDel">清空</button>
											</span>
										</h4>
									</div>
								</div>

								<div align="center">
									<input type="button" class="button btn btn-success" onclick="sendNotice()" value="发送">
								</div>
							</form>
							<!-- form-group-->
						</div>
		      	</div>
		    </div>
	  	</div>
	</div>
	<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  	<div class="modal-dialog" style="width:1024px;margin:0 auto;">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        	<h4 class="modal-title" id="myModalLabel">消息详情</h4>
	      	</div>
	      	<div class="modal-body" id="detail">
	        
	      	</div>
	      	<div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	     	</div>
	    </div>
	  	</div>
	</div>
	<!-- 弹出层-->
	<?php $this->load->view('common/footer');?>
<script id="detail_temp" type="text/html">
	<h4>{{list.name}}</h4>
	<p>发送内容：{{#list.content}}</p>
	<p>发送人：{{list.sender}}</p>
	<p>发送时间：{{list.create_time}}</p>
</script>
<script charset="utf-8" src="/assets/lib/kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="/assets/lib/kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
	//
	$('.chosen-multiple').chosen();
	//
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			resizeType : 1,
			allowPreviewEmoticons : false,
			allowImageUpload : false,
			items : [
				'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
				'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
				'insertunorderedlist', '|', 'emoticons', 'image', 'link']
		});
	});
	function seeDetail(id){
		var url = '<?php echo site_url('/notice/get_notice')?>';
		$.post(url,{'id':id},function(res){
			if(res.s == 1){
				$('#detail').html(template('detail_temp',res.data));
				$('#showModal').modal();
			}else{
				layer.alert(res.msg);
			}
		},'json')
	}
	function sendNotice(){
		var url = '<?php echo site_url('/notice/add')?>';
		var html = editor.html();
		var type = $('#notice_type_s').val();
		var accps = $('#form-notice-add-hide').val();
		var title = $('#title_s').val();
		if(accps == ''){
			layer.alert('发送人不能为空');
			return;
		}
		if(title == ''){
			layer.alert('标题不能为空');
			return;
		}
		if(html == ''){
			layer.alert('内容不能为空');
			return;
		}
		$.post(url,{'notice_type_s':type,'accepters_s':accps,'title_s':title,'content':html},function(res){
			if(res.s == 1){
				layer.msg(res.msg,{icon:1,time:500},function () {
					window.location.reload();
				});
			}else{
				layer.alert(res.msg);
			}
		},'json')
	}

	function openModal(that){
		$('#notice_Modal').modal();
	}

</script>

<!-- popup-->
</body>
</html>
