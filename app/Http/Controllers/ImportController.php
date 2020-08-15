<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Site;
use App\Checkpoint;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function import(Request $request) {
        
        $site = new Site();
        $site->fill($request->all());
        $site->save();
        
        $file = $request->file('file');
        $csv_data = mb_convert_encoding ( file_get_contents($file), "UTF-8" );
        $csv_data = explode("\n",$csv_data);
        
        $checkpoints = array();
        $readnext = false;
        
        foreach($csv_data as $row) {
            
           
            if($readnext) {
                if(preg_match('/(;")?(\d+?)\.(\d) - ([^"]+)(")?/',$row,$matches)) {
                    
                    ($checkpoints[$matches[2]])->code = $matches[2].".".$matches[3];
                    ($checkpoints[$matches[2]])->comment = $matches[4];
                    
                    if(isset($matches[5])) {
                        $readnext = false;
                    }
                }
                else {
                    $readnext=false;
                }
                
            }
            elseif(preg_match("/^;(\d{3,4});;(.*?);+([^;]*)/",$row,$matches)) {
                
                $checkpoint = new Checkpoint();
                $checkpoint->subcat = $matches[1];
                $checkpoint->checkpoint = $matches[2];
                $checkpoints[$matches[1]] = $checkpoint;
            }
            elseif(preg_match("/;Comment;+/", $row)) {
                
                $readnext = true;
            }
                
        }
        
        $site->checkpoints()->saveMany($checkpoints);
        
    }
}
