<?php

namespace App\Http\Controllers\Activate;

use App\Exceptions\NotFoundException;
use App\Http\Repositories\ProductRepository;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Service\SmsService;
use App\Services\Activate\ProductService;

class ProductController extends BaseController
{
    private ProductService $productService;

    private ProductRepository $productRepository;

    public function __construct()
    {
        parent::__construct();
        $this->productRepository = app(ProductRepository::class);
        $this->productService = new ProductService();
    }

    /**
     * Получение списка всех сервисов
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $services = SmsService::paginate(10);

        return view('activate.product.index', compact(
            'services',
        ));
    }

    /**
     * @param $service
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($service)
    {
        try {
            $service = $this->productRepository->getService($service);
        } catch (NotFoundException $e) {
            return back(404)
                ->withErrors(['msg' => 'Запись не найдена'])
                ->withInput();
        }
        return view('activate.product.edit', compact(
            'service'
        ));
    }

    /**
     * @param ProductUpdateRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        try {
            $service = $this->productRepository->getService($id);
        } catch (NotFoundException $e) {
            return back(404)
                ->withErrors(['msg' => 'Запись не найдена'])
                ->withInput();
        }

        $result = $service->fill($request->getData())->save();

        if ($result) {
            return redirect()->route('activate.service.index')
                ->with(['success' => 'Успех']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * @param SmsService $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(SmsService $service)
    {
        $service->delete();
        return redirect()->route('activate.service.index');
    }
}
