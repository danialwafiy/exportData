<?php
namespace App\Exports;
use App\data;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class dataExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return data::select('username', 'password', 'email', 'phone')->get();
    }

    public function headings(): array
    {
        return [
            'Username',
            'Password',
            'Email',
            'Phone'
        ];
    }
}
