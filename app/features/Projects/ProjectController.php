<?php

namespace App\features\Projects;

use App\features\Projects\ProjectService;
use App\features\Projects\ProjectRequest;
use Illuminate\Support\Facades\Auth;

class ProjectController
{
    protected $projectService;
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    public function getProject(){
        try{
            $userId = Auth::id();
            $project = $this->projectService->getAllProjectsByUserId($userId);
            return response()->json([
                'message' => 'Projects retrieved successfully',
                'projects' => $project
             ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to retrieve projects: ' . $e->getMessage()
             ], 500);   
        }
    }

    public function createProject(ProjectRequest $request){
        try{
            $validateData = $request->validated();
            $thumbnailFile = $request->file('thumbnail');
            if($thumbnailFile){
                $validateData['thumbnail'] = $thumbnailFile;
            }
            
            $project = $this->projectService->createProject($validateData);
            return response()->json([
                'message' => 'Project created successfully',
                'project' => $project
             ], 201);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to create project: ' . $e->getMessage()
             ], 500);   
        }
    }

    public function updateProject($id, ProjectRequest $request){
        try{
            $validateData = $request->validated();
            $thumbnailFile = $request->file('thumbnail');
            if($thumbnailFile){
                $validateData['thumbnail'] = $thumbnailFile;
            }
            $project = $this->projectService->updateProject($id, $validateData);
            return response()->json([
                'message' => 'Project updated successfully',
                'project' => $project
             ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to update project: ' . $e->getMessage()
             ], 500);   
        }
    }

    public function deleteProject($id){
        try{
            $this->projectService->deleteProject($id);
            return response()->json([
                'message' => 'Project deleted successfully'
             ], 200);
        }
        catch(\Exception $e){
            return response()->json([
                'message' => 'Failed to delete project: ' . $e->getMessage()
             ], 500);   
        }
    }
}
