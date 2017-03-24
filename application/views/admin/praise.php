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
                    <li><a href="#">刷单刷评管理</a></li>
                    <li class="active">评价点赞</li>
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
                        <form class="form-horizontal" role="form" method="GET">
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="cp_s">产品ASIN</label>

                                <div class="col-sm-9">
                                    <input type="text" name="ASIN" class="col-xs-12"
                                           value="<?php echo isset($gets['ASIN']) ? $gets['ASIN'] : ''; ?>">
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="td_s">执行人</label>
                                <div class="col-sm-9">
                                    <?php if (isset($people) && count($people) > 0): ?>
                                        <select class="chosen-select form-control" name="operator">
                                            <option value="">==全部==</option>
                                            <option
                                                value="wfp" <?php echo isset($gets['operator']) && $gets['operator'] == 'wfp' ? 'selected' : '' ?>>
                                                未分配
                                            </option>
                                            <?php foreach ($people as $item): ?>
                                                <option
                                                    value="<?php echo $item['id']; ?>" <?php echo isset($gets['operator']) && $gets['operator'] == $item['id'] ? 'selected' : '' ?>><?php echo $item['username']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group ptname">
                                <label class="col-sm-3 control-label no-padding-right" for="pt_s">平台名称</label>
                                <div class="col-sm-9">
                                    <select class="chosen-select form-control" name="platform"
                                            onchange="getShop(this,this.value,'shop_show_s')">
                                        <option value="">==全部==</option>
                                        <?php if (isset($pt_d) && count($pt_d) > 0) : ?>
                                            <?php foreach ($pt_d as $item): ?>
                                                <option
                                                    value="<?php echo $item['id']; ?>" <?php echo isset($gets['platform']) && $gets['platform'] == $item['id'] ? 'selected' : '' ?>><?php echo $item['name']; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group shopname">
                                <label class="col-sm-3 control-label no-padding-right" for="form-ok-6">店铺</label>
                                <div class="col-sm-9">
                                    <select class="chosen-select form-control shop_show_s" name="shop" id="shop_show_s">
                                        <option value="">请选择店铺</option>
                                        <?php if (isset($shops) && count($shops) > 0) : ?>
                                            <?php foreach ($shops as $item): ?>
                                                <option
                                                    value="<?php echo $item['id']; ?>" <?php echo isset($gets['shop']) && $gets['shop'] == $item['id'] ? 'selected="selected"' : ''; ?>><?php echo $item['name']; ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-2 form-group">
                                <label class="col-sm-3 control-label no-padding-right" for="zt_s">状态</label>
                                <div class="col-sm-9">
                                    <select class="chosen-select form-control" name="status">
                                        <option value="">==全部==</option>
                                        <option
                                            value="1" <?php echo isset($gets['status']) && $gets['status'] == '1' ? 'selected' : '' ?>>
                                            待进行
                                        </option>
                                        <option
                                            value="2" <?php echo isset($gets['status']) && $gets['status'] == '2' ? 'selected' : '' ?>>
                                            进行中
                                        </option>
                                        <option
                                            value="3" <?php echo isset($gets['status']) && $gets['status'] == '3' ? 'selected' : '' ?>>
                                            待确认
                                        </option>
                                        <option
                                            value="4" <?php echo isset($gets['status']) && $gets['status'] == '4' ? 'selected' : '' ?>>
                                            已完成
                                        </option>
                                        <option
                                            value="5" <?php echo isset($gets['status']) && $gets['status'] == '5' ? 'selected' : '' ?>>
                                            审核不通过
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3 form-group">
                                <label class="col-sm-3 control-label no-padding-right">任务时间</label>

                                <div class="col-sm-9">
                                    <div class="input-daterange input-group">
                                        <div class="input-daterange input-group">
                                            <input type="text" class="input-sm form-control" name="time_start"
                                                   value="<?php echo isset($gets['time_start']) ? $gets['time_start'] : ''; ?>">
                                                    <span class="input-group-addon">
															<i class="fa fa-exchange"></i>
														</span>
                                            <input type="text" class="input-sm form-control" name="time_end"
                                                   value="<?php echo isset($gets['time_end']) ? $gets['time_end'] : ''; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="clear: both"></div>
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
                        <table id="praise_info" class="diy-table table table-bordered table-hover">
                            <caption class="diy-table-caption"><span>点赞任务列表</span></caption>
                            <thead>
                            <tr>
                                <th width="50px"><input type="checkbox" class="table-selectAll2"/></th>
                                <th>操作</th>
                                <th>状态</th>
                                <th>产品ASIN</th>
                                <th>平台</th>
                                <th>添加人</th>
                                <th>添加时间</th>
                                <th>执行人</th>
                                <th>开始时间</th>
                                <th>结束时间</th>
                                <th>需求数量</th>
                                <th>操作费</th>
                            </tr>
                            </thead>
                            <tbody id="data_tr">
                            <?php if (isset($orders) && count($orders) > 0): ?>
                                <?php foreach ($orders as $item): ?>
                                    <tr>
                                        <td><input class="is_check select-list2" oid="<?php echo $item['id']; ?>"
                                                   type="checkbox"/></td>
                                        <td>
                                            <?php if ($item['status'] == '1'): ?>
                                                <button class="btn-link" type="button" style="width: 40px;"
                                                        onclick="lockOrder(<?php echo $item['id']; ?>)">锁定
                                                </button>
                                            <?php else: ?>
                                                <?php if ($item['status'] == '2'): ?>
                                                    <button class="btn-link" type="button"
                                                            onclick="editOperator(<?php echo $item['id']; ?>)">分配
                                                    </button>
                                                <?php endif; ?>
                                                <?php if ($item['is_operator'] == 1): ?>
                                                    <?php if ($item['status'] == '2'): ?>
                                                        <button class="btn-link" type="button"
                                                                onclick="submitChange(this,<?php echo $item['id']; ?>)"
                                                                style="width: 40px;">执行
                                                        </button>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <button class="btn-link" type="button" style="width: 40px;"
                                                    onclick="show(<?php echo $item['id']; ?>)">详情
                                            </button>
                                        </td>
                                        <td><?php echo $item['_status']; ?></td>
                                        <td><a target="_blank"
                                               href="https://<?php echo $item['url']; ?>/dp/<?php echo $item['ASIN']; ?>"><?php echo $item['ASIN']; ?></a>
                                        </td>
                                        <td><?php echo $item['name']; ?></td>
                                        <td><?php echo $item['create_man']; ?></td>
                                        <td><?php echo $item['create_time']; ?></td>
                                        <td><?php echo $item['operator']; ?></td>
                                        <td><?php echo $item['taskstart_time']; ?></td>
                                        <td><?php echo $item['taskend_time']; ?></td>
                                        <td><?php echo $item['number']; ?></td>
                                        <td>￥<?php echo $item['price']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="12" align="center">没有数据</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <?php echo $pagetext; ?>| 操作费总金额：<?php echo $t_money;?>
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
<div class="modal fade" id="operatorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">执行人分配</h4>
            </div>
            <div class="modal-body">
                <select class="chosen-select form-control" name="operator">
                    <?php if (isset($people) && count($people) > 0): ?>
                        <?php foreach ($people as $item): ?>
                            <option value="<?php echo $item['id']; ?>"><?php echo $item['username']; ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary">保存</button>
            </div>
        </div>
    </div>
