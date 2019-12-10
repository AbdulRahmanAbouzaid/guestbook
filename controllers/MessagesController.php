<?php

class MessagesController extends Controller {

    public function index()
    {
        $messages = Message::where('parent_id', '=', 0);
        require 'views/index.view.php';
    }


}