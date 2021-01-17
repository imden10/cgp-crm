<?php

namespace App\Http\Controllers\Api;

use App\Core\Error\ErrorManager;
use App\Core\Response\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Repositories\ClientsRepositories;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientsController extends Controller
{
    use ResponseTrait;

    /**
     * @var ClientsRepositories
     */
    private $clientsRepositories;

    public function __construct(ClientsRepositories $clientsRepositories)
    {
        $this->clientsRepositories = $clientsRepositories;
    }

    public function getList(Request $request)
    {
        if (!$decodedJson = $request->json()->all()) {
            return $this->errorResponse(
                ErrorManager::buildError(VALIDATION_REQUEST_JSON_EXPECTED),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        /**
         * validate
         */
        if(!isset($decodedJson['company_id'])){
            return $this->errorResponse(
                ErrorManager::buildError(VALIDATION_REQUIRED_FIELD,['company_id']),
                Response::HTTP_UNPROCESSABLE_ENTITY,
                );
        }

        if(!isset($decodedJson['pagination'])){
            return $this->errorResponse(
                ErrorManager::buildError(VALIDATION_REQUIRED_FIELD,['pagination']),
                Response::HTTP_UNPROCESSABLE_ENTITY,
            );
        }

        if(!isset($decodedJson['pagination']['page'])){
            return $this->errorResponse(
                ErrorManager::buildError(VALIDATION_REQUIRED_FIELD,['pagination.page']),
                Response::HTTP_UNPROCESSABLE_ENTITY,
                );
        }

        if(!isset($decodedJson['pagination']['page_size'])){
            return $this->errorResponse(
                ErrorManager::buildError(VALIDATION_REQUIRED_FIELD,['pagination.page_size']),
                Response::HTTP_UNPROCESSABLE_ENTITY,
                );
        }

        $companies = $this->clientsRepositories->getListByCompanyIdWithPaginate($decodedJson['company_id'],$decodedJson['pagination']);

        return $this->successResponse($companies);
    }

    public function getCompanies(Request $request)
    {
        if (!$decodedJson = $request->json()->all()) {
            return $this->errorResponse(
                ErrorManager::buildError(VALIDATION_REQUEST_JSON_EXPECTED),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        /**
         * validate
         */
        if(!isset($decodedJson['client_id'])){
            return $this->errorResponse(
                ErrorManager::buildError(VALIDATION_REQUIRED_FIELD,['client_id']),
                Response::HTTP_UNPROCESSABLE_ENTITY,
                );
        }

        if(!isset($decodedJson['pagination'])){
            return $this->errorResponse(
                ErrorManager::buildError(VALIDATION_REQUIRED_FIELD,['pagination']),
                Response::HTTP_UNPROCESSABLE_ENTITY,
                );
        }

        if(!isset($decodedJson['pagination']['page'])){
            return $this->errorResponse(
                ErrorManager::buildError(VALIDATION_REQUIRED_FIELD,['pagination.page']),
                Response::HTTP_UNPROCESSABLE_ENTITY,
                );
        }

        if(!isset($decodedJson['pagination']['page_size'])){
            return $this->errorResponse(
                ErrorManager::buildError(VALIDATION_REQUIRED_FIELD,['pagination.page_size']),
                Response::HTTP_UNPROCESSABLE_ENTITY,
                );
        }

        $companies = $this->clientsRepositories->getListCompaniesByClientId($decodedJson['client_id'],$decodedJson['pagination']);

        return $this->successResponse($companies);
    }
}
