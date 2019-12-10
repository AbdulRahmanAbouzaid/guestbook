<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from https://bootdey.com  -->
    <!--  All snippets are MIT license https://bootdey.com/license -->
    <title>Messages</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

<div class="container">
	<h2 class="text-center">Write something cool</h2>

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
        	    <div class="col-md-10">
                    <div class="message-header">
            	        <p><strong><?= $message->user()->username ?></strong></p>
                        <?php if($user->id == $message->user_id){ ?>
                            <div class="dropdown float-right" style="position: absolute;top: 0px;right: 0px;">
                              <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Actions
                              </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Edit</a>
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
                	    <div class="col-md-10">
                            <div class="message-header">
                    	        <p><strong><?=$reply->user()->username?></strong></p>
                                <?php if($user->id == $reply->user_id){ ?>
                                    <div class="dropdown float-right" style="position: absolute;top: 0px;right: 0px;">
                                      <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Edit</a>
                                        <a class="dropdown-item" href="messages/delete?id=<?=$reply->id?>">Delete</a>
                                      </div>
                                    </div>
                                <?php } ?>
                            </div>
                	        <p><?=$reply->body?></p>
                	    </div>
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
	
</script>
</body>
</html>