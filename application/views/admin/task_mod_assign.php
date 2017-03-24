<div class="modal fade" id="execute" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title">
                    分配执行人列表
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 form-group executor-list">
                        <div style="color: red; font-weight: bolder;" class="ck_task_tip"></div>
                        <table class="diy-table table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th max-width="40px" style="text-align: center"></th>
                                <th>执行人姓名</th>
                                <th>任务完成量</th>
                                <th>任务未完成量</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($middlers as $item): ?>
                                <tr>
                                    <td>
                                        <input class="ck_task_executor" type="radio" name="task_id" value="<?php echo $item['id'] ?>"/>
                                    </td>
                                    <td><?php echo $item['username'] ?></td>
                                    <td><?php echo $item['total_finish_number'];?></td>
                                    <td><?php echo $item['total_unfinish_number'];?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" id="modal-button"></div>
            </div>
        </div>
    </div>
</div>

<script id="button_temp" type="text/html">
    <button type="button" class="btn btn-primary" ids="{{ids}}" onclick="saveExecutor(this)">
        保存
    </button>
    <button type="button" class="btn btn-default" data-dismiss="modal">关闭
    </button>
</script>

<?php $this->load->view('common/footer'); ?>

<script type="text/javascript">
	$('.btn-go-page').click(function(){
		alert($('#go-page').val());
	});
    function editExecutor(_this, id) {
        var arr = [];
        var u = $(_this).attr('bind-id');
        arr.push(id);
        if ((u != '') && (u != null)) {
            arr.push(u);
        }
        var data = {};
        data.ids = arr.join(',');

        var url = "<?php echo site_url('/task/task_executor/');?>" + id;
        $.post(url, {}, function (res) {

            $('.ck_task_tip').html('');
            var tip = "";
            if (res.msg.task_id) {
                tip = "选中ASIN：" + res.msg.asin + " ; 当前选中的任务量：" + res.msg.task_num;
                $('.ck_task_tip').html(tip);
            }
            if (res.s && res.msg.executor_user_id) {

                    $(".ck_task_executor").each(function () {
                    if ($(this).val() == res.msg.executor_user_id) {
                        $(this).prop('checked', true);
                        return false;
                    }
                })
            } else {
                console.log(res.msg);
                $(".ck_task_executor").prop("checked", false);
            }
        }, 'json');

        $('#modal-button').html(template('button_temp', data));
        $('#execute').modal();
    }
    function execute() {

        var arr = checkExecute();
        if (arr.length <= 0) {
            layer.alert('请选择任务');
            return;
        }
        var data = {};
        data.ids = arr.join(',');
        $('#modal-button').html(template('button_temp', data));
        $('#execute').modal();
    }
    function checkExecute() {
        var arr = [];
        var el = $('#content_n');
        el.children('tr').each(function (i, el) {
            var c = $(el).children('td').eq(0).find('.is_check');
            if (c.prop('checked')) {
                arr.push(c.attr('cid'));
                if (c.attr('bind-id') != '' && c.attr('bind-id') != null) {
                    arr.push(c.attr('bind-id'));
                }
            }
        });
        return arr;
    }
    function saveExecutor(_this) {

        var url = '<?php echo site_url('/task/allot_execute')?>';
        var ids = $(_this).attr('ids');
        var executor = $(".ck_task_executor:checked");
        var executor_length = executor.length;
        var msg = '';
        if (executor_length) {
            if (executor_length > 1) {
                msg = "您好，一个任务只能分配一个执行人。";
                config = {icon: 1, time: 1000};
            }
        } else {
            msg = "执行人不能为空";
            config = {icon: 2, time: 1000};
        }
        if (msg) {
            layer.msg(msg, config);
        }
        var executor_id = executor.val();
        if (ids != '' && ids != null) {
            $.post(url, {'ids': ids, 'executor': executor_id},
                function (res) {
                    if (res.s == 1) {
                        layer.msg(res.msg, {icon: 1, time: 800}, function () {
                            window.location.reload();
                        });
                    } else {
                        layer.alert(res.msg);
                    }
                }, 'json')
        }
    }
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
        }, 'json');
    }
</script>
