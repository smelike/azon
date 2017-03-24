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
                        <a href="#">QA管理</a>
                    </li>
                    <li class="active">任务详情</li>
                </ul>
            </div>
            <div class="page-content">
               
                <div class="row">
                    <form method="POST" name="form_login" target="_top" class="form-horizontal col-lg-6 col-md-12" role="form" action="<?php echo site_url('/qatask/finish');?>">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="col-sm-6 form-group">
                                    <label class="col-sm-4 control-label no-padding-right">平台：</label>
                                    <div class="col-sm-8">
                                        <span style="line-height: 34px"><?php echo $info['platform'];?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="col-sm-2 control-label no-padding-right">店铺：</label>
                                    <div class="col-sm-8">
                                        <span style="line-height: 34px"><?php echo $info['execute_shop'];?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="col-sm-4 control-label no-padding-right">产品ID：</label>
                                    <div class="col-sm-8">
                                        <span style="line-height: 34px"><a target="_blank" href="https://<?php echo $info['url'];?>/dp/<?php echo $info['ASIN'];?>"><?php echo $info['ASIN'];?></a></span>
                                    </div>
                                </div>
                                <div class="col-sm-12 form-group">
                                    <label class="col-sm-2 control-label no-padding-right">关键词：</label>
                                    <div class="col-sm-9" style="padding-left: 8px">
                                        <span style="line-height: 34px"><?php echo $info['key_word'];?></span>
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    <label class="col-sm-4 control-label no-padding-right">提问时间：</label>
                                    <div class="col-sm-8">
                                        <span style="line-height: 34px"><?php echo $info['question_time'];?></span>
                                    </div>
                                </div>
                                <?php if($today >= $question_time):?>
                                    <div class="col-sm-12 form-group">
                                        <label class="col-sm-2 control-label no-padding-right">问题标题：</label>
                                        <div class="col-sm-9" style="padding-left: 8px">
                                            <input type="text" class="col-xs-12" value="<?php echo $info['question'];?>" readonly/>
                                        </div>
                                    </div>
                                    <?php if($info['is_executor'] == 1):?>
                                    <div class="col-sm-6 form-group" >
                                        <label class="col-sm-4 control-label no-padding-right">提交问题ID：</label>
                                        <div class="col-sm-8">
                                            <?php if((int)$info['status'] > 2):?>
                                                <input type="text" class="col-xs-12" name="question_ID" value="<?php echo $info['question_ID'];?>" required readonly/>
                                            <?php else: ?>
                                                <input type="text" class="col-xs-12" name="question_ID" required/>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                    <?php endif;?>
                                    <input name="id" type="hidden" value="<?php echo $info['id'];?>">
                                    <input name="type" type="hidden" value="1">
                                    <div class="btn-box col-sm-12" align="center">
                                        <?php if($info['is_executor'] == 1):?>
                                            <?php if((int)$info['status'] > 2):?>
                                                <input type="submit" class="btn btn-info" value="已完成" disabled="disabled">
                                            <?php else: ?>
                                                <input type="submit" class="btn btn-info" value="确认完成">
                                            <?php endif;?>
                                        <?php else:?>
                                            <a class="btn btn-info" href="<?php echo site_url('/qatask/index');?>">返回</a>
                                        <?php endif;?>
                                    </div>
                                <?php endif;?>
                                <div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>
                            </div>
                        </div>
                    </form>
                    <?php if((int)$info['status'] > 2):?>
                        <div style="clear: both"></div>
                        <form method="POST" name="form_login" target="_top" class="form-horizontal col-lg-6 col-md-12" role="form" action="<?php echo site_url('/qatask/finish');?>">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div id="answer">
                                        <div class="col-sm-6 form-group">
                                            <label class="col-sm-4 control-label no-padding-right">回复时间：</label>
                                            <div class="col-sm-8">
                                                <span style="line-height: 34px"><?php echo $info['answer_time'];?></span>
                                            </div>
                                        </div>
                                        <?php if($today >= $answer_time):?>
                                            <div class="col-sm-12 form-group">
                                                <label class="col-sm-2 control-label no-padding-right no-padding-left">回复内容：</label>
                                                <div class="col-sm-9" style="padding-left: 8px">
                                                    <textarea class="col-sm-12" style="height: 100px" readonly="readonly"><?php echo $info['answer'];?></textarea>
                                                </div>
                                            </div>
                                        <?php endif;?>
                                    </div>
                                    <input name="id" type="hidden" value="<?php echo $info['id'];?>">
                                    <input name="type" type="hidden" value="2">
                                    <?php if($today >= $answer_time):?>
                                        <div class="btn-box col-sm-12" align="center">
                                        <?php if($info['is_executor'] == 1):?>
                                            <?php if((int)$info['status'] > 3):?>
                                                <input type="submit" class="btn btn-info" value="已完成" disabled="disabled">
                                            <?php else: ?>
                                                <input type="submit" class="button btn btn-info btn-save1" value="确认完成">
                                            <?php endif;?>
                                        <?php else:?>
                                            <a class="btn btn-info" href="<?php echo site_url('/qatask/index');?>">返回</a>
                                        <?php endif;?>
                                        </div>
                                    <?php endif;?>
                                <div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>
                                </div>
                            </div>
                        </form>
                        <?php if((int)$info['status'] > 3):?>
                            <div style="clear: both"></div>
                            <form method="POST" name="form_login" target="_top" class="form-horizontal col-lg-6 col-md-12" role="form" action="<?php echo site_url('/qatask/finish');?>">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div id="vote">
                                            <div class="col-sm-6 form-group">
                                                <label class="col-sm-4 control-label no-padding-right">投票时间：</label>
                                                <div class="col-sm-8">
                                                    <span style="line-height: 34px"><?php echo $info['vote_time'];?></span>
                                                </div>
                                            </div>
                                            <?php if($today >= $vote_time):?>
                                                <div style="clear: both"></div>
                                                <div class="col-sm-6 form-group">
                                                    <label class="col-sm-4 control-label no-padding-right">投票次数：</label>
                                                    <div class="col-sm-8">
                                                        <span style="line-height: 34px"><?php echo $info['vote'];?></span>
                                                    </div>
                                                </div>
                                            <?php endif;?>
                                            <?php if($info['is_executor'] == 1):?>
                                                <?php if($info['status'] == 6 || $info['status'] == 8):?>
                                                    <div class="col-sm-12 form-group">
                                                        <label class="col-sm-2 control-label no-padding-right no-padding-left">备注：</label>
                                                        <div class="col-sm-9" style="padding-left: 8px">
                                                            <textarea class="col-sm-12" style="height: 100px" readonly="readonly"><?php echo $info['remark'];?></textarea>
                                                        </div>
                                                    </div>
                                                <?php endif;?>
                                            <?php endif;?>
                                        </div>
                                        <input name="id" type="hidden" value="<?php echo $info['id'];?>">
                                        <input name="type" type="hidden" value="3">
                                        <?php if($today >= $vote_time):?>
                                            <div class="btn-box col-sm-12" align="center">
                                            <?php if($info['is_executor'] == 1):?>
                                                <?php if((int)$info['status'] == 4):?>
                                                    <input type="submit" class="button btn btn-info btn-save1" value="提交任务，审核">
                                                <?php elseif((int)$info['status'] == 5):?>
                                                    <input type="submit" class="btn btn-info" value="待审核" disabled="disabled">
                                                <?php elseif((int)$info['status'] == 6):?>
                                                    <input type="submit" class="btn btn-info" value="已审核" disabled="disabled">
                                                <?php elseif((int)$info['status'] == 8):?>
                                                    <input type="submit" class="btn btn-info" value="未通过" disabled="disabled">
                                                <?php endif;?>
                                            <?php else:?>
                                                <a class="btn btn-info" href="<?php echo site_url('/qatask/index');?>">返回</a>
                                            <?php endif;?>
                                            </div>
                                        <?php endif;?>
                                        <div class="col-sm-12 hr hr-18 dotted hr-dotted"></div>
                                    </div>
                                </div>
                            </form>
                        <?php endif;?>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>

    <?php $this->load->view('common/footer');?>

<script type="text/javascript">
    jQuery(function ($) {
        $('.input-daterange').datepicker({
            todayBtn : "linked",
            autoclose : true,
            format: 'yyyy-mm-dd',
            todayHighlight : true,
            startDate : new Date()
        }).on('changeDate',function(e){
            var startTime = e.date;
            $('.input-daterange').datepicker('setStartDate',startTime);
        });
    });
</script>
</body>
</html>
