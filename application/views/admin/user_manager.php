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
								<a href="/">主页</a>
							</li>
							<li class="active">用户管理</li>
						</ul>
					</div>
					<!-- 添加-->
					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<div class="alert alert-info" role="alert">
									<div class="btn-group">
										<button type="button" cid="" class="btn btn-success btn-sm tc-add" onclick="addUser(this,'add')" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;">
											<span class="glyphicon glyphicon-plus"></span>&nbsp;新增
										</button>
									</div>
								</div>
							</div>
						</div>
						<!-- 筛选 -->
                        <div class="row">
                            <form action="" method="GET">
                                <!-- 筛选 -->
                                <div class="col-xs-12">
                                    <div class="col-sm-4 form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-user-1">关键词</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="keyword" class="col-xs-12" value="<?php echo isset($gets['keyword']) ? $gets['keyword'] : '';?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-user-2">角色</label>
                                        <div class="col-sm-9">
                                            <select class="chosen-select form-control" name="group">
                                                <option value="">全部角色</option>
                                                <?php if(count($group) > 0):?>
                                                    <?php foreach ($group as $item):?>
                                                        <option value="<?php echo $item['id']?>"  <?php echo isset($gets['group']) && $gets['group'] == $item['id'] ? ' selected' : ''?>><?php echo $item['name']?></option>
                                                    <?php endforeach;?>
                                                <?php endif;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-user-3">ID</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="id" class="col-xs-12" value="<?php echo isset($gets['id']) ? $gets['id'] : '';?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label class="col-sm-3 control-label no-padding-right" for="form-user-5">是否激活</label>
                                        <div class="col-sm-9">
                                            <select class="chosen-select form-control" name="status">
                                                <option value="">全部</option>
                                                <option value="1" <?php echo isset($gets['status']) && $gets['status'] == 1 ? ' selected' : ''?>>已激活</option>
                                                <option value="2" <?php echo isset($gets['status']) && $gets['status'] == 2 ? ' selected' : ''?>>未激活</option>
                                            </select>
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
						<div class="row">
							<div class="col-xs-12">
								<table id="user_info" class="diy-table table table-bordered table-hover">
									<caption class="diy-table-caption"><span>用户列表</span></caption>
							        <thead>
								        <tr>
								            <th width="60">操作</th>
								            <th>ID</th>
                                            <th>用户名</th>
								            <th>姓名</th>
								            <th>邮箱</th>
								            <th>手机号</th>
								            <th>角色</th>
								            <th>QQ号</th>
								            <th>添加时间</th>
								            <th>添加人</th>
								            <th>最后登陆</th>
								            <th>是否激活</th>
								        </tr>
							        </thead>
							        <tbody>
									<?php if(isset($users) && count($users) > 0):?>
										<?php foreach ($users as $item):?>
											<tr>
												<td><button cid="<?php echo $item['id'];?>" cname="<?php echo $item['username'];?>" class="btn-link" type="button" onclick="addUser(this,'edit')">修改</button></td>
												<td><?php echo $item['id'];?></td>
												<td><?php echo $item['username'];?></td>
												<td><?php echo $item['real_name'];?></td>
												<td><?php echo $item['email'];?></td>
												<td><?php echo $item['mobile'];?></td>
												<td><span class="groupId" cid="<?php echo $item['user_group_id'];?>"><?php echo $item['group_name'];?></span></td>
												<td><?php echo $item['qq'];?></td>
												<td><?php echo $item['create_time'];?></td>
												<td><?php echo $item['create_man'];?></td>
												<td><?php echo $item['last_time'];?></td>
												<td cid="<?php echo $item['status'];?>"><?php echo $item['_status'];?></td>
											</tr>
										<?php endforeach;?>
                                    <?php else:?>
                                        <tr>
                                            <td colspan="11" align="center">没有数据</td>
                                        </tr>
									<?php endif;?>
									</tbody>
							    </table>
                                <?php echo $pagetext;?>
							</div>
						</div>
						
					</div>
				</div>

			</div>
			<!-- 模态框（Modal） -->
			<div class="modal fade" id="edit_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="margin: 8% auto 0;width: 800px">
					<div class="modal-content" id="modal-content">
					</div>
				</div>
			</div>
