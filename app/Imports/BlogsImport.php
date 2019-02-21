<?php

namespace App\Imports;

use App\Blog;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BlogsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    /*public function __construct($blog_category_id)
    {
        $this->blog_category_id = $blog_category_id;
    }*/

    public function model(array $row)
    {

        return new Blog([
            'user_id'           => $row['user'],
            'blog_category_id'  => $row['category'],
            'name'              => $row['name'],
            'description'       => $row['description'],
        ]);
    }

    /*public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Blogs::create([
                'name' => $row[0],
            ]);
        }
    }*/
}
