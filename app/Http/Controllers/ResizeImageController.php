<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// import the Intervention Image Manager Class
use Intervention\Image\ImageManager;

class ResizeImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public static function getresize()
    {
        $items = null;
        $path = 'resize/ham';
        $folders = scandir(public_path($path));
        $results = null;
        if(count($folders)!=0){
            foreach($folders as $key => $folder){
                if($folder!='.' && $folder!='..' && $folder!='desktop.ini'  && $folder!='.DS_Store'){
                    // $value = str_replace("_","-",$folder);
                    // rename(public_path($path.'/'.$folder), public_path($path.'/'.$value));
                    $infolders = scandir(public_path($path.'/'.$folder));
                    if(count($infolders)!=0){
                        $valuein=null;
                        foreach($infolders as $keyin => $infolder){
                            if($infolder!='.' && $infolder!='..' && $infolder!='desktop.ini' && $infolder!='.DS_Store'){
                                $valuein[] = $infolder;
                                $items[] = base64_encode(public_path($path.'/'.$folder.'/'.$infolder));
                                // $items[] = public_path($path.'/'.$folder.'/'.$infolder);
                            }
                        }
                    }
                }
            }
        }
        // $data['items'] = $items;
        return count($items)!=0 ? $items : null;
    }

    public static function resize($realpath) {
        //decode_realpath
        $realpath = base64_decode($realpath);
        //resize
        $getimageinfo = getimagesize($realpath);
        
        if($getimageinfo){
            //set variable
            $new_width = 1800;
            $width = $getimageinfo[0];
            $height = $getimageinfo[1];
            $resize_ratio = $new_width / $width;
            $new_height = $height * $resize_ratio;

            $image = $realpath;
            // create an image manager instance with favored driver
            $manager = new ImageManager(array('driver' => 'imagick'));
            // to finally create image instances
            $image = $manager->make($image)->resize($new_width, $new_height)->save($image);
        }
        return $image==true ? $realpath : 'error';
    }

}