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
								<a href="#">刷单刷评管理</a>
							</li>
							<li class="active">卖家管理</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">

						<div class="row">
							<div class="col-xs-12">
								<form class="form-horizontal" role="form" method="GET">
									<div class="row">
										<div class="col-xs-12">
											<div class="col-sm-2 form-group">
												<label class="col-sm-3 control-label no-padding-right" for="name_s">公司名称</label>
												<div class="col-sm-9">
													<input type="text" name="com" class="col-xs-12" value="<?php echo isset($gets['com'])? $gets['com'] : '';?>">
												</div>
											</div>
											<div class="col-sm-2 form-group">
												<label class="col-sm-3 control-label no-padding-right" for="zc_time">注册时间</label>
												<div class="col-sm-9">
													<input type="text" name="create_time" class="col-xs-12" placeholder="例:2017-12-01" value="<?php echo isset($gets['create_time'])? $gets['create_time'] : '';?>">
												</div>
											</div>
											<div class="col-sm-2 form-group">
												<label class="col-sm-3 control-label no-padding-right" for="lx_men">联系人</label>
												<div class="col-sm-9">
													<input type="text" name="lx_men" class="col-xs-12" value="<?php echo isset($gets['lx_men'])? $gets['lx_men'] : '';?>">
												</div>
											</div>
											<div class="col-sm-2 form-group">
												<label class="col-sm-3 control-label no-padding-right" for="mobile_s">手机号</label>
												<div class="col-sm-9">
													<input type="text" name="mobile" class="col-xs-12" value="<?php echo isset($gets['mobile'])? $gets['mobile'] : '';?>">
												</div>
											</div>
											<div class="col-sm-2 form-group">
												<label class="col-sm-3 control-label no-padding-right" for="email_s">邮箱</label>
												<div class="col-sm-9">
													<input type="text" name="email" class="col-xs-12" value="<?php echo isset($gets['email'])? $gets['email'] : '';?>">
												</div>
											</div>
											<div class="col-sm-2 form-group">
												<label class="col-sm-3 control-label no-padding-right" for="s_s">省</label>
												<div class="col-sm-9">
													<input type="text" name="s" class="col-xs-12" value="<?php echo isset($gets['s'])? $gets['s'] : '';?>">
												</div>
											</div>
											<div class="col-sm-2 form-group">
												<label class="col-sm-3 control-label no-padding-right" for="city_s">市</label>
												<div class="col-sm-9">
													<input type="text" name="c" class="col-xs-12" value="<?php echo isset($gets['c'])? $gets['c'] : '';?>">
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
					
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<table id="rate_info" class="diy-table table table-bordered table-hover">
									<caption class="diy-table-caption"><span>卖家列表</span></caption>
								       <thead>
								       <tr>
								           <th width="60">操作</th>
								           <th>联系人</th>
								           <th>手机号</th>
								           <th>邮箱</th>
								           <th>公司名称</th>
								           <th>注册时间</th>
								           <th>费率状态</th>
								           <th>所在城市</th>
								       </tr>
								       </thead>
								       <tbody>
                                       <?php if(isset($sallers) && count($sallers) > 0):?>
                                           <?php foreach ($sallers as $item):?>
                                               <tr>
                                                   <td><button onclick="openModal(<?php echo $item['id'];?>)" class="btn-link">修改</button></td>
                                                   <td><?php echo $item['link_man'];?></td>
                                                   <td><?php echo $item['mobile'];?></td>
                                                   <td><?php echo $item['email'];?></td>
                                                   <td><?php echo $item['name'];?></td>
                                                   <td><?php echo $item['create_time'];?></td>
                                                   <td><?php echo $item['price'];?></td>
                                                   <td><?php echo $item['province'];?>-<?php echo $item['city'];?>-<?php echo $item['area'];?></td>
                                               </tr>
                                           <?php endforeach;?>
                                       <?php endif;?>
									   </tbody>
								</table>
                                <?php echo $pagetext;?>
							</div>
						</div>

						<div id="content_e"></div>
					</div>
				</div>
			</div>

			<div class="modal fade" id="detail_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog" style="margin: 0 auto;width: 1000px">
					<div class="modal-content" >
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="myModalLabel">基本资料</h4>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-sm-12">
									<ul id="myTab" class="nav nav-tabs">
										<li class="active"><a href="#baseTabs-1" data-toggle="tab">商家资料</a></li>
										<li><a href="#baseTabs-2" data-toggle="tab">费率查看</a></li>
										<li><a href="#baseTabs-3" data-toggle="tab">汇率查看</a></li>
									</ul>
									<div id="myTabContent" class="tab-content">
										<div class="tab-pane fade in active" id="baseTabs-1"></div>
										<div class="tab-pane fade" id="baseTabs-2"></div>
										<div class="tab-pane fade" id="baseTabs-3"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-primary" onclick="saveAllData()">提交更改</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
						</div>
					</div><!-- /.modal-content -->
				</div><!-- /.modal -->
			</div>
