<?php

if($msg == 0): ?>
<div class="col-12 col-lg-8">
	<form method="post">
		<div class="form-group">
			<label for="exampleInputEmail1">username:</label>
			<input type="input" class="form-control" id="username">

			<label for="exampleInputEmail1">Email address</label>
			<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

			<label for="title">Title:</label>
			<input type="input" class="form-control" id="title" placeholder="Enter title">

			<label for="content">Content</label>
			<textarea class="form-control" id="content" rows="3"></textarea>
		</div>
		<button type="submit" class="btn btn-primary" name="submit">Submit</button>
	</form>
</div>
<?php else : ?>
<div class="col-12 col-lg-8"> We will contact with you asap! </div>
<?php endif?>
