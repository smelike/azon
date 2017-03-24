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
							<li class="active">订单管理</li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<div class="alert alert-info" role="alert">
									<div class="btn-group">
										<button type="button" class="btn btn-info btn-sm" onclick="exportExcel()" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;">
											<span class="glyphicon glyphicon-save"></span>&nbsp;导出物流单号
										</button>
									</div>
									<div class="btn-group">
										<button type="button" class="btn btn-info btn-sm" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;" data-toggle="modal" data-target="#myModal-4">
											<span class="glyphicon glyphicon-open"></span>&nbsp;导入订单（物流）单号
										</button>
									</div>
								</div>
							</div>
						</div>
						<!-- form-group-->
						<div class="row">
							<div class="col-xs-12">
								<form action="<?php echo site_url('ordermanager/index');?>" class="form-horizontal" role="form" id="sx-box" method="get" action="">
									<div class="col-sm-2 form-group">
										<label class="col-sm-3 control-label no-padding-right">产品ID</label>
										<div class="col-sm-9">
											<input type="text" name="cp_id" class="col-xs-12" value="<?php echo isset($gets['cp_id'])? $gets['cp_id'] : '';?>">
										</div>
									</div>
									<div class="col-sm-2 form-group">
										<label class="col-sm-3 control-label no-padding-right">订单号</label>
										<div class="col-sm-9">
											<input type="text" name="order_num" class="col-xs-12" value="<?php echo isset($gets['order_num'])? $gets['order_num'] : '';?>">
										</div>
									</div>
									<div class="col-sm-2 form-group ptname">
										<label class="col-sm-3 control-label no-padding-right">平台名称</label>
										<div class="col-sm-9">
											<select class="chosen-select form-control" name="pt_name" onchange="getShop(this,this.value,'shop_data')">
												<option value="">==全部==</option>
												<?php if(isset($platforms) && count($platforms) > 0) :?>
													<?php foreach ($platforms as $item):?>
														<option cid="<?php echo $item['id'];?>" value="<?php echo $item['id'];?>" <?php echo isset($gets['pt_name']) && $gets['pt_name'] == $item['id'] ?' selected="selected"' : '';?>><?php echo $item['name'];?></option>
												    <?php endforeach;?>
												<?php endif;?>
											</select>
										</div>
									</div>
									<div class="col-sm-2 form-group shopname">
										<label class="col-sm-3 control-label no-padding-right">店铺</label>
										<div class="col-sm-9">
											<select class="chosen-select form-control shop_data" name="shop_name">
                                                <?php if(isset($shops) && count($shops) > 0) :?>
                                                    <?php foreach ($shops as $item):?>
                                                        <option cid="<?php echo $item['id'];?>" value="<?php echo $item['id'];?>" <?php echo isset($gets['shop_name']) && $gets['shop_name'] == $item['id']? 'selected="selected"':'';?>><?php echo $item['name'];?></option>
                                                    <?php endforeach;?>
                                                <?php endif;?>
											</select>
										</div>
									</div>
									<div class="col-sm-2 form-group">
										<label class="col-sm-3 control-label no-padding-right">物流单号</label>
										<div class="col-sm-9">
											<input type="text" name="wl_num" class="col-xs-12" value="<?php echo isset($gets['wl_num'])? $gets['wl_num'] : '';?>">
										</div>
									</div>
									<div class="col-sm-2 form-group">
										<label class="col-sm-3 control-label no-padding-right">物流状态</label>
										<div class="col-sm-9">
											<select class="chosen-select form-control" name="wl_status">
												<option value="">==全部==</option>
												<option value="1" <?php echo isset($gets['wl_status']) && $gets['wl_status'] == '1'?'selected="selected"':'';?>>未上线</option>
												<option value="2" <?php echo isset($gets['wl_status']) && $gets['wl_status'] == '2'?'selected="selected"':'';?>>已上线</option>
												<option value="3" <?php echo isset($gets['wl_status']) && $gets['wl_status'] == '3'?'selected="selected"':'';?>>已妥投</option>
												<option value="4" <?php echo isset($gets['wl_status']) && $gets['wl_status'] == '4'?'selected="selected"':'';?>>投递失败</option>
											</select>
										</div>
									</div>
									<div class="col-sm-2 form-group">
										<label class="col-sm-3 control-label no-padding-right">有无物流单号</label>
										<div class="col-sm-9">
											<select class="chosen-select form-control" name="has_wl">
												<option value="">==全部==</option>
												<option value="1" <?php echo isset($gets['has_wl']) && $gets['has_wl'] == '1'?'selected="selected"':'';?>>有</option>
												<option value="2" <?php echo isset($gets['has_wl']) && $gets['has_wl'] == '2'?'selected="selected"':'';?>>无</option>
											</select>
										</div>
									</div>
									<div class="col-sm-2 form-group">
										<label class="col-sm-3 control-label no-padding-right">任务类型</label>
										<div class="col-sm-9">
											<select class="chosen-select form-control" name="task_type">
												<option value="">==全部==</option>
												<option value="2" <?php echo isset($gets['task_type']) && $gets['task_type'] == '2'?'selected="selected"':'';?>>刷评</option>
												<option value="1" <?php echo isset($gets['task_type']) && $gets['task_type'] == '1'?'selected="selected"':'';?>>刷单</option>
											</select>
										</div>
									</div>
									<div class="col-sm-2 form-group">
										<label class="col-sm-3 control-label no-padding-right">订单状态</label>
										<div class="col-sm-9">
											<select class="chosen-select form-control" name="order_status">
												<option value="">==全部==</option>
												<option value="1" <?php echo isset($gets['order_status']) && $gets['order_status'] == '1'?'selected="selected"':'';?>>正常</option>
												<option value="2" <?php echo isset($gets['order_status']) && $gets['order_status'] == '2'?'selected="selected"':'';?>>作废</option>
											</select>
										</div>
									</div>
									<div class="col-sm-2 form-group">
										<label class="col-sm-3 control-label no-padding-right">上评状态</label>
										<div class="col-sm-9">
											<select class="chosen-select form-control" name="sp_status">
												<option value="">==全部==</option>
												<option value="1" <?php echo isset($gets['sp_status']) && $gets['sp_status'] == '1'?'selected="selected"':'';?>>未上评</option>
												<option value="2" <?php echo isset($gets['sp_status']) && $gets['sp_status'] == '2'?'selected="selected"':'';?>>已上评</option>
												<option value="3" <?php echo isset($gets['sp_status']) && $gets['sp_status'] == '3'?'selected="selected"':'';?>>已反馈</option>
												<option value="4" <?php echo isset($gets['sp_status']) && $gets['sp_status'] == '4'?'selected="selected"':'';?>>已删除</option>
												<option value="5" <?php echo isset($gets['sp_status']) && $gets['sp_status'] == '5'?'selected="selected"':'';?>>成功</option>
											</select>
										</div>
									</div>
									<div class="col-sm-2 form-group">
										<label class="col-sm-3 control-label no-padding-right">评价ID</label>

										<div class="col-sm-9">
											<input type="text" name="pj_ID" class="col-xs-12" value="<?php echo isset($gets['pj_ID'])? $gets['pj_ID'] : '';?>">
										</div>
									</div>
									<?php if(in_array('order+index+zxr', $priv)){ ?>
									<div class="col-sm-2 form-group">
										<label class="col-sm-3 control-label no-padding-right">执行人</label>
										<div class="col-sm-9">
											<select class="chosen-select form-control" name="zxr">
												<option value="">==请选择==</option>
												<?php if(isset($people) && count($people) > 0):?>
													<?php foreach ($people as $v):?>
														<option value="<?php echo $v['id'];?>"<?php echo isset($gets['zxr']) && $gets['zxr'] == $v['id'] ?' selected="selected"' : '';?>><?php echo $v['username'];?></option>
													<?php endforeach;?>
												<?php endif;?>
											</select>
										</div>
									</div>
									<?php } ?>
									<div style="clear: both"></div>
									<div class="col-sm-3 form-group">
										<label class="col-sm-3 control-label no-padding-right">下单时间</label>
										<div class="col-sm-9">
											<div class="input-daterange input-group">
												<div class="input-daterange input-group">
													<input type="text" class="input-sm form-control" name="xdstart_time"  value="<?php echo isset($gets['xdstart_time'])? $gets['xdstart_time'] : '';?>">
														<span class="input-group-addon">
															<i class="fa fa-exchange"></i>
														</span>
													<input type="text" class="input-sm form-control" name="xdend_time" value="<?php echo isset($gets['xdend_time'])? $gets['xdend_time'] : '';?>">
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-3 form-group">
										<label class="col-sm-3 control-label no-padding-right">预计上评时间</label>
										<div class="col-sm-9">
											<div class="input-daterange input-group">
												<div class="input-daterange input-group">
													<input type="text" class="input-sm form-control" name="yptime_start" value="<?php echo isset($gets['yptime_start'])? $gets['yptime_start'] : '';?>">
														<span class="input-group-addon">
															<i class="fa fa-exchange"></i>
														</span>
													<input type="text" class="input-sm form-control" name="yptime_end" value="<?php echo isset($gets['yptime_end'])? $gets['yptime_end'] : '';?>">
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-3 form-group">
										<label class="col-sm-3 control-label no-padding-right">实际上评时间</label>
										<div class="col-sm-9">
											<div class="input-daterange input-group">
												<div class="input-daterange input-group">
													<input type="text" class="input-sm form-control" name="sjtime_start" value="<?php echo isset($gets['sjtime_start'])? $gets['sjtime_start'] : '';?>">
														<span class="input-group-addon">
															<i class="fa fa-exchange"></i>
														</span>
													<input type="text" class="input-sm form-control" name="sjtime_end" value="<?php echo isset($gets['sjtime_end'])? $gets['sjtime_end'] : '';?>">
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-3 form-group">
										<label class="col-sm-3 control-label no-padding-right">上传单号时间</label>
										<div class="col-sm-9">
											<select class="chosen-select form-control" name="logistics_time">
												<option value="">==全部==</option>
												<option value="1" <?php echo isset($gets['logistics_time']) && $gets['logistics_time'] == '1'?'selected="selected"':'';?>>36小时内</option>
												<option value="2" <?php echo isset($gets['logistics_time']) && $gets['logistics_time'] == '2'?'selected="selected"':'';?>>超过36小时</option>
											</select>
										</div>
									</div>
									<div class="clearfix form-actions">
										<div class="col-md-offset-5 col-md-7">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-search bigger-110"></i>
												查找
											</button>
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
								<div class="modal fade" id="myModal-4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
										<form method="POST" action="<?php echo site_url('/Ordermanager/orderput')?>" enctype="multipart/form-data">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
													×
												</button>
												<h4 class="modal-title">
													导入物流单号
												</h4>
											</div>
											<div class="modal-body">
												<div class="row">
													<div class="col-sm-12">
														<label class="col-sm-3 control-label no-padding-right" for="form-order-11">点击下载模板</label>
														<div class="col-sm-9">
															<a target="_blank" href="/uploads/logistics_temp/logistics_temp.xls">物流单号模板</a>
														</div>
													</div>
													<br/>
													<br/>
													<div class="col-sm-12 form-group">
														<label class="col-sm-3 control-label no-padding-right" for="form-order-11">请选择文件</label>
														<div class="col-sm-9">
															<input type="file" class="col-xs-12" name="file">
														</div>
														<div class="col-sm-9 col-sm-offset-3" style="color: #999">
															导入的文件格式必选为EXCEL文件
														</div>
													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button type="submit" class="btn btn-primary">
													导入
												</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">否
												</button>
											</div>
										</form>
										</div><!-- /.modal-content -->
									</div><!-- /.modal -->
								</div>

								<div class="col-sm-12">
									<div class="brush-table-box" style="overflow: hidden">
										<table class="brush-table" style="overflow: hidden">
											<caption>
												<span>订单列表</span>
											</caption>
											<tbody>
											<?php if(isset($orders) && count($orders) > 0):?>
											<tr id="table-data">
												<td style="width: 670px;border: none">
													<div style="width: 670px;">
														<table style="border: none">
															<thead>
															<tr>
																<th width="50">
																	<input type="checkbox" class="table-selectAll2">
																</th>
																<th width="120">
																	操作
																</th>
																<th width="100">订单号</th>
																<th width="100">物流单号</th>
																<th width="100">产品ID</th>
																<th width="100">平台</th>
																<th width="100">实际金额</th>
															</tr>
															</thead>
															<tbody>
																<?php foreach ($orders as $a):?>
																<tr>
																	<td>
																		<input type="checkbox" class="select-list2">
																	</td>
																	<td>
																		<button class="btn-link" onclick="uploadnum(<?php echo $a['id'].",'".$a['order_code']."'";?>)" >添加/修改跟踪号</button>
																		<button class="btn-link" onclick="seeDetail(<?php echo $a['id'];?>)" >查看</button>
                                                                        <?php if($a['status'] == '1'):?>
																			<?php if($a['type'] == '2'):?>
																				<?php if($a['comment_status'] == '1'):?>
																					<button order-code="<?php echo $a['order_code'];?>" comment-time="<?php echo $a['expect_comment_time'];?>" class="btn-link" onclick="changeCommit(this,<?php echo $a['product_id'];?>,<?php echo $a['id'];?>)">上评</button>
																				<?php else:?>
																					<button order-code="<?php echo $a['order_code'];?>" comment-time="<?php echo $a['expect_comment_time'];?>"  class="btn-link" onclick="editCommit(this,<?php echo $a['product_comment_id'];?>,<?php echo $a['id'];?>)">改评</button>
																				<?php endif;?>
																			<?php endif;?>
                                                                            <button class="btn-link" onclick="changeStatus(<?php echo $a['id'];?>)">作废</button>
																		<?php elseif($a['status'] == '3'):?>
																			<button class="btn-link" style="color:green;">已确认</button>
                                                                        <?php else:?>
																		<button class="btn-link" style="color:red;">已作废</button>
                                                                        <?php endif;?>
																	</td>
																	<td><button class="btn-link" onclick="<?php if($user_group_id == 1 || $a['executors'] == $user_id):?>modify(this,<?php echo $a['id'].",'".$a['shopid']."'";?>)<?php endif;?>" ><?php echo $a['order_code'];?></button></td>
																	<td><?php if($a['logistics_code']):?> <a href="http://www.17track.net/zh-cn/track?nums=<?php echo $a['logistics_code'];?>" target="view_window"><?php echo $a['logistics_code'];?></a>	<?php endif;?></td>
																	<td><a target="_blank" href="https://<?php echo $a['pt_url'];?>/dp/<?php echo $a['product_ASIN'];?>"><?php echo $a['product_ASIN'];?></a></td>
																	<td><?php echo $a['platform'];?></td>
																	

																	<td><span style="color:green;"><?php echo $a['c_code'];?><?php echo $a['real_price'];?></span></td>
																</tr>
																<?php endforeach;?>
															</tbody>
														</table>
														<div style="width: 670px;height: 18px"></div>
													</div>
												</td>
												<td style="width: 1000px;border: none">
													<div style="width:1000px;overflow-x: scroll">
														<table width="1400">
															<thead>
															<tr>
																<th width="100">汇率</th>
																<th width="100">支出合计</th>
																<th width="100">执行人</th>
																<th width="100">开始时间</th>
																<th width="100">结束时间</th>
																<th width="200">下单时间</th>
																<th width="100">店铺</th>
																<th width="100">物流状态</th>
																<th width="100">上传单号时间</th>
																<th width="100">上传人</th>
																<th width="100">预计上评时间</th>
																<th width="100">实际上评时间</th>
																<th width="100">上评人</th>
																<th width="100">上评状态</th>
																<th width="100">评价ID</th>
															</tr>
															</thead>
															<tbody>
															<?php foreach ($orders as $a):?>
															<tr>
																<td><?php echo $a['rate'];?></td>
																<td><span style="color:green;">&yen<?php echo $a['total_price'];?></span></td>
																<td><?php echo $a['executor'];?></td>
																<td><?php echo $a['task_starttime'];?></td>
																<td><?php echo $a['task_endtime'];?></td>
																<td><?php echo $a['create_time'];?></td>
																<td><?php echo $a['shop'];?></td>
																<td><?php echo $a['logistics_status'];?></td>
																<td><?php echo $a['upload_time'];?></td>
																<td><?php echo $a['upload_man'];?></td>
																<td><?php if($a['type'] == 2) echo $a['expect_comment_time'];?></td>
																<td><?php if($a['type'] == 2) echo $a['real_comment_time'];?></td>
																<td><?php echo $a['comment_man'];?></td>
																<?php if($a['comment_status'] == '1'):?>
																<td>未上评</td>
																<?php elseif($a['comment_status'] == '2'):?>
																<td>已上评</td>
																<?php elseif($a['comment_status'] == '3'):?>
																<td>已反馈</td>
																<?php elseif($a['comment_status'] == '4'):?>
																<td>已删除</td>
																<?php elseif($a['comment_status'] == '5'):?>
																<td>成功</td>
																<?php endif;?>
																<td><?php echo $a['comment_ID'];?></td>
															</tr>
															<?php endforeach;?>
															</tbody>
														</table>
													</div>
											</tr>
											<?php else:?>
												<tr>
													<td align="center" colspan="22">没有数据</td>
												</tr>
											<?php endif;?>
											</tbody>
										</table>
									</div>

									<?php echo $pagetext;?>
									| 支出总金额：<?php echo $t_money;?>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div>
	
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>
<!-- 模态框（Modal） -->
<div class="modal fade" id="seeDetail_modal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" style="width: 900px;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title">
					查看
				</h4>
			</div>
			<div class="modal-body" id="seeDetail_con">
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>	
<!-- 添加单个跟踪号modal -->
<div class="modal fade" id="adduploadnum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    添加单个跟踪号
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-6 control-label no-padding-right">订单号：<span id="ordersn">116-3527885-8849045</span></label>

                    </div>
					<div class="col-sm-12 form-group">
                        <label class="col-sm-2">跟踪号：</label>
                        <div class="col-sm-6">
						<input type="hidden" name="ordersn" id="ordersnv" value=""/>
							<input type="text" name="tracking" id="tracking" value=""/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
			    <button type="button" class="btn btn-primary" onclick="addtracking(this)">保存</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>
