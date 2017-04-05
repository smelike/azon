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

                <el-tooltip class="item" effect="light" content="产品营销" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="components/shuadan/shuadan.html" @click="changeUrl">
                        <i class="fa fa-clone"></i>
                        <span class="layout-text-block">产品营销</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="子任务管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="components/zirenwu/zirenwu.html" @click="changeUrl">
                        <i class="fa fa-file-o"></i>
                        <span class="layout-text-block">子任务管理</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="订单管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="components/dingdan/dingdan.html" @click="changeUrl">
                        <i class="fa fa-file-excel-o"></i>
                        <span class="layout-text-block">订单管理</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="上评管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="components/pingjia/s-ping.html" @click="changeUrl">
                        <i class="fa fa-share-square"></i>
                        <span class="layout-text-block">上评管理</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="上Feedback" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="components/feedback/s-feedback.html" @click="changeUrl">
                        <i class="fa fa-share-square-o"></i>
                        <span class="layout-text-block">上Feedback</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="收藏夹" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="components/collect/collect-m.html" @click="changeUrl">
                        <i class="fa fa-folder-o"></i>
                        <span class="layout-text-block">收藏夹</span>
                    </el-menu-item>
                </el-tooltip>
                <el-tooltip class="item" effect="light" content="直评" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="components/zhiping/zhiping-m.html" @click="changeUrl">
                        <i class="fa fa-star-o"></i>
                        <span class="layout-text-block">直评</span>
                    </el-menu-item>
                </el-tooltip>
                <el-tooltip class="item" effect="light" content="问答" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="components/QA/QA-m.html" @click="changeUrl">
                        <i class="fa fa-commenting-o"></i>
                        <span class="layout-text-block">问答</span>
                    </el-menu-item>
                </el-tooltip>
                <el-tooltip class="item" effect="light" content="点赞" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="components/dianzan/dianzan-m.html" @click="changeUrl">
                        <i class="fa fa-thumbs-o-up"></i>
                        <span class="layout-text-block">点赞</span>
                    </el-menu-item>
                </el-tooltip>
            </el-submenu>
        </el-tooltip>
        <el-tooltip class="item" effect="dark" content="基础管理" placement="right-start" :disabled="isDisabled">
            <el-submenu index="2">
                <template slot="title"><span class="layout-text">基础管理</span></template>

                <el-tooltip class="item" effect="light" content="产品管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="2-1">
                        <i class="fa fa-cubes"></i>
                        <span class="layout-text-block">产品管理</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="店铺管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="2-2">
                        <i class="fa fa-shopping-basket"></i>
                        <span class="layout-text-block">店铺管理</span>
                    </el-menu-item>
                </el-tooltip>

                <el-tooltip class="item" effect="light" content="分类管理" placement="right"
                            :disabled="isDisabled">
                    <el-menu-item index="2-3">
                        <i class="fa fa-braille"></i>
                        <span class="layout-text-block">分类管理</span>
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