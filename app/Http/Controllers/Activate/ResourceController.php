<?php

namespace App\Http\Controllers\Activate;

use App\Http\Controllers\Controller;
use App\Models\Resource\SmsResource;

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
    public function create()
    {
        return view('activate.resource.create');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $data = request()->validate([
            'title' => 'required|string',
            'image' => 'required|string',
        ]);

        $resource = SmsResource::create($data);

        return redirect()->route('activate.resource.index');
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
