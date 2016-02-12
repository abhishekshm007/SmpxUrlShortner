<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hashids\Hashids;
use App\Url;
use App\Http\Controllers\Controller;
use Jenssegers\Agent\Agent;
use PhpParser\Node\Expr\Cast\Object_;

class UrlController extends Controller
{
	
	/* 
	 * Return limited url range $from $to
	 */
	public function getLimitedUrls($from, $to){
		if($from > $to){
			echo "Invalid Query";
			return;
		}
			$urls = Url::take($to)->skip($from)->get();
			echo $urls->toJson();
	}
	
	
	public function getLimitedUrlsUsingFrom($from){
		$count = Url::count();
		if($count <= $from){
			echo "No more Data found";
			return;
		}
		$limit = $count - $from; // the limit
		$urls = Url::skip($from)->take($limit)->get();
		echo $urls->toJson();
	}
	
	
	/**
	 * Redirect to long url
	 * @return rediect to long url 
	 */
	public function redirect(Request $request, $shortUrl){
		$agent = new Agent();
		$agent->setUserAgent($request->headers);
		
		$urls = Url::where('short_url', '=', $shortUrl)->get();
		if(!$urls->first())
		{
			echo "Not Found";
			return;
		}
		$url = $urls[0];
		$longUrl = $url['long_url'];
		
		
		$url->clicks = $url['clicks'] +1;
		$url->save();
		$url->hits()->create([
				'client_ip' => $_SERVER['REMOTE_ADDR'],
				'language' => $agent->languages()[0],
				'device' => $agent->device(),
				'platform' => $agent->platform(),
				'browser' => $agent->browser()
		]);
		//$agent->languages()[0],$agent->device(), $agent->platform(),$agent->browser(),$agent->robot();;;;
		return redirect($url['long_url']);
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $urls = Url::all();
        $res = new \stdClass();
        $res->count = $urls->count();
        $res->status = "success";
        $res->data = $urls;
        echo json_encode($res);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    	echo "done";
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
    	$hashids = new Hashids('smpx', 6);
    	$hashed_url = $hashids->encode(125);
    	
       	$url = new Url();
       	$url->long_url = $request["long_url"];
       	$url->short_url = config('app.url')+'/'+$hashed_url;
       	$url->is_active = true;
       	$url->clicks = 0;
       	$urlInstance = $url->create();
       	echo $urlInstance->toJson(),"hoeee";
       	return;
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
}
