<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;

class VideosController extends Controller
{
    
    public function store(Request $request){
        $video = new Video();
        $video->title = $request->title;
        $video->description = $request->description;
        $video->slug = strtolower(str_replace(' ', '-', $request->title));
        $youtube = $this->returnIdYoutube($request->url);
        $video->youtube_id = $youtube;
        $video->image = "https://img.youtube.com/vi/{$youtube}/0.jpg";
        !empty($request->featured) ? $video->featured = 1 : $video->featured = 0;
        $video->activated = 1;
        $video->created_at = now();
        $video->category_id = $request->category;
        $saved = $video->save();

        if($saved){
            //
        }

        return redirect()->route('browser');

    }

    public function returnIdYoutube($link){
        $video_id = explode("?v=", $link); // For videos like http://www.youtube.com/watch?v=...
        if (empty($video_id[1]))
            $video_id = explode("/v/", $link); // For videos like http://www.youtube.com/watch/v/..
        $video_id = explode("&", $video_id[1]); // Deleting any other params
        $video_id = $video_id[0];

        return $video_id;

    }

}