<!--  -->
<script id="user_modal_content" type="text/html">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		{{if type == 'add'}}
		<h4 class="modal-title" id="myModalLabel">添加用户</h4>
		{{else}}
		<h4 class="modal-title" id="myModalLabel">修改用户</h4>
		{{/if}}
	</div>
	<div class="modal-body">
		<div class="row">
			<div class="col-xs-12">
			<form id="add_user">
				{{if type == 'add'}}
				<div class="col-sm-8 form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-user-add-1">昵称</label>

					<div class="col-sm-9">
						<input type="text" id="form-user-add-1" class="col-xs-12" name="username">
					</div>
				</div>
				{{else}}
				<div class="col-sm-8 form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-user-add-1">昵称</label>

					<div class="col-sm-9">
						<input type="text" id="form-user-add-1" class="col-xs-12" value="{{list['username']}}" disabled >
					</div>
				</div>
				{{/if}}
				
				{{if type == 'add'}}
				<div class="col-sm-8 form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-user-add-1">姓名</label>

					<div class="col-sm-9">
						<input type="text" id="form-user-add-1" class="col-xs-12" name="real_name">
					</div>
				</div>
				{{else}}
				<div class="col-sm-8 form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-user-add-1">姓名</label>

					<div class="col-sm-9">
						<input type="text" id="form-user-add-1" class="col-xs-12" name="real_name" value="{{list['name']}}" >
					</div>
				</div>
				{{/if}}
	
				<div class="col-sm-8 form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-user-add-6">登陆密码</label>

					<div class="col-sm-9">
						<input type="text" id="form-user-add-6" class="col-xs-12" name="password" value="">
					</div>
				</div>
				{{if type == 'add'}}
				<div class="col-sm-4 form-group">
		
				</div>
				{{else}}
				<div class="col-sm-4 form-group">
					<label class="control-label" style="color: #999;">（为空是默认不修改）</label>
				</div>
				{{/if}}
				
				
				
				<div class="col-sm-8 form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-user-add-2">邮箱</label>

					<div class="col-sm-9">
						<input type="text" id="form-user-add-2" class="col-xs-12" name="email" value="{{list['email']}}">
					</div>
				</div>
				<div class="col-sm-4 form-group">
					<label class="control-label" style="color: #999;">（用于登陆或接收邮件）</label>
				</div>
				<div class="col-sm-8 form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-user-add-3">手机</label>

					<div class="col-sm-9">
						<input type="text" id="form-user-add-3" class="col-xs-12" name="mobile" value="{{list['mobile']}}">
					</div>
				</div>
				<div class="col-sm-4 form-group">
					<label class="control-label" style="color: #999;">（用于登陆或接收短信）</label>
				</div>
				<div class="col-sm-8 form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-user-add-4">QQ号</label>

					<div class="col-sm-9">
						<input type="text" id="form-user-add-4" class="col-xs-12" name="qq" value="{{list['qq']}}">
					</div>
				</div>
				<div class="col-sm-8 form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-user-add-5">角色</label>
					<div class="col-sm-9">
						<select class="chosen-select form-control" id="form-user-add-5" name="group">
						<?php if(count($group) > 0):?>
							<?php foreach ($group as $item):?>
                                {{if list.group_id == '<?php echo $item['id']?>'}}
								<option value="<?php echo $item['id']?>" selected><?php echo $item['name']?></option>
                                {{else}}
                                <option value="<?php echo $item['id']?>"><?php echo $item['name']?></option>
                                {{/if}}
							<?php endforeach;?>
						<?php endif;?>
						</select>
					</div>
				</div>
				<div class="col-sm-8 form-group">
					<label class="col-sm-3 control-label no-padding-right" for="form-user-add-7">是否激活</label>
					<div class="col-sm-9">
						<select class="chosen-select form-control" id="form-user-add-7" name="status">
                            {{if list.status == '1'}}
							<option value="1">是</option>
							<option value="2">否</option>
                            {{else if list.status == '2'}}
                            <option value="2">否</option>
                            <option value="1">是</option>
                            {{else}}
                            <option value="1">是</option>
                            <option value="2">否</option>
                            {{/if}}
						</select>
					</div>
				</div>
				</form>
				<div class="col-sm-8 form-group">
					<div align="center">
						{{if type == 'add'}}
						<input type="button" class="button btn btn-success" onclick="addToUser()" value="添加">
						{{else}}
						<input type="button" class="button btn btn-success" onclick="saveUser({{id}})" value="保存修改">
						{{/if}}
					</div>
				</div>
			</div>
		</div>
	</div>
