<?php

namespace App\Exports;

use App\Blog;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PHPExcel;

class BlogsExport implements FromView 
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    public function registerEvents(): array
    {
	    return [
	    AfterSheet::class => function(AfterSheet $event) {
		    $event->sheet->getProtection()->setPassword('1234');
		    $event->sheet->getProtection()->setSheet(true);
		     $event->sheet->getStyle('A1:C10')->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
			},
	    ];
    }

    public function view(): View
    {
        return view('Admin.exports.blogs', [
            'blogs' => Blog::all()
        ]);
    }
}
