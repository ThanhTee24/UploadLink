<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Link;
use App\Label;
class Productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        
      
        // return redirect()->back()->with('thanhcong', 'Đã thành công');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $product = Link::create($request->all());
        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Link $product)
    {   
       return $product;
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
        return $product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product->delete();
    }


    function CallAPI()
{   
   
    $link = Link::select('id','link')->get();

    foreach ($link as $key => $value) {
    $id = $value->id;   
    $url = substr($value->link, 0, -2);
   
    $curl = curl_init();

	curl_setopt_array($curl, array(
  	CURLOPT_URL => "35.208.181.200/predict",
  	CURLOPT_RETURNTRANSFER => true,
  	CURLOPT_ENCODING => "",
  	CURLOPT_MAXREDIRS => 10,
  	CURLOPT_TIMEOUT => 0,
  	CURLOPT_FOLLOWLOCATION => true,
  	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  	CURLOPT_CUSTOMREQUEST => "POST",
  	CURLOPT_POSTFIELDS => array('url' => $url),
  	CURLOPT_HTTPHEADER => array(
    "Content-Type: multipart/form-data; boundary=--------------------------474483195835184403629710"
  		),
			));


    $response = curl_exec($curl);
 	// var_dump($response);
 	// dd($response);
    curl_close($curl);
    
    $json = str_replace( "'", '"', $response );
   	
    
   	$obj = json_decode($json);
 	// var_dump($json);
 	
    $tempV = 0;
    $tempK ='';
    $link = new Link;
    
    foreach ($obj as $key => $value) {
    	if($value > $tempV){
    		$tempV= $value;
    		$tempK = $key;
    	}
    	
    }
    
    $label = Label::all();
    foreach ($label as $value) {
        if($value->label == $tempK){
            DB::table('Link')->where('id',$id)->update([
                'label' => $value->id_label
            ]);
        }
        
    }
   
    
    DB::table('Link')->where('id',$id)->update([
                'percent' => $tempV
            ]);
    DB::table('Link')->where('id',$id)->update([
                'access' => 1
            ]);
    
       }
    return redirect()->back()->with('thanhcong', 'Đã thành công');
        
}   


}