<!-- 添加订单modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  	<div class="modal-dialog" style="margin:7% auto 0;width: 1000px;">
	    <div class="modal-content">
	    	<div class="modal-header">
		    	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		    	<h4 class="modal-title" id="myModalLabel">添加订单</h4>
		  	</div>
		  	<div class="modal-body">
				<div class="tc_login">
					<form id="add_form" class="form-horizontal" role="form">
						<!-- form-group-->
						<div class="row">
							<div class="col-xs-12">
								<div class="col-sm-6 form-group">
									<label class="col-sm-3 control-label no-padding-right" >任务时间</label>
									<div class="col-sm-9">
										<select class="chosen-select form-control" id="task_time_s" >
											<option value="">选择任务时间</option>
											<?php if(isset($times) && count($times)>0):?>
												<?php foreach ($times as $item):?>
											        <option value="<?php echo $item['d'];?>"><?php echo $item['t'];?></option>
											    <?php endforeach;?>
											<?php endif;?>
										</select>
									</div>
								</div>
								<div class="col-sm-6 form-group">
									<label class="col-sm-3 control-label no-padding-right" for="form-order-add-2">产品ID</label>
									<div class="col-sm-9">
										<input type="text" class="col-xs-12" onblur="showProduct(this.value,'task_time_s')">
									</div>
								</div>
							</div>
							<div class="col-sm-12 hr hr-18 dotted hr-dotted" style="margin:0 0 12px;"></div>
							<div id="add_order"></div>
							<div class="col-xs-12">
								<div class="col-sm-6 form-group">
									<label class="col-sm-3 control-label no-padding-right" >订单号</label>
									<div class="col-sm-9">
										<input type="text" name="order_code" class="col-xs-12" placeholder="例：116-3527885-8849045">
									</div>
								</div>
								<div class="col-sm-6 form-group">
									<label class="col-sm-3 control-label no-padding-right" >物流单号</label>
									<div class="col-sm-9">
										<input type="text" name="logistics_num" class="col-xs-12">
									</div>
								</div>
							</div>
						</div>
					</form>
					<!-- form-group-->
				</div>
		  	</div>
		  	<div class="modal-footer" id="add_order_btn">
		  		<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
		  	</div>
	    </div>
  	</div>
