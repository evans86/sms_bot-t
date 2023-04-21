<?php

namespace App\Services\Activate;

use App\Http\Repositories\User\UserRepository;
use App\Http\Requests\User\UserGetRequest;
use App\Http\Requests\User\UserLanguageRequest;
use App\Models\Activate\SmsCountry;
use App\Models\User\SmsUser;
use App\Services\MainService;
use App\Services\External\SmsActivateApi;

class UserService extends MainService
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    /**
     * @param UserGetRequest $request
     * @return SmsUser
     * @throws \Exception
     */
    public function getUser(UserGetRequest $request): SmsUser
    {
        try {
            $user = $this->userRepository->getUserByTelegram($request->user_id);
            if (is_null($user)) {
                $user = new SmsUser();
                $country = SmsCountry::query()->first();
                $user->telegram_id = $request->user_id;
                $user->country_id = $country->id;
                $user->language = SmsUser::LANGUAGE_RU;
                $user->service = null;
                $user->save();
            }

            return $user;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * @param UserLanguageRequest $request
     * @return SmsUser
     * @throws \Exception
     */
    public function setLanguage(UserLanguageRequest $request): SmsUser
    {
        try {
            $user = $this->userRepository->getUser($request->user_id);
            $user->language = $request->language;
            $user->save();

            return $user;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * Баланс с сервиса
     *
     * @return mixed
     */
    public function balance($bot)
    {
        try {
            $smsActivate = new SmsActivateApi($bot->api_key);
//        $smsActivate = new SmsActivateApi(config('services.key_activate.key'));
            $balance = $smsActivate->getBalance();
        } catch (\Exception $e) {
            $balance = '';
        }

        return $balance;
    }
}
