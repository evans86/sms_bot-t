<?php

namespace App\Http\Controllers\Activate;

use App\Exceptions\NotFoundException;
use App\Http\Repositories\ResourceRepository;
use App\Http\Requests\Resource\ResourceUpdateRequest;
use App\Models\Resource\SmsResource;
use App\Services\Activate\ResourceService;
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

        $en_countries = [
            'AF' => 'Afghanistan',
            'AX' => 'Åland Islands',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua & Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahamas',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia & Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory',
            'VG' => 'British Virgin Islands',
            'BN' => 'Brunei',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cape Verde',
            'BQ' => 'Caribbean Netherlands',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros',
            'CG' => 'Congo - Brazzaville',
            'CD' => 'Congo - Kinshasa',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'CI' => 'Côte d’Ivoire',
            'HR' => 'Croatia',
            'CU' => 'Cuba',
            'CW' => 'Curaçao',
            'CY' => 'Cyprus',
            'CZ' => 'Czechia',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'SZ' => 'Eswatini',
            'ET' => 'Ethiopia',
            'FK' => 'Falkland Islands',
            'FO' => 'Faroe Islands',
            'FJ' => 'Fiji',
            'FI' => 'Finland',
            'FR' => 'France',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GG' => 'Guernsey',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard & McDonald Islands',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong SAR China',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IM' => 'Isle of Man',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JE' => 'Jersey',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyzstan',
            'LA' => 'Laos',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macao SAR China',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia',
            'MD' => 'Moldova',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar (Burma)',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'NL' => 'Netherlands',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'KP' => 'North Korea',
            'MK' => 'North Macedonia',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PS' => 'Palestinian Territories',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn Islands',
            'PL' => 'Poland',
            'PT' => 'Portugal',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Réunion',
            'RO' => 'Romania',
            'RU' => 'Russia',
            'RW' => 'Rwanda',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'São Tomé & Príncipe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'RS' => 'Serbia',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SX' => 'Sint Maarten',
            'SK' => 'Slovakia',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia',
            'ZA' => 'South Africa',
            'GS' => 'South Georgia & South Sandwich Islands',
            'KR' => 'South Korea',
            'SS' => 'South Sudan',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'BL' => 'St. Barthélemy',
            'SH' => 'St. Helena',
            'KN' => 'St. Kitts & Nevis',
            'LC' => 'St. Lucia',
            'MF' => 'St. Martin',
            'PM' => 'St. Pierre & Miquelon',
            'VC' => 'St. Vincent & Grenadines',
            'SD' => 'Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard & Jan Mayen',
            'SE' => 'Sweden',
            'CH' => 'Switzerland',
            'SY' => 'Syria',
            'TW' => 'Taiwan',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania',
            'TH' => 'Thailand',
            'TL' => 'Timor-Leste',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad & Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks & Caicos Islands',
            'TV' => 'Tuvalu',
            'UM' => 'U.S. Outlying Islands',
            'VI' => 'U.S. Virgin Islands',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States',
            'UY' => 'Uruguay',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VA' => 'Vatican City',
            'VE' => 'Venezuela',
            'VN' => 'Vietnam',
            'WF' => 'Wallis & Futuna',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe',
        ];

        $ru_countries = [
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b9/Flag_of_Australia.svg/22px-Flag_of_Australia.svg.png",
                "name_ru" => "Австралия",
                "iso_code2" => "AU",
                "iso_code3" => "AUS"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/41/Flag_of_Austria.svg/22px-Flag_of_Austria.svg.png",
                "name_ru" => "Австрия",
                "iso_code2" => "AT",
                "iso_code3" => "AUT"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Flag_of_Azerbaijan.svg/22px-Flag_of_Azerbaijan.svg.png",
                "name_ru" => "Азербайджан",
                "iso_code2" => "AZ",
                "iso_code3" => "AZE"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/52/Flag_of_%C3%85land.svg/22px-Flag_of_%C3%85land.svg.png",
                "name_ru" => "Аландские острова",
                "iso_code2" => "AX",
                "iso_code3" => "ALA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/36/Flag_of_Albania.svg/22px-Flag_of_Albania.svg.png",
                "name_ru" => "Албания",
                "iso_code2" => "AL",
                "iso_code3" => "ALB"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/77/Flag_of_Algeria.svg/22px-Flag_of_Algeria.svg.png",
                "name_ru" => "Алжир",
                "iso_code2" => "DZ",
                "iso_code3" => "DZA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Flag_of_the_United_States_Virgin_Islands.svg/22px-Flag_of_the_United_States_Virgin_Islands.svg.png",
                "name_ru" => "Виргинские Острова (США)",
                "iso_code2" => "VI",
                "iso_code3" => "VIR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/87/Flag_of_American_Samoa.svg/22px-Flag_of_American_Samoa.svg.png",
                "name_ru" => "Американское Самоа",
                "iso_code2" => "AS",
                "iso_code3" => "ASM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Flag_of_Anguilla.svg/22px-Flag_of_Anguilla.svg.png",
                "name_ru" => "Ангилья",
                "iso_code2" => "AI",
                "iso_code3" => "AIA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Flag_of_Angola.svg/22px-Flag_of_Angola.svg.png",
                "name_ru" => "Ангола",
                "iso_code2" => "AO",
                "iso_code3" => "AGO"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/19/Flag_of_Andorra.svg/22px-Flag_of_Andorra.svg.png",
                "name_ru" => "Андорра",
                "iso_code2" => "AD",
                "iso_code3" => "AND"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Flag_of_Antarctica.svg/22px-Flag_of_Antarctica.svg.png",
                "name_ru" => "Антарктида",
                "iso_code2" => "AQ",
                "iso_code3" => "ATA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/89/Flag_of_Antigua_and_Barbuda.svg/22px-Flag_of_Antigua_and_Barbuda.svg.png",
                "name_ru" => "Антигуа и Барбуда",
                "iso_code2" => "AG",
                "iso_code3" => "ATG"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Flag_of_Argentina.svg/22px-Flag_of_Argentina.svg.png",
                "name_ru" => "Аргентина",
                "iso_code2" => "AR",
                "iso_code3" => "ARG"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Flag_of_Armenia.svg/22px-Flag_of_Armenia.svg.png",
                "name_ru" => "Армения",
                "iso_code2" => "AM",
                "iso_code3" => "ARM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Flag_of_Aruba.svg/22px-Flag_of_Aruba.svg.png",
                "name_ru" => "Аруба",
                "iso_code2" => "AW",
                "iso_code3" => "ABW"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Afghanistan.svg/22px-Flag_of_Afghanistan.svg.png",
                "name_ru" => "Афганистан",
                "iso_code2" => "AF",
                "iso_code3" => "AFG"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/93/Flag_of_the_Bahamas.svg/22px-Flag_of_the_Bahamas.svg.png",
                "name_ru" => "Багамы",
                "iso_code2" => "BS",
                "iso_code3" => "BHS"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Flag_of_Bangladesh.svg/22px-Flag_of_Bangladesh.svg.png",
                "name_ru" => "Бангладеш",
                "iso_code2" => "BD",
                "iso_code3" => "BGD"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Flag_of_Barbados.svg/22px-Flag_of_Barbados.svg.png",
                "name_ru" => "Барбадос",
                "iso_code2" => "BB",
                "iso_code3" => "BRB"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Flag_of_Bahrain.svg/22px-Flag_of_Bahrain.svg.png",
                "name_ru" => "Бахрейн",
                "iso_code2" => "BH",
                "iso_code3" => "BHR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Flag_of_Belize.svg/22px-Flag_of_Belize.svg.png",
                "name_ru" => "Белиз",
                "iso_code2" => "BZ",
                "iso_code3" => "BLZ"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/85/Flag_of_Belarus.svg/22px-Flag_of_Belarus.svg.png",
                "name_ru" => "Белоруссия",
                "iso_code2" => "BY",
                "iso_code3" => "BLR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/92/Flag_of_Belgium_%28civil%29.svg/22px-Flag_of_Belgium_%28civil%29.svg.png",
                "name_ru" => "Бельгия",
                "iso_code2" => "BE",
                "iso_code3" => "BEL"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Flag_of_Benin.svg/22px-Flag_of_Benin.svg.png",
                "name_ru" => "Бенин",
                "iso_code2" => "BJ",
                "iso_code3" => "BEN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Flag_of_Bermuda.svg/22px-Flag_of_Bermuda.svg.png",
                "name_ru" => "Бермуды",
                "iso_code2" => "BM",
                "iso_code3" => "BMU"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Bulgaria.svg/22px-Flag_of_Bulgaria.svg.png",
                "name_ru" => "Болгария",
                "iso_code2" => "BG",
                "iso_code3" => "BGR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/de/Flag_of_Bolivia_%28state%29.svg/22px-Flag_of_Bolivia_%28state%29.svg.png",
                "name_ru" => "Боливия",
                "iso_code2" => "BO",
                "iso_code3" => "BOL"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/20/Flag_of_the_Netherlands.svg/22px-Flag_of_the_Netherlands.svg.png",
                "name_ru" => "Бонэйр, Синт-Эстатиус и Саба",
                "iso_code2" => "BQ",
                "iso_code3" => "BES"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Flag_of_Bosnia_and_Herzegovina.svg/22px-Flag_of_Bosnia_and_Herzegovina.svg.png",
                "name_ru" => "Босния и Герцеговина",
                "iso_code2" => "BA",
                "iso_code3" => "BIH"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Flag_of_Botswana.svg/22px-Flag_of_Botswana.svg.png",
                "name_ru" => "Ботсвана",
                "iso_code2" => "BW",
                "iso_code3" => "BWA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/05/Flag_of_Brazil.svg/22px-Flag_of_Brazil.svg.png",
                "name_ru" => "Бразилия",
                "iso_code2" => "BR",
                "iso_code3" => "BRA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/6e/Flag_of_the_British_Indian_Ocean_Territory.svg/22px-Flag_of_the_British_Indian_Ocean_Territory.svg.png",
                "name_ru" => "Британская территория в Индийском океане",
                "iso_code2" => "IO",
                "iso_code3" => "IOT"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/42/Flag_of_the_British_Virgin_Islands.svg/22px-Flag_of_the_British_Virgin_Islands.svg.png",
                "name_ru" => "Британские Виргинские острова",
                "iso_code2" => "VG",
                "iso_code3" => "VGB"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Flag_of_Brunei.svg/22px-Flag_of_Brunei.svg.png",
                "name_ru" => "Бруней",
                "iso_code2" => "BN",
                "iso_code3" => "BRN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/31/Flag_of_Burkina_Faso.svg/22px-Flag_of_Burkina_Faso.svg.png",
                "name_ru" => "Буркина-Фасо",
                "iso_code2" => "BF",
                "iso_code3" => "BFA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/50/Flag_of_Burundi.svg/22px-Flag_of_Burundi.svg.png",
                "name_ru" => "Бурунди",
                "iso_code2" => "BI",
                "iso_code3" => "BDI"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/91/Flag_of_Bhutan.svg/22px-Flag_of_Bhutan.svg.png",
                "name_ru" => "Бутан",
                "iso_code2" => "BT",
                "iso_code3" => "BTN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Flag_of_Vanuatu.svg/22px-Flag_of_Vanuatu.svg.png",
                "name_ru" => "Вануату",
                "iso_code2" => "VU",
                "iso_code3" => "VUT"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/00/Flag_of_the_Vatican_City.svg/20px-Flag_of_the_Vatican_City.svg.png",
                "name_ru" => "Ватикан",
                "iso_code2" => "VA",
                "iso_code3" => "VAT"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Flag_of_the_United_Kingdom.svg/22px-Flag_of_the_United_Kingdom.svg.png",
                "name_ru" => "Великобритания",
                "iso_code2" => "GB",
                "iso_code3" => "GBR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Flag_of_Hungary.svg/22px-Flag_of_Hungary.svg.png",
                "name_ru" => "Венгрия",
                "iso_code2" => "HU",
                "iso_code3" => "HUN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Flag_of_Venezuela_%28state%29.svg/22px-Flag_of_Venezuela_%28state%29.svg.png",
                "name_ru" => "Венесуэла",
                "iso_code2" => "VE",
                "iso_code3" => "VEN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/22px-Flag_of_the_United_States.svg.png",
                "name_ru" => "Внешние малые острова (США)",
                "iso_code2" => "UM",
                "iso_code3" => "UMI"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/26/Flag_of_East_Timor.svg/22px-Flag_of_East_Timor.svg.png",
                "name_ru" => "Восточный Тимор",
                "iso_code2" => "TL",
                "iso_code3" => "TLS"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/22px-Flag_of_Vietnam.svg.png",
                "name_ru" => "Вьетнам",
                "iso_code2" => "VN",
                "iso_code3" => "VNM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/04/Flag_of_Gabon.svg/22px-Flag_of_Gabon.svg.png",
                "name_ru" => "Габон",
                "iso_code2" => "GA",
                "iso_code3" => "GAB"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/56/Flag_of_Haiti.svg/22px-Flag_of_Haiti.svg.png",
                "name_ru" => "Гаити",
                "iso_code2" => "HT",
                "iso_code3" => "HTI"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/99/Flag_of_Guyana.svg/22px-Flag_of_Guyana.svg.png",
                "name_ru" => "Гайана",
                "iso_code2" => "GY",
                "iso_code3" => "GUY"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/77/Flag_of_The_Gambia.svg/22px-Flag_of_The_Gambia.svg.png",
                "name_ru" => "Гамбия",
                "iso_code2" => "GM",
                "iso_code3" => "GMB"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/19/Flag_of_Ghana.svg/22px-Flag_of_Ghana.svg.png",
                "name_ru" => "Гана",
                "iso_code2" => "GH",
                "iso_code3" => "GHA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/04/Flag_of_Guadeloupe_%28local%29.svg/22px-Flag_of_Guadeloupe_%28local%29.svg.png",
                "name_ru" => "Гваделупа",
                "iso_code2" => "GP",
                "iso_code3" => "GLP"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Flag_of_Guatemala.svg/22px-Flag_of_Guatemala.svg.png",
                "name_ru" => "Гватемала",
                "iso_code2" => "GT",
                "iso_code3" => "GTM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/29/Flag_of_French_Guiana.svg/22px-Flag_of_French_Guiana.svg.png",
                "name_ru" => "Гвиана",
                "iso_code2" => "GF",
                "iso_code3" => "GUF"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Flag_of_Guinea.svg/22px-Flag_of_Guinea.svg.png",
                "name_ru" => "Гвинея",
                "iso_code2" => "GN",
                "iso_code3" => "GIN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/01/Flag_of_Guinea-Bissau.svg/22px-Flag_of_Guinea-Bissau.svg.png",
                "name_ru" => "Гвинея-Бисау",
                "iso_code2" => "GW",
                "iso_code3" => "GNB"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Flag_of_Germany.svg/22px-Flag_of_Germany.svg.png",
                "name_ru" => "Германия",
                "iso_code2" => "DE",
                "iso_code3" => "DEU"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Flag_of_Guernsey.svg/22px-Flag_of_Guernsey.svg.png",
                "name_ru" => "Гернси",
                "iso_code2" => "GG",
                "iso_code3" => "GGY"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/02/Flag_of_Gibraltar.svg/22px-Flag_of_Gibraltar.svg.png",
                "name_ru" => "Гибралтар",
                "iso_code2" => "GI",
                "iso_code3" => "GIB"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/82/Flag_of_Honduras.svg/22px-Flag_of_Honduras.svg.png",
                "name_ru" => "Гондурас",
                "iso_code2" => "HN",
                "iso_code3" => "HND"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Flag_of_Hong_Kong.svg/22px-Flag_of_Hong_Kong.svg.png",
                "name_ru" => "Гонконг",
                "iso_code2" => "HK",
                "iso_code3" => "HKG"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Flag_of_Grenada.svg/22px-Flag_of_Grenada.svg.png",
                "name_ru" => "Гренада",
                "iso_code2" => "GD",
                "iso_code3" => "GRD"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/09/Flag_of_Greenland.svg/22px-Flag_of_Greenland.svg.png",
                "name_ru" => "Гренландия",
                "iso_code2" => "GL",
                "iso_code3" => "GRL"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Greece.svg/22px-Flag_of_Greece.svg.png",
                "name_ru" => "Греция",
                "iso_code2" => "GR",
                "iso_code3" => "GRC"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Flag_of_Georgia.svg/22px-Flag_of_Georgia.svg.png",
                "name_ru" => "Грузия",
                "iso_code2" => "GE",
                "iso_code3" => "GEO"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/07/Flag_of_Guam.svg/22px-Flag_of_Guam.svg.png",
                "name_ru" => "Гуам",
                "iso_code2" => "GU",
                "iso_code3" => "GUM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Flag_of_Denmark.svg/22px-Flag_of_Denmark.svg.png",
                "name_ru" => "Дания",
                "iso_code2" => "DK",
                "iso_code3" => "DNK"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Flag_of_Jersey.svg/22px-Flag_of_Jersey.svg.png",
                "name_ru" => "Джерси",
                "iso_code2" => "JE",
                "iso_code3" => "JEY"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/34/Flag_of_Djibouti.svg/22px-Flag_of_Djibouti.svg.png",
                "name_ru" => "Джибути",
                "iso_code2" => "DJ",
                "iso_code3" => "DJI"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Flag_of_Dominica.svg/22px-Flag_of_Dominica.svg.png",
                "name_ru" => "Доминика",
                "iso_code2" => "DM",
                "iso_code3" => "DMA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_the_Dominican_Republic.svg/22px-Flag_of_the_Dominican_Republic.svg.png",
                "name_ru" => "Доминиканская Республика",
                "iso_code2" => "DO",
                "iso_code3" => "DOM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Flag_of_the_Democratic_Republic_of_the_Congo.svg/22px-Flag_of_the_Democratic_Republic_of_the_Congo.svg.png",
                "name_ru" => "Демократическая Республика Конго",
                "iso_code2" => "CD",
                "iso_code3" => "COD"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Flag_of_Europe.svg/22px-Flag_of_Europe.svg.png",
                "name_ru" => "Европейский союз",
                "iso_code2" => "EU",
                "iso_code3" => ""
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Egypt.svg/22px-Flag_of_Egypt.svg.png",
                "name_ru" => "Египет",
                "iso_code2" => "EG",
                "iso_code3" => "EGY"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/06/Flag_of_Zambia.svg/22px-Flag_of_Zambia.svg.png",
                "name_ru" => "Замбия",
                "iso_code2" => "ZM",
                "iso_code3" => "ZMB"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/26/Flag_of_the_Sahrawi_Arab_Democratic_Republic.svg/22px-Flag_of_the_Sahrawi_Arab_Democratic_Republic.svg.png",
                "name_ru" => "САДР",
                "iso_code2" => "EH",
                "iso_code3" => "ESH"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Flag_of_Zimbabwe.svg/22px-Flag_of_Zimbabwe.svg.png",
                "name_ru" => "Зимбабве",
                "iso_code2" => "ZW",
                "iso_code3" => "ZWE"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Flag_of_Israel.svg/22px-Flag_of_Israel.svg.png",
                "name_ru" => "Израиль",
                "iso_code2" => "IL",
                "iso_code3" => "ISR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/41/Flag_of_India.svg/22px-Flag_of_India.svg.png",
                "name_ru" => "Индия",
                "iso_code2" => "IN",
                "iso_code3" => "IND"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_Indonesia.svg/22px-Flag_of_Indonesia.svg.png",
                "name_ru" => "Индонезия",
                "iso_code2" => "ID",
                "iso_code3" => "IDN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Flag_of_Jordan.svg/22px-Flag_of_Jordan.svg.png",
                "name_ru" => "Иордания",
                "iso_code2" => "JO",
                "iso_code3" => "JOR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Flag_of_Iraq.svg/22px-Flag_of_Iraq.svg.png",
                "name_ru" => "Ирак",
                "iso_code2" => "IQ",
                "iso_code3" => "IRQ"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Flag_of_Iran.svg/22px-Flag_of_Iran.svg.png",
                "name_ru" => "Иран",
                "iso_code2" => "IR",
                "iso_code3" => "IRN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/45/Flag_of_Ireland.svg/22px-Flag_of_Ireland.svg.png",
                "name_ru" => "Ирландия",
                "iso_code2" => "IE",
                "iso_code3" => "IRL"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Flag_of_Iceland.svg/22px-Flag_of_Iceland.svg.png",
                "name_ru" => "Исландия",
                "iso_code2" => "IS",
                "iso_code3" => "ISL"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Spain.svg/22px-Flag_of_Spain.svg.png",
                "name_ru" => "Испания",
                "iso_code2" => "ES",
                "iso_code3" => "ESP"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/03/Flag_of_Italy.svg/22px-Flag_of_Italy.svg.png",
                "name_ru" => "Италия",
                "iso_code2" => "IT",
                "iso_code3" => "ITA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/89/Flag_of_Yemen.svg/22px-Flag_of_Yemen.svg.png",
                "name_ru" => "Йемен",
                "iso_code2" => "YE",
                "iso_code3" => "YEM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/38/Flag_of_Cape_Verde.svg/22px-Flag_of_Cape_Verde.svg.png",
                "name_ru" => "Кабо-Верде",
                "iso_code2" => "CV",
                "iso_code3" => "CPV"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Flag_of_Kazakhstan.svg/22px-Flag_of_Kazakhstan.svg.png",
                "name_ru" => "Казахстан",
                "iso_code2" => "KZ",
                "iso_code3" => "KAZ"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Flag_of_the_Cayman_Islands.svg/22px-Flag_of_the_Cayman_Islands.svg.png",
                "name_ru" => "Острова Кайман",
                "iso_code2" => "KY",
                "iso_code3" => "CYM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_Cambodia.svg/22px-Flag_of_Cambodia.svg.png",
                "name_ru" => "Камбоджа",
                "iso_code2" => "KH",
                "iso_code3" => "KHM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Flag_of_Cameroon.svg/22px-Flag_of_Cameroon.svg.png",
                "name_ru" => "Камерун",
                "iso_code2" => "CM",
                "iso_code3" => "CMR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Flag_of_Canada.svg/22px-Flag_of_Canada.svg.png",
                "name_ru" => "Канада",
                "iso_code2" => "CA",
                "iso_code3" => "CAN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/65/Flag_of_Qatar.svg/22px-Flag_of_Qatar.svg.png",
                "name_ru" => "Катар",
                "iso_code2" => "QA",
                "iso_code3" => "QAT"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/49/Flag_of_Kenya.svg/22px-Flag_of_Kenya.svg.png",
                "name_ru" => "Кения",
                "iso_code2" => "KE",
                "iso_code3" => "KEN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Flag_of_Cyprus.svg/22px-Flag_of_Cyprus.svg.png",
                "name_ru" => "Кипр",
                "iso_code2" => "CY",
                "iso_code3" => "CYP"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/c7/Flag_of_Kyrgyzstan.svg/22px-Flag_of_Kyrgyzstan.svg.png",
                "name_ru" => "Киргизия",
                "iso_code2" => "KG",
                "iso_code3" => "KGZ"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Flag_of_Kiribati.svg/22px-Flag_of_Kiribati.svg.png",
                "name_ru" => "Кирибати",
                "iso_code2" => "KI",
                "iso_code3" => "KIR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/72/Flag_of_the_Republic_of_China.svg/22px-Flag_of_the_Republic_of_China.svg.png",
                "name_ru" => "Китайская Республика",
                "iso_code2" => "TW",
                "iso_code3" => "TWN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/51/Flag_of_North_Korea.svg/22px-Flag_of_North_Korea.svg.png",
                "name_ru" => "КНДР",
                "iso_code2" => "KP",
                "iso_code3" => "PRK"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Flag_of_the_People%27s_Republic_of_China.svg/22px-Flag_of_the_People%27s_Republic_of_China.svg.png",
                "name_ru" => "КНР",
                "iso_code2" => "CN",
                "iso_code3" => "CHN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/74/Flag_of_the_Cocos_%28Keeling%29_Islands.svg/22px-Flag_of_the_Cocos_%28Keeling%29_Islands.svg.png",
                "name_ru" => "Кокосовые острова",
                "iso_code2" => "CC",
                "iso_code3" => "CCK"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Colombia.svg/22px-Flag_of_Colombia.svg.png",
                "name_ru" => "Колумбия",
                "iso_code2" => "CO",
                "iso_code3" => "COL"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/94/Flag_of_the_Comoros.svg/22px-Flag_of_the_Comoros.svg.png",
                "name_ru" => "Коморы",
                "iso_code2" => "KM",
                "iso_code3" => "COM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Flag_of_Costa_Rica_%28state%29.svg/22px-Flag_of_Costa_Rica_%28state%29.svg.png",
                "name_ru" => "Коста-Рика",
                "iso_code2" => "CR",
                "iso_code3" => "CRI"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_C%C3%B4te_d%27Ivoire.svg/22px-Flag_of_C%C3%B4te_d%27Ivoire.svg.png",
                "name_ru" => "Кот-д’Ивуар",
                "iso_code2" => "CI",
                "iso_code3" => "CIV"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Flag_of_Cuba.svg/22px-Flag_of_Cuba.svg.png",
                "name_ru" => "Куба",
                "iso_code2" => "CU",
                "iso_code3" => "CUB"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Flag_of_Kuwait.svg/22px-Flag_of_Kuwait.svg.png",
                "name_ru" => "Кувейт",
                "iso_code2" => "KW",
                "iso_code3" => "KWT"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Flag_of_Cura%C3%A7ao.svg/22px-Flag_of_Cura%C3%A7ao.svg.png",
                "name_ru" => "Кюрасао",
                "iso_code2" => "CW",
                "iso_code3" => "CUW"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/56/Flag_of_Laos.svg/22px-Flag_of_Laos.svg.png",
                "name_ru" => "Лаос",
                "iso_code2" => "LA",
                "iso_code3" => "LAO"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/84/Flag_of_Latvia.svg/22px-Flag_of_Latvia.svg.png",
                "name_ru" => "Латвия",
                "iso_code2" => "LV",
                "iso_code3" => "LVA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Flag_of_Lesotho.svg/22px-Flag_of_Lesotho.svg.png",
                "name_ru" => "Лесото",
                "iso_code2" => "LS",
                "iso_code3" => "LSO"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Flag_of_Liberia.svg/22px-Flag_of_Liberia.svg.png",
                "name_ru" => "Либерия",
                "iso_code2" => "LR",
                "iso_code3" => "LBR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/59/Flag_of_Lebanon.svg/22px-Flag_of_Lebanon.svg.png",
                "name_ru" => "Ливан",
                "iso_code2" => "LB",
                "iso_code3" => "LBN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/05/Flag_of_Libya.svg/22px-Flag_of_Libya.svg.png",
                "name_ru" => "Ливия",
                "iso_code2" => "LY",
                "iso_code3" => "LBY"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/11/Flag_of_Lithuania.svg/22px-Flag_of_Lithuania.svg.png",
                "name_ru" => "Литва",
                "iso_code2" => "LT",
                "iso_code3" => "LTU"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/47/Flag_of_Liechtenstein.svg/22px-Flag_of_Liechtenstein.svg.png",
                "name_ru" => "Лихтенштейн",
                "iso_code2" => "LI",
                "iso_code3" => "LIE"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/da/Flag_of_Luxembourg.svg/22px-Flag_of_Luxembourg.svg.png",
                "name_ru" => "Люксембург",
                "iso_code2" => "LU",
                "iso_code3" => "LUX"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/77/Flag_of_Mauritius.svg/22px-Flag_of_Mauritius.svg.png",
                "name_ru" => "Маврикий",
                "iso_code2" => "MU",
                "iso_code3" => "MUS"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/43/Flag_of_Mauritania.svg/22px-Flag_of_Mauritania.svg.png",
                "name_ru" => "Мавритания",
                "iso_code2" => "MR",
                "iso_code3" => "MRT"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Flag_of_Madagascar.svg/22px-Flag_of_Madagascar.svg.png",
                "name_ru" => "Мадагаскар",
                "iso_code2" => "MG",
                "iso_code3" => "MDG"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Flag_of_Mayotte_%28local%29.svg/22px-Flag_of_Mayotte_%28local%29.svg.png",
                "name_ru" => "Майотта",
                "iso_code2" => "YT",
                "iso_code3" => "MYT"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/63/Flag_of_Macau.svg/22px-Flag_of_Macau.svg.png",
                "name_ru" => "Макао",
                "iso_code2" => "MO",
                "iso_code3" => "MAC"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Flag_of_Macedonia.svg/22px-Flag_of_Macedonia.svg.png",
                "name_ru" => "Македония",
                "iso_code2" => "MK",
                "iso_code3" => "MKD"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Flag_of_Malawi.svg/22px-Flag_of_Malawi.svg.png",
                "name_ru" => "Малави",
                "iso_code2" => "MW",
                "iso_code3" => "MWI"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/66/Flag_of_Malaysia.svg/22px-Flag_of_Malaysia.svg.png",
                "name_ru" => "Малайзия",
                "iso_code2" => "MY",
                "iso_code3" => "MYS"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/92/Flag_of_Mali.svg/22px-Flag_of_Mali.svg.png",
                "name_ru" => "Мали",
                "iso_code2" => "ML",
                "iso_code3" => "MLI"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Flag_of_Maldives.svg/22px-Flag_of_Maldives.svg.png",
                "name_ru" => "Мальдивы",
                "iso_code2" => "MV",
                "iso_code3" => "MDV"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flag_of_Malta.svg/22px-Flag_of_Malta.svg.png",
                "name_ru" => "Мальта",
                "iso_code2" => "MT",
                "iso_code3" => "MLT"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Flag_of_Morocco.svg/22px-Flag_of_Morocco.svg.png",
                "name_ru" => "Марокко",
                "iso_code2" => "MA",
                "iso_code3" => "MAR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/52/Flag_of_Martinique.svg/22px-Flag_of_Martinique.svg.png",
                "name_ru" => "Мартиника",
                "iso_code2" => "MQ",
                "iso_code3" => "MTQ"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Flag_of_the_Marshall_Islands.svg/22px-Flag_of_the_Marshall_Islands.svg.png",
                "name_ru" => "Маршалловы Острова",
                "iso_code2" => "MH",
                "iso_code3" => "MHL"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Flag_of_Mexico.svg/22px-Flag_of_Mexico.svg.png",
                "name_ru" => "Мексика",
                "iso_code2" => "MX",
                "iso_code3" => "MEX"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Flag_of_the_Federated_States_of_Micronesia.svg/22px-Flag_of_the_Federated_States_of_Micronesia.svg.png",
                "name_ru" => "Микронезия",
                "iso_code2" => "FM",
                "iso_code3" => "FSM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Flag_of_Mozambique.svg/22px-Flag_of_Mozambique.svg.png",
                "name_ru" => "Мозамбик",
                "iso_code2" => "MZ",
                "iso_code3" => "MOZ"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/27/Flag_of_Moldova.svg/22px-Flag_of_Moldova.svg.png",
                "name_ru" => "Молдавия",
                "iso_code2" => "MD",
                "iso_code3" => "MDA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Flag_of_Monaco.svg/22px-Flag_of_Monaco.svg.png",
                "name_ru" => "Монако",
                "iso_code2" => "MC",
                "iso_code3" => "MCO"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Flag_of_Mongolia.svg/22px-Flag_of_Mongolia.svg.png",
                "name_ru" => "Монголия",
                "iso_code2" => "MN",
                "iso_code3" => "MNG"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Flag_of_Montserrat.svg/22px-Flag_of_Montserrat.svg.png",
                "name_ru" => "Монтсеррат",
                "iso_code2" => "MS",
                "iso_code3" => "MSR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Flag_of_Myanmar.svg/22px-Flag_of_Myanmar.svg.png",
                "name_ru" => "Мьянма",
                "iso_code2" => "MM",
                "iso_code3" => "MMR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/00/Flag_of_Namibia.svg/22px-Flag_of_Namibia.svg.png",
                "name_ru" => "Намибия",
                "iso_code2" => "NA",
                "iso_code3" => "NAM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/30/Flag_of_Nauru.svg/22px-Flag_of_Nauru.svg.png",
                "name_ru" => "Науру",
                "iso_code2" => "NR",
                "iso_code3" => "NRU"
            ],
            [
                "flag_url" => "",
                "name_ru" => "Непал",
                "iso_code2" => "NP",
                "iso_code3" => "NPL"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Flag_of_Niger.svg/22px-Flag_of_Niger.svg.png",
                "name_ru" => "Нигер",
                "iso_code2" => "NE",
                "iso_code3" => "NER"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/79/Flag_of_Nigeria.svg/22px-Flag_of_Nigeria.svg.png",
                "name_ru" => "Нигерия",
                "iso_code2" => "NG",
                "iso_code3" => "NGA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/20/Flag_of_the_Netherlands.svg/22px-Flag_of_the_Netherlands.svg.png",
                "name_ru" => "Нидерланды",
                "iso_code2" => "NL",
                "iso_code3" => "NLD"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/19/Flag_of_Nicaragua.svg/22px-Flag_of_Nicaragua.svg.png",
                "name_ru" => "Никарагуа",
                "iso_code2" => "NI",
                "iso_code3" => "NIC"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/01/Flag_of_Niue.svg/22px-Flag_of_Niue.svg.png",
                "name_ru" => "Ниуэ",
                "iso_code2" => "NU",
                "iso_code3" => "NIU"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Flag_of_New_Zealand.svg/22px-Flag_of_New_Zealand.svg.png",
                "name_ru" => "Новая Зеландия",
                "iso_code2" => "NZ",
                "iso_code3" => "NZL"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/23/Flag_of_New_Caledonia.svg/22px-Flag_of_New_Caledonia.svg.png",
                "name_ru" => "Новая Каледония",
                "iso_code2" => "NC",
                "iso_code3" => "NCL"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Norway.svg/22px-Flag_of_Norway.svg.png",
                "name_ru" => "Норвегия",
                "iso_code2" => "NO",
                "iso_code3" => "NOR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Flag_of_the_United_Arab_Emirates.svg/22px-Flag_of_the_United_Arab_Emirates.svg.png",
                "name_ru" => "ОАЭ",
                "iso_code2" => "AE",
                "iso_code3" => "ARE"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Flag_of_Oman.svg/22px-Flag_of_Oman.svg.png",
                "name_ru" => "Оман",
                "iso_code2" => "OM",
                "iso_code3" => "OMN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Norway.svg/22px-Flag_of_Norway.svg.png",
                "name_ru" => "Остров Буве",
                "iso_code2" => "BV",
                "iso_code3" => "BVT"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Flag_of_the_Isle_of_Mann.svg/22px-Flag_of_the_Isle_of_Mann.svg.png",
                "name_ru" => "Остров Мэн",
                "iso_code2" => "IM",
                "iso_code3" => "IMN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Flag_of_the_Cook_Islands.svg/22px-Flag_of_the_Cook_Islands.svg.png",
                "name_ru" => "Острова Кука",
                "iso_code2" => "CK",
                "iso_code3" => "COK"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/48/Flag_of_Norfolk_Island.svg/22px-Flag_of_Norfolk_Island.svg.png",
                "name_ru" => "Остров Норфолк",
                "iso_code2" => "NF",
                "iso_code3" => "NFK"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/67/Flag_of_Christmas_Island.svg/22px-Flag_of_Christmas_Island.svg.png",
                "name_ru" => "Остров Рождества",
                "iso_code2" => "CX",
                "iso_code3" => "CXR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/88/Flag_of_the_Pitcairn_Islands.svg/22px-Flag_of_the_Pitcairn_Islands.svg.png",
                "name_ru" => "Острова Питкэрн",
                "iso_code2" => "PN",
                "iso_code3" => "PCN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/00/Flag_of_Saint_Helena.svg/22px-Flag_of_Saint_Helena.svg.png",
                "name_ru" => "Острова Святой Елены, Вознесения и Тристан-да-Кунья",
                "iso_code2" => "SH",
                "iso_code3" => "SHN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/32/Flag_of_Pakistan.svg/22px-Flag_of_Pakistan.svg.png",
                "name_ru" => "Пакистан",
                "iso_code2" => "PK",
                "iso_code3" => "PAK"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/48/Flag_of_Palau.svg/22px-Flag_of_Palau.svg.png",
                "name_ru" => "Палау",
                "iso_code2" => "PW",
                "iso_code3" => "PLW"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/00/Flag_of_Palestine.svg/22px-Flag_of_Palestine.svg.png",
                "name_ru" => "Государство Палестина",
                "iso_code2" => "PS",
                "iso_code3" => "PSE"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/ab/Flag_of_Panama.svg/22px-Flag_of_Panama.svg.png",
                "name_ru" => "Панама",
                "iso_code2" => "PA",
                "iso_code3" => "PAN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Flag_of_Papua_New_Guinea.svg/22px-Flag_of_Papua_New_Guinea.svg.png",
                "name_ru" => "Папуа — Новая Гвинея",
                "iso_code2" => "PG",
                "iso_code3" => "PNG"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/27/Flag_of_Paraguay.svg/22px-Flag_of_Paraguay.svg.png",
                "name_ru" => "Парагвай",
                "iso_code2" => "PY",
                "iso_code3" => "PRY"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/df/Flag_of_Peru_%28state%29.svg/22px-Flag_of_Peru_%28state%29.svg.png",
                "name_ru" => "Перу",
                "iso_code2" => "PE",
                "iso_code3" => "PER"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/12/Flag_of_Poland.svg/22px-Flag_of_Poland.svg.png",
                "name_ru" => "Польша",
                "iso_code2" => "PL",
                "iso_code3" => "POL"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Portugal.svg/22px-Flag_of_Portugal.svg.png",
                "name_ru" => "Португалия",
                "iso_code2" => "PT",
                "iso_code3" => "PRT"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/28/Flag_of_Puerto_Rico.svg/22px-Flag_of_Puerto_Rico.svg.png",
                "name_ru" => "Пуэрто-Рико",
                "iso_code2" => "PR",
                "iso_code3" => "PRI"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/92/Flag_of_the_Republic_of_the_Congo.svg/22px-Flag_of_the_Republic_of_the_Congo.svg.png",
                "name_ru" => "Республика Конго",
                "iso_code2" => "CG",
                "iso_code3" => "COG"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/09/Flag_of_South_Korea.svg/22px-Flag_of_South_Korea.svg.png",
                "name_ru" => "Республика Корея",
                "iso_code2" => "KR",
                "iso_code3" => "KOR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/ru/thumb/8/84/Regional_Flag_of_Reunion.gif/22px-Regional_Flag_of_Reunion.gif",
                "name_ru" => "Реюньон",
                "iso_code2" => "RE",
                "iso_code3" => "REU"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Russia.svg/22px-Flag_of_Russia.svg.png",
                "name_ru" => "Россия",
                "iso_code2" => "RU",
                "iso_code3" => "RUS"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/17/Flag_of_Rwanda.svg/22px-Flag_of_Rwanda.svg.png",
                "name_ru" => "Руанда",
                "iso_code2" => "RW",
                "iso_code3" => "RWA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flag_of_Romania.svg/22px-Flag_of_Romania.svg.png",
                "name_ru" => "Румыния",
                "iso_code2" => "RO",
                "iso_code3" => "ROU"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/34/Flag_of_El_Salvador.svg/22px-Flag_of_El_Salvador.svg.png",
                "name_ru" => "Сальвадор",
                "iso_code2" => "SV",
                "iso_code3" => "SLV"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/31/Flag_of_Samoa.svg/22px-Flag_of_Samoa.svg.png",
                "name_ru" => "Самоа",
                "iso_code2" => "WS",
                "iso_code3" => "WSM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Flag_of_San_Marino.svg/22px-Flag_of_San_Marino.svg.png",
                "name_ru" => "Сан-Марино",
                "iso_code2" => "SM",
                "iso_code3" => "SMR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Flag_of_Sao_Tome_and_Principe.svg/22px-Flag_of_Sao_Tome_and_Principe.svg.png",
                "name_ru" => "Сан-Томе и Принсипи",
                "iso_code2" => "ST",
                "iso_code3" => "STP"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Flag_of_Saudi_Arabia.svg/22px-Flag_of_Saudi_Arabia.svg.png",
                "name_ru" => "Саудовская Аравия",
                "iso_code2" => "SA",
                "iso_code3" => "SAU"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Flag_of_Swaziland.svg/22px-Flag_of_Swaziland.svg.png",
                "name_ru" => "Свазиленд",
                "iso_code2" => "SZ",
                "iso_code3" => "SWZ"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Flag_of_the_Northern_Mariana_Islands.svg/22px-Flag_of_the_Northern_Mariana_Islands.svg.png",
                "name_ru" => "Северные Марианские острова",
                "iso_code2" => "MP",
                "iso_code3" => "MNP"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Flag_of_Seychelles.svg/22px-Flag_of_Seychelles.svg.png",
                "name_ru" => "Сейшельские Острова",
                "iso_code2" => "SC",
                "iso_code3" => "SYC"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/df/Flag_of_Saint_Barthelemy_%28local%29.svg/22px-Flag_of_Saint_Barthelemy_%28local%29.svg.png",
                "name_ru" => "Сен-Бартелеми",
                "iso_code2" => "BL",
                "iso_code3" => "BLM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Flag_of_Saint-Martin_%28fictional%29.svg/22px-Flag_of_Saint-Martin_%28fictional%29.svg.png",
                "name_ru" => "Сен-Мартен",
                "iso_code2" => "MF",
                "iso_code3" => "MAF"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/74/Flag_of_Saint-Pierre_and_Miquelon.svg/22px-Flag_of_Saint-Pierre_and_Miquelon.svg.png",
                "name_ru" => "Сен-Пьер и Микелон",
                "iso_code2" => "PM",
                "iso_code3" => "SPM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Flag_of_Senegal.svg/22px-Flag_of_Senegal.svg.png",
                "name_ru" => "Сенегал",
                "iso_code2" => "SN",
                "iso_code3" => "SEN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Flag_of_Saint_Vincent_and_the_Grenadines.svg/22px-Flag_of_Saint_Vincent_and_the_Grenadines.svg.png",
                "name_ru" => "Сент-Винсент и Гренадины",
                "iso_code2" => "VC",
                "iso_code3" => "VCT"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Saint_Kitts_and_Nevis.svg/22px-Flag_of_Saint_Kitts_and_Nevis.svg.png",
                "name_ru" => "Сент-Китс и Невис",
                "iso_code2" => "KN",
                "iso_code3" => "KNA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_Saint_Lucia.svg/22px-Flag_of_Saint_Lucia.svg.png",
                "name_ru" => "Сент-Люсия",
                "iso_code2" => "LC",
                "iso_code3" => "LCA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Flag_of_Serbia.svg/22px-Flag_of_Serbia.svg.png",
                "name_ru" => "Сербия",
                "iso_code2" => "RS",
                "iso_code3" => "SRB"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/48/Flag_of_Singapore.svg/22px-Flag_of_Singapore.svg.png",
                "name_ru" => "Сингапур",
                "iso_code2" => "SG",
                "iso_code3" => "SGP"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Flag_of_Sint_Maarten.svg/22px-Flag_of_Sint_Maarten.svg.png",
                "name_ru" => "Синт-Мартен",
                "iso_code2" => "SX",
                "iso_code3" => "SXM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/53/Flag_of_Syria.svg/22px-Flag_of_Syria.svg.png",
                "name_ru" => "Сирия",
                "iso_code2" => "SY",
                "iso_code3" => "SYR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Flag_of_Slovakia.svg/22px-Flag_of_Slovakia.svg.png",
                "name_ru" => "Словакия",
                "iso_code2" => "SK",
                "iso_code3" => "SVK"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Flag_of_Slovenia.svg/22px-Flag_of_Slovenia.svg.png",
                "name_ru" => "Словения",
                "iso_code2" => "SI",
                "iso_code3" => "SVN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/74/Flag_of_the_Solomon_Islands.svg/22px-Flag_of_the_Solomon_Islands.svg.png",
                "name_ru" => "Соломоновы Острова",
                "iso_code2" => "SB",
                "iso_code3" => "SLB"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Flag_of_Somalia.svg/22px-Flag_of_Somalia.svg.png",
                "name_ru" => "Сомали",
                "iso_code2" => "SO",
                "iso_code3" => "SOM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/01/Flag_of_Sudan.svg/22px-Flag_of_Sudan.svg.png",
                "name_ru" => "Судан",
                "iso_code2" => "SD",
                "iso_code3" => "SDN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Flag_of_the_Soviet_Union.svg/22px-Flag_of_the_Soviet_Union.svg.png",
                "name_ru" => "СССРсентября1992 года",
                "iso_code2" => "SU",
                "iso_code3" => "SUN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/60/Flag_of_Suriname.svg/22px-Flag_of_Suriname.svg.png",
                "name_ru" => "Суринам",
                "iso_code2" => "SR",
                "iso_code3" => "SUR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/22px-Flag_of_the_United_States.svg.png",
                "name_ru" => "США",
                "iso_code2" => "US",
                "iso_code3" => "USA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/17/Flag_of_Sierra_Leone.svg/22px-Flag_of_Sierra_Leone.svg.png",
                "name_ru" => "Сьерра-Леоне",
                "iso_code2" => "SL",
                "iso_code3" => "SLE"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Flag_of_Tajikistan.svg/22px-Flag_of_Tajikistan.svg.png",
                "name_ru" => "Таджикистан",
                "iso_code2" => "TJ",
                "iso_code3" => "TJK"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Flag_of_Thailand.svg/22px-Flag_of_Thailand.svg.png",
                "name_ru" => "Таиланд",
                "iso_code2" => "TH",
                "iso_code3" => "THA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/38/Flag_of_Tanzania.svg/22px-Flag_of_Tanzania.svg.png",
                "name_ru" => "Танзания",
                "iso_code2" => "TZ",
                "iso_code3" => "TZA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Flag_of_the_Turks_and_Caicos_Islands.svg/22px-Flag_of_the_Turks_and_Caicos_Islands.svg.png",
                "name_ru" => "Тёркс и Кайкос",
                "iso_code2" => "TC",
                "iso_code3" => "TCA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/68/Flag_of_Togo.svg/22px-Flag_of_Togo.svg.png",
                "name_ru" => "Того",
                "iso_code2" => "TG",
                "iso_code3" => "TGO"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Flag_of_Tokelau.svg/22px-Flag_of_Tokelau.svg.png",
                "name_ru" => "Токелау",
                "iso_code2" => "TK",
                "iso_code3" => "TKL"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Tonga.svg/22px-Flag_of_Tonga.svg.png",
                "name_ru" => "Тонга",
                "iso_code2" => "TO",
                "iso_code3" => "TON"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/64/Flag_of_Trinidad_and_Tobago.svg/22px-Flag_of_Trinidad_and_Tobago.svg.png",
                "name_ru" => "Тринидад и Тобаго",
                "iso_code2" => "TT",
                "iso_code3" => "TTO"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/38/Flag_of_Tuvalu.svg/22px-Flag_of_Tuvalu.svg.png",
                "name_ru" => "Тувалу",
                "iso_code2" => "TV",
                "iso_code3" => "TUV"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Flag_of_Tunisia.svg/22px-Flag_of_Tunisia.svg.png",
                "name_ru" => "Тунис",
                "iso_code2" => "TN",
                "iso_code3" => "TUN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_Turkmenistan.svg/22px-Flag_of_Turkmenistan.svg.png",
                "name_ru" => "Туркмения",
                "iso_code2" => "TM",
                "iso_code3" => "TKM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Flag_of_Turkey.svg/22px-Flag_of_Turkey.svg.png",
                "name_ru" => "Турция",
                "iso_code2" => "TR",
                "iso_code3" => "TUR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Flag_of_Uganda.svg/22px-Flag_of_Uganda.svg.png",
                "name_ru" => "Уганда",
                "iso_code2" => "UG",
                "iso_code3" => "UGA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/84/Flag_of_Uzbekistan.svg/22px-Flag_of_Uzbekistan.svg.png",
                "name_ru" => "Узбекистан",
                "iso_code2" => "UZ",
                "iso_code3" => "UZB"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/49/Flag_of_Ukraine.svg/22px-Flag_of_Ukraine.svg.png",
                "name_ru" => "Украина",
                "iso_code2" => "UA",
                "iso_code3" => "UKR"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Flag_of_France.svg/22px-Flag_of_France.svg.png",
                "name_ru" => "Уоллис и Футуна",
                "iso_code2" => "WF",
                "iso_code3" => "WLF"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Uruguay.svg/22px-Flag_of_Uruguay.svg.png",
                "name_ru" => "Уругвай",
                "iso_code2" => "UY",
                "iso_code3" => "URY"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Flag_of_the_Faroe_Islands.svg/22px-Flag_of_the_Faroe_Islands.svg.png",
                "name_ru" => "Фареры",
                "iso_code2" => "FO",
                "iso_code3" => "FRO"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Flag_of_Fiji.svg/22px-Flag_of_Fiji.svg.png",
                "name_ru" => "Фиджи",
                "iso_code2" => "FJ",
                "iso_code3" => "FJI"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/99/Flag_of_the_Philippines.svg/22px-Flag_of_the_Philippines.svg.png",
                "name_ru" => "Филиппины",
                "iso_code2" => "PH",
                "iso_code3" => "PHL"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Flag_of_Finland.svg/22px-Flag_of_Finland.svg.png",
                "name_ru" => "Финляндия",
                "iso_code2" => "FI",
                "iso_code3" => "FIN"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_Falkland_Islands.svg/22px-Flag_of_the_Falkland_Islands.svg.png",
                "name_ru" => "Фолклендские острова",
                "iso_code2" => "FK",
                "iso_code3" => "FLK"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Flag_of_France.svg/22px-Flag_of_France.svg.png",
                "name_ru" => "Франция",
                "iso_code2" => "FR",
                "iso_code3" => "FRA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/db/Flag_of_French_Polynesia.svg/22px-Flag_of_French_Polynesia.svg.png",
                "name_ru" => "Французская Полинезия",
                "iso_code2" => "PF",
                "iso_code3" => "PYF"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/a7/Flag_of_the_French_Southern_and_Antarctic_Lands.svg/22px-Flag_of_the_French_Southern_and_Antarctic_Lands.svg.png",
                "name_ru" => "Французские Южные и Антарктические Территории",
                "iso_code2" => "TF",
                "iso_code3" => "ATF"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b9/Flag_of_Australia.svg/22px-Flag_of_Australia.svg.png",
                "name_ru" => "Херд и Макдональд",
                "iso_code2" => "HM",
                "iso_code3" => "HMD"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_Croatia.svg/22px-Flag_of_Croatia.svg.png",
                "name_ru" => "Хорватия",
                "iso_code2" => "HR",
                "iso_code3" => "HRV"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Flag_of_the_Central_African_Republic.svg/22px-Flag_of_the_Central_African_Republic.svg.png",
                "name_ru" => "ЦАР",
                "iso_code2" => "CF",
                "iso_code3" => "CAF"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4b/Flag_of_Chad.svg/22px-Flag_of_Chad.svg.png",
                "name_ru" => "Чад",
                "iso_code2" => "TD",
                "iso_code3" => "TCD"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/64/Flag_of_Montenegro.svg/22px-Flag_of_Montenegro.svg.png",
                "name_ru" => "Черногория",
                "iso_code2" => "ME",
                "iso_code3" => "MNE"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Flag_of_the_Czech_Republic.svg/22px-Flag_of_the_Czech_Republic.svg.png",
                "name_ru" => "Чехия",
                "iso_code2" => "CZ",
                "iso_code3" => "CZE"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/78/Flag_of_Chile.svg/22px-Flag_of_Chile.svg.png",
                "name_ru" => "Чили",
                "iso_code2" => "CL",
                "iso_code3" => "CHL"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Switzerland.svg/20px-Flag_of_Switzerland.svg.png",
                "name_ru" => "Швейцария",
                "iso_code2" => "CH",
                "iso_code3" => "CHE"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Flag_of_Sweden.svg/22px-Flag_of_Sweden.svg.png",
                "name_ru" => "Швеция",
                "iso_code2" => "SE",
                "iso_code3" => "SWE"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Norway.svg/22px-Flag_of_Norway.svg.png",
                "name_ru" => "Шпицберген и Ян-Майен",
                "iso_code2" => "SJ",
                "iso_code3" => "SJM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/11/Flag_of_Sri_Lanka.svg/22px-Flag_of_Sri_Lanka.svg.png",
                "name_ru" => "Шри-Ланка",
                "iso_code2" => "LK",
                "iso_code3" => "LKA"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Flag_of_Ecuador.svg/22px-Flag_of_Ecuador.svg.png",
                "name_ru" => "Эквадор",
                "iso_code2" => "EC",
                "iso_code3" => "ECU"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/31/Flag_of_Equatorial_Guinea.svg/22px-Flag_of_Equatorial_Guinea.svg.png",
                "name_ru" => "Экваториальная Гвинея",
                "iso_code2" => "GQ",
                "iso_code3" => "GNQ"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/29/Flag_of_Eritrea.svg/22px-Flag_of_Eritrea.svg.png",
                "name_ru" => "Эритрея",
                "iso_code2" => "ER",
                "iso_code3" => "ERI"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Flag_of_Estonia.svg/22px-Flag_of_Estonia.svg.png",
                "name_ru" => "Эстония",
                "iso_code2" => "EE",
                "iso_code3" => "EST"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/71/Flag_of_Ethiopia.svg/22px-Flag_of_Ethiopia.svg.png",
                "name_ru" => "Эфиопия",
                "iso_code2" => "ET",
                "iso_code3" => "ETH"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/af/Flag_of_South_Africa.svg/22px-Flag_of_South_Africa.svg.png",
                "name_ru" => "ЮАР",
                "iso_code2" => "ZA",
                "iso_code3" => "ZAF"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Flag_of_South_Georgia_and_the_South_Sandwich_Islands.svg/22px-Flag_of_South_Georgia_and_the_South_Sandwich_Islands.svg.png",
                "name_ru" => "Южная Георгия и Южные Сандвичевы острова",
                "iso_code2" => "GS",
                "iso_code3" => "SGS"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/7a/Flag_of_South_Sudan.svg/22px-Flag_of_South_Sudan.svg.png",
                "name_ru" => "Южный Судан",
                "iso_code2" => "SS",
                "iso_code3" => "SSD"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Flag_of_Jamaica.svg/22px-Flag_of_Jamaica.svg.png",
                "name_ru" => "Ямайка",
                "iso_code2" => "JM",
                "iso_code3" => "JAM"
            ],
            [
                "flag_url" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Flag_of_Japan.svg/22px-Flag_of_Japan.svg.png",
                "name_ru" => "Япония",
                "iso_code2" => "JP",
                "iso_code3" => "JPN"
            ]
        ];


        $country_result = [];

        try {
            foreach ($en_countries as $key => $en_country) {

                foreach ($ru_countries as $ru_country) {
                    if ($key == $ru_country['iso_code2']) {

                        array_push($country_result, [
                            'image' => $ru_country["flag_url"],
                            'name_ru' => $ru_country['name_ru'],
                            'name_en' => $en_country,
                            'iso_two' => $ru_country['iso_code2'],
                            'iso_three' => $ru_country['iso_code3'],
                        ]);
                    }
                }
            }
        }catch (\Exception $e){
            echo $e;
        }

        $country_result = json_encode($country_result);

    }
}
