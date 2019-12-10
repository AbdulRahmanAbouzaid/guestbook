<?php 

class Message extends Model {
    protected static $table = "messages";

    public static function create($data)
    {
        Message::insert([
            'user_id' => $user->id,
            'body' => $data['body'],
            'parent_id' => $data['parent_id'] ? $data['parent_id'] : 0
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
}