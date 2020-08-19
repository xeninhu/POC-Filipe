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
        
        
        foreach($request->file('file') as $file) {
            
            
            $csv_data = file_get_contents($file);

            $site = new Site();
            preg_match('/WTG Pad No\.;+?([^;]+)/',$csv_data,$matches);
            $site->pad = $matches[1];
            preg_match('/Region name: ;+?([^;]+)/',$csv_data,$matches);
            $site->region = $matches[1];
            preg_match('/Site Name;+?([^;]+)/',$csv_data,$matches);
            $site->site = $matches[1];
            $site->save();

            $csv_data = mb_convert_encoding ( $csv_data, "UTF-8", "ISO-8859-1" );
            $csv_data = explode("\n",$csv_data);

            $checkpoints = array();
            $readnext = false;

            foreach($csv_data as $row) {


                if($readnext) {
                    if(preg_match('/(;")?(\d+?) - ([^";]+)(")?/',$row,$matches)) {

                        ($checkpoints[$matches[2]])->comment = $matches[3];

                        if(isset($matches[4])) {
                            $readnext = false;
                        }
                    }
                    else {
                        $readnext=false;
                    }

                }
                elseif(preg_match("/^;(\d{3,4});;(.*?);+([^;]+);+(\d{3,4}\.\d{1,2}+)?/",$row,$matches)) {

                    $checkpoint = new Checkpoint();
                    $checkpoint->subcat = $matches[1];
                    $checkpoint->checkpoint = $matches[2];
                    if(isset($matches[4]))
                        $checkpoint->code = $matches[4];
                    $checkpoints[$matches[1]] = $checkpoint;
                }
                elseif(preg_match("/;Comment;+/", $row)) {

                    $readnext = true;
                }

            }

            $site->checkpoints()->saveMany($checkpoints);

        }
    }
}
