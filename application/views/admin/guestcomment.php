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
                        <a href="#">游客评论任务</a>
                    </li>
                    <li class="active">游客评论管理</li>
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
                                        <option value="">请选择</option>
                                        <option
                                            value="wfp" <?php echo isset($gets['executor']) && $gets['executor'] == 'wfp' ? 'selected' : '' ?>>
                                            未分配
                                        </option>
                                        <?php if (isset($people) && count($people) > 0) : ?>
                                            <?php foreach ($people as $item): ?>
                                                <option
                                                    value="<?php echo $item['id']; ?>" <?php echo isset($gets['executor']) && $gets['executor'] == $item['id'] ? 'selected' : ''; ?>>
                                                    <?php echo $item['username']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">请选择</option>
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
                                            已上评
                                        </option>
                                        <option
                                            value="7" <?php echo isset($gets['status']) && $gets['status'] == 7 ? 'selected' : ''; ?>>
                                            已完成
                                        </option>
                                        <option
                                            value="4" <?php echo isset($gets['status']) && $gets['status'] == 4 ? 'selected' : ''; ?>>
                                            已审核
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
                                        <input type="text" class="input-sm form-control" name="task_time"
                                               value="<?php echo isset($gets['task_time']) ? $gets['task_time'] : ''; ?>">

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
                                <span>游评任务列表</span>
                            </caption>
                            <thead>
                            <tr>
                                <th width="50px"><input type="checkbox" class="table-selectAll2" /></th>
                                <th width="150px">操作</th>
                                <th>状态</th>
                                <th>产品ID</th>
                                <th>平台</th>
                                <th>店铺</th>
                                <th>执行人</th>
                                <th>创建时间</th>
                                <th>任务时间</th>
                                <th>操作费（￥）</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($tasks) && count($tasks) > 0): ?>
                                <?php foreach ($tasks as $a): ?>
                                    <tr>
                                        <td><input class="is_check select-list2" oid="<?php echo $a['id'];?>" type="checkbox" /></td>
                                        <td>
                                            <button class="btn-link" type="button"
                                                    onclick="seedetail(<?php echo $a['id']; ?>)" style="width: 40px;">详情
                                            </button>
                                            <?php if ($a['status'] == '1'): ?>
                                                <button class="btn-link" type="button"
                                                        onclick="unlock(<?php echo $a['id']; ?>)" style="width: 40px;">
                                                    锁定
                                                </button>
                                            <?php else: ?>
                                                <?php if ($a['status'] == '2' || $a['status'] == '3'): ?>
                                                    <button class="btn-link" type="button"
                                                            onclick="allot(<?php echo $a['id']; ?>)"
                                                            style="width: 40px;">分配
                                                    </button>
                                                <?php endif; ?>
                                                <?php if ($a['is_operator'] == 1): ?>
                                                    <?php if ($a['status'] == '2'): ?>
                                                        <button class="btn-link" type="button"
                                                                onclick="allotComplete(<?php echo $a['id']; ?>)"
                                                                style="width: 40px;">执行
                                                        </button>
                                                    <?php endif; ?>
                                                    <?php if ($a['status'] == '3'): ?>
                                                        <button class="btn-link" type="button"
                                                                onclick="allotComplete(<?php echo $a['id']; ?>)"
                                                                style="width: 40px;">完成
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
                                        <td><?php echo $a['task_time']; ?></td>
                                        <td><?php echo $a['total_price']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td align="center" colspan="12">没有数据</td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                        <div><?php echo $pagetext; ?>| 操作费总金额：<?php echo $t_money;?></div>
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
<div class="modal fade" id="comment_modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="comment_model_content"></div>
    </div>
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

<script id="comment-footer-temp" type="text/html">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
            &times;
        </button>
        <h4 class="modal-title">
            上游客评论
        </h4>
    </div>
    <div class="modal-body">
        <div class="row">
            <form method="POST" name="form_login" target="_top" class="form-horizontal col-md-12" role="form">
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-2 control-label no-padding-right">标题</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" value="{{list.title}}">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="web-copy copy-btn" copy-text="{{list.title}}">复制</button>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-2 control-label no-padding-right">内容</label>

                        <div class="col-sm-8">
                            <textarea class="form-control">{{list.content}}</textarea>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="web-copy copy-btn" copy-text="{{list.content}}">复制</button>
                        </div>
                    </div>
                    {{if list.pictures.length > 0}}
                    {{each list.pictures as pic i}}
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-2 control-label no-padding-right">图片{{i+1}}</label>

                        <div class="col-sm-8">
                            <input class="form-control" value="{{pic}}">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="web-copy copy-btn" copy-text="{{pic}}">复制</button>
                        </div>
                    </div>
                    {{/each}}
                    {{/if}}
                    {{if list.video.length > 0}}
                    {{each list.video as vid i}}
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-2 control-label no-padding-right">视频{{i+1}}</label>

                        <div class="col-sm-8">
                            <input class="form-control" value="{{vid}}">
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="web-copy copy-btn" copy-text="{{vid}}">复制</button>
                        </div>
                    </div>
                    {{/each}}
                    {{/if}}
                    {{if list.status == '2'}}
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-2 control-label no-padding-right">状态</label>

                        <div class="col-sm-8">
                            <select class="form-control" name="st" id="st">
                                <option value="sp">已上评</option>
                            </select>
                        </div>
                    </div>
                    {{else if list.status == '3'}}
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-2 control-label no-padding-right">状态</label>

                        <div class="col-sm-8">
                            <select class="form-control" name="st" id="st">
                                <option value="wc">完成</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group" id="commentID-input">
                        <label class="col-sm-2 control-label no-padding-right">评论ID</label>

                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="commentID">
                        </div>
                    </div>
                    {{/if}}

                </div>
            </form>
        </div>
    </div>
    <div class="modal-footer">
        <div class="modal-footer" id="comment-footer">
            <button type="button" class="btn btn-primary" onclick="complete({{id}})">
                保存
            </button>
            <button type="button" class="btn btn-default" data-dismiss="modal">关闭
            </button>
        </div>
    </div>
