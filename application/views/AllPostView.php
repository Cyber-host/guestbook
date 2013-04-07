<?php   foreach($data as $key => $value){  ?>
                            <div class="wrapper_informs">
							<div class="head_message"><?php echo $value['name']; ?></div>
							<div class="text_message"><?php echo $value['short_text']; ?></div>
							<div class="foot_message">
								<div class="foot_message_menu"><a href="<?php echo $URL; ?>main/readmore/<?php echo $value['id']; ?>">Read more...</a></div>
								<?php 
                                                                    Session::init();
                                                                    if(Session::issets('authorization') && Session::get('id_user') == $value['id_user']){ ?>
                                                                <div class="foot_message_menu"><a href="<?php echo $URL; ?>main/edit/<?php echo $value['id']; ?>">Edit</a></div>
								<div class="foot_message_menu"><a href="<?php echo $URL; ?>main/delete/<?php echo $value['id']; ?>">Delete</a></div>
                                                                <?php }; ?>
								<div class="foot_message_menu">date post: <?php echo $value['datecreate']; ?></div>
							</div>
                            </div>
<?php }; ?>