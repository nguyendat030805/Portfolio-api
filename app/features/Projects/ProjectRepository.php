<?php

namespace App\features\Projects;

use App\features\Projects\Model\Project;
use Illuminate\Support\Facades\Auth;

class ProjectRepository
{
    public function getAllprojectsByUserId($userId){
        return Project::where('user_id', $userId)->get();
    }

    public function create(array $data){
        return Project::create($data);
    }

    public function findByIdAndUser($id, $userId) {
        return Project::where('id', $id)
                      ->where('user_id', $userId)
                      ->firstOrFail();
    }

    public function update($id, array $data) {
        $project = $this->findByIdAndUser($id, Auth::id());
        $project->update($data);
        return $project;
    }

    public function delete($id) {
        $project = $this->findByIdAndUser($id, Auth::id());
        return $project->delete();
    }

    public function findById($id) {
        return Project::findOrFail($id);
    }
}
