<?php

class MessagesController extends Controller {

    public function index()
    {
        $messages = Message::where('parent_id', '=', 0);
        require 'views/index.view.php';
    }



    public function addMessage()
    {
        $this->validate($_POST, [
            'body' => 'required'
        ]);

        $user = $this->getLoggedUser();
        $_POST['user_id'] = $user->id;

        Message::create($_POST);

        return $this->redirectTo('/');
    }


}