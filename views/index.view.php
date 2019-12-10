<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Messages</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
    <div style="display: flex; justify-content: space-between;">
    	<h2 class="text">Hello <?=$user->username?>, Write something cool</h2>
        <a href="/logout">Logout</a>
    </div>
    <form method="POST" action="/messages/add">
        <?php require 'layout/errors.view.php' ?>
    	<div class="form-group">
            <textarea name="body" class="form-control" id="exampleFormControlTextarea3" rows="6"></textarea>
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
	<!-- Main Message Start -->
    <?php foreach($messages as $message) {?>
	<div class="card">
	    <div class="card-body">
	        <div class="row">
        	    <div class="col-md-2">
        	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
        	        <!-- <p class="text-secondary text-center">15 Minutes Ago</p> -->
        	    </div>
        	    <div class="col-md-10" id="message<?=$message->id?>">
                    <div class="message-header">
            	        <p><strong><?= $message->user()->username ?></strong></p>
                        <?php if($user->id == $message->user_id){ ?>
                            <div class="dropdown float-right" style="position: absolute;top: 0px;right: 0px;">
                              <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" onclick="showUpdateForm(<?=$message->id?>)">Edit</a>
                                <a class="dropdown-item" href="messages/delete?id=<?=$message->id?>">Delete</a>
                              </div>
                            </div>
                        <?php } ?>
                    </div>
        	       <div class="clearfix"></div>
        	        <p><?= $message->body ?></p>
                    <form method="POST" action="/messages/add">
                        <?php require 'layout/errors.view.php' ?>
                        <input type="hidden" name="parent_id" value="<?=$message->id?>">
                        <div class="form-group">
                            <textarea name="body" class="form-control" id="exampleFormControlTextarea3" rows="2" placeholder="Leave a Reply to the Message"></textarea>
                        </div>
            	        <p>
            	            <button type="submit" class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i>Reply</button>
            	       </p>
                   </form>
        	    </div>
                <?php if($user->id == $message->user_id){ ?>
                    <div class="col-md-10" id="update-form<?=$message->id?>" style="display: none">
                        <form method="POST" action="/messages/update">
                            <div class="form-group">
                                <textarea name="body" class="form-control" id="exampleFormControlTextarea3" rows="2" required><?=$message->body?></textarea>
                            </div>
                            <input type="hidden" name="message_id" value="<?=$message->id?>">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a class="btn btn-danger" onclick="cancel(<?=$message->id?>)">cancel</a>
                       </form>
                    </div>
                <?php } ?>
	        </div>
            <?php foreach($message->replies() as $reply) {?>
            <!-- Replies Section Begin-->
        	<div class="card card-inner" style="max-width: 1000px;">
        	    <div class="card-body">
        	        <div class="row">
                	    <div class="col-md-2">
                	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                	        <!-- <p class="text-secondary text-center">15 Minutes Ago</p> -->
                	    </div>
                	    <div class="col-md-10" id="message<?=$reply->id?>">
                            <div class="message-header">
                    	        <p><strong><?=$reply->user()->username?></strong></p>
                                <?php if($user->id == $reply->user_id){ ?>
                                    <div class="dropdown float-right" style="position: absolute;top: 0px;right: 0px;">
                                      <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" onclick="showUpdateForm(<?=$reply->id?>)">Edit</a>
                                        <a class="dropdown-item" href="messages/delete?id=<?=$reply->id?>">Delete</a>
                                      </div>
                                    </div>
                                <?php } ?>
                            </div>
                	        <p><?=$reply->body?></p>
                	    </div>
                        <?php if($user->id == $reply->user_id){ ?>
                            <div class="col-md-10" id="update-form<?=$reply->id?>" style="display: none">
                                <form method="POST" action="/messages/update">
                                    <div class="form-group">
                                        <textarea name="body" class="form-control" id="exampleFormControlTextarea3" rows="2" required><?=$reply->body?></textarea>
                                    </div>
                                    <input type="hidden" name="message_id" value="<?=$reply->id?>">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a class="btn btn-danger" onclick="cancel(<?=$reply->id?>)">cancel</a>
                               </form>
                            </div>
                        <?php } ?>
        	        </div>
        	    </div>
            </div>
            <?php } ?>
            <!-- Replies Section End -->
	    </div>
	</div> <!-- Main Message End -->
    <?php } ?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    function showUpdateForm(msg_id) {
        var message = document.getElementById("message" + msg_id);
        var updateForm = document.getElementById("update-form" + msg_id);
        message.style.display = "none";
        updateForm.style.display = "block";
    }

    function cancel(msg_id){
        var message = document.getElementById("message" + msg_id);
        var updateForm = document.getElementById("update-form" + msg_id);
        updateForm.style.display = "none";
        message.style.display = "block";
    }

</script>
</body>
</html>