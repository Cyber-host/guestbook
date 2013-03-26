			<div class="wrapper_informs_main"> 
				<div class="wrapper_informs">
					<div class="head_message"><?php echo $pData['name']; ?></div>
							<div class="text_message" style="overflow-x: scroll; height: 200px;"><?php echo $pData['long_text']; ?></div>
							<div class="foot_message">
								<div class="foot_message_menu"><a href="/guestbook/main">Home</a></div>
								<div class="foot_message_menu"><a href="/guestbook/main/edit/<?php echo $pData['id']; ?>">Edit</a></div>
								<div class="foot_message_menu"><a href="/guestbook/main/delete/<?php echo $pData['id']; ?>">Delete</a></div>
								<div class="foot_message_menu">date post: <?php echo $pData['datecreate']; ?></div>
							</div>
				</div>
			</div>