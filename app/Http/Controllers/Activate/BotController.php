<?php

namespace App\Http\Controllers\Activate;

use App\Exceptions\NotFoundException;
use App\Http\Repositories\BotRepository;
use App\Http\Repositories\Resource\ResourceBotRepository;
use App\Models\Bot\SmsBot;

class BotController extends BaseController
{
    /**
     * @var ResourceBotRepository
     */
    private ResourceBotRepository $resourceBotRepository;
    /**
     * @var BotRepository
     */
    private BotRepository $botRepository;

    public function __construct()
    {
        parent::__construct();
        $this->resourceBotRepository = new ResourceBotRepository();
        $this->botRepository = new BotRepository();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $bots = SmsBot::paginate(10);

        return view('activate.bot.index', compact(
            'bots',
        ));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function resource($id)
    {
        try {
            $bot = $this->botRepository->getBot($id);
        } catch (NotFoundException $e) {
            return back(404)
                ->withErrors(['msg' => 'Запись не найдена'])
                ->withInput();
        }

        $resources = $this->resourceBotRepository->getByBot($id);

        return view('activate.bot.resource', compact(
            'bot', 'resources'
        ));
    }
}
