<div class="wrapper_main_body">
	<div class="wrapper_form_inputs">
		<form action="/guestbook/main/editwrite/" method="POST">
			<input type="hidden" name="id" value="{ID}" />
			<div class="wrapper_input_name"><input class="input_name" type="text" name="name_user" value="{NAME}" /></div>
			<div class="wrapper_input_text"><textarea maxlength="500" class="input_text_user" name="text_user">{LONG_TEXT}</textarea></div>
			<div class="wrapper_center">
				<div class="wrapper_input_submit"><input class="input_submit" type="submit" name="submit"></div>
			</div>
		</form>
		<div class="foot_message" style="border: 0;">
			<div class="foot_message_menu">date last edit: {DATE_CHANGE}</div>
			<div class="foot_message_menu"><a href="/guestbook/">Home</a></div>
		</di>
	</div>
</div>