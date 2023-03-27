<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category, $image, $imageExtension, $imageName, $directory, $imageUrl;

    private static function getImage($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time() . '.' . self::$imageExtension;
        self::$directory = 'img/upload/category/';
        self::$image->move(self::$directory, self::$imageName);
        self::$imageUrl = self::$directory . self::$imageName;
        return self::$imageUrl;
    }
    public static function createCategory($request)
    {
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->image = self::getImage($request);
        self::$category->save();
    }

    public static function  updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$imageUrl = self::getImage($request);
        }
        else
        {
            self::$imageUrl = self::$category->image;
        }
        self::$category->name = $request->name;
        self::$category->image = self::$imageUrl;
        self::$category->save();
    }

    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if (file_exists(self::$category->image))
        {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }
}
