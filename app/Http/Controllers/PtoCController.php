<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Project;
use App\Models\Category;
use App\Models\ProjectCategory;


class PtoCController extends Controller
{
    //
    public function index() {
        $projects = Project::all();
        $categories = Category::all();

        $pToCs = DB::select("SELECT `projects`.`title`, `categories`.`categoryName` FROM `projectcategory`, `projects`, `categories` WHERE `projectcategory`.`projectId` = `projects`.`id` AND `projectcategory`.`categoryId` = `categories`.`id` order by `projects`.`id`;");

        return view('dashboard.projecttocategory.index', [
            "projects" => $projects,
            "categories" => $categories,
            "pToCs" => $pToCs,
        ]);
    }

    public function store(Request $request) {
        
        $pToCs = DB::select("SELECT * FROM `projectcategory` WHERE `projectcategory`.`projectId` = ? AND `projectcategory`.`categoryId` = ?;", [$request->projectId, $request->categoryId]);

        if(count($pToCs) == 0) {
            ProjectCategory::create($request->all());
        }       

        return redirect('dashboard/projecttocategory');
    }
}