</div>
<!-- 添加modal -->
<div class="modal fade" id="show_Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="margin: 5% auto 0;width: 1060px;">
        <div class="modal-content" id="show_modal_content"></div>
    </div>
</div>
<script id="operator" type="text/html">
    <div class="form-group" style="padding:20px">
        <span>选择执行人</span>
        <select class="chosen-select form-control" name="operator" id="_operator">
            <?php if (isset($people) && count($people) > 0): ?>
                <?php foreach ($people as $item): ?>
                    <option value="<?php echo $item['id']; ?>"><?php echo $item['username']; ?></option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
    </div>
</script>
<script id="modal_content" type="text/html">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                class="sr-only">Close</span></button>
        <h4 class="modal-title">修改状态</h4>
    </div>
    <div class="modal-body">
        <div class="tc_login">
            <div class="row">
                <div class="col-xs-12 idBox">
                    <div class="row" id="edit_cp_content">
                        <input type="hidden" value="{{task.id}}" name="taskid">

                        <div class="col-sm-6 form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-ok-add-1">产品ASIN</label>

                            <div class="col-sm-9">
                                <span><a target="_blank"
                                         href="https://{{task.url}}/dp/{{task.ASIN}}?/keywords={{task.key_words}}">{{task.ASIN}}</a></span>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group ptname">
                            <label class="col-sm-3 control-label no-padding-right" for="form-ok-add-2">平台名称</label>

                            <div class="col-sm-9">
                                <span>{{task.platform_name}}</span>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group shopname">
                            <label class="col-sm-3 control-label no-padding-right" for="form-ok-add-3">店铺</label>

                            <div class="col-sm-9">
                                <span>{{task.shop_name}}</span>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="col-sm-3 control-label no-padding-right">任务时间</label>

                            <div class="col-sm-9">
                                <div class="input-daterange input-group">
                                    <div class="input-daterange input-group">
                                        <span>{{task.taskstart_time}}</span>
                                        <span> 到 </span>
                                        <span>{{task.taskend_time}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div style="clear: both"></div>
                        <div class="col-sm-6 form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-ok-add-4">关键词</label>

                            <div class="col-sm-9">
                                <span>{{task.key_word}}</span>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="col-sm-3 control-label no-padding-right" for="form-ok-add-4">状态</label>

                            <div class="col-sm-9">
                                {{if task.status == '1'}}
                                <span>待进行</span>
                                {{else if task.status == '2'}}
                                <span>进行中</span>
                                {{else if task.status == '3'}}
                                <span>待确认</span>
                                {{else if task.status == '4'}}
                                <span>已完成</span>
                                {{else if task.status == '5'}}
                                <span>审核不通过</span>
                                {{/if}}
                            </div>
                        </div>
                        {{if task.check_remark != '' && task.check_remark != null}}
                        <div class="col-sm-6 form-group ptname">
                            <label class="col-sm-3 control-label no-padding-right" for="form-ok-add-2">审核结果备注:</label>

                            <div class="col-sm-9">
                                <div style="max-height: 300px;overflow: auto;"> {{task.check_remark}}</div>
                            </div>
                        </div>
                        {{/if}}
                    </div>
                    <div class="row temp_row" id="edit_pl_content">
                        {{each task_pl as v i}}
                        <div class="col-sm-12 addID">
                            <div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>
                            <div>
                                <span style="margin-right: 20px">评价ID :<a target="_blank"
                                                                          href="https://{{task.url}}/review/{{v.commentID}}/ref=cm_cr_dp_title?ie=UTF8&amp;ASIN={{task.ASIN}}">{{v.commentID}}</a></span>
                                <span style="margin-right: 20px">星级: {{v.star}}星</span>
                                <span style="margin-right: 20px">当前数量: {{v.now_yes}} of {{v.now_total}}</span>
                                <span style="margin-right: 20px">需求数量：{{if v.add_yes > 0}}YES: <font color="red">{{v.add_yes}}</font> {{/if}} {{if v.add_no > 0}}NO: <font
                                        color="red">{{v.add_no}}</font>{{/if}} </span>
                                <span style="margin-right: 20px"> 总数: {{v.now_yes+v.add_yes}} of {{v.now_total+v.add_yes+v.add_no}}</span>
                            </div>
                        </div>
                        {{/each}}
                    </div>
                </div>
                <div class="col-sm-12" id="add_temp_btn"></div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
    </div>
</script>
<script id="see_detail_s" type="text/html">
    <table class="table">
        <tbody>
        <tr>
            <td colspan="2">产品ID: {{data[0].ASIN}}</td>
        </tr>
        <tr>
            <td>平台名称: {{data[0].platform_name}}</td>
            <td>店铺名称: {{data[0].shop_name}}</td>
        </tr>
        <tr>
            <td colspan="2">创建时间: {{data[0].create_time}}</td>
        </tr>
        <tr>
            <td>开始时间: {{data[0].taskstart_time}}</td>
            <td>结束时间: {{data[0].taskend_time}}</td>
        </tr>
        <tr>
            <td>任务数量: {{data[0].number}}</td>
            <td>操作费: {{data[0].price}}</td>
        </tr>
        </tbody>
    </table>
    <table class="table">
        <tbody>
        {{each data[1] as d i}}
        <tr>
            <td width="160">评价ID : {{d.commentID}}</td>
            <td width="160">当前数量 : {{d.now_yes}} of {{d.now_total}}</td>
            <td width="160">需求数量 : YES :{{d.add_yes}} NO: {{d.add_no}}</td>
            <td width="160">总数: {{d.now_yes+d.add_yes}} of {{d.now_total+d.add_yes+d.add_no}}</td>
        </tr>
        {{/each}}
        </tbody>
    </table>
</script>
<?php $this->load->view('common/footer'); ?>

<script>

    $(document).ready(function () {
        $('.input-daterange').datepicker({todayHighlight: true, autoclose: true, format: 'yyyy-mm-dd'});
    });

    function lockOrder(id) {
        var url = '<?php echo site_url('/praise/lock_order')?>';
        layer.confirm('锁定后将扣取卖家的任务金额', {
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
        var url = "<?php echo site_url('/praise/lock_order');?>";
        $(".select-list2").each(function (i, ele) {
            if ($(ele).prop('checked')) {
                arr_oid.push($(ele).attr('oid'));
            }
        });
        if (arr_oid.length < 1) {
            layer.alert('选择的订单不能为空。');
            return;
        }
        layer.confirm('锁定后将扣取卖家的任务金额', {
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

    function editOperator(id) {
        var url = '<?php echo site_url('/praise/allot_operator')?>';
        var html = template('operator', {list: ''});
        var parm = {};
        parm.type = 1;
        parm.skin = 'layui-layer-rim';
        parm.area = ['420px', '240px'];
        parm.content = html;
        parm.btn = ['分配'];
        parm.yes = function (i) {
            var val = $('#_operator').val();
            $.post(url, {'id': id, 'val': val}, function (res) {
                if (res.s == 1) {
                    layer.msg(res.msg, {icon: 1, time: 500}, function () {
                        window.location.reload();
                    });
                } else {
                    layer.msg(res.msg, {icon: 2});
                }
            }, 'json')
        };
        layer.open(parm);
    }

    function show(id) {
        var url = '<?php echo site_url('/praise/get_edit')?>';
        $.post(url, {'id': id}, function (res) {
            if (res.s == 1) {
                var data = {};
                var result = res.data;
                data.task = result[0];
                data.task_pl = result[1];
                data.status = result[2];
                $('#show_modal_content').html(template('modal_content', data));
                $('#show_Modal').modal();
            } else {
                layer.msg(res.msg, {icon: 2});
            }
        }, 'json')
    }
    function submitChange(_this, id) {
        var url = '<?php echo site_url('/praise/change_staus')?>';
        var url1 = '<?php echo site_url('/praise/get_edit')?>';

        $.post(url1, {'id': id}, function (res) {
            if (res.s == 1) {
                var html = template('see_detail_s', {data: res.data});
                layer.open({
                    title: '执行',
                    area: ['780px', 'auto'],
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
            } else {
                layer.msg(res.msg, {icon: 2});
            }
        }, 'json')
    }

    function getShop(that, val, ele) {
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
            $(that).closest('.ptname').siblings('.shopname').find('.' + ele).html(str);
        }, 'json')
    }

</script>
</body>
</html>
