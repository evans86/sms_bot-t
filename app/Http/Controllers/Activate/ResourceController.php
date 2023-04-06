<?php

namespace App\Http\Controllers\Activate;

use App\Exceptions\NotFoundException;
use App\Http\Repositories\Resource\ResourceCountryRepository;
use App\Http\Repositories\Resource\ResourceServicesCountriesRepository;
use App\Http\Repositories\Resource\ResourceServicesRepository;
use App\Http\Repositories\ResourceRepository;
use App\Http\Requests\Resource\ResourceUpdateRequest;
use App\Models\Resource\SmsResource;
use App\Services\Activate\ResourceService;
use App\Services\External\FiveSimApi;
use App\Services\Resource\ResourceStrategy;
use Illuminate\Http\Request;

class ResourceController extends BaseController
{
    /**
     * @var ResourceRepository|ResourceRepository&\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Foundation\Application|mixed
     */
    private ResourceRepository $resources;
    /**
     * @var ResourceService
     */
    private ResourceService $resourceService;
    /**
     * @var ResourceCountryRepository
     */
    private ResourceCountryRepository $resourceCountries;
    /**
     * @var ResourceServicesRepository
     */
    private ResourceServicesRepository $resourceServices;
    /**
     * @var ResourceServicesCountriesRepository
     */
    private ResourceServicesCountriesRepository $servicesCountriesRepository;

    public function __construct()
    {
        parent::__construct();
        $this->resources = new ResourceRepository();
        $this->servicesCountriesRepository = new ResourceServicesCountriesRepository();
        $this->resourceCountries = new ResourceCountryRepository();
        $this->resourceServices = new ResourceServicesRepository();
        $this->resourceService = app(ResourceService::class);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $resources = $this->resources->getResources();

        return view('activate.resource.index', compact(
            'resources',
        ));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($resource)
    {
        try {
            $resource = $this->resources->getResource($resource);
        } catch (NotFoundException $e) {
            return back(404)
                ->withErrors(['msg' => 'Запись не найдена'])
                ->withInput();
        }
        return view('activate.resource.edit', compact(
            'resource'
        ));
    }

    /**
     * @param ResourceUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ResourceUpdateRequest $request, $id)
    {
        try {
            $resource = $this->resources->getResource($id);
        } catch (NotFoundException $e) {
            return back(404)
                ->withErrors(['msg' => 'Запись не найдена'])
                ->withInput();
        }

        $result = $resource->fill($request->getData())->save();

        if ($result) {
            return redirect()->route('activate.resource.index')
                ->with(['success' => 'Успех']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * @param SmsResource $resource
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SmsResource $resource)
    {
        $resource->delete();
        return redirect()->route('activate.resource.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function country($id)
    {
        try {
            $resource = $this->resources->getResource($id);
        } catch (NotFoundException $e) {
            return back(404)
                ->withErrors(['msg' => 'Запись не найдена'])
                ->withInput();
        }

        $resourceCountries = $this->resourceCountries->getByResource($id);

        return view('activate.resource.country', compact(
            'resource', 'resourceCountries'
        ));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function countryReset($id)
    {
        try {
            $resource = $this->resources->getResource($id);
        } catch (NotFoundException $e) {
            return back(404)
                ->withErrors(['msg' => 'Запись не найдена'])
                ->withInput();
        }

        $this->resourceService->resetCountry($resource->id);

        return redirect()->route('activate.resource.country', ['id' => $id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function services($id)
    {
        try {
            $resource = $this->resources->getResource($id);
        } catch (NotFoundException $e) {
            return back(404)
                ->withErrors(['msg' => 'Запись не найдена'])
                ->withInput();
        }

        $resourceServices = $this->resourceServices->getByResource($id);

        return view('activate.resource.services', compact(
            'resource', 'resourceServices'
        ));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function servicesReset($id)
    {
        try {
            $resource = $this->resources->getResource($id);
        } catch (NotFoundException $e) {
            return back(404)
                ->withErrors(['msg' => 'Запись не найдена'])
                ->withInput();
        }

        $this->resourceService->resetService($resource->id);

        return redirect()->route('activate.resource.services', ['id' => $id]);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function resourceServicesCountries($id)
    {
        try {
            $resource = $this->resources->getResource($id);
        } catch (NotFoundException $e) {
            return back(404)
                ->withErrors(['msg' => 'Запись не найдена'])
                ->withInput();
        }

        $resourceServicesCountries = $this->servicesCountriesRepository->getByResource($id);

        return view('activate.resource.servicesCountries', compact(
            'resource', 'resourceServicesCountries'
        ));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateServicesCountries()
    {
        $this->resourceService->updateResourceServiceCountry();

        return redirect()->route('activate.resource.index');
    }
}
