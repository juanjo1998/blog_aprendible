<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function destroy(Image $image)
    {
        Storage::delete([$image->url]);

        $image->delete();

        return redirect()->route('admin.posts.index')->with('message','El post se elimino correctamente');
    }
}
