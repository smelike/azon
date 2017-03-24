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
		<!-- 添加-->
		<div class="popup" id="popup">
			<div class="top_nav" id='top_nav' style="width: 100%;">
				<span>权限编辑</span>
				<a class="guanbi" id="guanbi1"></a>
			</div>
			<div class="min">
				<div class="tc_login">
					<form method="POST" name="form_login" target="_top" class="form-horizontal" role="form" action="<?php echo site_url('/rule/add_rule');?>">
						<!-- form-group-->
						<div class="row">
							<div class="col-xs-12">
								<div class="col-sm-8 form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-user-add-1">权限组</label>
									<div class="col-sm-9">
										<select class="chosen-select form-control" id="form-user-add-1" name="pid">
											<option value="0">无</option>
											<?php for ($i=0;$i<count($data);$i++): ?>
												<option value="<?php echo $data[$i]['id'];?>"><?php echo $data[$i]['name'];?></option>
											<?php endfor; ?>
										</select>
									</div>
								</div>
								<div class="col-sm-8 form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-user-add-2">标题</label>

									<div class="col-sm-9">
										<input type="text" name="name" id="form-user-add-2" class="col-xs-12" required/>
									</div>
								</div>
								<div class="col-sm-8 form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-user-add-3">方法</label>

									<div class="col-sm-9">
										<input type="text" name="url" id="form-user-add-3" class="col-xs-12" />
									</div>
								</div>
								<div class="col-sm-8 form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-user-add-4">功能</label>

									<div class="col-sm-9">
										<input type="text" name="description" id="form-user-add-4" class="col-xs-12" />
									</div>
								</div>
								<div class="col-sm-8 form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-user-add-5">状态</label>
									<div class="col-sm-9">
										<select class="chosen-select form-control" id="form-user-add-5" name="status">
											<option value="1">启用</option>
											<option value="2">禁用</option>
										</select>
									</div>
								</div>
								<div class="col-sm-8 form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-user-add-6">顺序</label>

									<div class="col-sm-9">
										<input type="text" name="listorder" value="0" id="form-user-add-6" class="col-xs-12" />
									</div>
								</div>
							</div>
						</div>

						<div align="center">
							<input type="submit" class="button btn btn-success" title="Sign In" value="添加">
						</div>
					</form>
					<!-- form-group-->
				</div>
			</div>
		</div>
		<!-- 编辑-->
		<div class="popup" id="popup-edit">
			<div class="top_nav" id='top_nav' style="width: 100%;">
				<span>权限编辑</span>
				<a class="guanbi" id="guanbi3"></a>
			</div>
			<div class="min">
				<div class="tc_login">
					<form method="POST" name="form_login" target="_top" class="form-horizontal" role="form" action="<?php echo site_url('/rule/edit_rule');?>">
						<!-- form-group-->
						<div class="row">
							<div class="col-xs-12">
								<div class="col-sm-8 form-group">
									<input name="id" type="hidden" value="" id="hide_input">
									<label class="col-sm-3 control-label no-padding-right" for="form-user-add-1">权限组</label>
									<div class="col-sm-9">
										<select class="chosen-select form-control" id="edit_pid" name="pid">
											<option value="0">无</option>
											<?php for ($i=0;$i<count($data);$i++): ?>
												<option value="<?php echo $data[$i]['id'];?>"><?php echo $data[$i]['name'];?></option>
											<?php endfor; ?>
										</select>
									</div>
								</div>
								<div class="col-sm-8 form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-user-add-2">标题</label>

									<div class="col-sm-9">
										<input type="text" name="name" id="edit_name" class="col-xs-12" required/>
									</div>
								</div>
								<div class="col-sm-8 form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-user-add-3">方法</label>

									<div class="col-sm-9">
										<input type="text" name="url" id="edit_url" class="col-xs-12" />
									</div>
								</div>
								<div class="col-sm-8 form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-user-add-4">功能</label>

									<div class="col-sm-9">
										<input type="text" name="description" id="edit_description" class="col-xs-12" />
									</div>
								</div>
								<div class="col-sm-8 form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-user-add-5">状态</label>
									<div class="col-sm-9">
										<select class="chosen-select form-control" id="edit_status" name="status">
											<option value="1">启用</option>
											<option value="2">禁用</option>
										</select>
									</div>
								</div>
								<div class="col-sm-8 form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-user-add-6">顺序</label>

									<div class="col-sm-9">
										<input type="text" name="listorder" value="0" id="edit_listorder" class="col-xs-12" />
									</div>
								</div>
							</div>
						</div>

						<div align="center">
							<input type="submit" class="button btn btn-success" title="Sign In" value="添加">
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
					<li class="active">权限菜单</li>
				</ul><!-- /.breadcrumb -->
			</div>

			<div class="page-content">
				<div class="row">
					<div class="col-xs-12">
						<div class="alert alert-info" role="alert">
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-sm tc-add"  style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;">
									<span class="glyphicon glyphicon-plus"></span>&nbsp新增
								</button>
								<button type="button" class="btn btn-danger btn-sm" onclick="delRule()" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;">
									<span class="glyphicon glyphicon-remove"></span>&nbsp删除
								</button>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 diy-table-box">
						<!-- PAGE CONTENT BEGINS -->
						<table class="diy-table table table-bordered table-hover">
							<caption class="diy-table-caption">
								<span>权限列表</span>
							</caption>
							<thead>
							<tr style="background: #fff">
								<th width="50">
									<input type="checkbox" class="table-selectAll"/>
								</th>
								<th width="50">操作</th>
								<th width="70">ID</th>
								<th width="250">标题</th>
								<th>方法</th>
								<th>功能</th>
								<th>状态</th>
							</tr>
							</thead>
							<tbody id="content_n">
							<?php for ($i=0;$i<count($data);$i++): ?>
							<tr class="power">
								<td >
									<input class="hideBorder" cid="<?php echo $data[$i]['id'];?>" type="checkbox"/>
								</td>
								<td >
									<button class="btn-link tc-edit" type="button" value="<?php echo $data[$i]['id'];?>">
										修改
									</button>
								</td>
								<td ><span><?php echo $data[$i]['id'];?></span></td>
								<td ><span><?php echo $data[$i]['name'];?></span></td>
								<td ><span><?php echo $data[$i]['url'];?></span></td>
								<td ><span><?php echo $data[$i]['description'];?></span></td>
								<td ><span><?php echo $data[$i]['status'];?></span></td>
							</tr>
							<?php for ($j=0;$j<count($data[$i]['rule']);$j++): ?>
							<tr class="power-list">
								<td >
									<input class="hideBorder" cid="<?php echo $data[$i]['rule'][$j]['id'];?>" type="checkbox"/>
								</td>
								<td >
									<button class="btn-link tc-edit" type="button" value="<?php echo $data[$i]['rule'][$j]['id'];?>">
										修改
									</button>
								</td>
								<td ><span><?php echo $data[$i]['rule'][$j]['id'];?></span></td>
								<td ><span style="margin-left: 40px"><?php echo $data[$i]['rule'][$j]['name'];?></span></td>
								<td ><span><?php echo $data[$i]['rule'][$j]['url'];?></span></td>
								<td ><span><?php echo $data[$i]['rule'][$j]['description'];?></span></td>
								<td ><span><?php echo $data[$i]['rule'][$j]['status'];?></span></td>
							</tr>
							<?php endfor; ?>
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
	$(function() {
		$(".tc-edit").click(function () {
			var id = $(this).attr('value');
			$('#hide_input').val(id);
			$("#gray").fadeIn(500);
			$("#popup-edit").fadeIn(500);

			$.getJSON('<?php echo site_url('/rule/edit_rule');?>',{id:id},function(res){
				var pid = res.pid;
				var name = res.name;
				var url = res.url;
				var description = res.description;
				var status = res.status;
				var listorder = res.listorder;
				$("#edit_pid").val(pid);
				$("#edit_name").val(name);
				$("#edit_url").val(url);
				$("#edit_description").val(description);
				$("#edit_status").val(status);
				$("#edit_listorder").val(listorder);
			});

			tc_center();
		});
		$("#guanbi3").click(function () {
			$("#gray").fadeOut(500);
			$("#popup-edit").fadeOut(500);
		});
		//
		$(".popup").css("width","600px");
	});

	function delRule(){
		var url = '<?php echo site_url('/rule/del_rule')?>'
		var arr = [];
		var el = $('#content_n');
		el.children('tr').each(function(i,el){
			var c = $(el).children('td').eq(0).find('.hideBorder');
			if(c.prop('checked')){
				arr.push(c.attr('cid'));
			}
		})
		if(arr.length > 0){
			layer.confirm('你确定要删除', {
			    btn: ['删除','取消'] //按钮
			}, function(){
				$.post(url,{'ids':arr},function(res){
					if(res.s == 1){
						layer.alert(res.msg,function(){
							layer.closeAll();
							window.location.reload();
						});
					}else{
						layer.alert(res.msg);
					}
				},'json')
			}, function(){
			 	layer.closeAll();
			});
			
		}else{
			layer.alert('至少选中一项');
		}
	}
</script>
<!-- popup-->
</body>
</html>
