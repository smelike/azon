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
		<div class="modal fade" id="add-Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="width: 1024px;margin: 0 auto;">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
						<h4 class="modal-title" id="myModalLabel">角色权限编辑</h4>
					</div>
					<div class="modal-body">
						<div class="tc_login">
							<form method="POST" name="form_login" target="_top" class="form-horizontal" role="form" action="<?php echo site_url('/usergroup/add_group');?>">
							<!-- form-group-->
							<div class="row">
								<div class="col-xs-12 form-group" >
									<label class="col-sm-2 control-label no-padding-right" for="form-role-sdd-1">角色名称</label>
									<div class="col-sm-10">
										<input type="text" name="name" id="form-role-sdd-1" class="col-xs-12" placeholder="可定义部门或某个职位" required/>
									</div>
								</div>
								<div class="col-xs-12 form-group">
									<label class="col-sm-2 control-label no-padding-right" for="form-role-sdd-3">角色描述</label>
									<div class="col-sm-10">
										<textarea id="form-role-sdd-3" name="description" class="autosize-transition form-control"></textarea>
									</div>
								</div>
								<div class="col-xs-12 form-group">
									<label class="col-sm-2 control-label no-padding-right">功能权限</label>
									<div class="col-sm-10">
										<div class="row">
											<div class="col-xs-12">
												<div class="panel-group  father-box" id="accordion">
													<?php for ($i=0;$i<count($rule);$i++): ?>
														<div class="panel panel-default">
															<div class="panel-heading">
																<h4 class="panel-title">
																	<label class="checkbox-inline">
																		<input type="checkbox" class="selectAll" value="all">
																		<a data-toggle="collapse" data-parent="#accordion"
																		   href="#collapse<?php echo $i+1;?>"><?php echo $rule[$i]['name'];?></a>
																	</label>
																</h4>
															</div>
															<div id="collapse<?php echo $i+1;?>" class="panel-collapse collapse <?php if($i == 0):?>in<?php endif;?>">
																<div class="panel-body">
																	<div class="col-sm-12 child-box">
																		<?php for ($j=0;$j<count($rule[$i]['rule']);$j++): ?>
																			<div class="col-sm-4">
																				<label class="checkbox-inline">
																					<input name="rule[]" type="checkbox" value="<?php echo $rule[$i]['rule'][$j]['id'];?>"> <?php echo $rule[$i]['rule'][$j]['name'];?>
																				</label>
																			</div>
																		<?php endfor; ?>
																	</div>
																</div>
															</div>
														</div>
													<?php endfor; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div align="center">
								<input type="submit" class="button btn btn-success" title="Sign In" value="提交">
							</div>
						</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- 修改-->
        <div class="modal fade" id="popup-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 1024px;margin: 0 auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">角色权限编辑</h4>
                    </div>
                    <div class="modal-body">
                        <div class="tc_login">
                            <form method="POST" name="form_login" target="_top" class="form-horizontal" role="form" action="<?php echo site_url('/usergroup/edit_group');?>">
                                <!-- form-group-->
                                <div class="row">
                                    <div class="col-xs-12 form-group" >
                                        <input name="id" type="hidden" value="" id="hide_input">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-role-sdd-1">角色名称</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" id="edit_name" class="col-xs-12" placeholder="可定义部门或某个职位" required/>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-role-sdd-3">角色描述</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" id="edit_description" class="autosize-transition form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 form-group">
                                        <label class="col-sm-2 control-label no-padding-right">功能权限</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="panel-group  father-box" id="accordion_e">

                                                    </div>
                                                </div>
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
            </div>
        </div>
		<!-- 复制-->
        <div class="modal fade" id="popup-copy" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" style="width: 1024px;margin: 0 auto;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">角色权限编辑</h4>
                    </div>
                    <div class="modal-body">
                        <div class="tc_login">
                            <form method="POST" name="form_login" target="_top" class="form-horizontal" role="form" action="<?php echo site_url('/usergroup/add_group');?>">
                                <!-- form-group-->
                                <div class="row">
                                    <div class="col-xs-12 form-group" >
                                        <label class="col-sm-2 control-label no-padding-right" for="form-role-sdd-1">角色名称</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="name" id="copy_name" class="col-xs-12" placeholder="可定义部门或某个职位" required/>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 form-group">
                                        <label class="col-sm-2 control-label no-padding-right" for="form-role-sdd-3">角色描述</label>
                                        <div class="col-sm-10">
                                            <textarea name="description" id="copy_description" class="autosize-transition form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 form-group">
                                        <label class="col-sm-2 control-label no-padding-right">功能权限</label>
                                        <div class="col-sm-10">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="panel-group  father-box" id="accordion_c">

                                                    </div>
                                                </div>
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
					<li class="active">角色管理</li>
				</ul><!-- /.breadcrumb -->
			</div>
			<div class="page-content">
				<div class="row">
					<div class="col-xs-12">
						<div class="alert alert-info" role="alert">
							<div class="btn-group">
								<button type="button" class="btn btn-success btn-sm tc-add" data-toggle="modal" data-target="#add-Modal" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;">
									<span class="glyphicon glyphicon-plus"></span>&nbsp;新增
								</button>
								<button type="button" class="btn btn-info btn-sm tc-copy" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;">
									<span class="glyphicon glyphicon-saved"></span>&nbsp;复制
								</button>
								<button type="button" class="btn btn-danger btn-sm" onclick="delRule()" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;">
									<span class="glyphicon glyphicon-remove"></span>&nbsp;删除
								</button>
							</div>
						</div>
					</div>
				</div>
				<!-- form-group-->
				<div class="row">
					<div class="col-xs-12">
						<form class="form-horizontal" role="form" method="get">
							<div class="row">
								<div class="col-xs-12">
									<div class="col-sm-4 form-group" >
										<label class="col-sm-3 control-label no-padding-right" for="form-role-1">角色名称</label>

										<div class="col-sm-9">
											<input type="text" name="name" id="form-role-1" class="col-xs-12" />
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

						<table class="diy-table table table-bordered table-hover">
							<caption class="diy-table-caption">
								<span>角色列表</span>
							</caption>
							<thead>
							<tr>
								<th width="50">
									<input type="checkbox" class="table-selectAll"/>
								</th>
								<th width="50">操作</th>
								<th>角色名称</th>
								<th>角色描述</th>
								<th>激活状态</th>
								<?php if(in_array('/usergroup/index/4', $priv)){ ?>
								<th>添加人</th>
								<?php } ?>
								<th>添加时间</th>
							</tr>
							</thead>
							<tbody id="content_n">
							<?php for ($i=0;$i<count($data);$i++): ?>
							<tr>
								<td>
									<input class="hideBorder" cid="<?php echo $data[$i]['id'];?>" type="checkbox"/>
								</td>
								<td>
									<button class="btn-link tc-edit" value="<?php echo $data[$i]['id'];?>">
										修改
									</button>
								</td>
								<td>
									<input class="hideBorder m-input" type="text" value="<?php echo $data[$i]['name'];?>"/>
								</td>
								<td>
									<input class="hideBorder m-input" type="text" value="<?php echo $data[$i]['description'];?>"/>
								</td>
								<td>
									<input class="hideBorder x-input" type="text" value="<?php echo $data[$i]['status'];?>"/>
								</td>
								<?php if(in_array('/usergroup/index/4', $priv)){ ?>
								<td>
									<input class="hideBorder m-input" type="text" value="<?php echo $data[$i]['create_man'];?>"/>
								</td>
								<?php } ?>
								<td>
									<input class="hideBorder m-input" type="text" value="<?php echo $data[$i]['create_time'];?>"/>
								</td>
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

	<?php $this->load->view('common/footer');?>

	<script id="list_p" type="text/html">
		{{if isAdmin}}
		{{each list as value i}}
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<label class="checkbox-inline">
						<input type="checkbox"  {{if value.checked == 1}} checked="checked" {{/if}}  class="selectAll" value="all">
						<a data-toggle="collapse" data-parent="#accordion" onclick="opens(this)">{{value.name}}</a>
					</label>
				</h4>
			</div>
            {{if i == 0}}
			<div class="panel-collapse collapse in">
            {{else}}
            <div class="panel-collapse collapse">
            {{/if}}
				<div class="panel-body">
					<div class="col-sm-12 child-box">
						{{each value.rule as v}}
							<div class="col-sm-4">
								<label class="checkbox-inline">
									<input name="rule[]" type="checkbox" class="checkclick" value="{{v.id}}" {{if v.status == 1}} checked="checked" {{/if}}> {{ v.name }}
								</label>
							</div>
						{{/each}}
					</div>
				</div>
			</div>
		</div>
		{{/each}}
		{{/if}}
	</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
	function opens(that){
		$(that).closest('.panel').children('.panel-collapse').toggleClass('in');
		$(that).closest('.panel').siblings('.panel').children('.panel-collapse').removeClass('in');
	}

	$(function() {
		$(document).on('change','.selectAll',function(){
			var _this = this;
			$(_this).closest('.panel ').find('.child-box').children().each(function(i,el){
				$(el).find('input').prop('checked',$(_this).prop('checked'));
			})
		});
		$(document).on('change','.checkclick',function(){
			var _this = this;
			var pater = true;
			$(_this).closest('.panel ').find('.checkclick').each(function(i,el){
			var child = $(el).prop('checked');
			if(child == false){
				pater = false;
			}
			})

			$(_this).closest('.panel ').find('.selectAll').prop('checked',pater);

		});
		$(".tc-edit").click(function () {
			var id = $(this).attr('value');
			$('#hide_input').val(id);

			$.getJSON('<?php echo site_url('/usergroup/edit_group')?>',{id:id},function(res){
				var name = res.name;
				var description = res.description;
				var rule = res.rule;
				$("#edit_name").val(name);
				$("#edit_description").val(description);
				var data = {
					isAdmin: true,
					list: rule
				};
				var html = template('list_p', data);
				document.getElementById('accordion_e').innerHTML = html;
                $('#popup-edit').modal();
			});

		});
		$("#guanbi3").click(function () {
			$("#gray").fadeOut(500);
			$("#popup-edit").fadeOut(500);
		});

		$(".tc-copy").click(function () {
			var arr = [];
			var el = $('#content_n');
			el.children('tr').each(function(i,el){
				var c = $(el).children('td').eq(0).find('.hideBorder');
				if(c.prop('checked')){
					arr.push(c.attr('cid'));
				}
			});
			if(arr.length == 1){
				$("#gray").fadeIn(500);
				$("#popup-copy").fadeIn(500);

				$.getJSON('<?php echo site_url('/usergroup/edit_group')?>',{id:arr[0]},function(res){
					var name = res.name;
					var description = res.description;
					var rule = res.rule;
					$("#copy_name").val(name);
					$("#copy_description").val(description);
					var data = {
						isAdmin: true,
						list: rule
					};
					var html = template('list_p', data);
					document.getElementById('accordion_c').innerHTML = html;
                    $('#popup-copy').modal();
				});
			}else{
				$('#gray').hide();
				layer.alert('请选择一条复制');
			}
		});
		$("#guanbi4").click(function () {
			$("#gray").fadeOut(500);
			$("#popup-copy").fadeOut(500);
		});
	});

	function delRule(){
		var url = '<?php echo site_url('/usergroup/del_group')?>';
		var arr = [];
		var el = $('#content_n');
		el.children('tr').each(function(i,el){
			var c = $(el).children('td').eq(0).find('.hideBorder');
			if(c.prop('checked')){
				arr.push(c.attr('cid'));
			}
		});
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