<script id="add_rate" type="text/html">
	<form action="{{url}}">
	<div class="row">
		<div class="col-sm-12 page-header">
			<h4>汇率浮动明细</h4>
		</div>
		{{each list as v i}}
		<div class="col-sm-7 form-group" >
			<label class="col-sm-3 control-label no-padding-right" for="form-set-rate-8">{{v.name}}:</label>

			<div class="col-sm-3">
				<input type="text" id="form-set-rate-8" onkeyup="checkVal(this)" class="col-xs-12" align="right" name="{{v.id}}" value="{{v.real_rate}}" />
			</div>
		</div>
		 {{/each}}
		<div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>

		<div class="col-sm-7 form-group" >
			<label class="col-sm-3 control-label no-padding-right" for="form-set-rate-14">是否开通：</label>
			<div class="col-sm-3">
				{{if (status == '0')}}
				<input type="checkbox" value="1" id="form-set-rate-14" name="hl_status_s" style="margin-top: 12px;width: 30px">
				{{else}}
				<input type="checkbox" checked value="1" id="form-set-rate-14" name="hl_status_s" style="margin-top: 12px;width: 30px">
				{{/if}}
			</div>
		</div>
	</div>
	</form>
</script>	
<script id="add_user" type="text/html">
	<form action="{{url}}">
	<input type="hidden" value="{{id}}" name="id_s">
	<div class="row">
		<div class="col-xs-12">
			<div class="col-sm-6 form-group" >
				<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-1">公司名称</label>
				<div class="col-sm-9">
					<input type="text" id="form-set-seller-1" class="col-xs-12" name="company_e" value="{{list.name}}" />
				</div>
			</div>
			<div class="col-sm-6 form-group" >
				<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-2">联系人</label>
				<div class="col-sm-9">
					<input type="text" id="form-set-seller-2" class="col-xs-12" name="lx_men_e" value="{{list.link_man}}" />
				</div>
			</div>
			<div class="col-sm-6 form-group">
				<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-3">省份</label>
				<div class="col-sm-9">
                    <select name="shen_e" id="province" class="col-xs-12" onchange="selectCity(this)">
                        <option value="">请选择省份</option>
                    </select>
				</div>
			</div>
			<div class="col-sm-6 form-group" >
				<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-4">城市</label>
				<div class="col-sm-9">
                    <select name="city_e" id="city" class="col-xs-12" onchange="selectArea(this)">
                        <option value="">请选择城市</option>
                    </select>
				</div>
			</div>
			<div class="col-sm-6 form-group" >
				<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-4">区域</label>
				<div class="col-sm-9">
                    <select name="area_e" id="area" class="col-xs-12" >
                        <option value="">请选择区域</option>
                    </select>
				</div>
			</div>
			<div class="col-sm-6 form-group" >
				<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-6">地址</label>
				<div class="col-sm-9">
					<input type="text" id="form-set-seller-6" class="col-xs-12" name="address_e" value="{{list.address}}" />
				</div>
			</div>
			<div class="col-sm-6 form-group" >
				<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-5">固定电话</label>

				<div class="col-sm-9">
					<input type="text" id="form-set-seller-5" class="col-xs-12" name="gh_e" value="{{list.fixedphone}}" />
				</div>
			</div>
			<div class="col-sm-6 form-group" >
				<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-7">QQ号</label>
				<div class="col-sm-9">
					<input type="text" id="form-set-seller-7" class="col-xs-12" name="qq_e" value="{{list.qq}}" />
				</div>
			</div>
			<div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>
			<div class="col-sm-6 form-group" >
				<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-8">电子邮箱</label>

				<div class="col-sm-9">
					<input type="text" id="form-set-seller-8" class="col-xs-12" value="{{list.email}}" disabled/>
				</div>
			</div>
			<div class="col-sm-2 form-group" style="line-height: 34px">
				<span class="fa-stack fa-1x">
					  <i class="fa fa-circle fa-stack-2x green"></i>
					  <i class="fa fa-check fa-stack-1x fa-inverse"></i>
				</span>
				已认证
			</div>
			<div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>
			<div class="col-sm-6 form-group" >
				<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-9">手机</label>
				<div class="col-sm-9">
					<input type="text" id="form-set-seller-9" class="col-xs-12" value="{{list.mobile}}" disabled/>
				</div>
			</div>
			<div class="col-sm-2 form-group" style="line-height: 34px">
				<span class="fa-stack fa-1x">
					  <i class="fa fa-circle fa-stack-2x green"></i>
					  <i class="fa fa-check fa-stack-1x fa-inverse"></i>
				</span>
				已认证
			</div>
			<div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>
			<div class="col-sm-6 form-group" >
				<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-10">修改密码</label>
				<div class="col-sm-9">
					<input type="text" id="form-set-seller-10" class="col-xs-12" value="" name="password" />
				</div>
			</div>
			<div class="col-sm-2 form-group" style="line-height: 34px">
				此项为空代表不修改
			</div>
		</div>
	</div>
	</form>
