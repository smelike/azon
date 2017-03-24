<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('common/header'); ?>
</head>
<body class="no-skin">
<?php $this->load->view('common/navbar'); ?>
<div class="main-container ace-save-state" id="main-container">
    <?php $this->load->view('common/sidebar'); ?>
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
                    <li class="active">下单操作</li>
                </ul>
                <!-- /.breadcrumb -->
            </div>

            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="alert alert-info" role="alert">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info2 btn-sm" onclick="execute()"
                                        style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;">
                                    <span class="glyphicon glyphicon-play"></span>&nbsp;批量锁定
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- form-group-->
                <div class="row">
                    <div class="col-sm-12">
                        <form action="<?php echo site_url('order/index'); ?>" class="form-horizontal" role="form"
                              method="GET" action="">
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-4 control-label no-padding-right">任务时间</label>

                                <div class="col-sm-8">
                                    <div class="input-daterange input-group">
                                        <div class="input-daterange input-group">
                                            <input type="text" class="input-sm form-control" name="tasktime"
                                                   value="<?php echo isset($gets['tasktime']) ? $gets['tasktime'] : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-4 control-label no-padding-right">产品ASIN</label>

                                <div class="col-sm-8">
                                    <input type="text" name="asin" class="col-xs-12"
                                           value="<?php echo isset($gets['asin']) ? $gets['asin'] : ''; ?>">
                                </div>
                            </div>
                            <?php if (in_array('order+index+zxr', $priv)) { ?>
                                <?php if (isset($people) && count($people) > 0): ?>
                                    <div class="col-sm-2 form-group">
                                        <label class="col-sm-4 control-label no-padding-right">执行人</label>

                                        <div class="col-sm-8">
                                            <select class="chosen-select form-control" name="zxr">
                                                <option value="">==请选择==</option>

                                                <?php foreach ($people as $v): ?>
                                                    <option
                                                        value="<?php echo $v['id']; ?>"<?php echo isset($gets['zxr']) && $gets['zxr'] == $v['id'] ? ' selected="selected"' : ''; ?>><?php echo $v['username']; ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php } ?>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-4 control-label no-padding-right">状态</label>

                                <div class="col-sm-8">
                                    <select class="chosen-select form-control" name="finish">
                                        <option value="">==请选择==</option>
                                        <option
                                            value="1" <?php echo isset($gets['finish']) && $gets['finish'] == '1' ? 'selected="selected"' : ''; ?>>
                                            已完成
                                        </option>
                                        <option
                                            value="2" <?php echo isset($gets['finish']) && $gets['finish'] == '2' ? 'selected="selected"' : ''; ?>>
                                            待进行
                                        </option>
                                        <option
                                            value="3" <?php echo isset($gets['finish']) && $gets['finish'] == '3' ? 'selected="selected"' : ''; ?>>
                                            异常
                                        </option>
                                        <option
                                            value="5" <?php echo isset($gets['finish']) && $gets['finish'] == '5' ? 'selected="selected"' : ''; ?>>
                                            进行中
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group ptname">
                                <label class="col-sm-4 control-label no-padding-right">平台</label>

                                <div class="col-sm-8">
                                    <select class="chosen-select form-control" name="pt_name"
                                            onchange="getShop(this,this.value,'shop_data')">
                                        <option value="">==请选择==</option>
                                        <?php if (isset($platforms) && count($platforms) > 0) : ?>
                                            <?php foreach ($platforms as $item): ?>
                                                <option
                                                    value="<?php echo $item['id']; ?>" <?php echo isset($gets['pt_name']) && $gets['pt_name'] == $item['id'] ? 'selected="selected"' : ''; ?>><?php echo $item['name']; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-4 control-label no-padding-right">任务类型</label>

                                <div class="col-sm-8">
                                    <select class="chosen-select form-control" name="type_s">
                                        <option value="">==请选择==</option>
                                        <option
                                            value="1" <?php echo isset($gets['type_s']) && $gets['type_s'] == '1' ? 'selected="selected"' : ''; ?>>
                                            刷单
                                        </option>
                                        <option
                                            value="2" <?php echo isset($gets['type_s']) && $gets['type_s'] == '2' ? 'selected="selected"' : ''; ?>>
                                            刷评
                                        </option>
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
                    <div class="col-xs-12 no-padding">
                        <!-- PAGE CONTENT BEGINS -->
                        <table class="diy-table table table-bordered table-hover">
                            <caption class="diy-table-caption">
                                <span>下单任务列表</span>
                            </caption>
                            <thead>
                            <tr>
                                <th width="50">
                                    <input type="checkbox" class="table-selectAll2"/>
                                </th>
                                <th width="60">操作</th>
                                <th>编号</th>
                                <th>产品ASIN</th>
                                <th>任务时间</th>
                                <th>关联访问</th>
                                <th>快速上评</th>
                                <th>加入收藏</th>
                                <th>需求量</th>
                                <th>完成量</th>
                                <th>折后价</th>
                                <th>运费</th>
                                <th>任务类型</th>
                                <th>平台</th>
                                <th>店铺</th>
                                <th>状态</th>
                                <th>执行人</th>
                            </tr>
                            </thead>
                            <tbody id="content_n">
                            <?php if (count($order_info) > 0): ?>
                                <?php foreach ($order_info as $key => $item): ?>
                                    <?php if (isset($item['bind'])): ?>
                                        <tr colspan="14" style="height:10px;background-color:#fff"></tr>
                                    <?php endif; ?>
                                    <tr <?php if (isset($item['bind'])): ?>style="background-color:#FFFACD;"<?php endif; ?>>
                                        <td <?php if (isset($item['bind'])): ?>rowspan="2"<?php endif; ?>>
                                            <?php if ($item['status_tag'] == 2): ?>
                                                <input class="is_check select-list2" cid="<?php echo $item['id']; ?>"
                                                       type="checkbox"/>
                                            <?php endif; ?>
                                        </td>
                                        <td <?php if (isset($item['bind'])): ?>rowspan="2"<?php endif; ?>>
                                            <?php echo $item['handle']; ?>
                                        </td>
                                        <td><?php echo $item['id']; ?></td>
                                        <td><a target="_blank"
                                               href="https://<?php echo $item['url']; ?>/dp/<?php echo $item['ASIN']; ?>"><?php echo $item['ASIN']; ?></a>
                                        </td>
                                        <td><?php echo $item['tasktime']; ?></td>
                                        <td><?php if ($item['bind_ASIN'] != '否'): ?><a target="_blank"
                                                                                       href="https://<?php echo $item['url']; ?>/dp/<?php echo $item['bind_ASIN']; ?>"><?php echo $item['bind_ASIN']; ?></a><?php else: ?><?php echo $item['bind_ASIN']; ?><?php endif; ?>
                                        </td>
                                        <td><?php echo $item['fast_comment']; ?></td>
                                        <td><?php echo $item['collection']; ?></td>
                                        <td><?php echo $item['number']; ?></td>
                                        <td><?php echo $item['finish_num']; ?></td>
                                        <td><?php echo $item['c_code']; ?><?php echo $item['dprice']; ?></td>
                                        <td><?php echo $item['c_code']; ?><?php echo $item['shipping']; ?></td>
                                        <td><?php echo $item['type']; ?></td>
                                        <td><?php echo $item['platform_name']; ?></td>
                                        <td><?php echo $item['shop_name']; ?></td>
                                        <td><?php echo $item['status']; ?></td>
                                        <td><?php echo $item['username']; ?></td>
                                    </tr>
                                    <?php if (isset($item['bind'])): ?>
                                        <?php foreach ($item['bind'] as $keys => $items): ?>
                                            <tr style="background-color:#FFFACD;">
                                                <td><?php echo $items['id']; ?></td>
                                                <td><a target="_blank"
                                                       href="https://<?php echo $items['url']; ?>/dp/<?php echo $items['ASIN']; ?>"><?php echo $items['ASIN']; ?></a>
                                                </td>
                                                <td><?php echo $items['tasktime']; ?></td>
                                                <td><?php if ($items['bind_ASIN'] != '否'): ?><a target="_blank"
                                                                                                href="https://<?php echo $items['url']; ?>/dp/<?php echo $items['bind_ASIN']; ?>"><?php echo $items['bind_ASIN']; ?></a><?php else: ?><?php echo $items['bind_ASIN']; ?><?php endif; ?>
                                                </td>
                                                <td><?php echo $items['fast_comment']; ?></td>
                                                <td><?php echo $items['collection']; ?></td>
                                                <td><?php echo $items['number']; ?></td>
                                                <td><?php echo $items['finish_num']; ?></td>
                                                <td><?php echo $items['c_code']; ?><?php echo $items['dprice']; ?></td>
                                                <td><?php echo $items['c_code']; ?><?php echo $items['shipping']; ?></td>
                                                <td><?php echo $items['type']; ?></td>
                                                <td><?php echo $items['platform_name']; ?></td>
                                                <td><?php echo $items['shop_name']; ?></td>
                                                <td><?php echo $items['status']; ?></td>
                                                <td><?php echo $items['username']; ?></td>
                                            </tr>
                                        <?php endforeach;?>
											<?php endif;?>
                                        <?php endforeach;?>
                                    <?php else:?>
                                        <tr>
                                            <td align="center" colspan="11">没有数据</td>
                                        </tr>
                                    <?php endif;?>
									</tbody>
                                </table>
                                <?php echo $pagetext;?>
								
		                    </div>
		                    <!-- /.col -->
		                </div>
		                <!-- /.row -->
		            </div>
		            <!-- /.page-content -->
		        </div>
		    </div>
			</div>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div>



    </div>
</div>
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div>

<!-- 模态框（Modal） -->
<div class="modal fade" id="execute" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    任务执行人分配
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-3 control-label no-padding-right">执行人</label>

                        <div class="col-sm-9">
                            <select class="chosen-select form-control" id="executor">
                                <?php foreach ($middlers as $item): ?>
                                    <option value="<?php echo $item['id'] ?>"><?php echo $item['username'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="modal-button">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal -->
</div>

<?php $this->load->view('order_down_mod'); ?>

</body>
</html>