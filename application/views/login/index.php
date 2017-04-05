<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>Login In Page</title>
		<style type="text/css">
		
			* {margin-left: 5%; margin-right: 5%;}
			
			table {
				margin-top: 60px;
				padding: 20px 30px;
				border: 1px solid #789609;
			}
			tr{line-height: 30px;}
			input {padding: 6px 4px;}
		</style>
	</head>

	<body>

		<form action="<?php echo base_url('login/login')?>" method="post">
			<?php if (isset($arr_error) AND $arr_error) :?>
				<?php foreach($arr_error as $error):?>
					<div style="color: red;"><?php echo $error?></div>
				<?php endforeach;?>
			<?php endif;?>
			<table>
				<caption>
					<h3><?php echo empty($title)? "Platform User Login" : $title;?></h3>
				</caption>
				<tr>
					<td>Username:</td>
					<td><input type="text" name="user_name" required /></td>
				</tr>
				<tr>
					<td>Password:</td>
					<td><input type="password" name="password" required /></td>
				</tr>
				<tr>
					<td>验证码:</td>
					<td>
						<input type="text" name="captcha" required />
						<a href="javascript:void(0)">
							<img id="id_captcha" src="<?php echo base_url('login/showCaptcha');?>" onclick="changeCaptcha(this)" />
						</a>
					</td>
				</tr>
				<tr>
					<td><input type="submit" value=" Sign In" /></td>
					<td><input type="reset" value=" reset" /></td>
				</tr>
			</table>
		</form>
	</body>
		
		<script type="text/javascript">
			// 点击更换验证码
			function changeCaptcha(that) {
				
				var src_url = "<?php echo base_url('login/showCaptcha?');?>" + Math.random();
				document.getElementById('id_captcha').src = src_url;
			}
		</script>
</html>