</script>
<script id="add_price" type="text/html">
	<form action="{{url}}" id="price-check">
	<input type="hidden" value="{{id}}" name="id_s">
	<div class="row">
		<div class="col-sm-12 page-header">
			<h4>费率设置</h4>
		</div>
		<input type="hidden" value="{{list.id}}" name="com_id" id="price_id">
		<div class="col-sm-7 form-group" >
			<label class="col-sm-3 control-label no-padding-right" for="form-set-rate-1">人工刷评：</label>

			<div class="col-sm-3">
				<input type="text" id="form-set-rate-1" class="col-xs-12" align="right" name="sp_s" value="{{list.comment_price}}" />
			</div>
			<div class="col-sm-2" style="line-height: 34px;font-size: 20px">
				元/单
			</div>
		</div>
		<div class="col-sm-7 form-group" >
			<label class="col-sm-3 control-label no-padding-right" for="form-set-rate-2">人工刷单：</label>

			<div class="col-sm-3">
				<input type="text" id="form-set-rate-2" class="col-xs-12" align="right" name="sd_s" value="{{list.order_price}}" />
			</div>
			<div class="col-sm-2" style="line-height: 34px;font-size: 20px">
				元/单
			</div>
		</div>
		<div class="col-sm-7 form-group" >
			<label class="col-sm-3 control-label no-padding-right" for="form-set-rate-3">加入收藏：</label>

			<div class="col-sm-3">
				<input type="text" id="form-set-rate-3" class="col-xs-12" align="right" name="sc_s" value="{{list.collection}}"/>
			</div>
			<div class="col-sm-2" style="line-height: 34px;font-size: 20px">
				元/次
			</div>
		</div>
		<div class="col-sm-7 form-group" >
			<label class="col-sm-3 control-label no-padding-right" for="form-set-rate-4">关联访问：</label>

			<div class="col-sm-3">
				<input type="text" id="form-set-rate-4" class="col-xs-12" align="right" name="fw_s" value="{{list.relation_visit}}" />
			</div>
			<div class="col-sm-2" style="line-height: 34px;font-size: 20px">
				元/次
			</div>
		</div>
		<div class="col-sm-7 form-group" >
			<label class="col-sm-3 control-label no-padding-right" for="form-set-rate-5">评价点赞：</label>

			<div class="col-sm-3">
				<input type="text" id="form-set-rate-5" class="col-xs-12" align="right" name="dz_s" value="{{list.praise}}" />
			</div>
			<div class="col-sm-2" style="line-height: 34px;font-size: 20px">
				元/次
			</div>
		</div>
		<div class="col-sm-7 form-group" >
			<label class="col-sm-3 control-label no-padding-right" for="form-set-rate-6">运输方式：</label>

			<div class="col-sm-3">
				<input type="text" id="form-set-rate-6" class="col-xs-12" align="right" name="wl_s" value="{{list.logistics_code}}" />
			</div>
			<div class="col-sm-2" style="line-height: 34px;font-size: 20px">
				元/个
			</div>
		</div>
		<div class="col-sm-7 form-group" >
			<label class="col-sm-3 control-label no-padding-right" for="form-set-rate-7">Feedback：</label>

			<div class="col-sm-3">
				<input type="text" id="form-set-rate-7" class="col-xs-12" align="right" name="feedback" value="{{list.feedback}}" />
			</div>
			<div class="col-sm-2" style="line-height: 34px;font-size: 20px">
				元/单
			</div>
		</div>
		<div class="col-sm-7 form-group" >
			<label class="col-sm-3 control-label no-padding-right" for="form-set-rate-7">QA问答：</label>

			<div class="col-sm-3">
				<input type="text" id="form-set-rate-7" class="col-xs-12" align="right" name="qa_price" value="{{list.qa_price}}" />
			</div>
			<div class="col-sm-2" style="line-height: 34px;font-size: 20px">
				元/单
			</div>
		</div>
		<div class="col-sm-7 form-group" >
			<label class="col-sm-3 control-label no-padding-right" for="form-set-rate-7">Vote：</label>

			<div class="col-sm-3">
				<input type="text" id="form-set-rate-7" class="col-xs-12" align="right" name="vote_price" value="{{list.vote_price}}" />
			</div>
			<div class="col-sm-2" style="line-height: 34px;font-size: 20px">
				元/次
			</div>
		</div>
		<div class="col-sm-7 form-group" >
			<label class="col-sm-3 control-label no-padding-right" for="form-set-rate-7">游客评价：</label>

			<div class="col-sm-3">
				<input type="text" id="form-set-rate-7" class="col-xs-12" align="right" name="user_comment" value="{{list.user_comment}}" />
			</div>
			<div class="col-sm-2" style="line-height: 34px;font-size: 20px">
				元/单
			</div>
		</div>
		<div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>
	</div>
	</form>
