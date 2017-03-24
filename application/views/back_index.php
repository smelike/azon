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
            <h1>跨境电商营销管理系统</h1>
        </div>
        <div class="user">
            <div class="notice">
                <div>
                    <el-popover ref="popover4" placement="bottom" width="300" trigger="hover">
                        <div class="notice-list">
                            <div class="notice-list-header">
                                <span>站内消息通知</span>
                            </div>
                            <div class="notice-list-body">
                                <ul>
                                    <li>
                                        <a href="#">
                                            [<span>赛酷</span>]
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus
                                            cupiditate, dolores ipsa magni maiores
                                            minima nam quam, quisquam quo quos similique sint? Asperiores consequatur
                                            facere incidunt nostrum quasi quia voluptas.
                                        </a>
                                        <span class="">2017-3-7</span>
                                    </li>
                                    <li>
                                        <a href="#">
                                            [<span>赛酷</span>]
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus
                                            cupiditate, dolores ipsa magni maiores
                                            minima nam quam, quisquam quo quos similique sint? Asperiores consequatur
                                            facere incidunt nostrum quasi quia voluptas.
                                        </a>
                                        <span class="">2017-3-7</span>
                                    </li>
                                    <li>
                                        <a href="#">
                                            [<span>赛酷</span>]
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus
                                            cupiditate, dolores ipsa magni maiores
                                            minima nam quam, quisquam quo quos similique sint? Asperiores consequatur
                                            facere incidunt nostrum quasi quia voluptas.
                                        </a>
                                        <span class="">2017-3-7</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="notice-list-footer">
                                <a href="#">查看更多</a>
                            </div>
                        </div>
                    </el-popover>
                    <el-button v-popover:popover4 class="bell-box">
                        <i class="fa fa-bell"></i>
                        <span class="num">20</span>
                    </el-button>
                </div>
            </div>
            <div class="welcome">
                <el-dropdown>
                    <span class="el-dropdown-link">
                        欢迎您，<span>CKERA</span>
                        <i class="fa fa-caret-down"></i>
                    </span>
                    <el-dropdown-menu slot="dropdown" id="user">
                        <el-dropdown-item><a href="components/shuadan/shuadan.html">修改密码</a></el-dropdown-item>
                        <el-dropdown-item><a href="#">退出登录</a></el-dropdown-item>
                    </el-dropdown-menu>
                </el-dropdown>
            </div>
        </div>
    </div>
    <div class="nav">
        <div class="nav-list" :class="{'layout-hide-text': spanLeft < 5}">
            <div class="layout-header">
                <i class="fa fa-navicon" @click.prevent="toggleClick" :class="{'icon-rotate': spanLeft < 5}"></i>
            </div>
            <el-menu default-active="home/home.html"
                     :default-openeds="opened"
                     class="el-menu-vertical-demo"
                     theme="dark"
                     :unique-opened="true">
                <el-tooltip class="item home" effect="dark" content="首页" placement="right-start" :disabled="isDisabled">
                    <el-menu-item index="home/home.html" @click="changeUrl">
                        <i class="fa fa-home"></i>
                        <span class="layout-text-block">首页</span>
                    </el-menu-item>
                </el-tooltip>
                <el-tooltip class="item" effect="dark" content="任务管理" placement="right-start" :disabled="isDisabled">
                    <el-submenu index="1">
                        <template slot="title"><span class="layout-text">任务管理</span></template>

                        <el-tooltip class="item" effect="light" content="刷单刷评" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="shuadan/shuadan.html" @click="changeUrl">
                                <i class="fa fa-clone"></i>
                                <span class="layout-text-block">刷单刷评</span>
                            </el-menu-item>
                        </el-tooltip>

                        <el-tooltip class="item" effect="light" content="下单操作" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="1-2">
                                <i class="fa fa-edit"></i>
                                <span class="layout-text-block">下单操作</span>
                            </el-menu-item>
                        </el-tooltip>

                        <el-tooltip class="item" effect="light" content="订单管理" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="1-3">
                                <i class="fa fa-file-excel-o"></i>
                                <span class="layout-text-block">订单管理</span>
                            </el-menu-item>
                        </el-tooltip>

                        <el-tooltip class="item" effect="light" content="收藏夹" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="1-4">
                                <i class="fa fa-folder-o"></i>
                                <span class="layout-text-block">收藏夹</span>
                            </el-menu-item>
                        </el-tooltip>

                        <el-tooltip class="item" effect="light" content="刷直评" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="1-5">
                                <i class="fa fa-star-o"></i>
                                <span class="layout-text-block">刷直评</span>
                            </el-menu-item>
                        </el-tooltip>

                        <el-tooltip class="item" effect="light" content="问答" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="1-6">
                                <i class="fa fa-commenting-o"></i>
                                <span class="layout-text-block">问答</span>
                            </el-menu-item>
                        </el-tooltip>

                        <el-tooltip class="item" effect="light" content="点赞" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="1-7">
                                <i class="fa fa-thumbs-o-up"></i>
                                <span class="layout-text-block">点赞</span>
                            </el-menu-item>
                        </el-tooltip>
                    </el-submenu>
                </el-tooltip>
                <el-tooltip class="item" effect="dark" content="基础管理" placement="right-start" :disabled="isDisabled">
                    <el-submenu index="2">
                        <template slot="title"><span class="layout-text">基础管理</span></template>

                        <el-tooltip class="item" effect="light" content="平台设置" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="2-1">
                                <i class="fa fa-gear"></i>
                                <span class="layout-text-block">平台设置</span>
                            </el-menu-item>
                        </el-tooltip>

                        <el-tooltip class="item" effect="light" content="运输管理" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="2-2">
                                <i class="fa fa-plane"></i>
                                <span class="layout-text-block">运输管理</span>
                            </el-menu-item>
                        </el-tooltip>

                        <el-tooltip class="item" effect="light" content="卖家管理" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="2-3">
                                <i class="fa fa-archive"></i>
                                <span class="layout-text-block">卖家管理</span>
                            </el-menu-item>
                        </el-tooltip>
                    </el-submenu>
                </el-tooltip>
                <el-tooltip class="item" effect="dark" content="财务管理" placement="right-start" :disabled="isDisabled">
                    <el-submenu index="3">
                        <template slot="title"><span class="layout-text">财务管理</span></template>

                        <el-tooltip class="item" effect="light" content="账单管理" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="3-1">
                                <i class="fa fa-clipboard"></i>
                                <span class="layout-text-block">账单管理</span>
                            </el-menu-item>
                        </el-tooltip>

                        <el-tooltip class="item" effect="light" content="提现管理" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="3-2">
                                <i class="fa fa-dollar"></i>
                                <span class="layout-text-block">提现管理</span>
                            </el-menu-item>
                        </el-tooltip>

                        <el-tooltip class="item" effect="light" content="查看汇率" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="3-3">
                                <i class="fa fa-search"></i>
                                <span class="layout-text-block">查看汇率</span>
                            </el-menu-item>
                        </el-tooltip>
                    </el-submenu>
                </el-tooltip>
                <el-tooltip class="item" effect="dark" content="系统设置" placement="right-start" :disabled="isDisabled">
                    <el-submenu index="4">
                        <template slot="title"><span class="layout-text">系统设置</span></template>

                        <el-tooltip class="item" effect="light" content="用户管理" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="4-1">
                                <i class="fa fa-user-o"></i>
                                <span class="layout-text-block">用户管理</span>
                            </el-menu-item>
                        </el-tooltip>

                        <el-tooltip class="item" effect="light" content="个人资料" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="4-2">
                                <i class="fa fa-vcard-o"></i>
                                <span class="layout-text-block">个人资料</span>
                            </el-menu-item>
                        </el-tooltip>

                        <el-tooltip class="item" effect="light" content="修改密码" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="4-3">
                                <i class="fa fa-key"></i>
                                <span class="layout-text-block">修改密码</span>
                            </el-menu-item>
                        </el-tooltip>

                        <el-tooltip class="item" effect="light" content="角色管理" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="4-4">
                                <i class="fa fa-user-circle"></i>
                                <span class="layout-text-block">角色管理</span>
                            </el-menu-item>
                        </el-tooltip>

                        <el-tooltip class="item" effect="light" content="通知管理" placement="right"
                                    :disabled="isDisabled">
                            <el-menu-item index="4-5">
                                <i class="fa fa-bell-o"></i>
                                <span class="layout-text-block">通知管理</span>
                            </el-menu-item>
                        </el-tooltip>
                    </el-submenu>
                </el-tooltip>
            </el-menu>
        </div>
        <div id="nav-content">
            <div class="nav-wrapper clearfix">
                <div class="nav-main">
                    <iframe id="my-iframe" :src="isrc"></iframe>
                </div>
            </div>
            <div class="nav-footer">
                <p> Copyright &copy 2017 赛酷跨境电商营销管理系统 粤ICP证16119776号 </p>
            </div>
        </div>
    </div>
</div>


<?php $this->load->view('common/common_js');?>


<!-- main.js -->
<script src="<?php echo base_url('assets/js/mian.js');?>"></script>
<script>
  $(".el-submenu__title i").removeClass('el-icon-arrow-down').addClass("fa fa-caret-right")

</script>
</body>
</html>