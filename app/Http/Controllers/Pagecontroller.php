<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Link;
use App\Label;

class Pagecontroller extends Controller
{
    
    public function importID(Request $request) 
    {   if($request->file == null){
        return redirect()->back()->with('thanhcong', 'Đã thành công');
        }  
        else{
            $i=0;
        foreach(file($request->file) as $line) {
            $link = new Link;
            $link->link = $line;
            $link->save();
            $i++;
            if($i==10){
                
            }
        }
        return redirect()->back()->with('thanhcong', 'Đã thành công');
        }
    }



    public function getUploadlink(){
         $link = DB::table('Link')->paginate(10);
         $label = Label::all();
        return view('Uploadlink', compact('link','label'));
    }

    public function getReload($pa){
        
        $link = DB::table('Link')->paginate($pa);
        $label = Label::all();
        return view('table-data', compact('link','label'));
    }

    public function getdeleteAPI(){
        DB::table('Link')->truncate();
         return redirect()->back()->with('thanhcong', 'Đã thành công');
     }

    public function getdeletePre(){
        $link = Link::all();

        foreach ($link as $value) {
            DB::table('Link')->where('id',$value->id)->update([
                'label' => ''
            ]);
            DB::table('Link')->where('id',$value->id)->update([
                'percent' => 0
            ]);
            DB::table('Link')->where('id',$value->id)->update([
                'access' => 0
            ]);

        }
         return redirect()->back()->with('thanhcong', 'Đã thành công');
        }

        public function getdata(){

              $link = DB::table('Link')->paginate(10);
         $label = Label::all();
        return view('table-data', compact('link','label'));

        }

}
