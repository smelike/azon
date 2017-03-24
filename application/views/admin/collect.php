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
                    <li><a href="#">收藏任务</a></li>
                    <li class="active">收藏管理</li>
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
                        <form class="form-horizontal" method="get" action="" role="form">
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-4 control-label no-padding-right">产品ID</label>

                                <div class="col-sm-8">
                                    <input type="text" class="col-xs-12" name="asin"
                                           value="<?php echo isset($gets['asin']) ? $gets['asin'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-4 control-label no-padding-right">平台</label>

                                <div class="col-sm-8">
                                    <select class="chosen-select form-control" name="platform"
                                            onchange="getShop(this.value)">
                                        <option value="">==请选择==</option>
                                        <?php if (isset($platforms) && count($platforms) > 0) : ?>
                                            <?php foreach ($platforms as $item): ?>
                                                <option
                                                    value="<?php echo $item['id']; ?>" <?php echo isset($gets['platform']) && $gets['platform'] == $item['id'] ? 'selected' : ''; ?>>
                                                    <?php echo $item['name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-4 control-label no-padding-right">店铺</label>

                                <div class="col-sm-8">
                                    <select class="chosen-select form-control" name="shop" id="shop_s">
                                        <?php if (isset($shops) && count($shops) > 0) : ?>
                                            <?php foreach ($shops as $item): ?>
                                                <option
                                                    value="<?php echo $item['id']; ?>" <?php echo isset($gets['shop']) && $gets['shop'] == $item['id'] ? 'selected' : ''; ?>>
                                                    <?php echo $item['name']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">请选择</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-4 control-label no-padding-right">执行人</label>

                                <div class="col-sm-8">
                                    <select class="chosen-select form-control" name="executor">
                                        <option value="">==请选择==</option>
                                        <option
                                            value="wfp" <?php echo isset($gets['executor']) && $gets['executor'] == 'wfp' ? 'selected' : '' ?>>
                                            未分配
                                        </option>
                                        <?php if (isset($executor) && count($executor) > 0) : ?>
                                            <?php foreach ($executor as $item): ?>
                                                <option
                                                    value="<?php echo $item['id']; ?>" <?php echo isset($gets['executor']) && $gets['executor'] == $item['id'] ? 'selected' : ''; ?>>
                                                    <?php echo $item['username']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-4 control-label no-padding-right">任务状态</label>

                                <div class="col-sm-8">
                                    <select class="chosen-select form-control" name="status">
                                        <option value="">全部</option>
                                        <option
                                            value="1" <?php echo isset($gets['status']) && $gets['status'] == 1 ? 'selected' : ''; ?>>
                                            待进行
                                        </option>
                                        <option
                                            value="2" <?php echo isset($gets['status']) && $gets['status'] == 2 ? 'selected' : ''; ?>>
                                            进行中
                                        </option>
                                        <option
                                            value="3" <?php echo isset($gets['status']) && $gets['status'] == 3 ? 'selected' : ''; ?>>
                                            待确认
                                        </option>
                                        <option
                                            value="4" <?php echo isset($gets['status']) && $gets['status'] == 4 ? 'selected' : ''; ?>>
                                            已完成
                                        </option>
                                        <option
                                            value="6" <?php echo isset($gets['status']) && $gets['status'] == 6 ? 'selected' : ''; ?>>
                                            审核不通过
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-3 control-label no-padding-right">创建时间</label>

                                <div class="col-sm-9">
                                    <div class="input-daterange input-group">
                                        <input type="text" class="input-sm form-control" name="create_time"
                                               value="<?php echo isset($gets['create_time']) ? $gets['create_time'] : ''; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 form-group">
                                <label class="col-sm-3 control-label no-padding-right">任务时间</label>

                                <div class="col-sm-9">
                                    <div class="input-daterange input-group">
                                        <input type="text" class="input-sm form-control" name="start_time"
                                               value="<?php echo isset($gets['start_time']) ? $gets['start_time'] : ''; ?>">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-exchange"></i>
                                                    </span>
                                        <input type="text" class="input-sm form-control" name="end_time"
                                               value="<?php echo isset($gets['end_time']) ? $gets['end_time'] : ''; ?>">
                                    </div>
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
                                <span>收藏任务列表</span>
                            </caption>
                            <thead>
                            <tr>
                                <th width="50px"><input type="checkbox" class="table-selectAll2"/></th>
                                <th width="150px">操作</th>
                                <th>状态</th>
                                <th>产品ID</th>
                                <th>平台</th>
                                <th>店铺</th>
                                <th>执行人</th>
                                <th>创建时间</th>
                                <th>开始时间</th>
                                <th>结束时间</th>
                                <th>任务数量</th>
                                <th>操作费（￥）</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($tasks) && count($tasks) > 0): ?>
                                <?php foreach ($tasks as $a): ?>
                                    <tr>
                                        <td><input class="is_check select-list2" oid="<?php echo $a['id']; ?>"
                                                   type="checkbox"/></td>
                                        <td data-keyword="<?php echo $a['key_word']; ?>"
                                            data-remark="<?php echo $a['remark']; ?>">
                                            <button class="btn-link" type="button"
                                                    onclick="seedetail(<?php echo $a['id']; ?>)" style="width: 40px;">详情
                                            </button>
                                            <?php if ($a['status'] == '1'): ?>
                                                <button class="btn-link" type="button"
                                                        onclick="unlock(<?php echo $a['id']; ?>)" style="width: 40px;">
                                                    锁定
                                                </button>
                                            <?php else: ?>
                                                <?php if ($a['status'] == 2): ?>
                                                    <button class="btn-link" type="button"
                                                            onclick="allot(<?php echo $a['id']; ?>)"
                                                            style="width: 40px;">分配
                                                    </button>
                                                <?php endif; ?>
                                                <?php if ($a['is_operator'] == 1): ?>
                                                    <?php if ($a['status'] == 2): ?>
                                                        <button class="btn-link" type="button"
                                                                onclick="complete(this,<?php echo $a['id']; ?>)"
                                                                style="width: 40px;">执行
                                                        </button>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $a['_status']; ?></td>
                                        <td><?php echo $a['ASIN']; ?></td>
                                        <td><?php echo $a['platform']; ?></td>
                                        <td><?php echo $a['execute_shop']; ?></td>
                                        <td><?php echo $a['execute_user']; ?></td>
                                        <td><?php echo $a['create_time']; ?></td>
                                        <td><?php echo $a['taskstart_time']; ?></td>
                                        <td><?php echo $a['taskend_time']; ?></td>
                                        <td><?php echo $a['number']; ?></td>
                                        <td><?php echo $a['total_price']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr><td align="center" colspan="12">没有数据</td></tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                                <div><?php echo $pagetext;?>| 操作费总金额：<?php echo $t_money;?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
    <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