</div>
<!-- 上评modal -->
<div class="modal fade" id="sp_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					×
				</button>
				<h4 class="modal-title">
					上评
				</h4>
			</div>
			<div class="modal-body" id="sp_content">
				
			</div>
			<div class="modal-footer" id="spbtns">
				<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal -->
</div>
<script id="spbtns_temp" type="text/html">
	{{if num < 4}}
	<button type="button" class="btn btn-primary" onclick="saveComment()">
		{{name}}
	</button>
	{{/if}}
	<button type="button" class="btn btn-default" data-dismiss="modal">关闭
	</button>
</script>
<script id="modal_see_datail" type="text/html">
	<!-- 标签页-->
	<ul id="myTab" class="nav nav-tabs">
		<li class="active">
			<a href="#order-tabs-1" data-toggle="tab">
				订单信息
			</a>
		</li>
		<li><a href="#order-tabs-2" data-toggle="tab">操作日志</a></li>
	</ul>
	<div id="myTabContent" class="tab-content">
		<div class="tab-pane fade in active" id="order-tabs-1">
			<div class="row">
				<ul class="col-sm-12" style="list-style: none">
					<li class="col-sm-3">
						<b>订单号：</b><span>{{order.order_code}}</span>
					</li>
					<li class="col-sm-3">
						<b>产品ID：</b><span><a target="_blank" href="https://{{order.pt_url}}/dp/{{order.product_ASIN}}">{{order.product_ASIN}}</a></span>
					</li>
					<li class="col-sm-3">
						<b>平台：</b><span>{{order.platform}}</span>
					</li>
					<li class="col-sm-3">
						<b>店铺：</b><span>{{order.shop}}</span>
					</li>
					<li class="col-sm-3">
						<b>任务类型：</b><span>{{order.type_name}}</span>
					</li>
					<li class="col-sm-3">
						<b>关键词：</b><span>{{order.key_word}}</span>
					</li>
					<li class="col-sm-3">
						<b>优惠券：</b><span>{{order.coupon}}</span>
					</li>
					<li class="col-sm-3">
					{{if order.bind_ASIN == '' || order.bind_ASIN == null}}
						<b>关联访问：</b><span>否</span>
					{{else}}
						<b>关联访问：</b><span>是</span>
					{{/if}}
					</li>
					{{if order.bind_ASIN != '' && order.bind_ASIN != null}}
					<li class="col-sm-3">
						<b>关联产品ID：</b><span>{{order.bind_ASIN}}</span>
					</li>
					{{/if}}
					<li class="col-sm-3">
						{{if order.bind_product != '' && order.bind_product != null}}
							<b>捆绑购买：</b><span>是</span>
						{{else}}
							<b>捆绑购买：</b><span>否</span>
						{{/if}}
					</li>
					{{if order.bind_product != '' && order.bind_product != null}}
					<li class="col-sm-3">
						<b>捆绑产品ID：</b><span>{{order.bind_product}}</span>
					</li>
					{{/if}}
					<li class="col-sm-3">
						<b>售价：</b><span>{{order.c_code}}{{order.price}}</span>
					</li>
					<li class="col-sm-3">
						<b>运费：</b><span>{{order.c_code}}{{order.shipping}}</span>
					</li>
					<li class="col-sm-3">
						<b>折扣：</b><span>{{order.discount}}</span>
					</li>
					<li class="col-sm-3">
						<b>实际订单金额：</b><span>{{order.c_code}}{{order.real_price}}</span>
					</li>
					<li class="col-sm-3">
						<b>汇率：</b><span>{{order.rate}}</span>
					</li>
					<li class="col-sm-3">
						<b>佣金比例：</b><span>{{order.commrate}}</span>
					</li>
					<li class="col-sm-3">
						<b>平台佣金：</b><span>{{order.c_code}}{{order.commission_price}}</span>
					</li>
					<li class="col-sm-3">
						<b>成本合计：</b><span>{{order.cost_price}}元</span>
					</li>
					<li class="col-sm-3">
						<b>支出合计：</b><span>{{order.total_price}}元</span>
					</li>
					{{if order.comment_price != '' && order.comment_price != null}}
					<li class="col-sm-3">
						<b>人工刷评：</b><span>{{order.comment_price}}元</span>
					</li>
					{{/if}}
					{{if order.order_price != '' && order.order_price != null}}
					<li class="col-sm-3">
						<b>人工刷单：</b><span>{{order.order_price}}元</span>
					</li>
					{{/if}}
					{{if order.fast_comment == '' && order.fast_comment == null}}
					<li class="col-sm-3">
						<b>快速上评：</b><span>{{order.fast_comment}}元</span>
					</li>
					{{/if}}
					{{if order.collection == '' && order.collection == null}}
					<li class="col-sm-3">
						<b>加入收藏：</b><span>{{order.collection}}元</span>
					</li>
					{{/if}}
					{{if order.bind_ASIN != '' && order.bind_ASIN != null}}
					<li class="col-sm-3">
						<b>关联访问：</b><span>{{order.relation_visit}}元</span>
					</li>
					{{/if}}
					<li class="col-sm-3">
						<b>执行人：</b><span>{{order.executor}}</span>
					</li>
					{{if order.type == '2'}}
					<li class="col-sm-3">
						<b>写评人：</b><span>{{order.write_comment_man}}</span>
					</li>
					{{/if}}
					<li class="col-sm-3">
						<b>物流单号：</b><span>{{order.logistics_code}}</span>
					</li>
					<li class="col-sm-3">
						<b>物流状态：</b><span>{{order.logistics_status}}</span>
					</li>
					<li class="col-sm-3">
						<b>上传单号时间：</b><span>{{order.upload_time}}</span>
					</li>
					<li class="col-sm-3">
						<b>上传人：</b><span>{{order.upload_man}}</span>
					</li>
					{{if order.type == '2'}}
					<li class="col-sm-3">
						<b>上评状态：</b><span>{{order.comment_status}}</span>
					</li>
					<li class="col-sm-3">
						<b>上评人：</b><span>{{order.comment_man}}</span>
					</li>
					<li class="col-sm-3">
						<b>上评时间：</b><span>{{order.real_comment_time}}</span>
					</li>
					<li class="col-sm-3">
						<b>反馈时间：</b><span>{{order.feedback_time}}</span>
					</li>
					<li class="col-sm-3">
						<b>评价ID：</b><span>{{order.comment_ID}}</span>
					</li>
					{{/if}}
					<li class="col-sm-3">
						<b>下单时间：</b><span>{{order.create_time}}</span>
					</li>
					<li class="col-sm-3">
						<b>订单状态：</b><span style="color: red">{{order.status}}</span>
					</li>
					<li class="col-sm-3">
						<b>操作人：</b><span>{{order.operator}}</span>
					</li>
					<li class="col-sm-6">
						<b>最后操作时间：</b><span>{{order.last_update_time}}</span>
					</li>
				</ul>
			</div>
		</div>
		<div class="tab-pane fade" id="order-tabs-2">
			<table class="table table-bordered">
				<thead>
				<tr>
					<th class="col-sm-3">时间</th>
					<th class="col-sm-2">操作人</th>
					<th class="col-sm-7">明细</th>
				</tr>
				</thead>
				<tbody>
				{{if log.length > 0}}
				{{each log as v i}}
				<tr>
					<td>{{v.create_time}}</td>
					<td>{{v.username}}</td>
					<td>{{v.action}}</td>
				</tr>
				{{/each}}
				{{else}}
				<tr>
					<td colspan="3" align="center">该订单暂时没有日志</td>
				</tr>
				{{/if}}
				</tbody>
			</table>
		</div>
	</div>
	<!-- 标签页-->
