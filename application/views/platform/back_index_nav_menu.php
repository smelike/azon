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
            <el-menu-item index="components/home/home.html" @click="changeUrl">
                <i class="fa fa-home"></i>
                <span class="layout-text-block">首页</span>
            </el-menu-item>
        </el-tooltip>
        <el-tooltip class="item" effect="dark" content="任务管理" placement="right-start" :disabled="isDisabled">
            <el-submenu index="1">
                <template slot="title"><span class="layout-text">任务管理</span></template>


                <el-tooltip class="item" effect="light" content="写评任务" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="components/x-ping/x-ping.html" @click="changeUrl">
                        <i class="fa fa-pencil-square-o"></i>
                        <span class="layout-text-block">写评任务</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="评价管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="1-5">
                        <i class="fa fa-file-text-o"></i>
                        <span class="layout-text-block">评价管理</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="写Feedback" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="1-7">
                        <i class="fa fa-pencil"></i>
                        <span class="layout-text-block">写Feedback</span>
                    </el-menu-item>
                </el-tooltip>
                <el-tooltip class="item" effect="light" content="Feedback管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="1-8">
                        <i class="fa fa-book"></i>
                        <span class="layout-text-block">Feedback管理</span>
                    </el-menu-item>
                </el-tooltip>
                <el-tooltip class="item" effect="light" content="翻译任务" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="1-9">
                        <i class="fa fa-folder-o"></i>
                        <span class="layout-text-block">翻译任务</span>
                    </el-menu-item>
                </el-tooltip>

            </el-submenu>
        </el-tooltip>
        <el-tooltip class="item" effect="dark" content="财务管理" placement="right-start" :disabled="isDisabled">
            <el-submenu index="3">
                <template slot="title"><span class="layout-text">财务管理</span></template>

                <el-tooltip class="item" effect="light" content="用户账单" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="3-1">
                        <i class="fa fa-list"></i>
                        <span class="layout-text-block">用户账单</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="账单管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="3-2">
                        <i class="fa fa-clipboard"></i>
                        <span class="layout-text-block">账单管理</span>
                    </el-menu-item>
                </el-tooltip>


            </el-submenu>
        </el-tooltip>
        <el-tooltip class="item" effect="dark" content="系统设置" placement="right-start" :disabled="isDisabled">
            <el-submenu index="4">
                <template slot="title"><span class="layout-text">系统设置</span></template>

                <el-tooltip class="item" effect="light" content="数据字典" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="4-2">
                        <i class="fa fa-list-ol"></i>
                        <span class="layout-text-block">数据字典</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="用户管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="users/plat_users.html" @click="changeUrl">
                        <i class="fa fa-users"></i>
                        <span class="layout-text-block">用户管理</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="角色管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="role/plat_role.html" @click="changeUrl">
                        <i class="fa fa-user-circle"></i>
                        <span class="layout-text-block">角色管理</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="权限管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="rights/plat_rights.html" @click="changeUrl">
                        <i class="fa fa-unlock-alt"></i>
                        <span class="layout-text-block">权限管理</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="通知管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="tongzhi/plat_tongzhi.html" @click="changeUrl">
                        <i class="fa fa-bell-o"></i>
                        <span class="layout-text-block">通知管理</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="修改密码" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="4-3">
                        <i class="fa fa-key"></i>
                        <span class="layout-text-block">修改密码</span>
                    </el-menu-item>
                </el-tooltip>

            </el-submenu>
        </el-tooltip>
    </el-menu>
</div>