</script>
<script id="modal-footer-temp" type="text/html">
    <button type="button" class="btn btn-primary" onclick="allotExecutor({{id}})">
        保存
    </button>
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
    </button>
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
            <td colspan="2">任务时间: {{data.task_time}}</td>
        </tr>
        <tr>
            <td colspan="2">操作费: {{data.total_price}}</td>
        </tr>
        <tr>
            <td colspan="2">标题: {{data.title}}</td>
        </tr>
        {{if data.pictures.length > 0}}
        <tr>
            <td colspan="2">
                图片:
                <div>
                    {{each data.pictures as p i}}
                    <img style="width: 100px;height: auto;float: left;margin:0 10px 10px 0;" src="{{p}}">
                    {{/each}}
                </div>
            </td>
        </tr>
        {{/if}}
        {{if data.video.length > 0}}
        <tr>
            <td colspan="2">
                视频:
                <div>
                    {{each data.video as v i}}
                    <a href="{{v}}">视频{{i+1}}</a>
                    {{/each}}
                </div>
            </td>
        </tr>
        {{/if}}
        <tr>
            <td colspan="2">内容:
                <div style="max-height: 300px;overflow: auto;">{{data.content}}</div>
            </td>
        </tr>
        {{if data.comment_ID != '' && data.comment_ID != null}}
        <tr>
            <td colspan="2">评价ID: {{data.comment_ID}}</td>
        </tr>
        {{/if}}
        {{if data.status == 6}}
        <tr>
            <td colspan="2">审核不通过原因:
                <div style="max-height: 300px;overflow: auto;">{{data.check_remark}}</div>
            </td>
        </tr>
        {{else if data.status == 4}}
        <tr>
            <td colspan="2">审核通过备注:
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
        var url = "<?php echo site_url('/guestcomment/get_task');?>";
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
    function statusChange(val) {
        if (val == 'wc') {
            $('#commentID-input').show();
        } else if (val == 'sp') {
            $('#commentID-input').hide();
        }
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

        $(".diy-table").find("button[disabled]").css("color", "#999");
    });
    function getShop(id) {
        var url = '<?php echo site_url('/task/get_shop');?>';
        $.post(url, {'id': id}, function (res) {
            if (res.s == 1) {
                var data = res.data;
                var str = '';
                $.each(data, function (i, v) {
                    str += '<option value="' + v.id + '">' + v.name + '</option>';
                })
                $('#shop_s').html(str);
            } else {
                var str = '<option value="">该平台暂时没有店铺</option>';
                $('#shop_s').html(str);
            }

        }, 'json')
    }
    function allot(id) {
        $('#modal-footer').html(template('modal-footer-temp', {id: id}));
        $('#executor_modal').modal();
    }

    function allotComplete(id) {
        var url = '<?php echo site_url("/guestcomment/get_task");?>';
        $.post(url, {'id': id}, function (res) {
            if (res.s == 1) {
                var list = res.data;
                $('#comment_model_content').html(template('comment-footer-temp', {list: list, id: id}));
                $('#comment_modal').modal();
                //复制
                var ele = $('.copy-btn');
                ele.each(function (i, ele) {
                    var text = $(ele).attr('copy-text');
                    copy_text(ele, text);
                })
            } else {
                layer.msg(res.msg, {icon: 2});
            }
        }, 'json')
    }
    function allotExecutor(id) {
        var url = '<?php echo site_url("/guestcomment/allot_executor");?>';
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
        var url = '<?php echo site_url("/guestcomment/unlock_task");?>';
        layer.confirm('你确定要锁定该任务？', {
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
        var url = "<?php echo site_url('/guestcomment/unlock_task');?>";
        $(".select-list2").each(function (i, ele) {
            if ($(ele).prop('checked')) {
                arr_oid.push($(ele).attr('oid'));
            }
        });
        if (arr_oid.length < 1) {
            layer.alert('选择的任务不能为空。');
            return;
        }
        layer.confirm('锁定后将扣取卖家的任务金额？', {
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
    function complete(id) {
        var url = '<?php echo site_url("/guestcomment/finish_task");?>';
        var commentID = $('#commentID').val();
        var status = $('#st').val();
        $.post(url, {'id': id, 'commentId': commentID, 'status': status}, function (res) {
            if (res.s == 1) {
                layer.msg(res.msg, {icon: 1, time: 500}, function () {
                    window.location.reload();
                });
            } else {
                layer.msg(res.msg, {icon: 2});
            }
        }, 'json')
    }
</script>
</body>
</html>
