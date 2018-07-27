<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;


use App\User;
use Auth;

class ExcelExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        $id = Auth::user()->id;
        $export = User::find($id);
        return $export->reports()->orderby('created_at','asc')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'RESERVED DATE',
            'CREATED DATE',
            'CONDOMINIUM',
            'POST TITLE',
            'PRICE',
            'PROPERTY SPECIALIST',
            'PS_ID',
            'Customer'
        ];
    }
}