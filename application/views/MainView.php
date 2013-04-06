
<div class="wrapper_main_body">
    <div>
        <?php if(!Session::issets('authorization')){ ?>
        <div><a href="/guestbook/registration">Registration</a></div>
        <div><a href="/guestbook/authorization">Authorization</a></div>
        <?php }else{ ?>
        <div><a href="/guestbook/authorization/exit">Exit <?php Session::trace('name_user'); ?></a></div>
        <?php }; ?>
    </div>
	<div class="wrapper_form_inputs">
            <?php if(Session::issets('authorization')){ ?>
		<form action="/guestbook/main/add" method="POST">
			<div class="wrapper_input_name"><input class="input_name" type="text" name="name_user" value="name..."></div>
			<div class="wrapper_input_text"><textarea maxlength="500" class="input_text_user" name="text_user">Text...</textarea></div>
			<div class="wrapper_center">
				<div class="wrapper_input_submit"><input class="input_submit" type="submit" name="submit"></div>
			</div>
		</form>
            <?php }; ?>
			<div class="wrapper_informs_main"> 
                                <?php echo $data[0]; ?>	
				<form>
					<div class="select_page">
						<select id="pages" name="pages">
						<?php 
							$currentPage	=	explode('/', $_SERVER['REQUEST_URI']);
							$other = $other / 10;
							for($i=0; $i<$other; $i++){ ?>
								<option <?php if($currentPage[4] == $i+1) echo "selected"; ?> class="np" value="<?php echo $i+1; ?>"><?php echo $i+1; ?></option>
						<?php }; ?>
						</select>
					</div>
				</form>
			</div>
			
	</div>
</div>