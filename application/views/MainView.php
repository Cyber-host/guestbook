<div class="wrapper_main_body">
	<div class="wrapper_form_inputs">
		<form action="/guestbook/main/add" method="POST">
			<div class="wrapper_input_name"><input class="input_name" type="text" name="name_user" value="name..."></div>
			<div class="wrapper_input_text"><textarea maxlength="500" class="input_text_user" name="text_user">Text...</textarea></div>
			<div class="wrapper_center">
				<div class="wrapper_input_submit"><input class="input_submit" type="submit" name="submit"></div>
			</div>
		</form>
			<div class="wrapper_informs_main"> 
				<div class="wrapper_informs">
					<?php
						foreach($pData as $key => $value){ ?>
							<div class="head_message"><?php echo $value['name']; ?></div>
							<div class="text_message"><?php echo $value['short_text']; ?></div>
							<div class="foot_message">
								<div class="foot_message_menu"><a href="/guestbook/main/readmore/<?php echo $value['id']; ?>">Read more...</a></div>
								<div class="foot_message_menu"><a href="/guestbook/main/edit/<?php echo $value['id']; ?>">Edit</a></div>
								<div class="foot_message_menu"><a href="/guestbook/main/delete/<?php echo $value['id']; ?>">Delete</a></div>
								<div class="foot_message_menu">date post: <?php echo $value['datecreate']; ?></div>
							</div>
						<?php  }
				
					?>
				</div>
				
				<form>
					<div class="select_page">
						<select id="pages" name="pages">
						<?php echo "!!!";
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