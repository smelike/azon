<div class="modal fade" id="downModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 1000px;">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel">下单</h4>
            </div>
            <div class="modal-body" id="modal_content"></div>
            <div class="modal-footer" id="modal_btn">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
            </div>
        </div>
    </div>
</div>

<script id="modal_content_temp" type="text/html">
    {{if relevance != '' && relevance != null}}
    <div class="panel panel-default" id="down_1" style="height: 600px;display: block;">
        <div class="panel-heading">
            <h3 class="panel-title">关联访问</h3>
        </div>
        <div class="panel-body">
            <form class="form-horizontal" role="form">
                <div class="col-sm-12 form-group">
                    <label class="col-sm-3 control-label no-padding-right">平台名称:</label>

                    <div class="col-sm-9">
                        <span style="line-height: 34px">{{relevance.platform_name}}</span>
                    </div>
                </div>
                <div class="col-sm-12 form-group">
                    <label class="col-sm-3 control-label no-padding-right">关联访问产品ASIN:</label>

                    <div class="col-sm-9">
                        <span style="line-height: 34px">{{relevance.bind_ASIN}}</span>
                    </div>
                </div>
                <div class="col-sm-12 form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-iframe-order-4">关联产品地址:</label>
                    <div class="col-sm-9">
                        <input type="text" id="form-iframe-order-4" class="col-xs-9 text-copy" value="{{relevance.bind_url}}">
                        <div class="col-xs-3">
                            <button type="button" class="web-copy copy-btn" copy-text="{{relevance.bind_url}}" style="margin-top: 4px">复制</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{/if}}
    <!--下单第二步-->
    {{if relevance != '' && relevance != null}}
    <div class="panel panel-default" id="down_2" style="height: 600px;display: none">
        {{else}}
        <div class="panel panel-default" id="down_2" style="height: 600px;display: block;">
            {{/if}}
            <div class="panel-heading no-padding">
                <div class="row">
                    <form class="form-horizontal" role="form">
                        <div class="col-sm-4 form-group no-margin-bottom">
                            <label class="col-sm-4 control-label no-padding-right"><b>平台:</b></label>
                            <div class="col-sm-8">
                                <span style="line-height: 34px">{{product_data.platform_name}}</span>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group no-margin-bottom">
                            <label class="col-sm-4 control-label no-padding-right"><b>任务时间:</b></label>

                            <div class="col-sm-8">
                                <span style="line-height: 34px">{{product_data.task_time}}</span>
                            </div>
                        </div>
                        <div class="col-sm-4 form-group no-margin-bottom">
                            <label class="col-sm-4 control-label no-padding-right"><b>捆绑购买:</b></label>

                            <div class="col-sm-8">
                                <span style="line-height: 34px">{{product_data.is_bind}}</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form">
                    {{each product_data.products as v i}}
                    <div class="panel panel-info">
                        <div class="panel-heading no-padding">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-4 form-group" style="margin-bottom: 0">
                                        <label class="col-sm-4 control-label no-padding-right">{{if product_data.products.length == 1}}产品ASIN:{{else}}{{if i == 0}}主产品ASIN:{{else}}绑定产品ASIN:{{/if}}{{/if}}</label>
                                        <div class="col-sm-8">
                                            <span style="line-height: 34px">{{v.ASIN}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-group" style="margin-bottom: 0">
                                        <label class="col-sm-4 control-label no-padding-right">任务类型:</label>
                                        <div class="col-sm-8">
                                            <span style="line-height: 34px">{{v.type}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-4 form-group no-margin-bottom">
                                        <label class="col-sm-4 control-label no-padding-right">售价:</label>
                                        <div class="col-sm-8">
                                            <span style="line-height: 34px">{{c_code}}{{v.price}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group no-margin-bottom">
                                        <label class="col-sm-4 control-label no-padding-right">折扣:</label>
                                        <div class="col-sm-8">
                                            <span style="line-height: 34px">{{v.discount}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group no-margin-bottom">
                                        <label class="col-sm-4 control-label no-padding-right">运费:</label>
                                        <div class="col-sm-8">
                                            <span style="line-height: 34px;">{{c_code}}{{v.shipping}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 form-group no-margin-bottom">
                                        <label class="col-sm-4 control-label no-padding-right">任务要求:</label>
                                        <div class="col-sm-8">
                                            <span style="line-height: 34px;">{{v.task_claim}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group no-margin-bottom">
                                        <label class="col-sm-4 control-label no-padding-right">执行店铺:</label>
                                        <div class="col-sm-8">
                                            <span style="line-height: 34px;">{{v.shop_name}}</span>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 form-group no-margin-bottom">
                                        <label class="col-sm-6 control-label no-padding-right">预计订单金额:</label>
                                        <div class="col-sm-6">
                                            <span style="line-height: 34px;color: red;font-weight: bold">{{c_code}}{{v.dprice}}</span>
                                        </div>
                                    </div>
                                    <div style="clear: both"></div>
                                    <div class="col-sm-12 form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label no-padding-right">优惠券:</label>
                                        <div class="col-sm-11">
                                            <input type="text" class="col-xs-9 text-copy" style="font-weight: bold;color: green" value="{{v.coupon}}">
                                            <div class="col-xs-3">
                                                <button type="button" class="web-copy copy-btn" copy-text="{{v.coupon}}" style="margin-top: 4px">复制</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 form-group" style="margin-bottom: 5px">
                                        <label class="col-sm-1 control-label no-padding-right">关键词:</label>

                                        <div class="col-sm-11">
                                            <input type="text" class="col-xs-9 keyword text-copy" style="font-weight: bold;color: green" value="{{v.key_word_s}}">
                                            <div class="col-xs-3">
                                                <button type="button" class="web-copy copy-btn" copy-text="{{v.key_word_s}}" style="margin-top: 4px">复制</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 form-group no-margin-bottom">
                                        <label class="col-sm-1 control-label no-padding-right">产品链接:</label>
                                        <div class="col-sm-11">
                                            <input type="text" class="col-xs-9 text-copy" value="{{v.platform_url}}/dp/{{v.ASIN}}?keywords={{v.key_word}}">
                                            <div class="col-xs-3">
                                                <button type="button" class="web-copy copy-btn" copy-text="https://www.amazon.com/dp/{{v.ASIN}}" style="margin-top: 4px">复制</button>
                                            </div>
                                        </div>
                                    </div>
                                    {{if (v.remarks)}}
                                    <div class="col-sm-12 form-group" style="background-color: #FF892A;">
                                        <label class="col-sm-1 control-label no-padding-right">备注:</label>
                                        <div class="col-sm-11 white"><h5>{{v.remarks}}</h5></div>
                                    </div>
                                    {{/if}}
                                </div>

                            </div>
                        </div>
                    </div>

                    {{if product_data.is_finish == 2}}
                    <div>该绑定产品今天下单数量已经完成</div>
                    {{/if}}
                    {{/each}}
                </form>
                <input type="hidden" value="{{task}}" id="task_ids">
            </div>
        </div>
        <!--    下单第三步-->
        <div class="panel panel-default" id="down_3" style="height: 600px;display: none;">
            <div class="panel-heading">
                <h3 class="panel-title">输入订单号</h3>
            </div>
            <div class="panel-body" id="downForm">
                {{each product_data.products as v i}}
                <form class="form-horizontal" role="form">
                    <input type="hidden" value="{{v.id}}" name="product_id">
                    {{if i == 1}}
                    <div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>
                    {{/if}}
                    <div class="col-sm-12 form-group">
                        {{if i == 0 }}
                        <label class="col-sm-3 control-label no-padding-right">产品ASIN:</label>
                        {{else}}
                        <label class="col-sm-3 control-label no-padding-right">捆绑产品ASIN:</label>
                        {{/if}}
                        <div class="col-sm-9">
                            <span style="line-height: 34px">{{v.ASIN}}</span>
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-3 control-label no-padding-right">订单号:</label>
                        <div class="col-sm-6">
                            <input type="text" name="order_code" class="col-xs-12" placeholder="例：116-3527885-8849045">
                        </div>
                    </div>
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-3 control-label no-padding-right">实际金额:</label>
                        <div class="col-sm-6">
                            <span style="color:red;height: 35px;line-height: 35px;">{{c_code}}{{v.dprice}}</span>
                        </div>
                    </div>
                    {{if v.fast_comment == '快速上评'}}
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-2 control-label no-padding-right"></label>
                        <div class="col-sm-6">
                            <span style="color:red;height: 35px;line-height: 35px;">该产品任务为快速上评，请在下面输入快速上评的物流单号</span>
                        </div>
                    </div>
                    {{/if}}
                    <div class="col-sm-12 form-group">
                        <label class="col-sm-3 control-label no-padding-right">物流单号:</label>
                        <div class="col-sm-6">
                            {{if v.fast_comment == '快速上评'}}
                            <input type="text" name="logistics_code" class="col-xs-12" placeholder="请输入快速上评的物流单号">
                            {{else}}
                            <input type="text" name="logistics_code" class="col-xs-12">
                            {{/if}}

                        </div>
                    </div>
                </form>
                {{/each}}
            </div>
        </div>
</script>

<script id="downModal_btn" type="text/html">
    {{if show == 1}}
    <span>下单前请确认商品信息，信息不对可设置为异常，原因：</span>
    <select id="task_msg">
        <option value="价格不符">价格不符</option>
        <option value="库存不足">库存不足</option>
        <option value="店铺未跟卖">店铺未跟卖</option>
        <option value="无效优惠券">无效优惠券</option>
        <option value="0">停刷</option>
    </select>
    <button type="button" class="btn btn-primary" onclick="setAbnormal('{{ids}}')">设为异常</button>
    {{/if}}
    {{if u == 1}}
    <button type="button" class="btn btn-primary" onclick="{{handle_back}}">上一步</button>
    {{/if}}
    <button type="button" class="btn btn-primary" onclick="{{handle}}">{{name}}</button>
</script>

<?php $this->load->view('common/footer');?>

<script type="text/javascript">

    var stop_reason = "";
    $(function(){
        $('.input-daterange').datepicker({
            autoclose:true,
            format:'yyyy-mm-dd',
            todayHighlight : true,
        });

        $(document).on("change keypress", "#task_msg", function() {
            if ($(this).val() == 0) {
                var html =  "<div class=\"panel panel-defaul stop_reason\" style=\"display: block;\">"+
                    "<label>输入停刷原因：</label>" +
                    "<textarea name=\"stop_reason\" class=\"ck_stop_reason\" rows=\"2\"></textarea></div>";

                $(".modal-body").append(html);
                $(".stop_reason textarea").focus();
            } else {
                $(".stop_reason").hide();
            }
        });

        $(document).on("blur", ".ck_stop_reason", function() {
            stop_reason = $(this).val();
        });
    });

    $('#downModal').on('hide.bs.modal',function () {
        window.location.reload();
    });

    function lockOrder(id)
    {
        var url = '<?php echo site_url('/order/every_day_debit')?>';
        layer.confirm('锁定后，将扣取卖家的任务金额', {btn: ['锁定','取消']}, function(){
            $.post(url,{'id':id}, function(res){
                if(res.s == 1){
                    layer.msg(res.msg,{icon:1,time:500},function () {
                        window.location.reload();
                    });
                } else {
                    layer.msg(res.msg,{icon:2});
                }
            },'json')
        }, function(){
            layer.closeAll();
            location.reload();
        });
    }
    //获取店铺
    function getShop(that,val,ele){
        var url = "<?php echo site_url('/praise/get_shop');?>";
        $.post(url,{'val':val},function(res){
            var str = '';
            if(res.s == 1){
                var data = res.data;
                for (var i = 0; i < data.length; i++) {
                    str += '<option value="'+data[i].id+'">'+data[i].name+'</option>';
                }
            }else{
                str = '<option value="">该平台没有店铺</option>';
            }
            $(that).closest('.ptname').siblings('.shopname').find('.'+ele).html(str);
        },'json')
    }
    //下单内容
    function downOrder(id,product_id){
        if(id == '' || id == null) {
            layer.alert('无法下单');
        }
        var url = "<?php echo site_url('/order/get_products');?>";
        $.post(url,{'id':id,'product_id':product_id}, function(res) {
            if (res.s == 1) {
                $('#modal_content').html(template('modal_content_temp',res.data));
                //console.log(res.data);
                var data = res.data;
                if(data.relevance == '' || data.relevance == null){
                    $('#modal_btn').html(template('downModal_btn',{name:'下一步',handle:'next_b()',show:1}));
                }else{
                    $('#modal_btn').html(template('downModal_btn',{name:'下一步',handle:'next_a()'}));
                }
                var ele = $('.copy-btn');
                ele.each(function (i,ele) {
                    var text = $(ele).attr('copy-text');
                    copy_text(ele,text);
                })
                $('#downModal').modal({backdrop:'static'});
            }else{
                layer.alert(res.msg);
            }
        },'json');
    }
    function back_a(){
        $('#down_1').show();
        $('#down_2').hide();
        $('#down_3').hide();
        $('#modal_btn').html(template('downModal_btn',{name:'下一步',handle:'next_a()'}));
    }
    function back_b(){
        $('#down_1').hide();
        $('#down_2').show();
        $('#down_3').hide();
        $('#modal_btn').html(template('downModal_btn',{name:'下一步',handle:'next_b()',show:1}));
    }
    function next_a() {
        $('#down_1').hide();
        $('#down_2').show();
        $('#down_3').hide();
        $('#modal_btn').html(template('downModal_btn',{name:'下一步',handle:'next_b()',show:1,u:1,handle_back:'back_a()'}));
    }
    function next_b() {
        layer.confirm('请确认信息是否无误？', {
            btn: ['确定','取消']
        }, function(){
            $('#down_1').hide();
            $('#down_2').hide();
            $('#down_3').show();
            $('input[name="order_code"]').val('');
            $('input[name="logistics_code"]').val('');
            $('#modal_btn').html(template('downModal_btn',{name:'下单',handle:'downOrderHendle()',u:1,handle_back:'back_b()'}));
            layer.closeAll();
        }, function(){
            layer.closeAll();
        });
    }

    function setAbnormal() {
        var url = '<?php echo site_url('/order/set_error')?>';
        var msg = $('#task_msg').val();
        var ids = $('#task_ids').val();

        if (msg == 0) {

            if (stop_reason) {
                msg = "停刷，原因是：" + stop_reason;
            } else {
                layer.msg("您好，请输入停刷原因的详情。", {icon: 2, time: 800});
                return ;
            }
        }
        layer.confirm('确定把该任务设置未异常？设置异常后无法下单', {
            btn: ['确定','取消']
        }, function(){
            $.post(url,{'ids':ids,'msg':msg},function(res){
                if(res.s == 1){
                    layer.alert(res.msg,function(){
                        window.location.reload()
                    });
                }else{
                    layer.alert(res.msg);
                }
            },'json')
            layer.closeAll();
        }, function(){
            layer.closeAll();
        });
    }
    // down_order request
    function downOrderHendle()
    {
        var url = '<?php echo site_url('/order/down_order')?>';
        var d_arr = [];
        var ids = $('#task_ids').val();
        $('#downForm').children('form').each(function(i,el){
            var userData = $(el).serializeArray();
            var arr = getFormArray(userData);
            d_arr.push(arr);
        })
        for (var i = 0; i < d_arr.length; i++) {
            if(d_arr[i].order_code == ''){
                layer.alert('订单号不能为空');
                return;
            }
        }
        $.post(url,{'data':d_arr,'ids':ids},function(res){
            if(res.s == 1){
                layer.confirm(res.msg + "。再次下单，点击【确定】按钮。",{icon:1, btn: ['确定','取消']});
                if(res.is_bind == ''){
                    $('#down_1').hide();
                    $('#down_2').show();
                    $('#down_3').hide();
                    $('#modal_btn').html(template('downModal_btn',{name:'下一步',handle:'next_b()',show:1}));
                }else{
                    $('#down_1').show();
                    $('#down_2').hide();
                    $('#down_3').hide();
                    $('#modal_btn').html(template('downModal_btn',{name:'下一步',handle:'next_a()'}));
                }
                var arrs = res.rand;
                for (i=0;i<arrs.length;i++){
                    $('.keyword').eq(i).val(arrs[i]);
                }
            }else if(res.s == 2){
                layer.confirm(res.msg);
            }else{
                layer.alert(res.msg,function(){
                    window.location.reload()
                });
            }
        },'json')
    }
</script>