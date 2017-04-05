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
                        欢迎您，<span><?php echo $user_data->real_name;?></span>
                        <i class="fa fa-caret-down"></i>
                    </span>
            <el-dropdown-menu slot="dropdown" id="user">
                <el-dropdown-item><a href="components/shuadan/shuadan.html">修改密码</a></el-dropdown-item>
                <el-dropdown-item><a href="<?php echo base_url('login/logout');?>">退出登录</a></el-dropdown-item>
            </el-dropdown-menu>
        </el-dropdown>
    </div>
</div>