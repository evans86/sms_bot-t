<?php

namespace App\Http\Controllers\Api\v1;

use App\Exceptions\NotFoundException;
use App\Helpers\ApiHelpers;
use App\Http\Controllers\Controller;
use App\Http\Repositories\CountryRepository;
use App\Http\Requests\User\UserGetRequest;
use App\Http\Requests\User\UserLanguageRequest;
use App\Http\Resources\api\UserResource;
use App\Services\Activate\UserService;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private UserService $userService;
    /**
     * @var CountryRepository
     */
    private CountryRepository $countryRepository;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->countryRepository = new CountryRepository();
    }

    /**
     * Вспомогательный метод получения баланса (без кэшбэка)
     *
     * @return mixed
     */
    public function balance()
    {
        $result = $this->userService->balance();

        return $result;
    }

    /**
     * Получение значений пользователя
     *
     * Request[
     *  'user_id'
     * ]
     *
     * @param UserGetRequest $request
     * @return array|string
     */
    public function getUser(UserGetRequest $request)
    {
        try {
            $user = $this->userService->getUser($request);
            $country = $this->countryRepository->getCountry($user->country_id);

            return ApiHelpers::success(UserResource::generateUserArray($user, $country));
        } catch (\Exception $e) {
            return ApiHelpers::error($e->getMessage());
        }
    }

    /**
     * Установить значение языка для пользователя
     *
     * Request[
     *  'user_id'
     *  'language'
     * ]
     *
     * @param UserLanguageRequest $request
     * @return array|string
     */
    public function setLanguage(UserLanguageRequest $request)
    {
        try {
            if ($request->language != 'ru' && $request->language != 'eng')
                throw new NotFoundException('Not found: language');
            $user = $this->userService->setLanguage($request);
            $country = $this->countryRepository->getCountry($user->country_id);

            return ApiHelpers::success(UserResource::generateUserArray($user, $country));
        } catch (\Exception $e) {
            return ApiHelpers::error($e->getMessage());
        }
    }
}
