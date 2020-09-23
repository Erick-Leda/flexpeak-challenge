<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
//use App\Http\Controllers\Api\ApiProjectController;
use Exception;

class ProjectController extends Controller
{
    public function __construct() {
        $this->middleware("auth");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View|string
     */
    public function index() {
        try {
            $projects = Project::with("user")->paginate(10);
            return view("projects.index", compact("projects"));
        } catch (Exception $error){
            return 'Exceção Capturada: '. $error->getMessage();
        }
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View|string
     */
    public function create() {
        try {
            $project = new Project;
            $title = __("Criar Projeto");
            $textButton = __("Criar");
            $route = route("projects.store");

        } catch(Exception $error) {
            return $error->getMessage();
        }
        return view("projects.create", compact("title", "textButton", "route", "project"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector|string
     */
    public function store(Request $request) {
        try {
            $this->validate($request, [
                "name"        => "required|min:5|max:140|unique:projects",
                "description" => "nullable|min:10|string"
            ]);
            Project::create($request->only("name", "description"));
            return redirect(route("projects.index"))
                ->with("success", __("Projeto Criado!"));
        } catch (Exception $error) {
            return redirect(route("projects.create"))
                ->with("error", __("Dados não correspondem com a descrição"));
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View|string
     */
    public function edit(Project $project) {
        try {
            $update = true;
            $title = __("Editar Projeto");
            $textButton = __("Atualizar");
            $route = route("projects.update", ["project" => $project]);
            return view("projects.edit", compact("update", "title", "textButton", "route", "project"));
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|string
     */
    public function update(Request $request, Project $project) {
        try {
            $this->validate($request, [
                "name" => "required|min:5|unique:projects,name," . $project->id,
                "description" => "nullable|string"
            ]);
            $project->fill($request->only("name", "description"))->save();
            return back()->with("success", __("Projeto Atualizado!"));
        } catch (Exception $error) {
            return redirect()->back()
                ->with("error", __("Dados não correspondem com a descrição"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|string
     */
    public function destroy(Project $project) {
        try {
            $project->delete();
            return redirect()->route("projects.index")->with("success", __("Projeto Eliminado!"));
        }catch (Exception $error) {
            return $error->getMessage();
        }

    }
}
