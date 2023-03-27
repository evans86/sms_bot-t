<?php

namespace App\Http\Controllers\Activate;

use App\Http\Controllers\Controller;
use App\Models\Resource\SmsResource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $resources = SmsResource::all();

        return view('activate.resource.index', compact(
            'resources',
        ));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($resource)
    {
        $resource = SmsResource::find($resource);
        return view('activate.resource.edit', compact(
            'resource'
        ));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'image' => 'required|string',
            'ref' => 'nullable|string',
        ]);

        $resource = SmsResource::find($id);
        if(empty($resource)) {
            return back()
                ->withErrors(['msg' => 'Запись не найдена'])
                ->withInput();
        }

        $result = $resource->fill($data)->save();
        //
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
    public function delete(SmsResource $resource)
    {
        $resource->delete();
        return redirect()->route('activate.resource.index');
    }
}