</script>
<script id="add_btn_temp" type="text/html">
	{{if status == 1}}
	<button type="button" class="btn btn-primary" onclick="addOrder()">添加</button>
	{{else}}
	<button type="button" class="btn btn-default" data-dismiss="modal">关闭{{status}}</button>
	{{/if}}
</script>
<!-- 添加订单 -->
<script id="add_order_temp" type="text/html">
	{{if status == 1}}
	<input type="hidden" name="id" class="col-xs-12" value="{{list.id}}">
	<input type="hidden" name="taskid" class="col-xs-12" value="{{list.task_id}}">
	<div class="col-xs-12">
		<div class="col-sm-6 form-group">
			<label class="col-sm-3 control-label no-padding-right" >汇率</label>
			<div class="col-sm-9">
				<span class="col-xs-12" style="border: 1px solid #ccc;height: 34px;line-height: 30px;color:#858585;">{{list.rate}}</span>
			</div>
		</div>
	</div>
	<div class="col-xs-12">
		<div class="col-sm-6 form-group">
			<label class="col-sm-3 control-label no-padding-right" >平台名称</label>
			<div class="col-sm-9">
				<span class="col-xs-12" style="border: 1px solid #ccc;height: 34px;line-height: 30px;color:#858585;">{{list.platform_name}}</span>
			</div>
		</div>
		<div class="col-sm-6 form-group">
			<label class="col-sm-3 control-label no-padding-right" >店铺</label>
			<div class="col-sm-9">
				<span class="col-xs-12" style="border: 1px solid #ccc;height: 34px;line-height: 30px;color:#858585;">{{list.shop_name}}</span>
			</div>
		</div>
	</div>
	<div class="col-xs-12">
		<div class="col-sm-6 form-group">
			<label class="col-sm-3 control-label no-padding-right" >关键词</label>
			<div class="col-sm-9">
				<span class="col-xs-12" style="border: 1px solid #ccc;height: 34px;line-height: 30px;color:#858585;">{{list.key_word}}</span>
			</div>
		</div>
		<div class="col-sm-6 form-group">
			<label class="col-sm-3 control-label no-padding-right" >优惠券</label>
			<div class="col-sm-9">
				<span class="col-xs-12" style="border: 1px solid #ccc;height: 34px;line-height: 30px;color:#858585;">{{list.coupon}}</span>
			</div>
		</div>
	</div>
	<div class="col-sm-12 hr hr-18 dotted hr-dotted" style="margin:0 0 12px;"></div>
	{{else}}
		<p class="col-xs-12 text-center">{{list}}</p>
		<div class="col-sm-12 hr hr-18 dotted hr-dotted" style="margin:0 0 12px;"></div>
	{{/if}}
