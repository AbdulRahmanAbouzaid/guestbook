<?php

class MessagesController extends Controller {

    public function index()
    {
        $messages = Message::where('parent_id', '=', 0);
        $user = $this->getLoggedUser();
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



     public function deleteMessage()
    {
        $user = $this->getLoggedUser();
        $message = Message::find($_GET['id']);
        if($user->id == $message->user_id){
            Message::delete($message->id);
            if($message->isParentMsg()){
                $message->deleteReplies();
            }
        }


        return $this->redirectTo('/');
    }



    public function updateMessage()
    {
        $this->validate($_POST, [
            'body' => 'required'
        ]);

        $user = $this->getLoggedUser();
        $message = Message::find($_POST['message_id']);
        if($user->id == $message->user_id){
            Message::update($message->id, [
                'body' => $_POST['body'],
            ]);
        }

        return $this->redirectTo('/');
    }


}