</a>
</div>

<div class="modal fade" id="executor_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    提示信息
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form method="POST" name="form_login" target="_top" class="form-horizontal col-md-12" role="form">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label class="col-sm-3 control-label no-padding-right">分配执行人</label>

                                <div class="col-sm-9">
                                    <select class="chosen-select form-control" id="executor">
                                        <?php if (isset($people) && count($people) > 0): ?>
                                            <?php foreach ($people as $v): ?>
                                                <option
                                                    value="<?php echo $v['id']; ?>"><?php echo $v['username']; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <div class="modal-footer" id="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script id="modal-footer-temp" type="text/html">
    <button type="button" class="btn btn-primary" onclick="allotExecutor({{id}})">
        保存
    </button>
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
    </button>
</script>
<script id="see_detail" type="text/html">
    <table class="table">
        <tbody>
        <tr>
            <td colspan="2">产品ID: {{#ASIN}}</td>
        </tr>
        <tr>
            <td>平台名称: {{platform}}</td>
            <td>店铺名称: {{shop}}</td>
        </tr>
        <tr>
            <td>执行人: {{executor}}</td>
            <td>创建时间: {{create_time}}</td>
        </tr>
        <tr>
            <td>开始时间: {{start_time}}</td>
            <td>结束时间: {{end_time}}</td>
        </tr>
        <tr>
            <td>任务数量: {{number}}</td>
            <td>操作费: {{price}}</td>
        </tr>
        <tr>
            <td colspan="2">关键词: {{keyword}}</td>
        </tr>
        <tr>
            <td colspan="2">任务描述: {{desction}}</td>
        </tr>
        </tbody>
    </table>
</script>
<script id="see_alldetail" type="text/html">
    <table class="table">
        <tbody>
        <tr>
            <td colspan="2">ASIN: {{#data.ASIN}}</td>
        </tr>
        <tr>
            <td>平台名称: {{data.platform}}</td>
            <td>店铺名称: {{data.execute_shop}}</td>
        </tr>
        <tr>
            <td>执行人: {{data.execute_user}}</td>
            <td>创建时间: {{data.create_time}}</td>
        </tr>
        <tr>
            <td>开始时间: {{data.taskstart_time}}</td>
            <td>结束时间: {{data.taskend_time}}</td>
        </tr>
        <tr>
            <td>任务单价: {{data.price}}</td>
            <td>任务数量: {{data.number}}</td>
        </tr>
        <tr>
            <td colspan="2">操作费: {{data.total_price}}</td>
        </tr>
        <tr>
            <td colspan="2">关键词: {{data.key_word}}</td>
        </tr>
        <tr>
            <td colspan="2">详情:
                <div style="max-height: 300px;overflow: auto;">{{data.remark}}</div>
            </td>
        </tr>
        {{if data.status == 6}}
        <tr>
            <td colspan="2">
                审核不通过原因：
                <div style="max-height: 300px;overflow: auto;">{{data.check_remark}}</div>
            </td>
        </tr>
        {{else if data.status == 4}}
        <tr>
            <td colspan="2">
                审核通过备注：
                <div style="max-height: 300px;overflow: auto;">{{data.check_remark}}</div>
            </td>
        </tr>
        {{/if}}
        </tbody>
    </table>
</script>

<?php $this->load->view('common/footer'); ?>
<script type="text/javascript">
    function seedetail(id) {
        var url = "<?php echo site_url('/collect/get_detail');?>";
        $.post(url, {'id': id}, function (res) {
            if (res.s == 1) {
                var html = template('see_alldetail', {data: res.data});
                layer.open({
                    title: '详情',
                    area: ['500px', 'auto'],
                    anim: 2,
                    content: html,
                    btn: false
                });
            } else {
                layer.msg(res.msg, {icon: 2});
            }
        }, 'json')
    }
    $(function () {
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
        $(".diy-table").find("button[disabled]").css("color", "#999");
    });
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
    function allot(id) {
        $('#modal-footer').html(template('modal-footer-temp', {id: id}));
        $('#executor_modal').modal();
    }
    function allotExecutor(id) {
        var url = '<?php echo site_url("/collect/allot_executor");?>';
        var executor = $('#executor').val();
        $.post(url, {'id': id, 'executor': executor}, function (res) {
            if (res.s == 1) {
                layer.msg(res.msg, {icon: 1, time: 500}, function () {
                    window.location.reload();
                });
            } else {
                layer.msg(res.msg, {icon: 2});
            }
        }, 'json')
    }
    function unlock(id) {
        var url = '<?php echo site_url("/collect/unlock_task");?>';
        layer.confirm('你确定要锁定该任务?', {
            btn: ['锁定', '取消']
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
        var url = "<?php echo site_url('/collect/unlock_task');?>";
        $(".select-list2").each(function (i, ele) {
            if ($(ele).prop('checked')) {
                arr_oid.push($(ele).attr('oid'));
            }
        });
        if (arr_oid.length < 1) {
            layer.alert('选择的订单不能为空。');
            return;
        }
        layer.confirm('你确定要锁定该任务？', {
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
    function complete(_this, id) {
        var url = '<?php echo site_url("/collect/finish_task");?>';
        var data = {};
        data.ASIN = $(_this).closest('tr').find('td').eq(2).html();
        data.platform = $(_this).closest('tr').find('td').eq(3).html();
        data.shop = $(_this).closest('tr').find('td').eq(4).html();
        data.executor = $(_this).closest('tr').find('td').eq(5).html();
        data.create_time = $(_this).closest('tr').find('td').eq(6).html();
        data.start_time = $(_this).closest('tr').find('td').eq(7).html();
        data.end_time = $(_this).closest('tr').find('td').eq(8).html();
        data.number = $(_this).closest('tr').find('td').eq(9).html();
        data.price = $(_this).closest('tr').find('td').eq(10).html();
        data.keyword = $(_this).closest('tr').find('td').eq(0).data('keyword');
        data.desction = $(_this).closest('tr').find('td').eq(0).data('remark');
        var html = template('see_detail', data);
        layer.open({
            title: '执行',
            area: ['500px', 'auto'],
            anim: 2,
            content: html,
            btn: ['确认', '关闭'],
            btn1: function (index, layero) {
                $.post(url, {'id': id}, function (res) {
                    if (res.s == 1) {
                        layer.msg(res.msg, {icon: 1, time: 500}, function () {
                            window.location.reload();
                        });
                    } else {
                        layer.msg(res.msg, {icon: 2});
                    }
                }, 'json')
            }, btn3: function (index, layero) {
                layer.close(index);
            }
        });
    }
</script>
</body>
</html>
