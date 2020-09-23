<?php

namespace App\Http\Controllers;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class ApiProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function viewAllProjects() {
        $projects = Project::with("user");
        $proj = Project::all()->toJson(JSON_PRETTY_PRINT);
        return $proj;
    }

    public function viewProj($id) {
        $proj = Project::find($id)->toJson(JSON_PRETTY_PRINT);
        return $proj;
    }
  /*  public function addProj(Request $request){
        $existingUser = User::find(9);
        auth()->login($existingUser, true);
        try {
            $this->validate($request, [
                "name"        => "required|min:5|max:140|unique:projects",
                "description" => "nullable|min:10|string"
            ]);
            $name = $request->name;
            $desc = $request->description;

            $proj = new Project();
            $proj->name = $name;
            $proj->description = $desc;


            $proj->save();

            //Project::create($request->only("name", "description"));
            return response()->json([ "status" =>"201"]);
        } catch (Exception $error) {
            return response()->json([ "status" =>"Falha na requisicao"]);
        }
    }
*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
