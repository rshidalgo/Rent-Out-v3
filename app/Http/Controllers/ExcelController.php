<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExcelExport;
use Excel;
use App\User;
use Auth;
class ExcelController extends Controller
{
 
    public function export(){
        return Excel::download(new ExcelExport, 'Rentout Report.xlsx');
    }
}