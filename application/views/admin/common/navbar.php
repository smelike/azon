<!-- navbar -->
<div id="navbar" class="navbar navbar-default ace-save-state">
	<div class="navbar-container ace-save-state" id="navbar-container">
		<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
			<span class="sr-only">Toggle sidebar</span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>

			<span class="icon-bar"></span>
		</button>

		<div class="navbar-header pull-left">
			<a href="index.html" class="navbar-brand">
				<small>
					<i class="fa fa-leaf"></i>
					创客ERP系统-v1.0 --- 中介版
				</small>
			</a>
		</div>

		<div class="navbar-buttons navbar-header pull-right" role="navigation">
			<ul class="nav ace-nav">
			<li class="ace-nav-num">
                    <div>
                        <i class="ace-icon fa fa-yen white fa-2x"></i>
                        <span class="white">76</span>
                    </div>
                </li>
                <li class="ace-nav-num">
                    <div>
                        <i class="ace-icon fa fa-tasks white fa-2x"></i>
                        <span class="white">76</span>
                    </div>
                </li>

				<li class="light-blue dropdown-modal">
					<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $_SESSION['middler']['real_name'];?>
								</span>

						<i class="ace-icon fa fa-caret-down"></i>
					</a>

					<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
						<li>
							<a href="<?php echo site_url('/login/logout') ?>">
								<i class="ace-icon fa fa-power-off"></i>
								退出登陆
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>