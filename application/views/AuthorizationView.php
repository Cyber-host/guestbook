			<?php if(isset($data[0])) echo $data[0]; ?>
                        <div class="wrapper_informs_main"> 
				<div class="wrapper_informs">
                                    <form action="/guestbook/authorization/post" method="POST">
                                        <div>Login:</div>
                                        <div><input type="text" name="login" /></div>
                                        <div>Password:</div>
                                        <div><input type="password" name="paswrd" /></div>
                                        <div><input type="submit" name="subm" value="Auth" /></div>
                                    </form>
                                    <div><a href="/guestbook/">Home</a></div>
				</div>
			</div>
