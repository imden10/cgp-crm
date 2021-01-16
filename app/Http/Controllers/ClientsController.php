<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientsRequest;
use App\Models\Clients;
use Illuminate\Database\QueryException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Exception;

class ClientsController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $model = Clients::query()->latest()->paginate(50);

        $breadcrumb = [
            'title' => 'Clients',
            'list'  => [
                [
                    'name' => 'Clients'
                ]
            ]
        ];

        return view('clients.index', [
            'model'      => $model,
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * @return Factory|View
     */
    public function create()
    {
        $model = new Clients();

        $breadcrumb = [
            'title' => 'Clients',
            'list'  => [
                [
                    'name' => 'Clients',
                    'link' => route('clients.index'),
                ],
                [
                    'name' => 'Create'
                ],
            ]
        ];

        return view('clients.create',[
            'model'      => $model,
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * @param ClientsRequest $request
     * @return RedirectResponse
     */
    public function store(ClientsRequest $request)
    {
        try {
            Clients::create($request->all());
        } catch (QueryException $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->route('clients.index')->with('success', 'Client successfully created!');
    }

    /**
     * @param Clients $client
     * @return Factory|View
     */
    public function show(Clients $client)
    {
        $breadcrumb = [
            'title' => 'Client',
            'list'  => [
                [
                    'name' => 'Client',
                    'link' => route('clients.index'),
                ],
                [
                    'name' => $client->getFullName()
                ],
                [
                    'name' => 'Viewing'
                ],
            ]
        ];

        return view('clients.view',[
            'model'      => $client,
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * @param Clients $client
     * @return Factory|View
     */
    public function edit(Clients $client)
    {
        $breadcrumb = [
            'title' => 'Clients',
            'list'  => [
                [
                    'name' => 'Clients',
                    'link' => route('clients.index'),
                ],
                [
                    'name' => $client->getFullName(),
                    'link' => route('clients.show', $client->getId())
                ],
                [
                    'name' => 'Edit'
                ],
            ]
        ];

        return view('clients.edit',[
            'model'      => $client,
            'breadcrumb' => $breadcrumb
        ]);
    }

    /**
     * @param ClientsRequest $request
     * @param Clients $client
     * @return RedirectResponse
     */
    public function update(ClientsRequest $request, Clients $client)
    {
        try {
            $client->update($request->all());
        } catch (QueryException $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'Client updated successfully!');
    }

    /**
     * @param Clients $client
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Clients $client)
    {
        try {
            $client->delete();
        } catch (QueryException $e){
            return redirect()->back()->with('error', $e->getMessage());
        }

        return redirect()->back()->with('success', 'Client successfully deleted!');
    }
}
