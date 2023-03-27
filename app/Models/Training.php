<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Training extends Model
{
    use HasFactory;

    private static $training, $image, $imageExtension, $imageName, $imageDirectory, $imageUrl;

    private static function getImage($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time() . '.' .  self::$imageExtension;
        self::$imageDirectory = 'img/upload/training/';
        self::$image->move(self::$imageDirectory, self::$imageName);
        self::$imageUrl = self::$imageDirectory . self::$imageName;
        return self::$imageUrl;
    }
    public static function createTraining($request)
    {
        self::$training = new Training();
        self::$training->category_id = $request->category_id;
        self::$training->teacher_id = Session::get('teacher_id');
        self::$training->title = $request->title;
        self::$training->description = $request->description;
        self::$training->starting_date = $request->starting_date;
        self::$training->price = $request->price;
        self::$training->image = self::getImage($request);
        self::$training->save();
    }

    public static function updateTraining($request, $id)
    {
        self::$training = Training::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$training->image))
            {
                unlink(self::$training->image);
            }
            self::$imageUrl = self::getImage($request);
        }
        else
        {
            self::$imageUrl = self::$training->image;
        }
        self::$training->category_id = $request->category_id;
        self::$training->teacher_id = Session::get('teacher_id');
        self::$training->title = $request->title;
        self::$training->description = $request->description;
        self::$training->starting_date = $request->starting_date;
        self::$training->price = $request->price;
        self::$training->image = self::$imageUrl;
        self::$training->save();
    }

    public static function deleteTraining($id)
    {
        self::$training = Training::find($id);
        if (file_exists(self::$training->image))
        {
            unlink(self::$training->image);
        }
        self::$training->delete();
    }
}
