
	<script type="text/javascript">
		try{ace.settings.loadState('main-container')}catch(e){}
	</script>

	<div id="sidebar" class="sidebar responsive ace-save-state">
		<script type="text/javascript">
			try{ace.settings.loadState('sidebar')}catch(e){}
		</script>

		<ul class="nav nav-list">
			<li class="open">
				<a href="<?php echo site_url('/home/index');?>">
					<i class="menu-icon fa fa-home"></i>
					<span class="menu-text"> 首页 </span>
				</a>
				<b class="arrow"></b>
			</li>
			<li class="open">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-wrench"></i>
					<span class="menu-text"> 任务管理 </span>
					<b class="arrow fa fa-angle-down"></b>
				</a>
				<b class="arrow"></b>
				<ul class="submenu">
					<?php if(in_array('/task/index', $priv)){ ?>
						<li class="<?php if($route == '/task/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/task/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								任务管理
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
					<?php if(in_array('/order/index', $priv)){ ?>
						<li class="<?php if($route == '/order/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/order/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								下单操作
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
					<?php if(in_array('/ordermanager/index', $priv)){ ?>
						<li class="<?php if($route == '/ordermanager/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/ordermanager/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								订单管理
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
					<?php if(in_array('/qatask/index', $priv)){ ?>
						<li class="<?php if($route == '/qatask/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/qatask/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								QA任务
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
					<?php if(in_array('/collect/index', $priv)){ ?>
						<li class="<?php if($route == '/collect/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/collect/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								加入收藏
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
					<?php if(in_array('/guestcomment/index', $priv)){ ?>
						<li class="<?php if($route == '/guestcomment/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/guestcomment/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								游客评论
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
					<?php if(in_array('/praise/index', $priv)){ ?>
						<li class="<?php if($route == '/praise/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/praise/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								评价点赞
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
				</ul>
			</li>
			<li class="open">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa-wrench"></i>
					<span class="menu-text"> 财务管理 </span>
					<b class="arrow fa fa-angle-down"></b>
				</a>
				<b class="arrow"></b>
				<ul class="submenu">
					<?php if(in_array('/bills/index', $priv)){ ?>
						<li class="<?php if($route == '/bills/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/bills/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								财务明细
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
				</ul>
			</li>
			<li class="open">
				<a href="#" class="dropdown-toggle">
					<i class="menu-icon fa fa-cog"></i>
					<span class="menu-text"> 系统设置 </span>
					<b class="arrow fa fa-angle-down"></b>
				</a>
				<b class="arrow"></b>
				<ul class="submenu">
					<?php if(in_array('/platform/index', $priv)){ ?>
						<li class="<?php if($route == '/platform/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/platform/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								平台设置
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
					<?php if(in_array('/saller/index', $priv)){ ?>
						<li class="<?php if($route == '/saller/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/saller/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								卖家管理
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
					<?php if(in_array('/setting/index', $priv)){ ?>
						<li class="<?php if($route == '/setting/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/setting/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								基础设置
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
					<?php if(in_array('/setting/changepassword', $priv)){ ?>
						<li class="<?php if($route == '/setting/changepassword'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/setting/changepassword');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								修改密码
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
					<?php if(in_array('/rate/index', $priv)){ ?>
						<li class="<?php if($route == '/rate/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/rate/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								查看汇率
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
					<?php if(in_array('/user/index', $priv)){ ?>
						<li class="<?php if($route == '/user/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/user/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								用户管理
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
					<?php if(in_array('/usergroup/index', $priv)){ ?>
						<li class="<?php if($route == '/usergroup/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/usergroup/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								角色管理
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
					<?php if(in_array('/rule/index', $priv)){ ?>
						<li class="<?php if($route == '/rule/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/rule/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								权限菜单
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
					<?php if(in_array('/notice/index', $priv)){ ?>
						<li class="<?php if($route == '/notice/index'):?>active<?php endif;?>">
							<a href="<?php echo site_url('/notice/index');?>">
								<i class="menu-icon fa fa-caret-right"></i>
								发布通知
							</a>
							<b class="arrow"></b>
						</li>
					<?php } ?>
				</ul>
			</li>
		</ul><!-- /.nav-list -->

		<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
			<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
		</div>
	</div>