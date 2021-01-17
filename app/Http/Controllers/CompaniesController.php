<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Repositories\CompaniesRepositories;
use Illuminate\Database\QueryException;
use App\Http\Requests\CompaniesRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Exception;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * @var CompaniesRepositories
     */
    private $companiesRepositories;

    public function __construct(CompaniesRepositories $companiesRepositories)
    {
        $this->companiesRepositories = $companiesRepositories;
    }

    /**
     * @return Factory|View
     */
    public function index()
    {
        $model = Companies::query()->latest()->paginate(50);

        $breadcrumb = [
            'title' => 'Companies',
            'list'  => [
                [
                    'name' => 'Companies'
                ]
            ]
        ];

        return view('companies.index', [
            'model'      => $model,
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $model = new Companies();

        $breadcrumb = [
            'title' => 'Companies',
            'list'  => [
                [
                    'name' => 'Companies',
                    'link' => route('companies.index'),
                ],
                [
                    'name' => 'Create'
                ],
            ]
        ];

        return view('companies.create', [
            'model'      => $model,
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * @param CompaniesRequest $request
     * @return RedirectResponse
     */
    public function store(CompaniesRequest $request)
    {
        try {
            /* @var $model Companies */
            $model = Companies::create($request->except(['clients_ids', '_token']));

            $clientsIds = $request->get('clients_ids');

            $model->clients()->sync($clientsIds);
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('companies.index')->with('success', 'The company was successfully established!');
    }

    /**
     * @param Companies $company
     * @return Factory|View
     */
    public function show(Companies $company)
    {
        $breadcrumb = [
            'title' => 'Company',
            'list'  => [
                [
                    'name' => 'Company',
                    'link' => route('companies.index'),
                ],
                [
                    'name' => $company->getName()
                ],
                [
                    'name' => 'Viewing'
                ],
            ]
        ];

        return view('companies.view', [
            'model'      => $company,
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * @param Companies $company
     * @return Factory|View
     */
    public function edit(Companies $company)
    {
        $breadcrumb = [
            'title' => 'Companies',
            'list'  => [
                [
                    'name' => 'Companies',
                    'link' => route('companies.index'),
                ],
                [
                    'name' => $company->getName(),
                    'link' => route('companies.show', $company->getId())
                ],
                [
                    'name' => 'Edit'
                ],
            ]
        ];

        return view('companies.edit', [
            'model'      => $company,
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * @param CompaniesRequest $request
     * @param Companies $company
     * @return RedirectResponse
     */
    public function update(CompaniesRequest $request, Companies $company)
    {
        try {
            $company->update($request->except(['clients_ids', '_token']));

            $clientsIds = $request->get('clients_ids');

            $company->clients()->sync($clientsIds);
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'The company has been successfully updated!');
    }

    /**
     * @param Companies $company
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Companies $company)
    {
        try {
            $company->delete();
        } catch (QueryException $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'The company successfully deleted!');
    }

    public function getList(Request $request)
    {
        $res = [
            "results" => $this->companiesRepositories->searchByName($request->get('search'))
        ];

        return json_encode($res);
    }
}
