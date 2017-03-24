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
					<li class="active">基础设置</li>
				</ul><!-- /.breadcrumb -->
			</div>

			<div class="page-content">
				
				<!-- form-group-->
				<div class="row">
					<div class="col-xs-6">
						<ul id="myTab" class="nav nav-tabs">
							<li class="active"><a href="#baseTabs-1" data-toggle="tab">商家资料</a></li>
<!--							<li><a href="#baseTabs-3" data-toggle="tab">充值方式</a></li>-->
						</ul>
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade in active" id="baseTabs-1">
								<div class="row">
									<div class="col-xs-12">
										<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('/Setting/update');?>">
											<div class="col-sm-6 form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-1">公司名称</label>

												<div class="col-sm-9">
													<input type="text" id="form-set-seller-1" class="col-xs-12" name="name" value="<?php echo $info['company_name'];?>" />
												</div>
											</div>
											<div class="col-sm-6 form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-2">联系人</label>

												<div class="col-sm-9">
													<input type="text" id="form-set-seller-2" class="col-xs-12" name="link_man" value="<?php echo $info['link_man'];?>"/>
												</div>
											</div>
											<div class="col-sm-6 form-group">
												<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-3">省份</label>
												<div class="col-sm-9">
													<select name="province" class="col-xs-12" id="province">
														<option value="">请选择省份</option>
													</select>
												</div>
											</div>
											<div class="col-sm-6 form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-4">城市</label>
												<div class="col-sm-9">
													<select name="city" id="city" class="col-xs-12">
														<option value="">请选择城市</option>
													</select>
												</div>
											</div>
											<div class="col-sm-6 form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-4">区域</label>
												<div class="col-sm-9">
													<select name="area" id="area" class="col-xs-12">
														<option value="">请选择区域</option>
													</select>
												</div>
											</div>
                                            <div class="col-sm-6 form-group" >
                                                <label class="col-sm-3 control-label no-padding-right" for="form-set-seller-6">地址</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="form-set-seller-6" class="col-xs-12" name="address" value="<?php echo $info['address'];?>"/>
                                                </div>
                                            </div>
											<div class="col-sm-6 form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-5">固定电话</label>
												<div class="col-sm-9">
													<input type="text" id="form-set-seller-5" class="col-xs-12" name="fixedphone" value="<?php echo $info['fixedphone'];?>"/>
												</div>
											</div>
											<div class="col-sm-6 form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-7">QQ号</label>
												<div class="col-sm-9">
													<input type="text" id="form-set-seller-7" class="col-xs-12" name="qq" value="<?php echo $info['qq'];?>"/>
												</div>
											</div>

											<div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>

											<div class="col-sm-6 form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-8">电子邮箱</label>

												<div class="col-sm-9">
													<input type="text" id="form-set-seller-8" class="col-xs-12" value="<?php echo $info['email'];?>" disabled/>
												</div>
											</div>
											<div class="col-sm-2 form-group" style="line-height: 34px">
														<span class="fa-stack fa-1x">
															  <i class="fa fa-circle fa-stack-2x green"></i>
															  <i class="fa fa-check fa-stack-1x fa-inverse"></i>
														</span>
												已认证
											</div>
											<div class="col-sm-2 form-group">
												<a href="#" style="line-height: 34px" data-toggle="modal" data-target="#myModal-email">修改</a>
											</div>

											<div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>

											<div class="col-sm-6 form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-set-seller-9">手机</label>

												<div class="col-sm-9">
													<input type="text" id="form-set-seller-9" class="col-xs-12" value="<?php echo $info['mobile'];?>" disabled/>
												</div>
											</div>
											<div class="col-sm-2 form-group" style="line-height: 34px">
														<span class="fa-stack fa-1x">
															  <i class="fa fa-circle fa-stack-2x green"></i>
															  <i class="fa fa-check fa-stack-1x fa-inverse"></i>
														</span>
												已认证
											</div>
											<div class="col-sm-2 form-group">
												<a href="#" style="line-height: 34px" data-toggle="modal" data-target="#myModal-phone">修改</a>
											</div>

											<div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>
											<div class="col-sm-12 alert alert-warning">
												友情提示：请将noreply@sellercool.com加入您的邮箱的“白名单”，已免系统发出的通知邮件被您的邮箱识别为垃圾邮件!<br/>
												为了安全，邮箱和手机号码修改及添加需要验证。
											</div>
											<div class="clearfix form-actions">
												<div class="col-md-offset-5 col-md-7">
													<button class="btn btn-info" type="sbumit">
														<i class="ace-icon fa fa-check bigger-110"></i>
														更新
													</button>

													&nbsp; &nbsp; &nbsp;
													<button class="btn" type="reset">
														<i class="ace-icon fa fa-undo bigger-110"></i>
														重置
													</button>
												</div>
											</div>
										</form>
										<!-- 模态框-->
										<div class="modal fade" id="myModal-email" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
															&times;
														</button>
														<h4 class="modal-title">
															修改电子邮箱
														</h4>
													</div>
													<div class="modal-body" style="overflow: auto">
														<div class="col-sm-12">
															<div class="col-sm-7 form-group" >
																<label class="col-sm-4 control-label no-padding-right" for="form-set-email-1">原电子邮箱</label>

																<div class="col-sm-8">
																	<input type="text" id="form-set-email-1" class="col-xs-12" value="<?php echo $info['email'];?>" disabled/>
																</div>
															</div>
															<div class="col-sm-7 form-group" >
																<label class="col-sm-4 control-label no-padding-right" for="form-set-email-2">新电子邮箱</label>

																<div class="col-sm-8">
																	<input type="text" id="form-set-email-2" class="col-xs-12"/>
																</div>
															</div>
															<div class="col-sm-3 form-group" >
																<button type="button" class="btn-info hs" onclick="getEmailCode(this)">获取验证码</button>
															</div>
															<div class="col-sm-7 form-group" >
																<label class="col-sm-4 control-label no-padding-right" for="form-set-email-3">验证码</label>

																<div class="col-sm-8">
																	<input type="text" id="form-set-email-3" class="col-xs-12"/>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-primary" onclick="editEmail(this)">
															提交更改
														</button>
														<button type="button" class="btn btn-default" data-dismiss="modal">关闭
														</button>
													</div>
												</div><!-- /.modal-content -->
											</div><!-- /.modal -->
										</div>
										<div class="modal fade" id="myModal-phone" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
															&times;
														</button>
														<h4 class="modal-title">
															修改手机
														</h4>
													</div>
													<div class="modal-body" style="overflow: auto">
														<div class="col-sm-12">
															<div class="col-sm-7 form-group" >
																<label class="col-sm-4 control-label no-padding-right" for="form-set-phone-1">原手机号码</label>

																<div class="col-sm-8">
																	<input type="text" id="form-set-phone-1" class="col-xs-12" value="<?php echo $info['mobile'];?>" disabled/>
																</div>
															</div>
															<div class="col-sm-7 form-group" >
																<label class="col-sm-4 control-label no-padding-right" for="form-set-phone-2">新手机号码</label>

																<div class="col-sm-8">
																	<input type="text" id="form-set-phone-2" class="col-xs-12"/>
																</div>
															</div>
															<div class="col-sm-3 form-group" >
																<button type="button" class="btn-info  hs" onclick="getSMSCode(this)">短信获取验证码</button>
															</div>
															<div class="col-sm-7 form-group" >
																<label class="col-sm-4 control-label no-padding-right" for="form-set-phone-3">验证码</label>

																<div class="col-sm-8">
																	<input type="text" id="form-set-phone-3" class="col-xs-12"/>
																</div>
															</div>
														</div>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-primary"  onclick="editPhone(this)">
															提交更改
														</button>
														<button type="button" class="btn btn-default" data-dismiss="modal">关闭
														</button>
													</div>
												</div><!-- /.modal-content -->
											</div><!-- /.modal -->
										</div>
										<!-- 模态框-->
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="baseTabs-3">
								<div class="row">
									<div class="col-xs-12">
										<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('/Setting/update_info');?>">
											<div class="col-sm-7 form-group" >
												<label class="col-sm-3 control-label no-padding-right"><b>支付宝支付</b></label>
											</div>
											<div class="col-sm-7 form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-set-pay-1">支付宝帐号</label>

												<div class="col-sm-9">
													<input type="text" id="form-set-pay-1" class="col-xs-12" name="alipay" value="<?php echo $info['alipay'];?>"/>
												</div>
											</div>
											<div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>
											<div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>
											<div class="col-sm-7 form-group" >
												<label class="col-sm-3 control-label no-padding-right"><b>线下支付</b></label>
											</div>
											<div class="col-sm-7 form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-set-pay-2">收款人</label>

												<div class="col-sm-9">
													<input type="text" id="form-set-pay-2" class="col-xs-12" name="payee" value="<?php echo $info['payee'];?>"/>
												</div>
											</div>
											<div class="col-sm-7 form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-set-pay-3">银行卡帐号</label>

												<div class="col-sm-9">
													<input type="text" id="form-set-pay-3" class="col-xs-12" name="bank_card" value="<?php echo $info['bank_card'];?>"/>
												</div>
											</div>
											<div class="col-sm-7 form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-set-pay-4">开户银行</label>

												<div class="col-sm-9">
													<input type="text" id="form-set-pay-4" class="col-xs-12" name="bank" value="<?php echo $info['bank'];?>"/>
												</div>
											</div>
											<div class="col-sm-7 form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-set-pay-5">开户地址</label>

												<div class="col-sm-9">
													<input type="text" id="form-set-pay-5" class="col-xs-12" name="account_address" value="<?php echo $info['account_address'];?>"/>
												</div>
											</div>

											<div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>

											<div class="clearfix form-actions">
												<div class="col-md-offset-5 col-md-7">
													<button class="btn btn-info" type="submit">
														<i class="ace-icon fa fa-check bigger-110"></i>
														确认
													</button>
												</div>
											</div>
										</form>
									</div>
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
	<script src="/assets/js/city.data.js"></script>
	<script>
        var province = '<?php echo $info['province'];?>';
        var city = '<?php echo $info['city'];?>';
        var area = '<?php echo $info['area'];?>';
        $(function () {
            getProvince(cityData);
        })
        //省份
        function getProvince(data) {
            var _str = '<option cid="" value="">请选择省份</option>';
            var str = '';
            var c_str = '';
            var d_str = '';
            for (var i = 0; i < data.length; i++){
                if(data[i].text == province){
                    str += '<option selected cid="'+data[i].value+'" value="'+data[i].text+'">'+data[i].text+'</option>';
                }else{
                    str += '<option cid="'+data[i].value+'" value="'+data[i].text+'">'+data[i].text+'</option>';
                }
            }
            $('#province').html(_str+str);
            var val_text = $('#province').find('option:selected').val();
            if(val_text != '' && val_text != null){
                var c = backCity(data,val_text);
                for (var i = 0; i < c.length; i++){
                    if(c[i].text == city){
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
                            if(d[i].text == area){
                                d_str += '<option selected value="'+d[i].text+'">'+d[i].text+'</option>';
                            }else{
                                d_str += '<option value="'+d[i].text+'">'+d[i].text+'</option>';
                            }
                        }
                        $('#area').html(d_str);
                    }
                }
            }

            $('#province').on('change',function () {
                var val = $(this).find('option:selected').attr('cid');
                if(val == '' || val == null){
                    $('#city').html('<option cid="" value="">请选择城市</option>');
                    $('#area').html('<option value="">请选择区域</option>');
                    return;
                }
                var city_str = '';
                var area_str = '';
                var child = getCity(data,val);
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
            })

            $('#city').on('change',function () {
                var val = $('#province').find('option:selected').attr('cid');
                var valid = $(this).find('option:selected').attr('cid');
                var area_str = '';
                var child = getCity(data,val);
                var area = getCity(child,valid);
                if(area == undefined){
                    $('#area').html('<option value="">该市区没有区域可选</option>');
                    return;
                }
                for (var i = 0; i < area.length; i++){
                    area_str += '<option value="'+area[i].text+'">'+area[i].text+'</option>';
                }
                $('#area').html(area_str);
            })
        }
        //城市
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
		// 获取邮箱验证码
		function getEmailCode(that){
			var newEmail = $('#form-set-email-2').val();
			var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
			if(newEmail == '' || newEmail == null){
				layer.alert('请输入新邮箱');
				return;
			}
			if(!reg.test(newEmail)){
				layer.alert('邮箱格式不正确');
				return;
			}
			if($(that).hasClass('hs')){
				$(that).removeClass('hs');
				$(that).text('验证码已经发送');
				$.post('<?php echo site_url('/setting/getEmailCode');?>',{'email': newEmail},function(res){
					if(res.res == 1){
						var s = 30;
						var timer = setInterval(function(){
							s--;
							$(that).text(s+'秒后可重发');
							if(s == 0){
								clearInterval(timer);
								$(that).text('点击重新发送');
								$(that).addClass('hs');
							}
						},1000)
					}

				},'json')

			}else{
				return;
			}
		}
		//发送手机验证码
		function getSMSCode(that){
			var newPhone = $('#form-set-phone-2').val(); 
			if(newPhone == '' || newPhone == null){
				layer.alert('请输入新手机号');
				return;
			}
			if($(that).hasClass('hs')){
				$(that).removeClass('hs');
				$(that).text('验证码已经发送');
				$.post('<?php echo site_url('/setting/send_sms_code');?>',{'mobile': newPhone},function(res){
					if(res.res == 1){
						layer.alert(res.msg);
						var s = 30;
						var timer = setInterval(function(){
							s--;
                            $(that).text(s+'秒后可重发');
							if(s == 0){
								clearInterval(timer);
                                $(that).text('点击重新发送');
								$(that).addClass('hs');
							}
						},1000)
					}else{
						layer.alert(res.msg);
					}

				},'json')

			}else{
				return;
			}
		}
		// 修改邮箱
		function editEmail(that) {
			var newEmail = $('#form-set-email-2').val();
			var emailCaptcha = $('#form-set-email-3').val();
			if(newEmail == '' || emailCaptcha == ''){
				layer.alert('邮箱或验证码不能为空');
				return;
			}
			$.post('<?php echo site_url('/setting/updateEmail');?>',{'email':newEmail,'captchaEmail':emailCaptcha},function(result){
				if(result.res == 1){
					layer.msg('修改成功',{icon:1,time:500},function () {
                        window.location.reload();
                    });
				}else if(result.res == 2){
					layer.alert('该邮箱已经绑定别的账号');
				}else if(result.res == 3){
					layer.alert('修改失败');
				}else{
					layer.alert('验证码不正确');
				}
			},'json')
		}

		// 修改手机号码
		function editPhone(that) {
			var newPhone = $('#form-set-phone-2').val();
			var code = $('#form-set-phone-3').val();
			if(newPhone == '' || code == ''){
				layer.alert('手机或验证码不能为空');
				return;
			}
			$.post('<?php echo site_url('/setting/updatePhone');?>',{'mobile':newPhone,'code':code},function(result){
				if(result.res == 1){
                    layer.msg('修改成功',{icon:1,time:500},function () {
                        window.location.reload();
                    });
				}else if(result.res == 2){
					layer.alert('该手机已经绑定别的账号');
				}else if(result.res == 3){
					layer.alert('修改失败');
				}else{
					layer.alert(result.msg);
				}
			},'json')
		}
	</script>

</body>
</html>
