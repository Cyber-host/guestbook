                            <div class="wrapper_informs">
							<div class="head_message">{NAME}</div>
							<div class="text_message">{SHORT_TEXT}</div>
							<div class="foot_message">
								<div class="foot_message_menu"><a href="/guestbook/main/readmore/{ID}">Read more...</a></div>
								<?php //if(!isset($_SESSION['authorization']) && $_SESSION['id_user'] == "{ID}"){ ?>
                                                                <div class="foot_message_menu"><a href="/guestbook/main/edit/{ID}">Edit</a></div>
								<div class="foot_message_menu"><a href="/guestbook/main/delete/{ID}">Delete</a></div>
                                                                <?php //}; ?>
								<div class="foot_message_menu">date post: {DATE_CREATE}</div>
							</div>
                            </div>