</script>
<script id="sp_temp" type="text/html">
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label class="col-sm-3 control-label no-padding-right">订单号</label>
                    <div class="col-sm-9">
                        <span style="line-height: 34px">{{ddnum}}</span>
                    </div>
                </div>
                <div class="col-sm-12 form-group">
                    <label class="col-sm-3 control-label no-padding-right">预计上评时间</label>
                    <div class="col-sm-9">
                        <span style="line-height: 34px">{{sp_time}}</span>
                    </div>
                </div>
                <div class="col-sm-12 form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-order-sp-1">标题</label>
                    <div class="col-sm-9">
                        <input type="text" id="form-order-sp-1" class="col-xs-9" value="{{list.title}}" disabled>
                        <div class="col-xs-3">
                            <button class="web-copy copy-btn" copy-text="{{list.title}}" style="margin-top: 4px">复制</button>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-order-sp-2">内容</label>
                    <div class="col-sm-9">
                        <textarea id="form-order-sp-2" class=" col-xs-9" disabled>{{list.content}}</textarea>
                        <div class="col-xs-3">
                            <button class="web-copy copy-btn" copy-text="{{list.content}}" style="margin-top: 4px">复制</button>
                        </div>
                    </div>
                </div>
                {{if (list.pictures).length > 0}}
                {{each list.pictures as v i}}
                <div class="col-sm-12 form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="file-img1">图片地址{{i+1}}</label>
                    <div class="col-sm-9">
                        <input type="text" id="file-img1" class="col-xs-9" value="{{v}}" disabled>
                        <div class="col-xs-3">
                            <button class="web-copy copy-btn" copy-text="{{list.v}}" style="margin-top: 4px">复制</button>
                        </div>
                    </div>
                </div>
                {{/each}}
                {{/if}}
                {{if (list.video).length > 0}}
                {{each list.video as v i}}
                <div class="col-sm-12 form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="file-video1">视频地址{{i+1}}</label>
                    <div class="col-sm-9">
                        <input type="text" id="file-video1" class="col-xs-9" value="{{v}}" disabled>
                        <div class="col-xs-3">
                            <button class="web-copy copy-btn" copy-text="{{list.v}}" style="margin-top: 4px">复制</button>
                        </div>
                    </div>
                </div>
                {{/each}}
                {{/if}}
                <form id="sp_form">
                    <input type="hidden" value="{{list.id}}" name="pl_id">
                    <input type="hidden" value="{{order_id}}" name="order_id">
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-3 control-label no-padding-right">评价状态</label>
                        <div class="col-sm-9">
                            <select class="chosen-select form-control" name="comment_status_post">
                                {{if list.comment_status == '1'}}
                                <option value="2">上评</option>
                                {{else if list.comment_status == '2'}}
                                <option value="2">已上评</option>
                                <option value="3">已反馈</option>
                                <option value="4">删除</option>
                                <option value="5">成功</option>
                                {{else if list.comment_status == '3'}}
                                <option value="3">已反馈</option>
                                <option value="4">已删除</option>
                                <option value="5">成功</option>
                                {{else if list.comment_status == '4'}}
                                <option value="4">已删除</option>
                                {{else if list.comment_status == '5'}}
                                <option value="5">成功</option>
                                {{/if}}
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-order-sp-6">评价ID</label>

                        <div class="col-sm-9">
                            {{if list.comment_ID == null}}
                            <input type="text" name="pjIDs" class="col-xs-12">
                            {{else}}
                            <input type="text" name="pjIDs" class="col-xs-12" value="{{list.comment_ID}}" disabled>
                            {{/if}}
                        </div>
                    </div>
                </form>
            </div>
        </script>
