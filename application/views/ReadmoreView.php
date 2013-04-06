			<div class="wrapper_informs_main"> 
				<div class="wrapper_informs">
					<div class="head_message"><?php echo $data[0]['name']; ?></div>
							<div class="text_message" style="overflow-x: scroll; height: 200px;"><?php echo $data[0]['long_text']; ?></div>
							<div class="foot_message">
								<div class="foot_message_menu"><a href="/guestbook/main">Home</a></div>
								<div class="foot_message_menu"><a href="/guestbook/main/edit/<?php echo $data[0]['id']; ?>">Edit</a></div>
								<div class="foot_message_menu"><a href="/guestbook/main/delete/<?php echo $data[0]['id']; ?>">Delete</a></div>
								<div class="foot_message_menu">date post: <?php echo $data[0]['datecreate']; ?></div>
							</div>
				</div>
			</div>