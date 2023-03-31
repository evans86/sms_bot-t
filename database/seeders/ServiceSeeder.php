<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {

        $services = [
            [
                "title" => "Instagram",
                "first_key" => "ig",
                "second_key" => "instagram",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ig0.webp"
            ],
            [
                "title" => "Telegram",
                "first_key" => "tg",
                "second_key" => "telegram",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/tg0.webp"
            ],
            [
                "title" => "facebook",
                "first_key" => "fb",
                "second_key" => "facebook",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fb0.webp"
            ],
            [
                "title" => "Whatsapp",
                "first_key" => "wa",
                "second_key" => "whatsapp",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/wa0.webp"
            ],
            [
                "title" => "Google,youtube,Gmail",
                "first_key" => "go",
                "second_key" => "google,youtube,gmail",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/go0.webp"
            ],
            [
                "title" => "OpenAI",
                "first_key" => "dr",
                "second_key" => "openai",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/dr0.webp"
            ],
            [
                "title" => "Twitter",
                "first_key" => "tw",
                "second_key" => "twitter",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/tw0.webp"
            ],
            [
                "title" => "Line messenger",
                "first_key" => "me",
                "second_key" => "linemessenger",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/me0.webp"
            ],
            [
                "title" => "Discord",
                "first_key" => "ds",
                "second_key" => "discord",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ds0.webp"
            ],
            [
                "title" => "Tinder",
                "first_key" => "oi",
                "second_key" => "tinder",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/oi0.webp"
            ],
            [
                "title" => "Amazon",
                "first_key" => "am",
                "second_key" => "amazon",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/am0.webp"
            ],
            [
                "title" => "Microsoft",
                "first_key" => "mm",
                "second_key" => "microsoft",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/mm0.webp"
            ],
            [
                "title" => "Любой другой",
                "first_key" => "ot",
                "second_key" => "любойдругой",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ot0.webp"
            ],
            [
                "title" => "WeChat",
                "first_key" => "wb",
                "second_key" => "wechat",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/wb0.webp"
            ],
            [
                "title" => "Alipay/Alibaba/1688",
                "first_key" => "hw",
                "second_key" => "alipay/alibaba/1688",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/hw0.webp"
            ],
            [
                "title" => "Naver",
                "first_key" => "nv",
                "second_key" => "naver",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/nv0.webp"
            ],
            [
                "title" => "Zalo",
                "first_key" => "mj",
                "second_key" => "zalo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/mj0.webp"
            ],
            [
                "title" => "Tencent QQ",
                "first_key" => "qq",
                "second_key" => "tencentqq",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qq0.webp"
            ],
            [
                "title" => "Viber",
                "first_key" => "vi",
                "second_key" => "viber",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/vi0.webp"
            ],
            [
                "title" => "Вконтакте",
                "first_key" => "vk",
                "second_key" => "вконтакте",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/vk0.webp"
            ],
            [
                "title" => "Nike",
                "first_key" => "ew",
                "second_key" => "nike",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ew0.webp"
            ],
            [
                "title" => "Uber",
                "first_key" => "ub",
                "second_key" => "uber",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ub0.webp"
            ],
            [
                "title" => "JDcom",
                "first_key" => "za",
                "second_key" => "jdcom",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/za0.webp"
            ],
            [
                "title" => "Wildberries",
                "first_key" => "uu",
                "second_key" => "wildberries",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/uu0.webp"
            ],
            [
                "title" => "МВидео",
                "first_key" => "tk",
                "second_key" => "мвидео",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/tk0.webp"
            ],
            [
                "title" => "Indomaret",
                "first_key" => "ju",
                "second_key" => "indomaret",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ju0.webp"
            ],
            [
                "title" => "Grindr",
                "first_key" => "yw",
                "second_key" => "grindr",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yw0.webp"
            ],
            [
                "title" => "Букмекерские",
                "first_key" => "ft",
                "second_key" => "букмекерские",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ft0.webp"
            ],
            [
                "title" => "Shopee",
                "first_key" => "ka",
                "second_key" => "shopee",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ka0.webp"
            ],
            [
                "title" => "AOL",
                "first_key" => "pm",
                "second_key" => "aol",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/pm0.webp"
            ],
            [
                "title" => "Yahoo",
                "first_key" => "mb",
                "second_key" => "yahoo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/mb0.webp"
            ],
            [
                "title" => "99app",
                "first_key" => "ki",
                "second_key" => "99app",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ki0.webp"
            ],
            [
                "title" => "Яндекс",
                "first_key" => "ya",
                "second_key" => "яндекс",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ya0.webp"
            ],
            [
                "title" => "LinkedIN",
                "first_key" => "tn",
                "second_key" => "linkedin",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/tn0.webp"
            ],
            [
                "title" => "Foodpanda",
                "first_key" => "nz",
                "second_key" => "foodpanda",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/nz0.webp"
            ],
            [
                "title" => "PayPal",
                "first_key" => "ts",
                "second_key" => "paypal",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ts0.webp"
            ],
            [
                "title" => "IFood",
                "first_key" => "pd",
                "second_key" => "ifood",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/pd0.webp"
            ],
            [
                "title" => "Lazada",
                "first_key" => "dl",
                "second_key" => "lazada",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/dl0.webp"
            ],
            [
                "title" => "TikTok/Douyin",
                "first_key" => "lf",
                "second_key" => "tiktok/douyin",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/lf0.webp"
            ],
            [
                "title" => "Weibo",
                "first_key" => "kf",
                "second_key" => "weibo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/kf0.webp"
            ],
            [
                "title" => "Steam",
                "first_key" => "mt",
                "second_key" => "steam",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/mt0.webp"
            ],
            [
                "title" => "KakaoTalk",
                "first_key" => "kt",
                "second_key" => "kakaotalk",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/kt0.webp"
            ],
            [
                "title" => "Yalla",
                "first_key" => "yl",
                "second_key" => "yalla",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yl0.webp"
            ],
            [
                "title" => "eBay",
                "first_key" => "dh",
                "second_key" => "ebay",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/dh0.webp"
            ],
            [
                "title" => "Hinge",
                "first_key" => "vz",
                "second_key" => "hinge",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/vz0.webp"
            ],
            [
                "title" => "Santander",
                "first_key" => "lj",
                "second_key" => "santander",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/lj0.webp"
            ],
            [
                "title" => "OLX",
                "first_key" => "sn",
                "second_key" => "olx",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/sn0.webp"
            ],
            [
                "title" => "Bolt",
                "first_key" => "tx",
                "second_key" => "bolt",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/tx0.webp"
            ],
            [
                "title" => "Apple",
                "first_key" => "wx",
                "second_key" => "apple",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/wx0.webp"
            ],
            [
                "title" => "Brahma",
                "first_key" => "sy",
                "second_key" => "brahma",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/sy0.webp"
            ],
            [
                "title" => "Vinted",
                "first_key" => "kc",
                "second_key" => "vinted",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/kc0.webp"
            ],
            [
                "title" => "Lamoda",
                "first_key" => "sb",
                "second_key" => "lamoda",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/sb0.webp"
            ],
            [
                "title" => "pof.com",
                "first_key" => "pf",
                "second_key" => "pof.com",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/pf0.webp"
            ],
            [
                "title" => "Blizzard",
                "first_key" => "bz",
                "second_key" => "blizzard",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bz0.webp"
            ],
            [
                "title" => "RedBook",
                "first_key" => "qf",
                "second_key" => "redbook",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qf0.webp"
            ],
            [
                "title" => "Эльдорадо",
                "first_key" => "ke",
                "second_key" => "эльдорадо",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ke0.webp"
            ],
            [
                "title" => "СберМаркет",
                "first_key" => "xj",
                "second_key" => "сбермаркет",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xj0.webp"
            ],
            [
                "title" => "avito",
                "first_key" => "av",
                "second_key" => "avito",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/av0.webp"
            ],
            [
                "title" => "Airbnb",
                "first_key" => "uk",
                "second_key" => "airbnb",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/uk0.webp"
            ],
            [
                "title" => "Happn",
                "first_key" => "df",
                "second_key" => "happn",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/df0.webp"
            ],
            [
                "title" => "AliExpress",
                "first_key" => "hx",
                "second_key" => "aliexpress",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/hx0.webp"
            ],
            [
                "title" => "TanTan",
                "first_key" => "wh",
                "second_key" => "tantan",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/wh0.webp"
            ],
            [
                "title" => "Bumble",
                "first_key" => "mo",
                "second_key" => "bumble",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/mo0.webp"
            ],
            [
                "title" => "Betfair",
                "first_key" => "vd",
                "second_key" => "betfair",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/vd0.webp"
            ],
            [
                "title" => "Dream11",
                "first_key" => "ve",
                "second_key" => "dream11",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ve0.webp"
            ],
            [
                "title" => "Delivery Club",
                "first_key" => "dt",
                "second_key" => "deliveryclub",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/dt0.webp"
            ],
            [
                "title" => "GoogleVoice",
                "first_key" => "gf",
                "second_key" => "googlevoice",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gf0.webp"
            ],
            [
                "title" => "Dana",
                "first_key" => "fr",
                "second_key" => "dana",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fr0.webp"
            ],
            [
                "title" => "РСА",
                "first_key" => "cy",
                "second_key" => "рса",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cy0.webp"
            ],
            [
                "title" => "Deliveroo",
                "first_key" => "zk",
                "second_key" => "deliveroo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zk0.webp"
            ],
            [
                "title" => "ZéDelivery",
                "first_key" => "em",
                "second_key" => "zédelivery",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/em0.webp"
            ],
            [
                "title" => "MPL",
                "first_key" => "xq",
                "second_key" => "mpl",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xq0.webp"
            ],
            [
                "title" => "Xiaomi",
                "first_key" => "yu",
                "second_key" => "xiaomi",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yu0.webp"
            ],
            [
                "title" => "CourseHero",
                "first_key" => "yg",
                "second_key" => "coursehero",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yg0.webp"
            ],
            [
                "title" => "888casino",
                "first_key" => "ll",
                "second_key" => "888casino",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ll0.webp"
            ],
            [
                "title" => "Lyft",
                "first_key" => "tu",
                "second_key" => "lyft",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/tu0.webp"
            ],
            [
                "title" => "Самокат",
                "first_key" => "jr",
                "second_key" => "самокат",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/jr0.webp"
            ],
            [
                "title" => "Netflix",
                "first_key" => "nf",
                "second_key" => "netflix",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/nf0.webp"
            ],
            [
                "title" => "Grab",
                "first_key" => "jg",
                "second_key" => "grab",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/jg0.webp"
            ],
            [
                "title" => "Mamba, MeetMe",
                "first_key" => "fd",
                "second_key" => "mamba,meetme",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fd0.webp"
            ],
            [
                "title" => "BIGO LIVE",
                "first_key" => "bl",
                "second_key" => "bigolive",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bl0.webp"
            ],
            [
                "title" => "YoWin",
                "first_key" => "sm",
                "second_key" => "yowin",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/sm0.webp"
            ],
            [
                "title" => "Swiggy",
                "first_key" => "jx",
                "second_key" => "swiggy",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/jx0.webp"
            ],
            [
                "title" => "Airtel",
                "first_key" => "zl",
                "second_key" => "airtel",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zl0.webp"
            ],
            [
                "title" => "ZCity",
                "first_key" => "ys",
                "second_key" => "zcity",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ys0.webp"
            ],
            [
                "title" => "99acres",
                "first_key" => "fw",
                "second_key" => "99acres",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fw0.webp"
            ],
            [
                "title" => "Olacabs",
                "first_key" => "ly",
                "second_key" => "olacabs",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ly0.webp"
            ],
            [
                "title" => "Магнит",
                "first_key" => "mg",
                "second_key" => "магнит",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/mg0.webp"
            ],
            [
                "title" => "Clubhouse",
                "first_key" => "et",
                "second_key" => "clubhouse",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/et0.webp"
            ],
            [
                "title" => "DiDi",
                "first_key" => "xk",
                "second_key" => "didi",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xk0.webp"
            ],
            [
                "title" => "TradeUP",
                "first_key" => "bs",
                "second_key" => "tradeup",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bs0.webp"
            ],
            [
                "title" => "Myntra",
                "first_key" => "nl",
                "second_key" => "myntra",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/nl0.webp"
            ],
            [
                "title" => "Gojek",
                "first_key" => "ni",
                "second_key" => "gojek",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ni0.webp"
            ],
            [
                "title" => "OZON",
                "first_key" => "sg",
                "second_key" => "ozon",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/sg0.webp"
            ],
            [
                "title" => "Лэтуаль",
                "first_key" => "xm",
                "second_key" => "лэтуаль",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xm0.webp"
            ],
            [
                "title" => "X5ID",
                "first_key" => "bd",
                "second_key" => "x5id",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bd0.webp"
            ],
            [
                "title" => "Snapchat",
                "first_key" => "fu",
                "second_key" => "snapchat",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fu0.webp"
            ],
            [
                "title" => "Vidio",
                "first_key" => "fv",
                "second_key" => "vidio",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fv0.webp"
            ],
            [
                "title" => "Craigslist",
                "first_key" => "wc",
                "second_key" => "craigslist",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/wc0.webp"
            ],
            [
                "title" => "CommunityGaming",
                "first_key" => "zx",
                "second_key" => "communitygaming",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zx0.webp"
            ],
            [
                "title" => "Flipkart",
                "first_key" => "xt",
                "second_key" => "flipkart",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xt0.webp"
            ],
            [
                "title" => "Metro",
                "first_key" => "bv",
                "second_key" => "metro",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bv0.webp"
            ],
            [
                "title" => "Mercado",
                "first_key" => "cq",
                "second_key" => "mercado",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cq0.webp"
            ],
            [
                "title" => "GalaxyChat",
                "first_key" => "xe",
                "second_key" => "galaxychat",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xe0.webp"
            ],
            [
                "title" => "СпортМастер",
                "first_key" => "yk",
                "second_key" => "спортмастер",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yk0.webp"
            ],
            [
                "title" => "Imo",
                "first_key" => "im",
                "second_key" => "imo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/im0.webp"
            ],
            [
                "title" => "IndianOil",
                "first_key" => "fg",
                "second_key" => "indianoil",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fg0.webp"
            ],
            [
                "title" => "EscapeFromTarkov",
                "first_key" => "ah",
                "second_key" => "escapefromtarkov",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ah0.webp"
            ],
            [
                "title" => "GCash",
                "first_key" => "bc",
                "second_key" => "gcash",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bc0.webp"
            ],
            [
                "title" => "Faceit",
                "first_key" => "qz",
                "second_key" => "faceit",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qz0.webp"
            ],
            [
                "title" => "hily",
                "first_key" => "rt",
                "second_key" => "hily",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rt0.webp"
            ],
            [
                "title" => "Wolt",
                "first_key" => "rr",
                "second_key" => "wolt",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rr0.webp"
            ],
            [
                "title" => "OfferUp",
                "first_key" => "zm",
                "second_key" => "offerup",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zm0.webp"
            ],
            [
                "title" => "inDriver",
                "first_key" => "rl",
                "second_key" => "indriver",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rl0.webp"
            ],
            [
                "title" => "Ukrnet",
                "first_key" => "hu",
                "second_key" => "ukrnet",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/hu0.webp"
            ],
            [
                "title" => "DewuPoison",
                "first_key" => "lx",
                "second_key" => "dewupoison",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/lx0.webp"
            ],
            [
                "title" => "Twitch",
                "first_key" => "hb",
                "second_key" => "twitch",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/hb0.webp"
            ],
            [
                "title" => "Justdating",
                "first_key" => "pu",
                "second_key" => "justdating",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/pu0.webp"
            ],
            [
                "title" => "Glovo",
                "first_key" => "aq",
                "second_key" => "glovo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/aq0.webp"
            ],
            [
                "title" => "OVO",
                "first_key" => "xh",
                "second_key" => "ovo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xh0.webp"
            ],
            [
                "title" => "MTS CashBack",
                "first_key" => "da",
                "second_key" => "mtscashback",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/da0.webp"
            ],
            [
                "title" => "Temu",
                "first_key" => "ep",
                "second_key" => "temu",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ep0.webp"
            ],
            [
                "title" => "Lenta",
                "first_key" => "rd",
                "second_key" => "lenta",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rd0.webp"
            ],
            [
                "title" => "СберМегаМаркет",
                "first_key" => "be",
                "second_key" => "сбермегамаркет",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/be0.webp"
            ],
            [
                "title" => "Payzapp",
                "first_key" => "yp",
                "second_key" => "payzapp",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yp0.webp"
            ],
            [
                "title" => "myGLO",
                "first_key" => "ae",
                "second_key" => "myglo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ae0.webp"
            ],
            [
                "title" => "Depop",
                "first_key" => "xy",
                "second_key" => "depop",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xy0.webp"
            ],
            [
                "title" => "Ininal",
                "first_key" => "hy",
                "second_key" => "ininal",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/hy0.webp"
            ],
            [
                "title" => "Bukalapak",
                "first_key" => "kh",
                "second_key" => "bukalapak",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/kh0.webp"
            ],
            [
                "title" => "DoorDash",
                "first_key" => "ac",
                "second_key" => "doordash",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ac0.webp"
            ],
            [
                "title" => "Getir",
                "first_key" => "ul",
                "second_key" => "getir",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ul0.webp"
            ],
            [
                "title" => "Paysafecard",
                "first_key" => "jq",
                "second_key" => "paysafecard",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/jq0.webp"
            ],
            [
                "title" => "LOCO",
                "first_key" => "su",
                "second_key" => "loco",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/su0.webp"
            ],
            [
                "title" => "СберАптека",
                "first_key" => "sl",
                "second_key" => "сбераптека",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/sl0.webp"
            ],
            [
                "title" => "Prom",
                "first_key" => "cm",
                "second_key" => "prom",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cm0.webp"
            ],
            [
                "title" => "Voltz",
                "first_key" => "eb",
                "second_key" => "voltz",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/eb0.webp"
            ],
            [
                "title" => "Zupee",
                "first_key" => "mi",
                "second_key" => "zupee",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/mi0.webp"
            ],
            [
                "title" => "Okko",
                "first_key" => "og",
                "second_key" => "okko",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/og0.webp"
            ],
            [
                "title" => "Virgo",
                "first_key" => "no",
                "second_key" => "virgo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/no0.webp"
            ],
            [
                "title" => "OkCupid",
                "first_key" => "vm",
                "second_key" => "okcupid",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/vm0.webp"
            ],
            [
                "title" => "Carousell",
                "first_key" => "gj",
                "second_key" => "carousell",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gj0.webp"
            ],
            [
                "title" => "Paxful",
                "first_key" => "dn",
                "second_key" => "paxful",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/dn0.webp"
            ],
            [
                "title" => "eWallet",
                "first_key" => "yj",
                "second_key" => "ewallet",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yj0.webp"
            ],
            [
                "title" => "Iti",
                "first_key" => "ad",
                "second_key" => "iti",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ad0.webp"
            ],
            [
                "title" => "CAIXA",
                "first_key" => "my",
                "second_key" => "caixa",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/my0.webp"
            ],
            [
                "title" => "LUKOIL-AZS",
                "first_key" => "dj",
                "second_key" => "lukoil-azs",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/dj0.webp"
            ],
            [
                "title" => "BlaBlaCar",
                "first_key" => "ua",
                "second_key" => "blablacar",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ua0.webp"
            ],
            [
                "title" => "Linode",
                "first_key" => "ex",
                "second_key" => "linode",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ex0.webp"
            ],
            [
                "title" => "kolesa.kz",
                "first_key" => "kl",
                "second_key" => "kolesa.kz",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/kl0.webp"
            ],
            [
                "title" => "ВкусВилл",
                "first_key" => "sh",
                "second_key" => "вкусвилл",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/sh0.webp"
            ],
            [
                "title" => "Papara",
                "first_key" => "zr",
                "second_key" => "papara",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zr0.webp"
            ],
            [
                "title" => "Kwai",
                "first_key" => "vp",
                "second_key" => "kwai",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/vp0.webp"
            ],
            [
                "title" => "Bilibili",
                "first_key" => "zs",
                "second_key" => "bilibili",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zs0.webp"
            ],
            [
                "title" => "Uklon",
                "first_key" => "cp",
                "second_key" => "uklon",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cp0.webp"
            ],
            [
                "title" => "ApostaGanha",
                "first_key" => "ml",
                "second_key" => "apostaganha",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ml0.webp"
            ],
            [
                "title" => "КухняНаРайоне",
                "first_key" => "ct",
                "second_key" => "кухнянарайоне",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ct0.webp"
            ],
            [
                "title" => "Pocket52",
                "first_key" => "ch",
                "second_key" => "pocket52",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ch0.webp"
            ],
            [
                "title" => "Tango",
                "first_key" => "xr",
                "second_key" => "tango",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xr0.webp"
            ],
            [
                "title" => "Noon",
                "first_key" => "tf",
                "second_key" => "noon",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/tf0.webp"
            ],
            [
                "title" => "Signal",
                "first_key" => "bw",
                "second_key" => "signal",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bw0.webp"
            ],
            [
                "title" => "Revolut",
                "first_key" => "ij",
                "second_key" => "revolut",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ij0.webp"
            ],
            [
                "title" => "Alfagift",
                "first_key" => "bn",
                "second_key" => "alfagift",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bn0.webp"
            ],
            [
                "title" => "Tokopedia",
                "first_key" => "xd",
                "second_key" => "tokopedia",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xd0.webp"
            ],
            [
                "title" => "Truecaller",
                "first_key" => "tl",
                "second_key" => "truecaller",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/tl0.webp"
            ],
            [
                "title" => "Careem",
                "first_key" => "ls",
                "second_key" => "careem",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ls0.webp"
            ],
            [
                "title" => "ProtonMail",
                "first_key" => "dp",
                "second_key" => "protonmail",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/dp0.webp"
            ],
            [
                "title" => "Fotka",
                "first_key" => "rk",
                "second_key" => "fotka",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rk0.webp"
            ],
            [
                "title" => "Uteka",
                "first_key" => "bh",
                "second_key" => "uteka",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bh0.webp"
            ],
            [
                "title" => "Zoho",
                "first_key" => "zh",
                "second_key" => "zoho",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zh0.webp"
            ],
            [
                "title" => "Bitso",
                "first_key" => "ht",
                "second_key" => "bitso",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ht0.webp"
            ],
            [
                "title" => "OffGamers",
                "first_key" => "uz",
                "second_key" => "offgamers",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/uz0.webp"
            ],
            [
                "title" => "Picpay ",
                "first_key" => "ev",
                "second_key" => "picpay",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ev0.webp"
            ],
            [
                "title" => "Wink",
                "first_key" => "ta",
                "second_key" => "wink",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ta0.webp"
            ],
            [
                "title" => "IRCTC",
                "first_key" => "us",
                "second_key" => "irctc",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/us0.webp"
            ],
            [
                "title" => "Weverse",
                "first_key" => "ja",
                "second_key" => "weverse",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ja0.webp"
            ],
            [
                "title" => "ShellBox",
                "first_key" => "vg",
                "second_key" => "shellbox",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/vg0.webp"
            ],
            [
                "title" => "Одноклассники",
                "first_key" => "ok",
                "second_key" => "одноклассники",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ok0.webp"
            ],
            [
                "title" => "KFC",
                "first_key" => "fz",
                "second_key" => "kfc",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fz0.webp"
            ],
            [
                "title" => "MobiKwik",
                "first_key" => "fo",
                "second_key" => "mobikwik",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fo0.webp"
            ],
            [
                "title" => "WestStein",
                "first_key" => "th",
                "second_key" => "weststein",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/th0.webp"
            ],
            [
                "title" => "Astropay",
                "first_key" => "gr",
                "second_key" => "astropay",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gr0.webp"
            ],
            [
                "title" => "Coinbase",
                "first_key" => "re",
                "second_key" => "coinbase",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/re0.webp"
            ],
            [
                "title" => "Banqi",
                "first_key" => "vc",
                "second_key" => "banqi",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/vc0.webp"
            ],
            [
                "title" => "MyFishka",
                "first_key" => "qa",
                "second_key" => "myfishka",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qa0.webp"
            ],
            [
                "title" => "PaddyPower",
                "first_key" => "cw",
                "second_key" => "paddypower",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cw0.webp"
            ],
            [
                "title" => "Vivo",
                "first_key" => "kx",
                "second_key" => "vivo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/kx0.webp"
            ],
            [
                "title" => "AGIBANK",
                "first_key" => "sa",
                "second_key" => "agibank",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/sa0.webp"
            ],
            [
                "title" => "Wondermart",
                "first_key" => "ar",
                "second_key" => "wondermart",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ar0.webp"
            ],
            [
                "title" => "Immowelt",
                "first_key" => "ib",
                "second_key" => "immowelt",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ib0.webp"
            ],
            [
                "title" => "GMNG",
                "first_key" => "mq",
                "second_key" => "gmng",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/mq0.webp"
            ],
            [
                "title" => "Potato Chat",
                "first_key" => "fj",
                "second_key" => "potatochat",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fj0.webp"
            ],
            [
                "title" => "Yemeksepeti",
                "first_key" => "yi",
                "second_key" => "yemeksepeti",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yi0.webp"
            ],
            [
                "title" => "Mocospace",
                "first_key" => "gm",
                "second_key" => "mocospace",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gm0.webp"
            ],
            [
                "title" => "dodopizza",
                "first_key" => "sd",
                "second_key" => "dodopizza",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/sd0.webp"
            ],
            [
                "title" => "Onet",
                "first_key" => "ue",
                "second_key" => "onet",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ue0.webp"
            ],
            [
                "title" => "Starbucks",
                "first_key" => "sr",
                "second_key" => "starbucks",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/sr0.webp"
            ],
            [
                "title" => "Mail.ru",
                "first_key" => "ma",
                "second_key" => "mail.ru",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ma0.webp"
            ],
            [
                "title" => "Ticketmaster",
                "first_key" => "gp",
                "second_key" => "ticketmaster",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gp0.webp"
            ],
            [
                "title" => "Kaggle",
                "first_key" => "zo",
                "second_key" => "kaggle",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zo0.webp"
            ],
            [
                "title" => "Paytm",
                "first_key" => "ge",
                "second_key" => "paytm",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ge0.webp"
            ],
            [
                "title" => "Lidl",
                "first_key" => "pz",
                "second_key" => "lidl",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/pz0.webp"
            ],
            [
                "title" => "Nextdoor",
                "first_key" => "ef",
                "second_key" => "nextdoor",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ef0.webp"
            ],
            [
                "title" => "Grofers",
                "first_key" => "ln",
                "second_key" => "grofers",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ln0.webp"
            ],
            [
                "title" => "Skout",
                "first_key" => "wg",
                "second_key" => "skout",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/wg0.webp"
            ],
            [
                "title" => "Codashop",
                "first_key" => "oe",
                "second_key" => "codashop",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/oe0.webp"
            ],
            [
                "title" => "Burger King",
                "first_key" => "ip",
                "second_key" => "burgerking",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ip0.webp"
            ],
            [
                "title" => "AVON",
                "first_key" => "ff",
                "second_key" => "avon",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ff0.webp"
            ],
            [
                "title" => "Dotz",
                "first_key" => "cj",
                "second_key" => "dotz",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cj0.webp"
            ],
            [
                "title" => "Fora",
                "first_key" => "gu",
                "second_key" => "fora",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gu0.webp"
            ],
            [
                "title" => "AptekaRU",
                "first_key" => "gk",
                "second_key" => "aptekaru",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gk0.webp"
            ],
            [
                "title" => "RecargaPay",
                "first_key" => "xu",
                "second_key" => "recargapay",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xu0.webp"
            ],
            [
                "title" => "GG",
                "first_key" => "qe",
                "second_key" => "gg",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qe0.webp"
            ],
            [
                "title" => "Disney Hotstar",
                "first_key" => "ud",
                "second_key" => "disneyhotstar",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ud0.webp"
            ],
            [
                "title" => "LazyPay",
                "first_key" => "bb",
                "second_key" => "lazypay",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bb0.webp"
            ],
            [
                "title" => "Hepsiburadacom",
                "first_key" => "gx",
                "second_key" => "hepsiburadacom",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gx0.webp"
            ],
            [
                "title" => "YAPPY",
                "first_key" => "kj",
                "second_key" => "yappy",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/kj0.webp"
            ],
            [
                "title" => "Nttgame",
                "first_key" => "zy",
                "second_key" => "nttgame",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zy0.webp"
            ],
            [
                "title" => "YikYak",
                "first_key" => "dc",
                "second_key" => "yikyak",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/dc0.webp"
            ],
            [
                "title" => "Roposo",
                "first_key" => "ga",
                "second_key" => "roposo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ga0.webp"
            ],
            [
                "title" => "Bazos",
                "first_key" => "cb",
                "second_key" => "bazos",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cb0.webp"
            ],
            [
                "title" => "Wise",
                "first_key" => "bo",
                "second_key" => "wise",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bo0.webp"
            ],
            [
                "title" => "Twilio",
                "first_key" => "ee",
                "second_key" => "twilio",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ee0.webp"
            ],
            [
                "title" => "DealShare",
                "first_key" => "oc",
                "second_key" => "dealshare",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/oc0.webp"
            ],
            [
                "title" => "Yubo",
                "first_key" => "uh",
                "second_key" => "yubo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/uh0.webp"
            ],
            [
                "title" => "CliQQ",
                "first_key" => "fe",
                "second_key" => "cliqq",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fe0.webp"
            ],
            [
                "title" => "paycell",
                "first_key" => "xz",
                "second_key" => "paycell",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xz0.webp"
            ],
            [
                "title" => "Uplay",
                "first_key" => "hh",
                "second_key" => "uplay",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/hh0.webp"
            ],
            [
                "title" => "EasyPay",
                "first_key" => "rz",
                "second_key" => "easypay",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rz0.webp"
            ],
            [
                "title" => "Michat",
                "first_key" => "mc",
                "second_key" => "michat",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/mc0.webp"
            ],
            [
                "title" => "Amasia",
                "first_key" => "yo",
                "second_key" => "amasia",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yo0.webp"
            ],
            [
                "title" => "MonobankIndia",
                "first_key" => "bu",
                "second_key" => "monobankindia",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bu0.webp"
            ],
            [
                "title" => "Bisu",
                "first_key" => "el",
                "second_key" => "bisu",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/el0.webp"
            ],
            [
                "title" => "SamsungShop",
                "first_key" => "gs",
                "second_key" => "samsungshop",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gs0.webp"
            ],
            [
                "title" => "MEGA",
                "first_key" => "qr",
                "second_key" => "mega",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qr0.webp"
            ],
            [
                "title" => "JungleeRummy",
                "first_key" => "hi",
                "second_key" => "jungleerummy",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/hi0.webp"
            ],
            [
                "title" => "icq",
                "first_key" => "iq",
                "second_key" => "icq",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/iq0.webp"
            ],
            [
                "title" => "Taobao",
                "first_key" => "qd",
                "second_key" => "taobao",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qd0.webp"
            ],
            [
                "title" => "BigC",
                "first_key" => "zu",
                "second_key" => "bigc",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zu0.webp"
            ],
            [
                "title" => "Megogo",
                "first_key" => "lv",
                "second_key" => "megogo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/lv0.webp"
            ],
            [
                "title" => "G2G",
                "first_key" => "bk",
                "second_key" => "g2g",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bk0.webp"
            ],
            [
                "title" => "NoBroker",
                "first_key" => "dv",
                "second_key" => "nobroker",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/dv0.webp"
            ],
            [
                "title" => "IndiaGold",
                "first_key" => "tp",
                "second_key" => "indiagold",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/tp0.webp"
            ],
            [
                "title" => "163СOM",
                "first_key" => "wp",
                "second_key" => "163сom",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/wp0.webp"
            ],
            [
                "title" => "XadrezFeliz",
                "first_key" => "fa",
                "second_key" => "xadrezfeliz",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fa0.webp"
            ],
            [
                "title" => "4Fun",
                "first_key" => "hk",
                "second_key" => "4fun",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/hk0.webp"
            ],
            [
                "title" => "Hermes",
                "first_key" => "en",
                "second_key" => "hermes",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/en0.webp"
            ],
            [
                "title" => "CallApp",
                "first_key" => "gw",
                "second_key" => "callapp",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gw0.webp"
            ],
            [
                "title" => "Stripe",
                "first_key" => "nu",
                "second_key" => "stripe",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/nu0.webp"
            ],
            [
                "title" => "Huya",
                "first_key" => "pp",
                "second_key" => "huya",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/pp0.webp"
            ],
            [
                "title" => "RummyWealth",
                "first_key" => "so",
                "second_key" => "rummywealth",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/so0.webp"
            ],
            [
                "title" => "Tick",
                "first_key" => "rb",
                "second_key" => "tick",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rb0.webp"
            ],
            [
                "title" => "Rediffmail",
                "first_key" => "co",
                "second_key" => "rediffmail",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/co0.webp"
            ],
            [
                "title" => "Baidu",
                "first_key" => "li",
                "second_key" => "baidu",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/li0.webp"
            ],
            [
                "title" => "Wish",
                "first_key" => "xv",
                "second_key" => "wish",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xv0.webp"
            ],
            [
                "title" => "Nanovest",
                "first_key" => "je",
                "second_key" => "nanovest",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/je0.webp"
            ],
            [
                "title" => "Trendyol",
                "first_key" => "pr",
                "second_key" => "trendyol",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/pr0.webp"
            ],
            [
                "title" => "RummyCulture",
                "first_key" => "ec",
                "second_key" => "rummyculture",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ec0.webp"
            ],
            [
                "title" => "kufarby",
                "first_key" => "kb",
                "second_key" => "kufarby",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/kb0.webp"
            ],
            [
                "title" => "Skype",
                "first_key" => "rc",
                "second_key" => "skype",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rc0.webp"
            ],
            [
                "title" => "FoxFord",
                "first_key" => "wz",
                "second_key" => "foxford",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/wz0.webp"
            ],
            [
                "title" => "PharmEasy",
                "first_key" => "fc",
                "second_key" => "pharmeasy",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fc0.webp"
            ],
            [
                "title" => "Meliuz",
                "first_key" => "uy",
                "second_key" => "meliuz",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/uy0.webp"
            ],
            [
                "title" => "Taki",
                "first_key" => "xw",
                "second_key" => "taki",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xw0.webp"
            ],
            [
                "title" => "IceCasino",
                "first_key" => "dq",
                "second_key" => "icecasino",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/dq0.webp"
            ],
            [
                "title" => "Blued",
                "first_key" => "qn",
                "second_key" => "blued",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qn0.webp"
            ],
            [
                "title" => "HOP",
                "first_key" => "ru",
                "second_key" => "hop",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ru0.webp"
            ],
            [
                "title" => "Eneba",
                "first_key" => "uf",
                "second_key" => "eneba",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/uf0.webp"
            ],
            [
                "title" => "Adidas",
                "first_key" => "an",
                "second_key" => "adidas",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/an0.webp"
            ],
            [
                "title" => "IQOS",
                "first_key" => "il",
                "second_key" => "iqos",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/il0.webp"
            ],
            [
                "title" => "Ашан",
                "first_key" => "st",
                "second_key" => "ашан",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/st0.webp"
            ],
            [
                "title" => "RummyOla",
                "first_key" => "xb",
                "second_key" => "rummyola",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xb0.webp"
            ],
            [
                "title" => "Poshmark",
                "first_key" => "oz",
                "second_key" => "poshmark",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/oz0.webp"
            ],
            [
                "title" => "Moneylion",
                "first_key" => "qo",
                "second_key" => "moneylion",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qo0.webp"
            ],
            [
                "title" => "ДругВокруг",
                "first_key" => "we",
                "second_key" => "другвокруг",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/we0.webp"
            ],
            [
                "title" => "Venmo",
                "first_key" => "yy",
                "second_key" => "venmo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yy0.webp"
            ],
            [
                "title" => "Gemgala",
                "first_key" => "cg",
                "second_key" => "gemgala",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cg0.webp"
            ],
            [
                "title" => "MOMO",
                "first_key" => "hc",
                "second_key" => "momo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/hc0.webp"
            ],
            [
                "title" => "HQ Trivia",
                "first_key" => "kp",
                "second_key" => "hqtrivia",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/kp0.webp"
            ],
            [
                "title" => "McDonalds",
                "first_key" => "ry",
                "second_key" => "mcdonalds",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ry0.webp"
            ],
            [
                "title" => "UU163",
                "first_key" => "ao",
                "second_key" => "uu163",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ao0.webp"
            ],
            [
                "title" => "Probo",
                "first_key" => "aa",
                "second_key" => "probo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/aa0.webp"
            ],
            [
                "title" => "CELEBe",
                "first_key" => "ai",
                "second_key" => "celebe",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ai0.webp"
            ],
            [
                "title" => "OneAset",
                "first_key" => "aj",
                "second_key" => "oneaset",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/aj0.webp"
            ],
            [
                "title" => "Douyu",
                "first_key" => "ak",
                "second_key" => "douyu",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ak0.webp"
            ],
            [
                "title" => "Perfluence",
                "first_key" => "at",
                "second_key" => "perfluence",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/at0.webp"
            ],
            [
                "title" => "Taikang",
                "first_key" => "aw",
                "second_key" => "taikang",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/aw0.webp"
            ],
            [
                "title" => "CrefisaMais",
                "first_key" => "ax",
                "second_key" => "crefisamais",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ax0.webp"
            ],
            [
                "title" => "Ruten",
                "first_key" => "ay",
                "second_key" => "ruten",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ay0.webp"
            ],
            [
                "title" => "Expressmoney",
                "first_key" => "ba",
                "second_key" => "expressmoney",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ba0.webp"
            ],
            [
                "title" => "Keybase ",
                "first_key" => "bf",
                "second_key" => "keybase",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bf0.webp"
            ],
            [
                "title" => "勇仕网络Ys4fun",
                "first_key" => "bi",
                "second_key" => "勇仕网络ys4fun",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bi0.webp"
            ],
            [
                "title" => "MarketGuru",
                "first_key" => "bm",
                "second_key" => "marketguru",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bm0.webp"
            ],
            [
                "title" => "Adani",
                "first_key" => "bq",
                "second_key" => "adani",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bq0.webp"
            ],
            [
                "title" => "Вкусно и Точка",
                "first_key" => "br",
                "second_key" => "вкусноиточка",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/br0.webp"
            ],
            [
                "title" => "Alfa",
                "first_key" => "bt",
                "second_key" => "alfa",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bt0.webp"
            ],
            [
                "title" => "Dosi",
                "first_key" => "bx",
                "second_key" => "dosi",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/bx0.webp"
            ],
            [
                "title" => "SuperS",
                "first_key" => "ca",
                "second_key" => "supers",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ca0.webp"
            ],
            [
                "title" => "Quipp",
                "first_key" => "cc",
                "second_key" => "quipp",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cc0.webp"
            ],
            [
                "title" => "mosru",
                "first_key" => "ce",
                "second_key" => "mosru",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ce0.webp"
            ],
            [
                "title" => "redBus",
                "first_key" => "ci",
                "second_key" => "redbus",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ci0.webp"
            ],
            [
                "title" => "BeReal",
                "first_key" => "ck",
                "second_key" => "bereal",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ck0.webp"
            ],
            [
                "title" => "UWIN",
                "first_key" => "cl",
                "second_key" => "uwin",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cl0.webp"
            ],
            [
                "title" => "TenChat",
                "first_key" => "cr",
                "second_key" => "tenchat",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cr0.webp"
            ],
            [
                "title" => "炙热星河",
                "first_key" => "cu",
                "second_key" => "炙热星河",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cu0.webp"
            ],
            [
                "title" => "WashXpress",
                "first_key" => "cv",
                "second_key" => "washxpress",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cv0.webp"
            ],
            [
                "title" => "Icrypex",
                "first_key" => "cx",
                "second_key" => "icrypex",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cx0.webp"
            ],
            [
                "title" => "Getmega",
                "first_key" => "cz",
                "second_key" => "getmega",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/cz0.webp"
            ],
            [
                "title" => "CloudChat",
                "first_key" => "dd",
                "second_key" => "cloudchat",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/dd0.webp"
            ],
            [
                "title" => "Karusel",
                "first_key" => "de",
                "second_key" => "karusel",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/de0.webp"
            ],
            [
                "title" => "Mercari",
                "first_key" => "dg",
                "second_key" => "mercari",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/dg0.webp"
            ],
            [
                "title" => "Loanflix",
                "first_key" => "di",
                "second_key" => "loanflix",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/di0.webp"
            ],
            [
                "title" => "AUBANK",
                "first_key" => "du",
                "second_key" => "aubank",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/du0.webp"
            ],
            [
                "title" => "DominosPizza",
                "first_key" => "dz",
                "second_key" => "dominospizza",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/dz0.webp"
            ],
            [
                "title" => "MrQ",
                "first_key" => "ej",
                "second_key" => "mrq",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ej0.webp"
            ],
            [
                "title" => "Qoo10",
                "first_key" => "eq",
                "second_key" => "qoo10",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/eq0.webp"
            ],
            [
                "title" => "iQIYI",
                "first_key" => "es",
                "second_key" => "iqiyi",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/es0.webp"
            ],
            [
                "title" => "LiveScore",
                "first_key" => "eu",
                "second_key" => "livescore",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/eu0.webp"
            ],
            [
                "title" => "GoerliFaucet",
                "first_key" => "ez",
                "second_key" => "goerlifaucet",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ez0.webp"
            ],
            [
                "title" => "Lalamove",
                "first_key" => "fh",
                "second_key" => "lalamove",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fh0.webp"
            ],
            [
                "title" => "Dundle",
                "first_key" => "fi",
                "second_key" => "dundle",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fi0.webp"
            ],
            [
                "title" => "BLIBLI",
                "first_key" => "fk",
                "second_key" => "blibli",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fk0.webp"
            ],
            [
                "title" => "RummyLoot",
                "first_key" => "fl",
                "second_key" => "rummyloot",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fl0.webp"
            ],
            [
                "title" => " Şikayet var",
                "first_key" => "fs",
                "second_key" => "şikayetvar",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fs0.webp"
            ],
            [
                "title" => "PGbonus",
                "first_key" => "fx",
                "second_key" => "pgbonus",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/fx0.webp"
            ],
            [
                "title" => "YouStar",
                "first_key" => "gb",
                "second_key" => "youstar",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gb0.webp"
            ],
            [
                "title" => "Surveytime",
                "first_key" => "gd",
                "second_key" => "surveytime",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gd0.webp"
            ],
            [
                "title" => "PagSmile",
                "first_key" => "gg",
                "second_key" => "pagsmile",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gg0.webp"
            ],
            [
                "title" => "GyFTR",
                "first_key" => "gh",
                "second_key" => "gyftr",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gh0.webp"
            ],
            [
                "title" => "Hotline",
                "first_key" => "gi",
                "second_key" => "hotline",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gi0.webp"
            ],
            [
                "title" => "Gett",
                "first_key" => "gt",
                "second_key" => "gett",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gt0.webp"
            ],
            [
                "title" => "LYKA",
                "first_key" => "gz",
                "second_key" => "lyka",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/gz0.webp"
            ],
            [
                "title" => "My11Circle",
                "first_key" => "ha",
                "second_key" => "my11circle",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ha0.webp"
            ],
            [
                "title" => "Mewt",
                "first_key" => "he",
                "second_key" => "mewt",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/he0.webp"
            ],
            [
                "title" => "Switips",
                "first_key" => "hg",
                "second_key" => "switips",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/hg0.webp"
            ],
            [
                "title" => "Band",
                "first_key" => "hl",
                "second_key" => "band",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/hl0.webp"
            ],
            [
                "title" => "Cathay",
                "first_key" => "ho",
                "second_key" => "cathay",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ho0.webp"
            ],
            [
                "title" => "Magicbricks",
                "first_key" => "hq",
                "second_key" => "magicbricks",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/hq0.webp"
            ],
            [
                "title" => "TeenPattiStarpro",
                "first_key" => "ih",
                "second_key" => "teenpattistarpro",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ih0.webp"
            ],
            [
                "title" => "GuruBets",
                "first_key" => "ik",
                "second_key" => "gurubets",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ik0.webp"
            ],
            [
                "title" => "ЗдравСити",
                "first_key" => "io",
                "second_key" => "здравсити",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/io0.webp"
            ],
            [
                "title" => "Bykea",
                "first_key" => "iu",
                "second_key" => "bykea",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/iu0.webp"
            ],
            [
                "title" => "FoodHub",
                "first_key" => "iy",
                "second_key" => "foodhub",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/iy0.webp"
            ],
            [
                "title" => "IVI",
                "first_key" => "jc",
                "second_key" => "ivi",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/jc0.webp"
            ],
            [
                "title" => "Likee",
                "first_key" => "jf",
                "second_key" => "likee",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/jf0.webp"
            ],
            [
                "title" => "PingPong",
                "first_key" => "jh",
                "second_key" => "pingpong",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/jh0.webp"
            ],
            [
                "title" => "Aitu",
                "first_key" => "jj",
                "second_key" => "aitu",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/jj0.webp"
            ],
            [
                "title" => "Hopi",
                "first_key" => "jl",
                "second_key" => "hopi",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/jl0.webp"
            ],
            [
                "title" => "mzadqatar",
                "first_key" => "jm",
                "second_key" => "mzadqatar",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/jm0.webp"
            ],
            [
                "title" => "Kaya",
                "first_key" => "jz",
                "second_key" => "kaya",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/jz0.webp"
            ],
            [
                "title" => "FreeChargeApp",
                "first_key" => "kg",
                "second_key" => "freechargeapp",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/kg0.webp"
            ],
            [
                "title" => "Rozetka",
                "first_key" => "km",
                "second_key" => "rozetka",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/km0.webp"
            ],
            [
                "title" => "AdaKami",
                "first_key" => "ko",
                "second_key" => "adakami",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ko0.webp"
            ],
            [
                "title" => "RoyalWin",
                "first_key" => "ku",
                "second_key" => "royalwin",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ku0.webp"
            ],
            [
                "title" => "Foody",
                "first_key" => "kw",
                "second_key" => "foody",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/kw0.webp"
            ],
            [
                "title" => "SpatenOktoberfest",
                "first_key" => "ky",
                "second_key" => "spatenoktoberfest",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ky0.webp"
            ],
            [
                "title" => "NimoTV",
                "first_key" => "kz",
                "second_key" => "nimotv",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/kz0.webp"
            ],
            [
                "title" => "Subito",
                "first_key" => "lc",
                "second_key" => "subito",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/lc0.webp"
            ],
            [
                "title" => "24betting",
                "first_key" => "lh",
                "second_key" => "24betting",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/lh0.webp"
            ],
            [
                "title" => "PurePlatfrom",
                "first_key" => "lk",
                "second_key" => "pureplatfrom",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/lk0.webp"
            ],
            [
                "title" => "Algida",
                "first_key" => "lp",
                "second_key" => "algida",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/lp0.webp"
            ],
            [
                "title" => "Potato",
                "first_key" => "lq",
                "second_key" => "potato",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/lq0.webp"
            ],
            [
                "title" => "BitClout",
                "first_key" => "lt",
                "second_key" => "bitclout",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/lt0.webp"
            ],
            [
                "title" => "MrGreen",
                "first_key" => "lw",
                "second_key" => "mrgreen",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/lw0.webp"
            ],
            [
                "title" => "LongHu",
                "first_key" => "mk",
                "second_key" => "longhu",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/mk0.webp"
            ],
            [
                "title" => "RRSA",
                "first_key" => "mn",
                "second_key" => "rrsa",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/mn0.webp"
            ],
            [
                "title" => "SoulApp",
                "first_key" => "mx",
                "second_key" => "soulapp",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/mx0.webp"
            ],
            [
                "title" => "Coindcx",
                "first_key" => "ne",
                "second_key" => "coindcx",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ne0.webp"
            ],
            [
                "title" => "Gittigidiyor",
                "first_key" => "nk",
                "second_key" => "gittigidiyor",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/nk0.webp"
            ],
            [
                "title" => "Thisshop",
                "first_key" => "nm",
                "second_key" => "thisshop",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/nm0.webp"
            ],
            [
                "title" => "Giftcloud",
                "first_key" => "nn",
                "second_key" => "giftcloud",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/nn0.webp"
            ],
            [
                "title" => "Siply",
                "first_key" => "np",
                "second_key" => "siply",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/np0.webp"
            ],
            [
                "title" => "Trip",
                "first_key" => "nq",
                "second_key" => "trip",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/nq0.webp"
            ],
            [
                "title" => "Tosla",
                "first_key" => "nr",
                "second_key" => "tosla",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/nr0.webp"
            ],
            [
                "title" => "Ximalaya",
                "first_key" => "nw",
                "second_key" => "ximalaya",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/nw0.webp"
            ],
            [
                "title" => "FWDMAX",
                "first_key" => "od",
                "second_key" => "fwdmax",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/od0.webp"
            ],
            [
                "title" => "Urent",
                "first_key" => "of",
                "second_key" => "urent",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/of0.webp"
            ],
            [
                "title" => "MapleSEA ",
                "first_key" => "oh",
                "second_key" => "maplesea",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/oh0.webp"
            ],
            [
                "title" => "KazanExpress",
                "first_key" => "ol",
                "second_key" => "kazanexpress",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ol0.webp"
            ],
            [
                "title" => "Corona",
                "first_key" => "om",
                "second_key" => "corona",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/om0.webp"
            ],
            [
                "title" => "Vlife",
                "first_key" => "oq",
                "second_key" => "vlife",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/oq0.webp"
            ],
            [
                "title" => "Dhani",
                "first_key" => "os",
                "second_key" => "dhani",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/os0.webp"
            ],
            [
                "title" => "CashFly",
                "first_key" => "oy",
                "second_key" => "cashfly",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/oy0.webp"
            ],
            [
                "title" => "Gamekit",
                "first_key" => "pa",
                "second_key" => "gamekit",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/pa0.webp"
            ],
            [
                "title" => "premium.one",
                "first_key" => "po",
                "second_key" => "premium.one",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/po0.webp"
            ],
            [
                "title" => "Bitaqaty",
                "first_key" => "pt",
                "second_key" => "bitaqaty",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/pt0.webp"
            ],
            [
                "title" => "SellMonitor",
                "first_key" => "pw",
                "second_key" => "sellmonitor",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/pw0.webp"
            ],
            [
                "title" => "Monese",
                "first_key" => "py",
                "second_key" => "monese",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/py0.webp"
            ],
            [
                "title" => "MoneyPay",
                "first_key" => "qg",
                "second_key" => "moneypay",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qg0.webp"
            ],
            [
                "title" => "Oriflame",
                "first_key" => "qh",
                "second_key" => "oriflame",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qh0.webp"
            ],
            [
                "title" => "32red",
                "first_key" => "qi",
                "second_key" => "32red",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qi0.webp"
            ],
            [
                "title" => "Bit",
                "first_key" => "qk",
                "second_key" => "bit",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qk0.webp"
            ],
            [
                "title" => "CMTcuzdan",
                "first_key" => "ql",
                "second_key" => "cmtcuzdan",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ql0.webp"
            ],
            [
                "title" => "MoneyСontrol",
                "first_key" => "qt",
                "second_key" => "moneyсontrol",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qt0.webp"
            ],
            [
                "title" => "Agroinform",
                "first_key" => "qu",
                "second_key" => "agroinform",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qu0.webp"
            ],
            [
                "title" => "Zhihu",
                "first_key" => "qy",
                "second_key" => "zhihu",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/qy0.webp"
            ],
            [
                "title" => "KeyPay",
                "first_key" => "ra",
                "second_key" => "keypay",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ra0.webp"
            ],
            [
                "title" => "Akudo",
                "first_key" => "rf",
                "second_key" => "akudo",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rf0.webp"
            ],
            [
                "title" => "Porbet",
                "first_key" => "rg",
                "second_key" => "porbet",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rg0.webp"
            ],
            [
                "title" => "Ace2Three",
                "first_key" => "rh",
                "second_key" => "ace2three",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rh0.webp"
            ],
            [
                "title" => "Детский мир",
                "first_key" => "rj",
                "second_key" => "детскиймир",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rj0.webp"
            ],
            [
                "title" => "Faberlic",
                "first_key" => "rm",
                "second_key" => "faberlic",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rm0.webp"
            ],
            [
                "title" => "Lotus",
                "first_key" => "rs",
                "second_key" => "lotus",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rs0.webp"
            ],
            [
                "title" => "Kotak811",
                "first_key" => "rv",
                "second_key" => "kotak811",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/rv0.webp"
            ],
            [
                "title" => "SneakersnStuff",
                "first_key" => "sf",
                "second_key" => "sneakersnstuff",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/sf0.webp"
            ],
            [
                "title" => "Skroutz",
                "first_key" => "sk",
                "second_key" => "skroutz",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/sk0.webp"
            ],
            [
                "title" => "Hezzl",
                "first_key" => "ss",
                "second_key" => "hezzl",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ss0.webp"
            ],
            [
                "title" => "Dostavista",
                "first_key" => "sv",
                "second_key" => "dostavista",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/sv0.webp"
            ],
            [
                "title" => "Pivko24",
                "first_key" => "sz",
                "second_key" => "pivko24",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/sz0.webp"
            ],
            [
                "title" => "cryptocom",
                "first_key" => "ti",
                "second_key" => "cryptocom",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ti0.webp"
            ],
            [
                "title" => "Swvl",
                "first_key" => "tq",
                "second_key" => "swvl",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/tq0.webp"
            ],
            [
                "title" => "СhampionСasino",
                "first_key" => "uj",
                "second_key" => "сhampionсasino",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/uj0.webp"
            ],
            [
                "title" => "humblebundle",
                "first_key" => "un",
                "second_key" => "humblebundle",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/un0.webp"
            ],
            [
                "title" => "BinBin",
                "first_key" => "uv",
                "second_key" => "binbin",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/uv0.webp"
            ],
            [
                "title" => "Kirana",
                "first_key" => "uw",
                "second_key" => "kirana",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/uw0.webp"
            ],
            [
                "title" => "SportGully",
                "first_key" => "va",
                "second_key" => "sportgully",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/va0.webp"
            ],
            [
                "title" => "Stormgain",
                "first_key" => "vj",
                "second_key" => "stormgain",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/vj0.webp"
            ],
            [
                "title" => "Yaay",
                "first_key" => "vn",
                "second_key" => "yaay",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/vn0.webp"
            ],
            [
                "title" => "WinzoGame",
                "first_key" => "vs",
                "second_key" => "winzogame",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/vs0.webp"
            ],
            [
                "title" => "Meta",
                "first_key" => "vy",
                "second_key" => "meta",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/vy0.webp"
            ],
            [
                "title" => "GameArena",
                "first_key" => "wn",
                "second_key" => "gamearena",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/wn0.webp"
            ],
            [
                "title" => "Parkplus",
                "first_key" => "wo",
                "second_key" => "parkplus",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/wo0.webp"
            ],
            [
                "title" => "IZI",
                "first_key" => "wt",
                "second_key" => "izi",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/wt0.webp"
            ],
            [
                "title" => "AIS",
                "first_key" => "wv",
                "second_key" => "ais",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/wv0.webp"
            ],
            [
                "title" => "BIP",
                "first_key" => "ww",
                "second_key" => "bip",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ww0.webp"
            ],
            [
                "title" => "LightChat",
                "first_key" => "xf",
                "second_key" => "lightchat",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xf0.webp"
            ],
            [
                "title" => "InFund",
                "first_key" => "xi",
                "second_key" => "infund",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xi0.webp"
            ],
            [
                "title" => "Wmaraci",
                "first_key" => "xl",
                "second_key" => "wmaraci",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xl0.webp"
            ],
            [
                "title" => "Familia",
                "first_key" => "xn",
                "second_key" => "familia",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xn0.webp"
            ],
            [
                "title" => "GroupMe",
                "first_key" => "xs",
                "second_key" => "groupme",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xs0.webp"
            ],
            [
                "title" => "Joyride",
                "first_key" => "xx",
                "second_key" => "joyride",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/xx0.webp"
            ],
            [
                "title" => "米画师Mihuashi",
                "first_key" => "yd",
                "second_key" => "米画师mihuashi",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yd0.webp"
            ],
            [
                "title" => "Citymobil",
                "first_key" => "yf",
                "second_key" => "citymobil",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yf0.webp"
            ],
            [
                "title" => "Юла",
                "first_key" => "ym",
                "second_key" => "юла",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/ym0.webp"
            ],
            [
                "title" => "Allegro",
                "first_key" => "yn",
                "second_key" => "allegro",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yn0.webp"
            ],
            [
                "title" => "IPLwin",
                "first_key" => "yv",
                "second_key" => "iplwin",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yv0.webp"
            ],
            [
                "title" => "JTExpress",
                "first_key" => "yx",
                "second_key" => "jtexpress",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yx0.webp"
            ],
            [
                "title" => "Около",
                "first_key" => "yz",
                "second_key" => "около",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/yz0.webp"
            ],
            [
                "title" => "Zilch",
                "first_key" => "zd",
                "second_key" => "zilch",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zd0.webp"
            ],
            [
                "title" => "LoveLocal",
                "first_key" => "zi",
                "second_key" => "lovelocal",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zi0.webp"
            ],
            [
                "title" => "ROBINHOOD",
                "first_key" => "zj",
                "second_key" => "robinhood",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zj0.webp"
            ],
            [
                "title" => "Biedronka",
                "first_key" => "zn",
                "second_key" => "biedronka",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zn0.webp"
            ],
            [
                "title" => "IndiaPlays",
                "first_key" => "zq",
                "second_key" => "indiaplays",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zq0.webp"
            ],
            [
                "title" => "Budweiser",
                "first_key" => "zt",
                "second_key" => "budweiser",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zt0.webp"
            ],
            [
                "title" => "Dent",
                "first_key" => "zz",
                "second_key" => "dent",
                "image" => "https://smsactivate.s3.eu-central-1.amazonaws.com/assets/ico/zz0.webp"
            ]
        ];

        foreach ($services as $service){
            DB::table('service')->insert($service);
        }
    }
}
