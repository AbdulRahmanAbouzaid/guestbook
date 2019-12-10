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
    	<div class="form-group">
            <textarea name="content" class="form-control" id="exampleFormControlTextarea3" rows="6"></textarea>
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
        	        <p><strong><?= $message->user()->username ?></strong>
        	       </p>
        	       <div class="clearfix"></div>
        	        <p><?= $message->body ?></p>
                    <div class="form-group">
                        <textarea class="form-control" id="exampleFormControlTextarea3" rows="2" placeholder="Leave a Reply to the Message"></textarea>
                    </div>
        	        <p>
        	            <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i>Reply</a>
        	       </p>
        	    </div>
	        </div>
            <?php foreach($message->replies() as $reply) {?>
            <!-- Replies Section Begin-->
        	<div class="card card-inner">
        	    <div class="card-body">
        	        <div class="row">
                	    <div class="col-md-2">
                	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                	        <!-- <p class="text-secondary text-center">15 Minutes Ago</p> -->
                	    </div>
                	    <div class="col-md-10">
                	        <p><strong><?=$reply->user()->username?></strong></p>
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

<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>