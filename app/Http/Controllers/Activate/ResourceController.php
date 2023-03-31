<?php

namespace App\Http\Controllers\Activate;

use App\Exceptions\NotFoundException;
use App\Http\Repositories\ResourceRepository;
use App\Http\Requests\Resource\ResourceUpdateRequest;
use App\Models\Resource\SmsResource;
use App\Services\Activate\ResourceService;
use App\Services\External\FiveSimApi;
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

    public function __construct()
    {
        parent::__construct();
        $this->resources = app(ResourceRepository::class);
        $this->resourceService = new ResourceService();
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

    //для проверки
    public function resourceCountries()
    {
//        $this->resourceService->addResourceCountry();

        $services = [
            "ig" => "Instagram",
            "tg" => "Telegram",
            "fb" => "facebook",
            "wa" => "Whatsapp",
            "go" => "Google,youtube,Gmail",
            "dr" => "OpenAI",
            "tw" => "Twitter",
            "me" => "Line messenger",
            "ds" => "Discord",
            "oi" => "Tinder",
            "am" => "Amazon",
            "mm" => "Microsoft",
            "ot" => "Любой другой",
            "wb" => "WeChat",
            "hw" => "Alipay/Alibaba/1688",
            "nv" => "Naver",
            "mj" => "Zalo",
            "qq" => "Tencent QQ",
            "vi" => "Viber",
            "vk" => "Вконтакте",
            "ew" => "Nike",
            "ub" => "Uber",
            "za" => "JDcom",
            "uu" => "Wildberries",
            "tk" => "МВидео",
            "ju" => "Indomaret",
            "yw" => "Grindr",
            "ft" => "Букмекерские",
            "ka" => "Shopee",
            "pm" => "AOL",
            "mb" => "Yahoo",
            "ki" => "99app",
            "ya" => "Яндекс",
            "tn" => "LinkedIN",
            "nz" => "Foodpanda",
            "ts" => "PayPal",
            "pd" => "IFood",
            "dl" => "Lazada",
            "lf" => "TikTok/Douyin",
            "kf" => "Weibo",
            "mt" => "Steam",
            "kt" => "KakaoTalk",
            "yl" => "Yalla",
            "dh" => "eBay",
            "vz" => "Hinge",
            "lj" => "Santander",
            "sn" => "OLX",
            "tx" => "Bolt",
            "wx" => "Apple",
            "sy" => "Brahma",
            "kc" => "Vinted",
            "sb" => "Lamoda",
            "pf" => "pof.com",
            "bz" => "Blizzard",
            "qf" => "RedBook",
            "ke" => "Эльдорадо",
            "xj" => "СберМаркет",
            "av" => "avito",
            "uk" => "Airbnb",
            "df" => "Happn",
            "hx" => "AliExpress",
            "wh" => "TanTan",
            "mo" => "Bumble",
            "vd" => "Betfair",
            "ve" => "Dream11",
            "dt" => "Delivery Club",
            "gf" => "GoogleVoice",
            "fr" => "Dana",
            "cy" => "РСА",
            "zk" => "Deliveroo",
            "em" => "ZéDelivery",
            "xq" => "MPL",
            "yu" => "Xiaomi",
            "yg" => "CourseHero",
            "ll" => "888casino",
            "tu" => "Lyft",
            "jr" => "Самокат",
            "nf" => "Netflix",
            "jg" => "Grab",
            "fd" => "Mamba, MeetMe",
            "bl" => "BIGO LIVE",
            "sm" => "YoWin",
            "jx" => "Swiggy",
            "zl" => "Airtel",
            "ys" => "ZCity",
            "fw" => "99acres",
            "ly" => "Olacabs",
            "mg" => "Магнит",
            "et" => "Clubhouse",
            "xk" => "DiDi",
            "bs" => "TradeUP",
            "nl" => "Myntra",
            "ni" => "Gojek",
            "sg" => "OZON",
            "xm" => "Лэтуаль",
            "bd" => "X5ID",
            "fu" => "Snapchat",
            "fv" => "Vidio",
            "wc" => "Craigslist",
            "zx" => "CommunityGaming",
            "xt" => "Flipkart",
            "bv" => "Metro",
            "cq" => "Mercado",
            "xe" => "GalaxyChat",
            "yk" => "СпортМастер",
            "im" => "Imo",
            "fg" => "IndianOil",
            "ah" => "EscapeFromTarkov",
            "bc" => "GCash",
            "qz" => "Faceit",
            "rt" => "hily",
            "rr" => "Wolt",
            "zm" => "OfferUp",
            "rl" => "inDriver",
            "hu" => "Ukrnet",
            "lx" => "DewuPoison",
            "hb" => "Twitch",
            "pu" => "Justdating",
            "aq" => "Glovo",
            "xh" => "OVO",
            "da" => "MTS CashBack",
            "ep" => "Temu",
            "rd" => "Lenta",
            "be" => "СберМегаМаркет",
            "yp" => "Payzapp",
            "ae" => "myGLO",
            "xy" => "Depop",
            "hy" => "Ininal",
            "kh" => "Bukalapak",
            "ac" => "DoorDash",
            "ul" => "Getir",
            "jq" => "Paysafecard",
            "su" => "LOCO",
            "sl" => "СберАптека",
            "cm" => "Prom",
            "eb" => "Voltz",
            "mi" => "Zupee",
            "og" => "Okko",
            "no" => "Virgo",
            "vm" => "OkCupid",
            "gj" => "Carousell",
            "dn" => "Paxful",
            "yj" => "eWallet",
            "ad" => "Iti",
            "my" => "CAIXA",
            "dj" => "LUKOIL-AZS",
            "ua" => "BlaBlaCar",
            "ex" => "Linode",
            "kl" => "kolesa.kz",
            "sh" => "ВкусВилл",
            "zr" => "Papara",
            "vp" => "Kwai",
            "zs" => "Bilibili",
            "cp" => "Uklon",
            "ml" => "ApostaGanha",
            "ct" => "КухняНаРайоне",
            "ch" => "Pocket52",
            "xr" => "Tango",
            "tf" => "Noon",
            "bw" => "Signal",
            "ij" => "Revolut",
            "bn" => "Alfagift",
            "xd" => "Tokopedia",
            "tl" => "Truecaller",
            "ls" => "Careem",
            "dp" => "ProtonMail",
            "rk" => "Fotka",
            "bh" => "Uteka",
            "zh" => "Zoho",
            "ht" => "Bitso",
            "uz" => "OffGamers",
            "ev" => "Picpay ",
            "ta" => "Wink",
            "us" => "IRCTC",
            "ja" => "Weverse",
            "vg" => "ShellBox",
            "ok" => "Одноклассники",
            "fz" => "KFC",
            "fo" => "MobiKwik",
            "th" => "WestStein",
            "gr" => "Astropay",
            "re" => "Coinbase",
            "vc" => "Banqi",
            "qa" => "MyFishka",
            "cw" => "PaddyPower",
            "kx" => "Vivo",
            "sa" => "AGIBANK",
            "ar" => "Wondermart",
            "ib" => "Immowelt",
            "mq" => "GMNG",
            "fj" => "Potato Chat",
            "yi" => "Yemeksepeti",
            "gm" => "Mocospace",
            "sd" => "dodopizza",
            "ue" => "Onet",
            "sr" => "Starbucks",
            "ma" => "Mail.ru",
            "gp" => "Ticketmaster",
            "zo" => "Kaggle",
            "ge" => "Paytm",
            "pz" => "Lidl",
            "ef" => "Nextdoor",
            "ln" => "Grofers",
            "wg" => "Skout",
            "oe" => "Codashop",
            "ip" => "Burger King",
            "ff" => "AVON",
            "cj" => "Dotz",
            "gu" => "Fora",
            "gk" => "AptekaRU",
            "xu" => "RecargaPay",
            "qe" => "GG",
            "ud" => "Disney Hotstar",
            "bb" => "LazyPay",
            "gx" => "Hepsiburadacom",
            "kj" => "YAPPY",
            "zy" => "Nttgame",
            "dc" => "YikYak",
            "ga" => "Roposo",
            "cb" => "Bazos",
            "bo" => "Wise",
            "ee" => "Twilio",
            "oc" => "DealShare",
            "uh" => "Yubo",
            "fe" => "CliQQ",
            "xz" => "paycell",
            "hh" => "Uplay",
            "rz" => "EasyPay",
            "mc" => "Michat",
            "yo" => "Amasia",
            "bu" => "MonobankIndia",
            "el" => "Bisu",
            "gs" => "SamsungShop",
            "qr" => "MEGA",
            "hi" => "JungleeRummy",
            "iq" => "icq",
            "qd" => "Taobao",
            "zu" => "BigC",
            "lv" => "Megogo",
            "bk" => "G2G",
            "dv" => "NoBroker",
            "tp" => "IndiaGold",
            "wp" => "163СOM",
            "fa" => "XadrezFeliz",
            "hk" => "4Fun",
            "en" => "Hermes",
            "gw" => "CallApp",
            "nu" => "Stripe",
            "pp" => "Huya",
            "so" => "RummyWealth",
            "rb" => "Tick",
            "co" => "Rediffmail",
            "li" => "Baidu",
            "xv" => "Wish",
            "je" => "Nanovest",
            "pr" => "Trendyol",
            "ec" => "RummyCulture",
            "kb" => "kufarby",
            "rc" => "Skype",
            "wz" => "FoxFord",
            "fc" => "PharmEasy",
            "uy" => "Meliuz",
            "xw" => "Taki",
            "dq" => "IceCasino",
            "qn" => "Blued",
            "ru" => "HOP",
            "uf" => "Eneba",
            "an" => "Adidas",
            "il" => "IQOS",
            "st" => "Ашан",
            "xb" => "RummyOla",
            "oz" => "Poshmark",
            "qo" => "Moneylion",
            "we" => "ДругВокруг",
            "yy" => "Venmo",
            "cg" => "Gemgala",
            "hc" => "MOMO",
            "kp" => "HQ Trivia",
            "ry" => "McDonalds",
            "ao" => "UU163",
            "aa" => "Probo",
            "ai" => "CELEBe",
            "aj" => "OneAset",
            "ak" => "Douyu",
            "at" => "Perfluence",
            "aw" => "Taikang",
            "ax" => "CrefisaMais",
            "ay" => "Ruten",
            "ba" => "Expressmoney",
            "bf" => "Keybase ",
            "bi" => "勇仕网络Ys4fun",
            "bm" => "MarketGuru",
            "bq" => "Adani",
            "br" => "Вкусно и Точка",
            "bt" => "Alfa",
            "bx" => "Dosi",
            "ca" => "SuperS",
            "cc" => "Quipp",
            "ce" => "mosru",
            "ci" => "redBus",
            "ck" => "BeReal",
            "cl" => "UWIN",
            "cr" => "TenChat",
            "cu" => "炙热星河",
            "cv" => "WashXpress",
            "cx" => "Icrypex",
            "cz" => "Getmega",
            "dd" => "CloudChat",
            "de" => "Karusel",
            "dg" => "Mercari",
            "di" => "Loanflix",
            "du" => "AUBANK",
            "dz" => "DominosPizza",
            "ej" => "MrQ",
            "eq" => "Qoo10",
            "es" => "iQIYI",
            "eu" => "LiveScore",
            "ez" => "GoerliFaucet",
            "fh" => "Lalamove",
            "fi" => "Dundle",
            "fk" => "BLIBLI",
            "fl" => "RummyLoot",
            "fs" => " Şikayet var",
            "fx" => "PGbonus",
            "gb" => "YouStar",
            "gd" => "Surveytime",
            "gg" => "PagSmile",
            "gh" => "GyFTR",
            "gi" => "Hotline",
            "gt" => "Gett",
            "gz" => "LYKA",
            "ha" => "My11Circle",
            "he" => "Mewt",
            "hg" => "Switips",
            "hl" => "Band",
            "ho" => "Cathay",
            "hq" => "Magicbricks",
            "ih" => "TeenPattiStarpro",
            "ik" => "GuruBets",
            "io" => "ЗдравСити",
            "iu" => "Bykea",
            "iy" => "FoodHub",
            "jc" => "IVI",
            "jf" => "Likee",
            "jh" => "PingPong",
            "jj" => "Aitu",
            "jl" => "Hopi",
            "jm" => "mzadqatar",
            "jz" => "Kaya",
            "kg" => "FreeChargeApp",
            "km" => "Rozetka",
            "ko" => "AdaKami",
            "ku" => "RoyalWin",
            "kw" => "Foody",
            "ky" => "SpatenOktoberfest",
            "kz" => "NimoTV",
            "lc" => "Subito",
            "lh" => "24betting",
            "lk" => "PurePlatfrom",
            "lp" => "Algida",
            "lq" => "Potato",
            "lt" => "BitClout",
            "lw" => "MrGreen",
            "mk" => "LongHu",
            "mn" => "RRSA",
            "mx" => "SoulApp",
            "ne" => "Coindcx",
            "nk" => "Gittigidiyor",
            "nm" => "Thisshop",
            "nn" => "Giftcloud",
            "np" => "Siply",
            "nq" => "Trip",
            "nr" => "Tosla",
            "nw" => "Ximalaya",
            "od" => "FWDMAX",
            "of" => "Urent",
            "oh" => "MapleSEA ",
            "ol" => "KazanExpress",
            "om" => "Corona",
            "oq" => "Vlife",
            "os" => "Dhani",
            "oy" => "CashFly",
            "pa" => "Gamekit",
            "po" => "premium.one",
            "pt" => "Bitaqaty",
            "pw" => "SellMonitor",
            "py" => "Monese",
            "qg" => "MoneyPay",
            "qh" => "Oriflame",
            "qi" => "32red",
            "qk" => "Bit",
            "ql" => "CMTcuzdan",
            "qt" => "MoneyСontrol",
            "qu" => "Agroinform",
            "qy" => "Zhihu",
            "ra" => "KeyPay",
            "rf" => "Akudo",
            "rg" => "Porbet",
            "rh" => "Ace2Three",
            "rj" => "Детский мир",
            "rm" => "Faberlic",
            "rs" => "Lotus",
            "rv" => "Kotak811",
            "sf" => "SneakersnStuff",
            "sk" => "Skroutz",
            "ss" => "Hezzl",
            "sv" => "Dostavista",
            "sz" => "Pivko24",
            "ti" => "cryptocom",
            "tq" => "Swvl",
            "uj" => "СhampionСasino",
            "un" => "humblebundle",
            "uv" => "BinBin",
            "uw" => "Kirana",
            "va" => "SportGully",
            "vj" => "Stormgain",
            "vn" => "Yaay",
            "vs" => "WinzoGame",
            "vy" => "Meta",
            "wn" => "GameArena",
            "wo" => "Parkplus",
            "wt" => "IZI",
            "wv" => "AIS",
            "ww" => "BIP",
            "xf" => "LightChat",
            "xi" => "InFund",
            "xl" => "Wmaraci",
            "xn" => "Familia",
            "xs" => "GroupMe",
            "xx" => "Joyride",
            "yd" => "米画师Mihuashi",
            "yf" => "Citymobil",
            "ym" => "Юла",
            "yn" => "Allegro",
            "yv" => "IPLwin",
            "yx" => "JTExpress",
            "yz" => "Около",
            "zd" => "Zilch",
            "zi" => "LoveLocal",
            "zj" => "ROBINHOOD",
            "zn" => "Biedronka",
            "zq" => "IndiaPlays",
            "zt" => "Budweiser",
            "zz" => "Dent"
        ];


        $services_result = [];

        foreach ($services as $key => $service) {

            $second_key = str_replace(' ', '', $service);
            $second_key = mb_strtolower($second_key);

            $services_result[] = [
                'title' => $service,
                'first_key' => $key,
                'second_key' => $second_key,
                'image' => 'https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/' . $key . '0.webp',
            ];
        }
//        dd($services_result);

        $service_result = json_encode($services_result);
        echo $service_result;
//
//        $five_key = [];
//
//        $five = new FiveSimApi(config('services.key_activate.key_5sim'));
//        $products = $five->getProducts('any', 'any');
////        dd($products);
//
//        foreach ($products as $key => $product) {
//            $five_key [] = $key;
//        }
//
////        dd($five_key);
//
//        $service_name = [];
//
//        foreach ($services as $key => $service) {
//            $service = str_replace(' ', '', $service);
//            $service = mb_strtolower($service);
//            $service_name [] = $service;
//        }
//
//        $result = array_unique(array_merge($five_key, $service_name));;
//
//        dd($result);

    }
}
