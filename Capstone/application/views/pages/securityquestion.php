<h2>Change Security Question</h2>
</br>
<body>
<div class = "md-col 6">
<form method="POST">
	<div class="form-group">
Security Question:
<select name = "security_question">
	<option value = "1">What is your hobby?</option>
	<option value = "2">Where city/town where you born in?</option>
	<option value = "3">What city did your parents meet in?</option>
	<option value = "4">What is your father's middle name?</option>
	<option value = "5">Who was your favourite teacher in school?</option>
</select>
</br>
</br>
Answer:
<input type="text" class="form-control" name="security_answer" />
</br>
<button type = "submit" class = "btn btn-primary" value = "Set question/answer" name = "setsecurity">Save all changes</button>
<button type = "submit" class = "btn btn-primary">Cancel</button>
</form>
	<?php $username = $_SESSION['username']; ?>
<div>
</body>