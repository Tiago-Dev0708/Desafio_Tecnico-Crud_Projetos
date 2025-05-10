from Api.database.models.projects import Project
from Api.schemas.projects import ProjectCreate, ProjectResponse
from tortoise.exceptions import DoesNotExist, IntegrityError
from fastapi import HTTPException, status
from Api.core.config import app_logger

class ProjectService:

    @staticmethod
    async def create_project(data: ProjectCreate) -> ProjectResponse:
        try:
            # Verifica se já existe um projeto com o mesmo nome
            existing_project = await Project.filter(name=data.name).first()

            if existing_project:
                app_logger.info(msg=f"Falha ao criar projeto, {data.name} ja existe.")
                raise HTTPException(
                    status_code=status.HTTP_400_BAD_REQUEST,
                    detail="Já existe um projeto com este nome."
                )
            
            # Cria o novo projeto
            project = await Project.create(**data.model_dump())
            app_logger.info(msg=f"Projeto {data.name} criado.")
            
            # Retorna o projeto recém-criado como resposta
            return ProjectResponse.from_orm(project)
        
        except IntegrityError as e:
            # captura erro de integridade
            app_logger.info(msg=f"Erro ao criar projeto: {str(e)}.")
            raise HTTPException(
                status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
                detail=f"Erro ao criar projeto: {str(e)}."
            )



    @staticmethod
    async def get_project_by_id(project_id: int) -> Project | None:
        try:
            # busca o projeto pelo id fornecido
            response = await Project.get(id=project_id)
            app_logger.info(msg=f"Projeto de ID: {project_id} listado.")
            return response
        
        # caso nao exista
        except DoesNotExist:
            app_logger.info(msg=f"Erro ao buscar projeto de ID: {project_id}.")
            raise HTTPException(
                status_code=status.HTTP_404_NOT_FOUND,
                detail=f"Erro ao buscar projeto de ID: {project_id}."
            )
        
        # caso ocorra erro interno
        except Exception as e:
            # captura qualquer outro erro
            app_logger.info(msg=f"Erro interno: {str(e)}.")
            raise HTTPException(
                status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
                detail=f"Erro interno: {str(e)}."
            )



    # refatorar depois
    # esta sem tratamento pois no front nao exite tratamento caso seja retornado uma lista vazia
    @staticmethod
    async def list_projects() -> list[Project]:

        # Realiza a busca de todos os projetos
        projects = await Project.all()

        
        # Verifica se a lista de projetos está vazia
        """if not projects:
            raise HTTPException(
                status_code=status.HTTP_404_NOT_FOUND,
                detail=f"Nenhum projeto encontrado."
            )"""
        
        app_logger.info(msg="Projetos sendo listados.")
        return projects


        
    @staticmethod
    async def delete_project(project_id: int):
        # busca projeto pelo id fornecido
        response = await Project.filter(id=project_id).delete()
        
        # caso nao exista projetos
        if not response:
            app_logger.info(msg=f"Nenhum projeto encontrado com ID: {project_id}.")
            raise HTTPException(
                status_code=status.HTTP_404_NOT_FOUND,
                detail=f"Nenhum projeto encontrado com ID: {project_id}."
            )
        
        app_logger.info(msg="Projeto deletado com sucesso.")
        # Caso contrário, o projeto foi deletado com sucesso
        return {"detail": "Projeto deletado com sucesso"}



    @staticmethod
    async def update_project(project_id: int, data: ProjectCreate) -> Project | None:
        try:
            # busca o id do projeto
            project = await Project.get(id=project_id)

            app_logger.info(msg=f"Projeto de ID: {project_id} foi atualizado.")
            # realiza o update
            await project.update_from_dict(data.model_dump()).save()
            return project
        
        # caso nao exista projetos
        except DoesNotExist:
            app_logger.info(msg=f"Nenhum projeto encontrado com ID: {project_id}.")
            raise HTTPException(
                status_code=status.HTTP_404_NOT_FOUND,
                detail=f"Nenhum projeto encontrado com ID: {project_id}."
            )
        
        # caso retorne erro interno
        except Exception as e:
            app_logger.info(msg=f"Erro interno: {str(e)}.")
            raise HTTPException(
                status_code=status.HTTP_500_INTERNAL_SERVER_ERROR,
                detail=f"Erro interno: {str(e)}"
            )
        
    

    @staticmethod
    async def delete_all_project_Service():
        
        delete_all = await Project.all().delete()
        
        # caso nao exista projetos
        if not delete_all:
            app_logger.info(msg=f"Nenhum projeto encontrado.")
            raise HTTPException(
                status_code=status.HTTP_404_NOT_FOUND,
                detail=f"Nenhum projeto encontrado."
            )
        
        app_logger.info(msg="Projetos deletado com sucesso!")
        # Caso contrário, o projeto foi deletado com sucesso
        return {"detail": "Projetos deletado com sucesso!"}