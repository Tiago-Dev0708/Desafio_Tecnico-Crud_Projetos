from fastapi import APIRouter, HTTPException, status
from Api.schemas.projects import ProjectCreate, ProjectResponse
from Api.services.projects import ProjectService


router = APIRouter(prefix="/api/v1/projects", tags=["Projects"])


@router.post(
    path="/create",
    status_code=status.HTTP_201_CREATED,
    response_description="Route create Project",
    description="Route Create",
    name="Route Create"
    )
async def create_project(project: ProjectCreate):
    created_project = await ProjectService.create_project(project)
    return created_project



@router.put(
    path="/update/{project_id}",
    status_code=status.HTTP_201_CREATED,
    response_description="Route Update Project for ID",
    description="Route Update Project",
    name="Route Update Project"
    )
async def update_project(project_id: int, project: ProjectCreate):
    updated_project = await ProjectService.update_project(project_id, project)
    return updated_project



@router.get(
    path="/list_by_id/{project_id}",
    status_code=status.HTTP_200_OK,
    response_description="Route get Product for ID",
    description="Route Get Product for ID",
    name="Route Get Product for ID"
    )
async def list_project_by_id(project_id: int):
    project = await ProjectService.get_project_by_id(project_id)
    return project



@router.get(
        path="/list_all",
        status_code=status.HTTP_200_OK,
        response_description="Route List all Projects",
        description="Route List all Projects",
        name="Route List all Projects"
        )
async def list_projects():
    projects = await ProjectService.list_projects()
    return projects



@router.delete(
    path="/delete/{project_id}",
    status_code=status.HTTP_204_NO_CONTENT,
    response_description="Route Delete Project",
    description="Route delete project",
    name="Route Delete Project"
    )
async def delete_project(project_id: int):
    project = await ProjectService.delete_project(project_id)
    return project



@router.delete(
    path="/delete-all-projects",
    status_code=status.HTTP_204_NO_CONTENT,
    response_description="Route for delete al projects",
    description="Route dele all projects",
    name="Route delete all projects"
)
async def delete_all_projects():
    delete_projects = await ProjectService.delete_all_project_Service()
    return delete_projects