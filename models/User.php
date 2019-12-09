<?php 


Class User extends Model {
    protected static $table = 'users';

    public static function create($request)
    {
        return static::insert([
            'email' => $request['email'],
            'password' => $request['password'],
            'username' => $request['username']
        ]);
    }
}