</script>

		<?php $this->load->view('common/footer');?>
		<script>

			//弹出层
			function addUser(that,type){
				var data = {};
				var arr = [];
				var ele = $(that).closest('tr');
				data.type = type;
				arr['name'] = ele.find('td').eq(3).html();
				arr['email'] = ele.find('td').eq(4).html();
				arr['mobile'] = ele.find('td').eq(5).html();
                arr['group_id'] = ele.find('td').eq(6).children('span').attr('cid');
				arr['qq'] = ele.find('td').eq(7).html();
                arr['status'] = ele.find('td').eq(11).attr('cid');
				arr['username'] = $(that).attr('cname');

				data.list = arr;
				data.id = $(that).attr('cid');
				var html = template('user_modal_content',data);
				$('#modal-content').html(html);
				$('#edit_Modal').modal();
			}

			// 添加用户
			function addToUser(type){
				var userData = $('#add_user').serializeArray();
				var url = '<?php echo site_url('/user/add')?>';
				var arr = getFormArray(userData);
				if(arr.username == ''){
					layer.alert('昵称不能为空');
					return ;
				}
				var reg = /^[u4E00-u9FA5]+$/;
				if(!reg.test(arr.username)){
					layer.alert('用户昵称不能包含中文');
                    return ;
				}
				if(arr.real_name == ''){
					layer.alert('姓名不能为空');
					return ;
				}
				if((arr.password).length < 6){
					layer.alert('密码长度不能小于6');
					return;
				}
				if (arr.email == '' || !checkEmail(arr.email)) {
					layer.alert('邮箱不正确');
					return;
				};
				if(arr.mobile == '' || !checkPhone(arr.mobile)){
					layer.alert('手机不正确');
					return;
				}
				$.post(url,arr,function(res){
					if(res.s == 1){
                        layer.msg(res.msg,{icon:1,time:500},function () {
                            window.location.reload();
                        });
					}else{
						layer.alert(res.msg);
					}
				},'json')
				
			}

			function saveUser(id){
				if(id == ''){
					layer.alert('暂时无法修改');
					return
				}
				var userData = $('#add_user').serializeArray();
				var url = '<?php echo site_url('/user/edit')?>';
				var arr = getFormArray(userData);

				if(arr.password != '' && (arr.password).length < 6){
					layer.alert('密码长度不能小于6');
					return;
				}
				if (arr.email == '' || !checkEmail(arr.email)) {
					layer.alert('邮箱不正确');
					return;
				};
				if(arr.mobile == '' || !checkPhone(arr.mobile)){
					layer.alert('手机不正确');
					return;
				}
				if(arr.real_name == ''){
					layer.alert('用户名不能为空');
					return					
				}
				$.post(url,{'id':id,'param':arr},function(res){
					if(res.s == 1){
                        layer.msg(res.msg,{icon:1,time:500},function () {
                            window.location.reload();
                        });
					}else{
						layer.alert(res.msg);
					}
				},'json')

			}

		</script>
	</body>
</html>
