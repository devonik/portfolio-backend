<?php


namespace App\Http\Controllers\Api;


use App\Models\Project;

class ProjectsController
{
    public function get(){
        $projects = Project::all();
        foreach ($projects as $project){
            $project['icons'] = $project->icons;
        }
        return $projects;
    }
}