+		<?php $this->load->view('common/footer');?>
		<script>	
			$(function(){
				$('.input-daterange').datepicker({todayHighlight : true,autoclose:true,format:'yyyy-mm-dd'});
			})
						
			function changeCommit(that,id,order_id){
				var url = "<?php echo site_url('/Ordermanager/get_comment');?>";
				var data = {};
				data.sp_time = $(that).attr('comment-time');
				data.ddnum = $(that).attr('order-code');
				data.order_id = order_id;
				$.post(url,{'id':id,'order_id':order_id},function(res){
					if(res.s == 1){
						data.list = res.data;
						var num = res.data.comment_status;
						$('#sp_content').html(template('sp_temp',data));
						$('#spbtns').html(template('spbtns_temp',{name:'点击上评',num:num}));
						//复制
						var ele = $('.copy-btn');
						ele.each(function (i,ele) {
							var text = $(ele).attr('copy-text');
							copy_text(ele,text);
						})
						$('#sp_modal').modal();
					}else{
						layer.alert(res.msg);
					}
				},'json')
			}
			// 上评
			function saveComment(id){
				var url = "<?php echo site_url('/Ordermanager/change_commit');?>";
				var userData = $('#sp_form').serializeArray();
				var arr = getFormArray(userData);
				if(arr.pjIDs == ''){
					layer.alert('亚马逊评价ID不能为空');
					return;
				}
				$.post(url,arr,function(res){
					if(res.s == 1){
						layer.alert(res.msg,function(){
							window.location.reload();
						});			
					}else{
						layer.alert(res.msg);
					}
				},'json')
			}

			function add_order(){
				$('#addModal').modal();
			}
			function uploadnum(id,order){
				$('#ordersn').text('');
				$('#ordersn').text(order);
				$('#ordersnv').val(id);
				$('#tracking').val('');
				$('#adduploadnum').modal();
			}
			
			function modify(thisdom,id,shop){
				layer.prompt(function(val, index){
					var url = '<?php echo site_url('/ordermanager/modifyordercode')?>';
					$.post(url,{'id':id,'code':val,'shop':shop},
					function (res) {
						if(res.s == 1){
							$(thisdom).html(val);
							layer.alert(res.msg);
							
						}else{
							layer.alert(res.msg);
						}
					},'json')
					
					//layer.close(index);
				});
			}
			function addtracking(){
				var url = '<?php echo site_url('/ordermanager/addtracking')?>';
				var ids = $('#ordersnv').val();
				var tracking = $('#tracking').val();
				if(ids != '' && tracking != ''){
					$.post(url,{'ids':ids,'tracking':tracking},
					function (res) {
						if(res.s == 1){
							layer.alert(res.msg,function () {
								window.location.reload();
							})
						}else{
							layer.alert(res.msg);
						}
					},'json')
				}
			}
			// 获取下单任务
			function showProduct(val,ele){
				var time = $('#'+ele).val();
				var url = '<?php echo site_url('/Ordermanager/get_task')?>';
				$.post(url,{'asin':val,'time':time},function(res){
					var data = {};
					data.status = res.s;
					if(res.s == 1){
						data.list = res.data;
					}else{
						data.list = res.msg;
					}
					$('#add_order').html(template('add_order_temp',data));
					$('#add_order_btn').html(template('add_btn_temp',data));
				},'json')
			}
			//添加订单
			function addOrder(){
				var url = '<?php echo site_url('/Ordermanager/add')?>';
				var userData = $('#add_form').serializeArray();
				var arr = getFormArray(userData);
				$.post(url,arr,function(res){
					if(res.s == 1){
						layer.alert(res.msg,function(){
							$('#addModal').modal('hide');
							layer.closeAll();
							 window.location.reload();
						});
					}else{
						layer.alert(res.msg);
					}
				},'json')
			}
            //获取商店
			function getShop(that,val,ele){
				var id = $(that).find("option:selected").attr('cid');
				console.log(id);
				var url = "<?php echo site_url('/praise/get_shop');?>";
				$.post(url,{'val':id},function(res){
					var str = '';
					if(res.s == 1){
						var data = res.data;
						for (var i = 0; i < data.length; i++) {
							str += '<option value="'+data[i].name+'">'+data[i].name+'</option>';
						}
					}else{
						str = '<option value="">该平台没有店铺</option>';
					}
					$(that).closest('.ptname').siblings('.shopname').find('.'+ele).html(str);
				},'json')
			}
            //作废订单
			function changeStatus(id){
				var url = "<?php echo site_url('/Ordermanager/change_order');?>";
				layer.confirm('请确认你要作废的订单，一旦作废所有扣款将退换给卖家', {
					  btn: ['确认','取消'] //按钮
				}, function(){
					 $.post(url,{'id':id},function(res){
						if(res.s == 1){
							layer.alert(res.msg,function(){
								window.location.reload();
							})
						}else{
							layer.alert(res.msg);
						}
					},'json')
				}, function(){
					  layer.closeAll();
				});
			}
            //查看订单详情
			function seeDetail(id){
				var url = "<?php echo site_url('/Ordermanager/get_order');?>";
				$.post(url,{'id':id},function(res){
					if(res.s == 1){
						var data = {};
						data.order = res.data[0];
						data.log = res.data[1];
						$('#seeDetail_con').html(template('modal_see_datail',data));
						$('#seeDetail_modal').modal();
					}else{
						layer.alert('该订单不存在');
					}
				},'json')	
			}
            //修改上评状态
			function editCommit(that,id,order_id){
				var url = "<?php echo site_url('/Ordermanager/get_order_comment');?>";
				var data = {};
				data.sp_time = $(that).attr('yf-time');
				data.ddnum = $(that).attr('dd-num');
				data.order_id = order_id;
				$.post(url,{'id':id,'order_id':order_id},function(res){
					if(res.s == 1){
						data.list = res.data;
						var num = res.data.comment_status;
						$('#sp_content').html(template('sp_temp',data));
						$('#spbtns').html(template('spbtns_temp',{name:'保存状态',num:num}));
                        //复制
                        var ele = $('.copy-btn');
                        ele.each(function (i,ele) {
                            var text = $(ele).attr('copy-text');
                            copy_text(ele,text);
                        })
						$('#sp_modal').modal();
					}else{
						layer.alert('订单暂时没有评论');
					}
				},'json')
			}

			// 导出excel
			function exportExcel(){
                var url = "<?php echo site_url('/Ordermanager/order_exports');?>";
                var c = $('#sx-box').serialize();
                window.location.href = url+'?'+c;
			}
		</script>
	</body>
</html>