</script>

		<?php $this->load->view('common/footer');?>
        <script src="/assets/js/city.data.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			$(document).ready(function() {
				$(document).on('keyup','#price-check input',function(){
					var v = $(this).val();
					if(checkFloat(v)){
						$(this).val(v);
					}else{
						$(this).val('');
					}
				})

			});
            function selectArea(_this) {
                var val = $('#province').find('option:selected').attr('cid');
                var valid = $(_this).find('option:selected').attr('cid');
                var area_str = '';
                var child = getCity(cityData,val);
                var area = getCity(child,valid);
                if(area == undefined){
                    $('#area').html('<option value="">该市区没有区域可选</option>');
                    return;
                }
                for (var i = 0; i < area.length; i++){
                    area_str += '<option value="'+area[i].text+'">'+area[i].text+'</option>';
                }
                $('#area').html(area_str);
            }
            function selectCity(_this) {
                var val = $(_this).find('option:selected').attr('cid');
                if(val == '' || val == null){
                    $('#city').html('<option cid="" value="">请选择城市</option>');
                    $('#area').html('<option value="">请选择区域</option>');
                    return;
                }
                var city_str = '';
                var area_str = '';
                var child = getCity(cityData,val);
                for (var i = 0; i < child.length; i++){
                    city_str += '<option cid="'+child[i].value+'" value="'+child[i].text+'">'+child[i].text+'</option>';
                }
                $('#city').html(city_str);
                var valid = $('#city').find('option:selected').attr('cid');
                var area = getCity(child,valid);
                if(area == undefined){
                    $('#area').html('<option value="">该市区没有区域可选</option>');
                    return;
                }
                for (var i = 0; i < area.length; i++){
                    area_str += '<option value="'+area[i].text+'">'+area[i].text+'</option>';
                }
                $('#area').html(area_str);
            }
            function getCity(data,id) {
                var str = '';
                for (var i = 0; i < data.length; i++){
                    if(data[i].value == id){
                        return data[i].children;
                    }
                }
            }
            function backCity(data,text) {
                for (var i = 0; i < data.length; i++){
                    if(data[i].text == text){
                        return data[i].children;
                    }
                }
            }
            //省份
            function getProvince(data,s,cy,q) {
                var _str = '<option cid="" value="">请选择省份</option>';
                var str = '';
                var c_str = '';
                var d_str = '';
                for (var i = 0; i < data.length; i++) {
                    if (data[i].text == s) {
                        str += '<option selected cid="' + data[i].value + '" value="' + data[i].text + '">' + data[i].text + '</option>';
                    } else {
                        str += '<option cid="' + data[i].value + '" value="' + data[i].text + '">' + data[i].text + '</option>';
                    }
                }
                $('#province').html(_str + str);
                var val_text = $('#province').find('option:selected').val();
                if(val_text != '' && val_text != null){
                    var c = backCity(data,val_text);
                    for (var i = 0; i < c.length; i++){
                        if(c[i].text == cy){
                            c_str += '<option selected cid="'+c[i].value+'" value="'+c[i].text+'">'+c[i].text+'</option>';
                        }else{
                            c_str += '<option cid="'+c[i].value+'" value="'+c[i].text+'">'+c[i].text+'</option>';
                        }
                    }
                    $('#city').html(c_str);
                    var area_text = $('#city').find('option:selected').val();
                    if(area_text != '' && area_text != null){
                        var d = backCity(c,area_text);
                        if(d == undefined){
                            $('#area').html('<option value="">该市区没有区域可选</option>');
                        }else{
                            for (var i = 0; i < d.length; i++){
                                if(d[i].text == q){
                                    d_str += '<option selected value="'+d[i].text+'">'+d[i].text+'</option>';
                                }else{
                                    d_str += '<option value="'+d[i].text+'">'+d[i].text+'</option>';
                                }
                            }
                            $('#area').html(d_str);
                        }
                    }
                }
            }
			// 打开弹窗
			function openModal(id){
				editUserData(id);
				editPriceData(id);
				editRateData(id);
				$('#detail_Modal').modal();
			}
			// 修改卖家资料
			function editUserData(id){
				var post_url = '<?php echo site_url('/saller/edit_user')?>';
				var data = {};
				data.id = id;
				data.url = post_url;
				var url = '<?php echo site_url('/saller/get_user_data')?>';
				$.post(url,{'id':id},function(res){
					if(res.s == 1){
						data.list = res.data;
                        var s = res.data.province;
                        var c = res.data.city;
                        var q = res.data.area;
					}else{
						data.list = '';
                        var s = '',c = '',q = '';
					}
					var html = template('add_user', data);
					$('#baseTabs-1').html(html);
                    getProvince(cityData,s,c,q);
				},'json')	
			}
			// 修改卖家费率
			function editPriceData(id){
				var post_url = '<?php echo site_url('/saller/add_price')?>';
				var data = {};
				data.id = id;
				data.url = post_url;
				var url = '<?php echo site_url('/saller/get_price_data')?>';
				$.post(url,{'id':id},function(res){
					if(res.s == 1){
						data.list = res.data;
					}else{
						data.list = '';
					}
					var html = template('add_price', data);
					$('#baseTabs-2').html(html);
				},'json')
				
			}
			// 修改卖家费率
			function editRateData(id){
				var post_url = '<?php echo site_url('/saller/edit_rate')?>';
				var data = {};
				data.id = id;
				data.url = post_url;
				var url = '<?php echo site_url('/saller/get_rate_data')?>';
				$.post(url,{'id':id},function(res){
					if(res.s == 1){
						var d = res.data;
						data.list = d[1];
						data.status = d[0];
					}else{
						data.list = '';
					}
					var html = template('add_rate', data);
					$('#baseTabs-3').html(html);
				},'json')
				
			}

			// 提交
			function saveAllData(){
				var ele = $('#myTabContent').children('.active').children('form');
				var url = ele.attr('action');
				var userData = ele.serializeArray();
				var arr = getFormArray(userData);
				$.post(url,arr,function(res){
					if(res.s == 1){
                        if(res.b_id != ''){
                            $('#price_id').val(res.b_id);
                        }
                        layer.msg(res.msg,{icon:1,time:500},function () {
                            window.location.reload();
                        });
					}else{
						layer.alert(res.msg);
					}
				},'json')
			}

			
			// 检查输入是否浮点数
			function checkVal(that){
				var val = $(that).val();
				if(checkFloat(val)){
					$(that).val(val);
				}else{
					$(that).val('');
				}
			}
			
		</script>
		<!-- popup-->
	</body>
</html>
