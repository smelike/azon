<!DOCTYPE html>
<html lang="en">
<head>
    <?php $this->load->view('common/header');?>
</head>

<body class="no-skin">
<?php $this->load->view('common/navbar');?>

<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <div class="main-container ace-save-state" id="main-container">
        <?php $this->load->view('common/sidebar');?>
        <div class="main-content">
            <div class="main-content-inner">
                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                    <ul class="breadcrumb">
                        <li><i class="ace-icon fa fa-home home-icon"></i><a href="#">主页</a></li>
                        <li><a href="#">刷单刷评管理</a></li>
                        <li class="active">任务管理</li>
                    </ul>
                </div>
                <div class="page-content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="alert alert-info" role="alert">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info2 btn-sm" onclick="execute()" style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;">
                                        <span class="glyphicon glyphicon-play"></span>&nbsp;分配执行人
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <form class="form-horizontal"  action="<?php echo site_url('task/index');?>" role="form" id="task_s" method="GET" action="">
                                <div class="col-sm-2 form-group">
                                    <label class="col-sm-3 control-label no-padding-right">产品ASIN</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-xs-12" name="product_name" value="<?php echo isset($gets['product_name'])? $gets['product_name'] : '';?>">
                                    </div>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label class="col-sm-3 control-label no-padding-right">平台</label>
                                    <div class="col-sm-9">
                                        <select class="chosen-select form-control" name="platform_s" onchange="getShop(this.value)">
                                            <option value="">==全部==</option>
                                            <?php if(count($platform_data) > 0):?>
                                                <?php foreach ($platform_data as $item):?>
                                                    <option value="<?php echo $item['id']?>" <?php echo isset($gets['platform_s']) && $gets['platform_s'] == $item['id']? 'selected="selected"':'';?>><?php echo $item['name']?></option>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label class="col-sm-3 control-label no-padding-right">店铺</label>
                                    <div class="col-sm-9">
                                        <select class="chosen-select form-control" name="shop_s" id="shop_s">
                                            <?php if(isset($shops) && count($shops) > 0) :?>
                                                <?php foreach ($shops as $item):?>
                                                    <option value="<?php echo $item['id'];?>" <?php echo isset($gets['shop_s']) && $gets['shop_s'] == $item['id']? 'selected="selected"':'';?>><?php echo $item['name'];?></option>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label class="col-sm-3 control-label no-padding-right">关联访问</label>
                                    <div class="col-sm-9">
                                        <select class="chosen-select form-control" name="is_relevance">
                                            <option value="">==请选择==</option>
                                            <option value="1" <?php echo isset($gets['is_relevance']) && $gets['is_relevance'] == '1'? 'selected="selected"':'';?>>是</option>
                                            <option value="2" <?php echo isset($gets['is_relevance']) && $gets['is_relevance'] == '2'? 'selected="selected"':'';?>>否</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label class="col-sm-3 control-label no-padding-right">捆绑购买</label>
                                    <div class="col-sm-9">
                                        <select class="chosen-select form-control" name="is_bind">
                                            <option value="">==请选择==</option>
                                            <option value="1" <?php echo isset($gets['is_bind']) && $gets['is_bind'] == '1'? 'selected="selected"':'';?>>是</option>
                                            <option value="2" <?php echo isset($gets['is_bind']) && $gets['is_bind'] == '2'? 'selected="selected"':'';?>>否</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label class="col-sm-3 control-label no-padding-right">加入收藏</label>
                                    <div class="col-sm-9">
                                        <select class="chosen-select form-control" name="is_collect">
                                            <option value="">==请选择==</option>
                                            <option value="1" <?php echo isset($gets['is_collect']) && $gets['is_collect'] == '1'? 'selected="selected"':'';?>>是</option>
                                            <option value="2" <?php echo isset($gets['is_collect']) && $gets['is_collect'] == '2'? 'selected="selected"':'';?>>否</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label class="col-sm-3 control-label no-padding-right">优惠券</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-xs-12" name="coupon_s" value="<?php echo isset($gets['coupon_s'])? $gets['coupon_s'] : '';?>">
                                    </div>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label class="col-sm-3 control-label no-padding-right">执行人</label>
                                    <div class="col-sm-9">
                                        <select class="chosen-select form-control" name="execute_man">
                                            <option value="">==请选择==</option>
                                            <option value="noallot">未分配执行人</option>
                                            <?php foreach ($middlers as $item):?>
                                                <option value="<?php echo $item['id']?>" <?php echo isset($gets['execute_man']) && $gets['execute_man'] == $item['id']? 'selected="selected"':'';?>><?php echo $item['username']?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label class="col-sm-3 control-label no-padding-right">任务类型</label>
                                    <div class="col-sm-9">
                                        <select class="chosen-select form-control" name="task_type_s">
                                            <option value="">==请选择==</option>
                                            <option value="1" <?php echo isset($gets['task_type_s']) && $gets['task_type_s'] == '1'? 'selected="selected"':'';?>>刷单</option>
                                            <option value="2" <?php echo isset($gets['task_type_s']) && $gets['task_type_s'] == '2'? 'selected="selected"':'';?>>刷评</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-2 form-group">
                                    <label class="col-sm-3 control-label no-padding-right">关键词</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-xs-12" name="key_word_s" value="<?php echo isset($gets['key_word_s'])? $gets['key_word_s'] : '';?>">
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
                    <div class="row">
                        <div class="col-xs-12 no-padding">
                            <div class="col-sm-12">
                                <div class="brush-table-box" style="overflow: hidden">
                                    <table class="brush-table" style="overflow: hidden">
                                        <caption>
                                            <span>任务列表</span>
                                        </caption>
                                        <tbody>
                                        <?php if(count($task_data) > 0):?>
                                            <tr>
                                                <td style="width: 670px;border: none">
                                                    <div style="width: 670px;">
                                                        <table style="border: none">
                                                            <thead>
                                                            <tr>
                                                                <th width="50">
                                                                    <input type="checkbox" class="table-selectAll2"/>
                                                                </th>
                                                                <th width="120">
                                                                    操作
                                                                </th>
                                                                <th width="100">产品ASIN</th>
                                                                <th width="100">平台名称</th>
                                                                <th width="100">执行店铺</th>
                                                                <th width="100">添加人</th>
                                                                <th width="100">类型</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody id="content_n">
                                                            <?php foreach ($task_data as $item):?>
                                                                <tr>
                                                                    <td>
                                                                        <input bind-id="<?php echo $item['bind_id'];?>" class="is_check select-list2" cid="<?php echo $item['id'];?>" type="checkbox" />
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                            $end = str_replace('-', '', $item['taskend_time']);
                                                                            $end = (int) $end;
                                                                            if ($end >= date('Ymd', time())) {
                                                                        ?>
                                                                        <button class="btn-link" bind-id="<?php echo $item['bind_id'];?>" type="button" onclick="editExecutor(this,<?php echo $item['id'];?>)">
                                                                            <?php if (empty($item['executeuser'])){ echo '分配执行人';} else { echo "修改执行人"; }?>
                                                                        </button>
                                                                        <?php } else {?>
                                                                                <button class="btn-link" bind-id="<?php echo $item['bind_id'];?>" type="button" disabled>
                                                                                    <?php if (empty($item['executeuser'])){ echo '分配执行人';} else { echo "修改执行人"; }?>
                                                                                </button>
                                                                        <?php };?>
                                                                    </td>
                                                                    <td><a target="_blank" href="https://<?php echo $item['url'];?>/dp/<?php echo $item['ASIN'];?>"><?php echo $item['ASIN'];?></a></td>
                                                                    <td><?php echo $item['platform_name'];?></td>
                                                                    <td><?php echo $item['shop_name'];?></td>
                                                                    <td><?php echo $item['adduser'];?></td>
                                                                    <td><?php echo $item['type'];?></td>
                                                                </tr>
                                                            <?php endforeach;?>
                                                            </tbody>
                                                        </table>
                                                        <div style="width: 670px;height: 18px"></div>
                                                    </div>
                                                </td>
                                                <td style="width: 1000px;border: none">
                                                    <div style="width:1000px;overflow-x: scroll">
                                                        <table width="2000">
                                                            <thead>
                                                            <tr>
                                                                <th width="100">下单数量</th>
                                                                <th width="100">写评人</th>
                                                                <th width="200">添加时间</th>
                                                                <th width="100">开始时间</th>
                                                                <th width="100">结束时间</th>
                                                                <th width="100">售价</th>
                                                                <th width="100">折扣比例</th>
                                                                <th width="100">折后价</th>
                                                                <th width="150">优惠券</th>
                                                                <th width="100">运费</th>
                                                                <th width="100">佣金比例</th>
                                                                <th width="100">关联访问</th>
                                                                <th width="100">捆绑购买</th>
                                                                <th width="100">加入收藏</th>
                                                                <th width="150">关键词</th>
                                                                <th width="100">执行人</th>
                                                                <th width="100">汇率</th>
                                                                <th width="100">支出合计</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php foreach ($task_data as $item):?>
                                                                <tr>
                                                                    <td><?php echo $item['number'];?></td>
                                                                    <td><?php echo $item['write_user'];?></td>
                                                                    <td><?php echo $item['create_time'];?></td>
                                                                    <td><?php echo $item['taskstart_time'];?></td>
                                                                    <td><?php echo $item['taskend_time'];?></td>
                                                                    <td><?php echo $item['c_code'];?><?php echo $item['price'];?></td>
                                                                    <td><?php echo $item['discount'];?></td>
                                                                    <td><?php echo $item['c_code'];?><?php echo $item['dprice'];?></td>
                                                                    <td><?php echo $item['coupon'];?></td>
                                                                    <td><?php echo $item['c_code'];?><?php echo $item['shipping'];?></td>
                                                                    <td><?php echo $item['commrate'];?></td>
                                                                    <td><?php echo $item['bind_ASIN'];?></td>
                                                                    <td><?php echo $item['bind_product'];?></td>
                                                                    <td><?php echo $item['collection'];?></td>
                                                                    <td>
                                                                        <?php echo $item['key_word'];?>
                                                                    </td>
                                                                    <td><?php echo $item['executeuser'];?></td>
                                                                    <td><?php echo $item['rate'];?></td>
                                                                    <td>￥<?php echo $item['total_money'];?></td>
                                                                </tr>
                                                            <?php endforeach;?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php else:?>
                                            <tr>
                                                <td colspan="25" align="center">没有数据</td>
                                            </tr>
                                        <?php endif;?>
                                        </tbody>
                                    </table>
                                </div>
									<?php echo $pagetext;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
<!-- assign executor and page script -->
<?php $this->load->view('task_mod_assign.php');?>
</body>
</html>
