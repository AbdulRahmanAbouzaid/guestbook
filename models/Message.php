<?php 

class Message extends Model {
    protected static $table = "messages";

    public static function create($data)
    {
        Message::insert([
            'user_id' => $data['user_id'],
            'body' => $data['body'],
            'parent_id' => isset($data['parent_id']) ? $data['parent_id'] : 0
        ]);
    }


    public function user()
    {
        return User::find($this->user_id);
    }


    public function replies()
    {
        return self::where('parent_id', '=', $this->id);
    }


    public function isParentMsg()
    {
        return $this->parent_id == 0 ? true : false;
    }



    public function deleteReplies()
    {
        foreach ($this->replies() as $reply) {
            self::delete($reply->id);
        }
    }
}