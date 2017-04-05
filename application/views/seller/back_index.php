<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="utf-8"/>
    <title>赛酷营销系统V2.0</title>
    <meta name="description" content="overview &amp; stats"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>

    <?php $this->load->view('common/common_css');?>
</head>

<body>
<div id="app">
    <div class="header">
        <div class="logo">
            <a href="<?php echo base_url('back')?>"><img src="<?php echo base_url('assets/images/LOGO.png');?>"></a>
        </div>
        <div class="title">
            <h1>跨境电商营销管理系统<?php echo "(" . $page_data['title'] . ")";?></h1>
        </div>
        <?php $this->load->view('back_index_user_notice_mod');?>
    </div>
    <div class="nav">
        <?php $this->load->view('saller/back_index_nav_menu');?>

        <?php $this->load->view('back_index_footer');?>
    </div>
</div>

<?php $this->load->view('common/common_js');?>

<script src="<?php echo base_url('assets/js/mian.js');?>"></script>

<script>
    $(".el-submenu__title i").removeClass('el-icon-arrow-down').addClass("fa fa-caret-right")
</script>
</body>
</html>