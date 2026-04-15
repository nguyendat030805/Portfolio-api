<?php

namespace App\features\Projects;

use App\features\Projects\ProjectRepository;
use App\Services\CloudinaryService;
use Illuminate\Support\Facades\Auth;

class ProjectService
{   
    protected $projectRepository;
    protected $cloundinary;
    public function __construct(ProjectRepository $projectRepository, CloudinaryService $cloundinary)
    {
        $this->projectRepository = $projectRepository; 
        $this->cloundinary = $cloundinary;
    }

    public function getAllProjectsByUserId($userId){
        return $this->projectRepository->getAllprojectsByUserId($userId);
    }

    public function createProject(array $data){
        if(isset($data['thumbnail'])){
            $data['thumbnail'] = $this->cloundinary->uploadImage($data['thumbnail'], 'projects');
        }

        $data['user_id'] = Auth::id();
        return $this->projectRepository->create($data);
    }

    public function updateProject($id, array $data){
        $user = Auth::user();
        if(!$user){
            throw new \Exception("Unauthorized");
        }
        if(isset($data['thumbnail'])){
            $data['thumbnail'] = $this->cloundinary->uploadImage($data['thumbnail'], 'projects');
        }
        return $this->projectRepository->update($id, $data);
    }

    public function deleteProject($id){
        $user = Auth::user();
        if(!$user){
            throw new \Exception("Unauthorized");
        }
        return $this->projectRepository->delete($id);
    }
}
