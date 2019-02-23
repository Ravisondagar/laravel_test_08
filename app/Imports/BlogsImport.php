<?php

namespace App\Imports;

use App\Blog;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Hash;
use Auth;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\BlogCategory;

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
        $parent_category = null;
        if (BlogCategory::whereNull('parent_id')->where('name', '=', $row['parent_category'])->count() > 0) {
            $parent_category = BlogCategory::where('name', '=', $row['parent_category'])->first();
        }
        else
        {
            if ($row['parent_category'] != null) {
                $parent_category = new BlogCategory;
                $parent_category->name = $row['parent_category'];
                $parent_category->save();
            }
        }

        if (BlogCategory::where('name', '=', $row['category'])->count() > 0) {
            $blog_category = BlogCategory::where('name', '=', $row['category'])->first();
        }
        else
        {
            $blog_category = new BlogCategory;
            $blog_category->name = $row['category'];
            if ($parent_category != null) {
                $blog_category->parent_id = $parent_category->id;
            }
            $blog_category->save();
        }
        return new Blog([
            'user_id'           =>  Auth::user()->id,
            'blog_category_id'  => $blog_category->id,
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
