<?php 

namespace App\Http\Traits;

trait ImageTrait
{
    public function saveImage($image,$folder)
    {
        $image_name = time().".".$image->getClientOriginalExtension();
        $destination = $folder;
        $image->move($destination,$image_name);
        return  $image_name ;
    }



       // $file_name = $this->saveImage($request->photo, 'images/offers');

}