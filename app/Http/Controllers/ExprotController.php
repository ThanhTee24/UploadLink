<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Label;
use App\Link;

class ExportController extends Controller implements FromCollection, WithHeadings
{	

    use Exportable;

    public function collection()
    {   

        $link = Link::select('id',
                    'link',
                    'label',
                    'percents')->get();
           
    
        
        foreach ($link as $key => $row){    
                $product_array[] = array(  
                '0'=> $row->id,
                '1'=> $row->link,                
                '2'=> $row->label,
                '3'=> $row->lercents,
                
                );
            }
          
        // dd($product_array);
        return (collect($product_array));
    }

    public function headings(): array
    {
        return [
            'id',
            'Link',
            'Label',
            'Percents',
           
        ];
    }

    public function export(){
     return Excel::download(new ExportController(), 'Link.csv');

}


}
