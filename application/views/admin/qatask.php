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
                    <li><i class="ace-icon fa fa-home home-icon"></i><a href="#">主页</a></li>
                    <li><a href="#">QA管理</a></li>
                    <li class="active">QA任务列表</li>
                </ul>
            </div>
            <div class="page-content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="alert alert-info" role="alert">
                            <div class="btn-group">
                                <button type="button" class="btn btn-danger btn-sm" onclick="batchChangeStatus()"
                                        style="-webkit-border-radius: 5px;-moz-border-radius: 5px;border-radius: 5px;">
                                    <span class="glyphicon glyphicon-ok-circle"></span>&nbsp;批量锁定
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <form class="form-horizontal" role="form" method="get">
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-4 control-label no-padding-right">产品ID</label>
                                <div class="col-sm-8">
                                    <input type="text" name="ASIN" class="col-xs-12"
                                           value="<?php echo isset($gets['ASIN']) ? $gets['ASIN'] : ''; ?>"/>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-4 control-label no-padding-right">平台</label>
                                <div class="col-sm-8">
                                    <select class="chosen-select form-control" name="platform"
                                            onchange="getShop(this.value)">
                                        <option value="">==请选择==</option>
                                        <?php foreach ($pt_data as $item): ?>
                                            <option
                                                value="<?php echo $item['id']; ?>" <?php echo isset($gets['platform']) && $gets['platform'] == $item['id'] ? 'selected="selected"' : ''; ?>><?php echo $item['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-4 control-label no-padding-right">店铺</label>
                                <div class="col-sm-8">
                                    <select class="chosen-select form-control" name="execute_shop" id="shop_s">
                                        <option value="">==请选择==</option>
                                        <?php if (isset($shops) && count($shops) > 0) : ?>
                                            <?php foreach ($shops as $item): ?>
                                                <option
                                                    value="<?php echo $item['id']; ?>" <?php echo isset($gets['execute_shop']) && $gets['execute_shop'] == $item['id'] ? 'selected="selected"' : ''; ?>><?php echo $item['name']; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-4 control-label no-padding-right">执行人</label>

                                <div class="col-sm-8">
                                    <select class="chosen-select form-control" name="execute_user">
                                        <option value="">==请选择==</option>
                                        <option value="wfp"
                                                <?php if (isset($gets['execute_user']) && $gets['execute_user'] == 'wfp') : ?>selected<?php endif; ?>>
                                            未分配
                                        </option>
                                        <?php foreach ($people as $item): ?>
                                            <option
                                                value="<?php echo $item['id']; ?>" <?php echo isset($gets['execute_user']) && $gets['execute_user'] == $item['id'] ? 'selected="selected"' : ''; ?>><?php echo $item['username']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-3 control-label no-padding-right">任务时间</label>

                                <div class="col-sm-9">
                                    <div class="input-daterange input-group">
                                        <input type="text" name="task_time"
                                               value="<?php echo isset($gets['task_time']) ? $gets['task_time'] : ''; ?>"
                                               class="input-sm form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-4 control-label no-padding-right">任务状态</label>
                                <div class="col-sm-8">
                                    <select class="chosen-select form-control" name="status">
                                        <option value="">==请选择==</option>
                                        <option
                                            value="1" <?php echo isset($gets['status']) && $gets['status'] == 1 ? 'selected="selected"' : ''; ?>>
                                            待进行
                                        </option>
                                        <option
                                            value="2" <?php echo isset($gets['status']) && $gets['status'] == 2 ? 'selected="selected"' : ''; ?>>
                                            未提问
                                        </option>
                                        <option
                                            value="3" <?php echo isset($gets['status']) && $gets['status'] == 3 ? 'selected="selected"' : ''; ?>>
                                            未回复
                                        </option>
                                        <option
                                            value="4" <?php echo isset($gets['status']) && $gets['status'] == 4 ? 'selected="selected"' : ''; ?>>
                                            未投票
                                        </option>
                                        <option
                                            value="5" <?php echo isset($gets['status']) && $gets['status'] == 5 ? 'selected="selected"' : ''; ?>>
                                            待审核
                                        </option>
                                        <option
                                            value="6" <?php echo isset($gets['status']) && $gets['status'] == 6 ? 'selected="selected"' : ''; ?>>
                                            已审核
                                        </option>
                                        <option
                                            value="8" <?php echo isset($gets['status']) && $gets['status'] == 8 ? 'selected="selected"' : ''; ?>>
                                            未通过
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <table class="diy-table table table-bordered table-hover">
                            <caption class="diy-table-caption">
                                <span>QA任务列表</span>
                            </caption>
                            <thead>
                            <tr>
                                <th width="40px" style="text-align: center">
                                    <input type="checkbox" class="table-selectAll2"/>
                                </th>
                                <th width="150px">操作</th>
                                <th>状态</th>
                                <th>产品ID</th>
                                <th>提问ID</th>
                                <th>平台</th>
                                <th>店铺</th>
                                <th>创建人</th>
                                <th>执行人</th>
                                <th>创建时间</th>
                                <th>操作费（￥）</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($data as $item): ?>
                                <tr>
                                    <td>
                                        <!-- <input class="hideBorder" type="checkbox"/> -->
                                        <input class="is_check select-list2" oid="<?php echo $item['id'];?>" type="checkbox" />
                                    </td>
                                    <td>
                                        <?php if ($item['status'] == '待进行'): ?>
                                            <button class="btn-link" type="button"
                                                    onclick="changeStatus(<?php echo $item['id']; ?>)"
                                                    style="width: 70px">锁定
                                            </button>
                                        <?php elseif ($item['execute_uid'] == ''): ?>
                                            <button class="btn-link" type="button" style="width: 70px"
                                                    data-toggle="modal" data-target="#myModal"
                                                    onclick="assign(<?php echo $item['id']; ?>)">分配
                                            </button>
                                        <?php elseif ($item['execute_uid'] != $this->uid): ?>
                                            <a href="<?php echo site_url('/qatask/detail'); ?>?id=<?php echo $item['id']; ?>">详情</a>
                                        <?php elseif ($item['status'] == '待审核' || $item['status'] == '已审核' || $item['status'] == '未通过'): ?>
                                            <a href="<?php echo site_url('/qatask/detail'); ?>?id=<?php echo $item['id']; ?>">详情</a>
                                        <?php else: ?>
                                            <button class="btn-link" type="button" style="width: 70px"
                                                    data-toggle="modal" data-target="#myModal"
                                                    onclick="assign(<?php echo $item['id']; ?>)">分配
                                            </button>
                                            <a href="<?php echo site_url('/qatask/detail'); ?>?id=<?php echo $item['id']; ?>">执行</a>
                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo $item['status']; ?></td>
                                    <td><a target="_blank"
                                           href="https://<?php echo $item['url']; ?>/dp/<?php echo $item['ASIN']; ?>"><?php echo $item['ASIN']; ?></a>
                                    </td>
                                    <td><a target="_blank"
                                           href="https://<?php echo $item['url']; ?>/forum/-/<?php echo $item['question_ID']; ?>/?asin=<?php echo $item['ASIN']; ?>"><?php echo $item['question_ID']; ?></a>
                                    </td>
                                    <td><?php echo $item['platform']; ?></td>
                                    <td><?php echo $item['shop']; ?></td>
                                    <td><?php echo $item['create_man']; ?></td>
                                    <td><?php echo $item['execute_user']; ?></td>
                                    <td><?php echo $item['create_time']; ?></td>
                                    <td><?php echo $item['total_price']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                        <?php echo $page; ?>| 操作费总金额：<?php echo $t_money;?>

                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true"
                             style="z-index: 100000">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                            &times;
                                        </button>
                                        <h4 class="modal-title">
                                            分配任务
                                        </h4>
                                    </div>
                                    <form method="POST" action="<?php echo site_url('/qatask/assign'); ?>"
                                          name="form_login" target="_top" role="form">
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="row">
                                                    <div class="col-sm-12 form-group">
                                                        <input id="task_id" name="id" type="hidden" value="">
                                                        <label
                                                            class="col-sm-3 control-label no-padding-right">分配执行人</label>

                                                        <div class="col-sm-9">
                                                            <select class="chosen-select form-control"
                                                                    name="execute_user">
                                                                <?php foreach ($people as $item): ?>
                                                                    <option
                                                                        value="<?php echo $item['id']; ?>"><?php echo $item['username']; ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">
                                                    保存
                                                </button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">关闭
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
        </div>
    </div>

    <?php $this->load->view('common/footer'); ?>

    <script type="text/javascript">
        //获取店铺
        function getShop(val) {
            var url = "<?php echo site_url('/praise/get_shop');?>";
            $.post(url, {'val': val}, function (res) {
                var str = '';
                if (res.s == 1) {
                    var data = res.data;
                    for (var i = 0; i < data.length; i++) {
                        str += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
                    }
                } else {
                    str = '<option value="">该平台没有店铺</option>';
                }
                $('#shop_s').html(str);
            }, 'json')
        }

        //分配执行人
        function assign(id) {
            $('#task_id').val(id);
        }

        //执行任务
        function changeStatus(id) {
            var url = "<?php echo site_url('/qatask/change_status');?>";
            layer.confirm('确定要执行该任务？', {
                btn: ['确认', '取消']
            }, function () {
                $.post(url, {'id': id}, function (res) {
                    if (res.s == 1) {
                        layer.msg(res.msg, {icon: 1, time: 500}, function () {
                            window.location.reload();
                        });
                    } else {
                        layer.msg(res.msg, {icon: 2});
                    }
                }, 'json')
            }, function () {
                layer.closeAll();
            });
        }
        function batchChangeStatus() {
            var arr_oid = [];
            var url = "<?php echo site_url('/qatask/change_status');?>";
            $(".select-list2").each(function (i, ele) {
                if ($(ele).prop('checked')) {
                    arr_oid.push($(ele).attr('oid'));
                }
            });
            if (arr_oid.length < 1) {
                layer.alert('选择的订单不能为空。');
                return;
            }
            layer.confirm('确认该订单已经完成？', {
                btn: ['确认', '取消']
            }, function () {
                $.post(url, {'id': arr_oid}, function (res) {
                    if (res.s == 1) {
                        layer.msg(res.msg, {icon: 1, time: 500}, function () {
                            window.location.reload();
                        });
                    } else {
                        layer.msg(res.msg, {icon: 2});
                    }
                }, 'json')
            }, function () {
                layer.closeAll();
            });
        }

        jQuery(function ($) {
            $('.input-daterange').datepicker({
                todayBtn: "linked",
                autoclose: true,
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                startDate: new Date()
            }).on('changeDate', function (e) {
                var startTime = e.date;
                $('.input-daterange').datepicker('setStartDate', startTime);
            });
            //
            $(".diy-table").find("button[disabled]").css("color", "#999");
        });
    </script>
    <!-- popup-->
</body>
</html>
