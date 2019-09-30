<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}
	public function index()
	{
		$insert = [
			'form_params' => [
				'title' => 'ini percobaan' ,
				'description' => 'ini percobaan post client' ,
				'created_at' => '2019-08-08 00:00:00' ,
				'created_at' => '2019-08-08 00:00:00'
			]
		];
		$delete = [
			'form_params' => [
				'id' => '1'
			]
		];
		$put = [
			'form_params' => [
				'id' => '5',
				'title' => 'ini percobaan edit',
				'description'=>'dsad'
			]
		];
	$data['get'] = $this->guzzle_get('http://localhost/rest/api/','item');

		$data['post'] = $this->guzzle_post('http://localhost/rest/api/item',$insert);

	// $data['delete'] = $this->guzzle_delete('http://localhost/rest/api/item',$delete);
	// $data['put'] = $this->guzzle_put('http://localhost/rest/api/item',$put);
	$this->load->view('welcome_message',$data);
	// $this->load->view('welcome_message');
}
public function guzzle_get($url,$uri){
	$client = new GuzzleHttp\Client(['base_uri' => $url]);
	$response = $client->request('GET',$uri);
	return $response->getBody()->getContents();
}
public function guzzle_post($uri,$json){
	$client = new GuzzleHttp\Client(['base_uri' => $uri]);
	$response = $client->request('POST',$uri, $json);
}
public function guzzle_delete($uri,$json){
	$client = new GuzzleHttp\Client(['base_uri' => $uri]);
	$response = $client->delete($uri, $json);
}
public function guzzle_put($uri,$json){
	$client = new GuzzleHttp\Client(['base_uri' => $uri]);
	$response = $client->request('PUT',$uri, $json);
}

}
