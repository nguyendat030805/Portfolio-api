<?php

namespace App\features\Projects;

use App\features\Projects\ProjectService;
use App\features\Projects\ProjectRequest;
use App\Traits\ApiResponse;
use Illuminate\Support\Facades\Auth;

class ProjectController
{
    protected $projectService;
    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }

    use ApiResponse;
    public function getProject(){
        try{
            $userId = Auth::id();
            $project = $this->projectService->getAllProjectsByUserId($userId);
            return $this->success($project, 'Projects retrieved successfully');
        }
        catch(\Exception $e){
            return $this->error('Failed to retrieve projects: ' . $e->getMessage(), 500);  
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
            return$this->success($project, 'Project created successfully');
        }
        catch(\Exception $e){
            return $this->error('Failed to create project: ' . $e->getMessage(), 500);   
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
            return $this->success($project, 'Project updated successfully');
        }
        catch(\Exception $e){
            return $this->error('Failed to update project: ' . $e->getMessage(), 500);  
        }
    }

    public function deleteProject($id){
        try{
            $this->projectService->deleteProject($id);
            return $this->success(null, 'Project deleted successfully');
        }
        catch(\Exception $e){
            return $this->error('Failed to delete project: ' . $e->getMessage(), 500);  
        }
    }
}
