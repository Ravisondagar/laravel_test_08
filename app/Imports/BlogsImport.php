<?php

namespace App\Imports;

use App\Blog;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Auth;

class BlogsImport implements ToModel
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
            'user_id'  => $row[0],
            'blog_category_id'  => $row[1],
            'name'  => $row[2],
            'description'  => $row[3]
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
