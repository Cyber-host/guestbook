			<div class="wrapper_informs_main"> 
				<div class="wrapper_informs">
					<div class="head_message"><?php echo $data['data']['name']; ?></div>
							<div class="text_message" style="overflow-x: scroll; height: 200px;"><?php echo $data['data']['long_text']; ?></div>
							<div class="foot_message">
								<div class="foot_message_menu"><a href="/guestbook/main">Home</a></div>
                                                                <?php 
                                                                    Session::init();
                                                                    if(Session::issets('authorization') && Session::get('id_user') == $data['data']['id_user']){ ?>
								<div class="foot_message_menu"><a href="/guestbook/main/edit/<?php echo $data['data']['id']; ?>">Edit</a></div>
								<div class="foot_message_menu"><a href="/guestbook/main/delete/<?php echo $data['data']['id']; ?>">Delete</a></div>
                                                                    <?php }; ?>
                                                                <div class="foot_message_menu">date post: <?php echo $data['data']['datecreate']; ?></div>
							</div>
				</div>
			</div>