<?php

namespace App\Http\Controllers\Activate;

use App\Exceptions\NotFoundException;
use App\Http\Repositories\ResourceRepository;
use App\Http\Requests\Resource\ResourceUpdateRequest;
use App\Models\Resource\SmsResource;

class ResourceController extends BaseController
{
    private ResourceRepository $resources;

    public function __construct()
    {
        parent::__construct();
        $this->resources = app(ResourceRepository::class);
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

        if($result) {
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
}
