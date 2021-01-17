<?php

namespace App\Http\Controllers\Api;

use App\Core\Error\ErrorManager;
use App\Core\Response\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Repositories\CompaniesRepositories;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CompaniesController extends Controller
{
    use ResponseTrait;

    /**
     * @var CompaniesRepositories
     */
    private $companiesRepositories;

    public function __construct(CompaniesRepositories $companiesRepositories)
    {
        $this->companiesRepositories = $companiesRepositories;
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

        $companies = $this->companiesRepositories->getListWithPaginate($decodedJson['pagination']);

        return $this->successResponse($companies);
    }
}
