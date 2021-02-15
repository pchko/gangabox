<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Imports\ProductImport;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Facades\Excel as ExcelExport;

class HomeController extends Controller{
    //
    public function upload(Request $request){
    	if($request->hasFile('file')){
    		Product::truncate();

            try{

    		  (new ProductImport)->import(request()->file('file'));
              return view('welcome')->with('success', 'Archivo importado correctamente!');
            }catch(\Exception $e ){
                return view('welcome')->with('error', 'Verifica que el archivo no tenga filas vacías');                
            }

    	}

        return view('welcome')->with('error', 'Elige un archivo');

    }

    public function export() {
        return ExcelExport::download(new ProductsExport, 'products.xlsx');
    }
}
