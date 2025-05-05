from fastapi import APIRouter, HTTPException, status
from Api.schemas.projects import ProjectCreate
from Api.services.projects import ProjectService

router = APIRouter(prefix="/projects", tags=["projects"])

@router.post("/create", status_code=status.HTTP_201_CREATED)
async def create_project(project: ProjectCreate):
    created_project = await ProjectService.create_project(project)
    return created_project

@router.put("/update/{project_id}")
async def update_project(project_id: int, project: ProjectCreate):
    updated_project = await ProjectService.update_project(project_id, project)
    if not updated_project:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Projeto não encontrado")
    return updated_project

@router.get("/list_by_id/{project_id}")
async def list_project_by_id(project_id: int):
    project = await ProjectService.get_project_by_id(project_id)
    if not project:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Projeto não encontrado")
    return project

@router.get("/list_all")
async def list_projects():
    projects = await ProjectService.list_projects()
    return projects

@router.delete("/delete/{project_id}", status_code=status.HTTP_204_NO_CONTENT)
async def delete_project(project_id: int):
    project = await ProjectService.delete_project(project_id)
    if not project:
        raise HTTPException(status_code=status.HTTP_404_NOT_FOUND, detail="Projeto não encontrado")
    return {"message": "Projeto deletado com sucesso"}
