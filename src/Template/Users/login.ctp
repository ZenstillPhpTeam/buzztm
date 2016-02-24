<div class="login_deails">
	<div class="login_information">
		<h1><a href="#" ><?= $this->Html->image('buzz_logo.png', ['style' => 'width:250px;']);?></a></h1>
		<form name="loginform" id="loginform" method="post">
			<?php echo $this->Form->input('username');?>
			<?php echo $this->Form->input('password');?>
			<p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"> Remember Me</label></p>
			<p class="submit">
				<button type="submit" class="btn submit_btn">submit</button>
				
			</p>
		</form>
	</div>
</div>