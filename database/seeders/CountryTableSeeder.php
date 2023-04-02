<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    public function run()
    {
        $data[] = [
            "image" => "https://upload.wikimedia.org/wikipedia/commons/5/5c/Flag_of_the_Taliban.svg?uselang=ru",
            "name_ru" => "Афганистан",
            "name_en" => "Afghanistan",
            "iso_two" => "AF",
            "iso_three" => "AFG"
        ];
        $data[] = [
            "image" => "https://upload.wikimedia.org/wikipedia/commons/b/be/Flag_of_England.svg",
            "name_ru" => "Англия",
            "name_en" => "England",
            "iso_two" => "",
            "iso_three" => ""
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/52/Flag_of_%C3%85land.svg/22px-Flag_of_%C3%85land.svg.png",
            "name_ru" => "Аландские острова",
            "name_en" => "Åland Islands",
            "iso_two" => "AX",
            "iso_three" => "ALA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/36/Flag_of_Albania.svg/22px-Flag_of_Albania.svg.png",
            "name_ru" => "Албания",
            "name_en" => "Albania",
            "iso_two" => "AL",
            "iso_three" => "ALB"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/77/Flag_of_Algeria.svg/22px-Flag_of_Algeria.svg.png",
            "name_ru" => "Алжир",
            "name_en" => "Algeria",
            "iso_two" => "DZ",
            "iso_three" => "DZA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/87/Flag_of_American_Samoa.svg/22px-Flag_of_American_Samoa.svg.png",
            "name_ru" => "Американское Самоа",
            "name_en" => "American Samoa",
            "iso_two" => "AS",
            "iso_three" => "ASM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/19/Flag_of_Andorra.svg/22px-Flag_of_Andorra.svg.png",
            "name_ru" => "Андорра",
            "name_en" => "Andorra",
            "iso_two" => "AD",
            "iso_three" => "AND"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9d/Flag_of_Angola.svg/22px-Flag_of_Angola.svg.png",
            "name_ru" => "Ангола",
            "name_en" => "Angola",
            "iso_two" => "AO",
            "iso_three" => "AGO"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Flag_of_Anguilla.svg/22px-Flag_of_Anguilla.svg.png",
            "name_ru" => "Ангилья",
            "name_en" => "Anguilla",
            "iso_two" => "AI",
            "iso_three" => "AIA"
        ];
        $data[] = [
            "image" => "https://upload.wikimedia.org/wikipedia/commons/6/68/Flag_of_the_Antarctic_Treaty.svg?uselang=ru",
            "name_ru" => "Антарктида",
            "name_en" => "Antarctica",
            "iso_two" => "AQ",
            "iso_three" => "ATA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/89/Flag_of_Antigua_and_Barbuda.svg/22px-Flag_of_Antigua_and_Barbuda.svg.png",
            "name_ru" => "Антигуа и Барбуда",
            "name_en" => "Antiguabarbuda",
            "iso_two" => "AG",
            "iso_three" => "ATG"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/1a/Flag_of_Argentina.svg/22px-Flag_of_Argentina.svg.png",
            "name_ru" => "Аргентина",
            "name_en" => "Argentina",
            "iso_two" => "AR",
            "iso_three" => "ARG"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/2f/Flag_of_Armenia.svg/22px-Flag_of_Armenia.svg.png",
            "name_ru" => "Армения",
            "name_en" => "Armenia",
            "iso_two" => "AM",
            "iso_three" => "ARM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Flag_of_Aruba.svg/22px-Flag_of_Aruba.svg.png",
            "name_ru" => "Аруба",
            "name_en" => "Aruba",
            "iso_two" => "AW",
            "iso_three" => "ABW"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b9/Flag_of_Australia.svg/22px-Flag_of_Australia.svg.png",
            "name_ru" => "Австралия",
            "name_en" => "Australia",
            "iso_two" => "AU",
            "iso_three" => "AUS"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/41/Flag_of_Austria.svg/22px-Flag_of_Austria.svg.png",
            "name_ru" => "Австрия",
            "name_en" => "Austria",
            "iso_two" => "AT",
            "iso_three" => "AUT"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Flag_of_Azerbaijan.svg/22px-Flag_of_Azerbaijan.svg.png",
            "name_ru" => "Азербайджан",
            "name_en" => "Azerbaijan",
            "iso_two" => "AZ",
            "iso_three" => "AZE"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/93/Flag_of_the_Bahamas.svg/22px-Flag_of_the_Bahamas.svg.png",
            "name_ru" => "Багамы",
            "name_en" => "Bahamas",
            "iso_two" => "BS",
            "iso_three" => "BHS"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Flag_of_Bahrain.svg/22px-Flag_of_Bahrain.svg.png",
            "name_ru" => "Бахрейн",
            "name_en" => "Bahrain",
            "iso_two" => "BH",
            "iso_three" => "BHR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Flag_of_Bangladesh.svg/22px-Flag_of_Bangladesh.svg.png",
            "name_ru" => "Бангладеш",
            "name_en" => "Bangladesh",
            "iso_two" => "BD",
            "iso_three" => "BGD"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/ef/Flag_of_Barbados.svg/22px-Flag_of_Barbados.svg.png",
            "name_ru" => "Барбадос",
            "name_en" => "Barbados",
            "iso_two" => "BB",
            "iso_three" => "BRB"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/85/Flag_of_Belarus.svg/22px-Flag_of_Belarus.svg.png",
            "name_ru" => "Белоруссия",
            "name_en" => "Belarus",
            "iso_two" => "BY",
            "iso_three" => "BLR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/92/Flag_of_Belgium_%28civil%29.svg/22px-Flag_of_Belgium_%28civil%29.svg.png",
            "name_ru" => "Бельгия",
            "name_en" => "Belgium",
            "iso_two" => "BE",
            "iso_three" => "BEL"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Flag_of_Belize.svg/22px-Flag_of_Belize.svg.png",
            "name_ru" => "Белиз",
            "name_en" => "Belize",
            "iso_two" => "BZ",
            "iso_three" => "BLZ"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Flag_of_Benin.svg/22px-Flag_of_Benin.svg.png",
            "name_ru" => "Бенин",
            "name_en" => "Benin",
            "iso_two" => "BJ",
            "iso_three" => "BEN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Flag_of_Bermuda.svg/22px-Flag_of_Bermuda.svg.png",
            "name_ru" => "Бермуды",
            "name_en" => "Bermuda",
            "iso_two" => "BM",
            "iso_three" => "BMU"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/91/Flag_of_Bhutan.svg/22px-Flag_of_Bhutan.svg.png",
            "name_ru" => "Бутан",
            "name_en" => "Bhutan",
            "iso_two" => "BT",
            "iso_three" => "BTN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/de/Flag_of_Bolivia_%28state%29.svg/22px-Flag_of_Bolivia_%28state%29.svg.png",
            "name_ru" => "Боливия",
            "name_en" => "Bolivia",
            "iso_two" => "BO",
            "iso_three" => "BOL"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bf/Flag_of_Bosnia_and_Herzegovina.svg/22px-Flag_of_Bosnia_and_Herzegovina.svg.png",
            "name_ru" => "Босния и Герцеговина",
            "name_en" => "Bosnia",
            "iso_two" => "BA",
            "iso_three" => "BIH"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Flag_of_Botswana.svg/22px-Flag_of_Botswana.svg.png",
            "name_ru" => "Ботсвана",
            "name_en" => "Botswana",
            "iso_two" => "BW",
            "iso_three" => "BWA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Norway.svg/22px-Flag_of_Norway.svg.png",
            "name_ru" => "Остров Буве",
            "name_en" => "Bouvet Island",
            "iso_two" => "BV",
            "iso_three" => "BVT"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/05/Flag_of_Brazil.svg/22px-Flag_of_Brazil.svg.png",
            "name_ru" => "Бразилия",
            "name_en" => "Brazil",
            "iso_two" => "BR",
            "iso_three" => "BRA"
        ];
        $data[] = [
            "image" => "https://upload.wikimedia.org/wikipedia/commons/6/65/Flag_of_the_Commissioner_of_the_British_Indian_Ocean_Territory.svg?uselang=ru",
            "name_ru" => "Британская территория в Индийском океане",
            "name_en" => "British Indian Ocean Territory",
            "iso_two" => "IO",
            "iso_three" => "IOT"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/42/Flag_of_the_British_Virgin_Islands.svg/22px-Flag_of_the_British_Virgin_Islands.svg.png",
            "name_ru" => "Британские Виргинские острова",
            "name_en" => "British Virgin Islands",
            "iso_two" => "VG",
            "iso_three" => "VGB"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Flag_of_Brunei.svg/22px-Flag_of_Brunei.svg.png",
            "name_ru" => "Бруней",
            "name_en" => "Brunei",
            "iso_two" => "BN",
            "iso_three" => "BRN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Bulgaria.svg/22px-Flag_of_Bulgaria.svg.png",
            "name_ru" => "Болгария",
            "name_en" => "Bulgaria",
            "iso_two" => "BG",
            "iso_three" => "BGR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/31/Flag_of_Burkina_Faso.svg/22px-Flag_of_Burkina_Faso.svg.png",
            "name_ru" => "Буркина-Фасо",
            "name_en" => "Burkinafaso",
            "iso_two" => "BF",
            "iso_three" => "BFA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/50/Flag_of_Burundi.svg/22px-Flag_of_Burundi.svg.png",
            "name_ru" => "Бурунди",
            "name_en" => "Burundi",
            "iso_two" => "BI",
            "iso_three" => "BDI"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_Cambodia.svg/22px-Flag_of_Cambodia.svg.png",
            "name_ru" => "Камбоджа",
            "name_en" => "Cambodia",
            "iso_two" => "KH",
            "iso_three" => "KHM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Flag_of_Cameroon.svg/22px-Flag_of_Cameroon.svg.png",
            "name_ru" => "Камерун",
            "name_en" => "Cameroon",
            "iso_two" => "CM",
            "iso_three" => "CMR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/cf/Flag_of_Canada.svg/22px-Flag_of_Canada.svg.png",
            "name_ru" => "Канада",
            "name_en" => "Canada",
            "iso_two" => "CA",
            "iso_three" => "CAN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/38/Flag_of_Cape_Verde.svg/22px-Flag_of_Cape_Verde.svg.png",
            "name_ru" => "Кабо-Верде",
            "name_en" => "Capeverde",
            "iso_two" => "CV",
            "iso_three" => "CPV"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/20/Flag_of_the_Netherlands.svg/22px-Flag_of_the_Netherlands.svg.png",
            "name_ru" => "Бонэйр, Синт-Эстатиус и Саба",
            "name_en" => "Caribbean Netherlands",
            "iso_two" => "BQ",
            "iso_three" => "BES"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Flag_of_the_Cayman_Islands.svg/22px-Flag_of_the_Cayman_Islands.svg.png",
            "name_ru" => "Острова Кайман",
            "name_en" => "Caymanislands",
            "iso_two" => "KY",
            "iso_three" => "CYM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Flag_of_the_Central_African_Republic.svg/22px-Flag_of_the_Central_African_Republic.svg.png",
            "name_ru" => "ЦАР",
            "name_en" => "Caf",
            "iso_two" => "CF",
            "iso_three" => "CAF"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4b/Flag_of_Chad.svg/22px-Flag_of_Chad.svg.png",
            "name_ru" => "Чад",
            "name_en" => "Chad",
            "iso_two" => "TD",
            "iso_three" => "TCD"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/78/Flag_of_Chile.svg/22px-Flag_of_Chile.svg.png",
            "name_ru" => "Чили",
            "name_en" => "Chile",
            "iso_two" => "CL",
            "iso_three" => "CHL"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Flag_of_the_People%27s_Republic_of_China.svg/22px-Flag_of_the_People%27s_Republic_of_China.svg.png",
            "name_ru" => "КНР",
            "name_en" => "China",
            "iso_two" => "CN",
            "iso_three" => "CHN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/67/Flag_of_Christmas_Island.svg/22px-Flag_of_Christmas_Island.svg.png",
            "name_ru" => "Остров Рождества",
            "name_en" => "Christmas Island",
            "iso_two" => "CX",
            "iso_three" => "CXR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/74/Flag_of_the_Cocos_%28Keeling%29_Islands.svg/22px-Flag_of_the_Cocos_%28Keeling%29_Islands.svg.png",
            "name_ru" => "Кокосовые острова",
            "name_en" => "Cocos (Keeling) Islands",
            "iso_two" => "CC",
            "iso_three" => "CCK"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Colombia.svg/22px-Flag_of_Colombia.svg.png",
            "name_ru" => "Колумбия",
            "name_en" => "Colombia",
            "iso_two" => "CO",
            "iso_three" => "COL"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/94/Flag_of_the_Comoros.svg/22px-Flag_of_the_Comoros.svg.png",
            "name_ru" => "Коморы",
            "name_en" => "Comoros",
            "iso_two" => "KM",
            "iso_three" => "COM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/92/Flag_of_the_Republic_of_the_Congo.svg/22px-Flag_of_the_Republic_of_the_Congo.svg.png",
            "name_ru" => "Республика Конго",
            "name_en" => "Congo",
            "iso_two" => "CG",
            "iso_three" => "COG"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Flag_of_the_Democratic_Republic_of_the_Congo.svg/22px-Flag_of_the_Democratic_Republic_of_the_Congo.svg.png",
            "name_ru" => "Демократическая Республика Конго",
            "name_en" => "DCongo",
            "iso_two" => "CD",
            "iso_three" => "COD"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/35/Flag_of_the_Cook_Islands.svg/22px-Flag_of_the_Cook_Islands.svg.png",
            "name_ru" => "Острова Кука",
            "name_en" => "Cook Islands",
            "iso_two" => "CK",
            "iso_three" => "COK"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Flag_of_Costa_Rica_%28state%29.svg/22px-Flag_of_Costa_Rica_%28state%29.svg.png",
            "name_ru" => "Коста-Рика",
            "name_en" => "Costarica",
            "iso_two" => "CR",
            "iso_three" => "CRI"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_C%C3%B4te_d%27Ivoire.svg/22px-Flag_of_C%C3%B4te_d%27Ivoire.svg.png",
            "name_ru" => "Кот-д’Ивуар",
            "name_en" => "Ivory",
            "iso_two" => "CI",
            "iso_three" => "CIV"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_Croatia.svg/22px-Flag_of_Croatia.svg.png",
            "name_ru" => "Хорватия",
            "name_en" => "Croatia",
            "iso_two" => "HR",
            "iso_three" => "HRV"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Flag_of_Cuba.svg/22px-Flag_of_Cuba.svg.png",
            "name_ru" => "Куба",
            "name_en" => "Cuba",
            "iso_two" => "CU",
            "iso_three" => "CUB"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Flag_of_Cura%C3%A7ao.svg/22px-Flag_of_Cura%C3%A7ao.svg.png",
            "name_ru" => "Кюрасао",
            "name_en" => "Curaçao",
            "iso_two" => "CW",
            "iso_three" => "CUW"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Flag_of_Cyprus.svg/22px-Flag_of_Cyprus.svg.png",
            "name_ru" => "Кипр",
            "name_en" => "Cyprus",
            "iso_two" => "CY",
            "iso_three" => "CYP"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Flag_of_the_Czech_Republic.svg/22px-Flag_of_the_Czech_Republic.svg.png",
            "name_ru" => "Чехия",
            "name_en" => "Czech",
            "iso_two" => "CZ",
            "iso_three" => "CZE"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9c/Flag_of_Denmark.svg/22px-Flag_of_Denmark.svg.png",
            "name_ru" => "Дания",
            "name_en" => "Denmark",
            "iso_two" => "DK",
            "iso_three" => "DNK"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/34/Flag_of_Djibouti.svg/22px-Flag_of_Djibouti.svg.png",
            "name_ru" => "Джибути",
            "name_en" => "Djibouti",
            "iso_two" => "DJ",
            "iso_three" => "DJI"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Flag_of_Dominica.svg/22px-Flag_of_Dominica.svg.png",
            "name_ru" => "Доминика",
            "name_en" => "Dominica",
            "iso_two" => "DM",
            "iso_three" => "DMA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_the_Dominican_Republic.svg/22px-Flag_of_the_Dominican_Republic.svg.png",
            "name_ru" => "Доминиканская Республика",
            "name_en" => "Dominican",
            "iso_two" => "DO",
            "iso_three" => "DOM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Flag_of_Ecuador.svg/22px-Flag_of_Ecuador.svg.png",
            "name_ru" => "Эквадор",
            "name_en" => "Ecuador",
            "iso_two" => "EC",
            "iso_three" => "ECU"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Egypt.svg/22px-Flag_of_Egypt.svg.png",
            "name_ru" => "Египет",
            "name_en" => "Egypt",
            "iso_two" => "EG",
            "iso_three" => "EGY"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/34/Flag_of_El_Salvador.svg/22px-Flag_of_El_Salvador.svg.png",
            "name_ru" => "Сальвадор",
            "name_en" => "Salvador",
            "iso_two" => "SV",
            "iso_three" => "SLV"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/31/Flag_of_Equatorial_Guinea.svg/22px-Flag_of_Equatorial_Guinea.svg.png",
            "name_ru" => "Экваториальная Гвинея",
            "name_en" => "Equatorialguinea",
            "iso_two" => "GQ",
            "iso_three" => "GNQ"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/29/Flag_of_Eritrea.svg/22px-Flag_of_Eritrea.svg.png",
            "name_ru" => "Эритрея",
            "name_en" => "Eritrea",
            "iso_two" => "ER",
            "iso_three" => "ERI"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/8f/Flag_of_Estonia.svg/22px-Flag_of_Estonia.svg.png",
            "name_ru" => "Эстония",
            "name_en" => "Estonia",
            "iso_two" => "EE",
            "iso_three" => "EST"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/1e/Flag_of_Swaziland.svg/22px-Flag_of_Swaziland.svg.png",
            "name_ru" => "Свазиленд",
            "name_en" => "Swaziland",
            "iso_two" => "SZ",
            "iso_three" => "SWZ"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/71/Flag_of_Ethiopia.svg/22px-Flag_of_Ethiopia.svg.png",
            "name_ru" => "Эфиопия",
            "name_en" => "Ethiopia",
            "iso_two" => "ET",
            "iso_three" => "ETH"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/83/Flag_of_the_Falkland_Islands.svg/22px-Flag_of_the_Falkland_Islands.svg.png",
            "name_ru" => "Фолклендские острова",
            "name_en" => "Falkland Islands",
            "iso_two" => "FK",
            "iso_three" => "FLK"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/3c/Flag_of_the_Faroe_Islands.svg/22px-Flag_of_the_Faroe_Islands.svg.png",
            "name_ru" => "Фареры",
            "name_en" => "Faroe Islands",
            "iso_two" => "FO",
            "iso_three" => "FRO"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Flag_of_Fiji.svg/22px-Flag_of_Fiji.svg.png",
            "name_ru" => "Фиджи",
            "name_en" => "Fiji",
            "iso_two" => "FJ",
            "iso_three" => "FJI"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Flag_of_Finland.svg/22px-Flag_of_Finland.svg.png",
            "name_ru" => "Финляндия",
            "name_en" => "Finland",
            "iso_two" => "FI",
            "iso_three" => "FIN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Flag_of_France.svg/22px-Flag_of_France.svg.png",
            "name_ru" => "Франция",
            "name_en" => "France",
            "iso_two" => "FR",
            "iso_three" => "FRA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/29/Flag_of_French_Guiana.svg/22px-Flag_of_French_Guiana.svg.png",
            "name_ru" => "Гвиана",
            "name_en" => "Frenchguiana",
            "iso_two" => "GF",
            "iso_three" => "GUF"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/db/Flag_of_French_Polynesia.svg/22px-Flag_of_French_Polynesia.svg.png",
            "name_ru" => "Французская Полинезия",
            "name_en" => "French Polynesia",
            "iso_two" => "PF",
            "iso_three" => "PYF"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/a7/Flag_of_the_French_Southern_and_Antarctic_Lands.svg/22px-Flag_of_the_French_Southern_and_Antarctic_Lands.svg.png",
            "name_ru" => "Французские Южные и Антарктические Территории",
            "name_en" => "French Southern Territories",
            "iso_two" => "TF",
            "iso_three" => "ATF"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/04/Flag_of_Gabon.svg/22px-Flag_of_Gabon.svg.png",
            "name_ru" => "Габон",
            "name_en" => "Gabon",
            "iso_two" => "GA",
            "iso_three" => "GAB"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/77/Flag_of_The_Gambia.svg/22px-Flag_of_The_Gambia.svg.png",
            "name_ru" => "Гамбия",
            "name_en" => "Gambia",
            "iso_two" => "GM",
            "iso_three" => "GMB"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Flag_of_Georgia.svg/22px-Flag_of_Georgia.svg.png",
            "name_ru" => "Грузия",
            "name_en" => "Georgia",
            "iso_two" => "GE",
            "iso_three" => "GEO"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Flag_of_Germany.svg/22px-Flag_of_Germany.svg.png",
            "name_ru" => "Германия",
            "name_en" => "Germany",
            "iso_two" => "DE",
            "iso_three" => "DEU"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/19/Flag_of_Ghana.svg/22px-Flag_of_Ghana.svg.png",
            "name_ru" => "Гана",
            "name_en" => "Ghana",
            "iso_two" => "GH",
            "iso_three" => "GHA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/02/Flag_of_Gibraltar.svg/22px-Flag_of_Gibraltar.svg.png",
            "name_ru" => "Гибралтар",
            "name_en" => "Gibraltar",
            "iso_two" => "GI",
            "iso_three" => "GIB"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Greece.svg/22px-Flag_of_Greece.svg.png",
            "name_ru" => "Греция",
            "name_en" => "Greece",
            "iso_two" => "GR",
            "iso_three" => "GRC"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/09/Flag_of_Greenland.svg/22px-Flag_of_Greenland.svg.png",
            "name_ru" => "Гренландия",
            "name_en" => "Greenland",
            "iso_two" => "GL",
            "iso_three" => "GRL"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Flag_of_Grenada.svg/22px-Flag_of_Grenada.svg.png",
            "name_ru" => "Гренада",
            "name_en" => "Grenada",
            "iso_two" => "GD",
            "iso_three" => "GRD"
        ];
        $data[] = [
            "image" => "https://upload.wikimedia.org/wikipedia/commons/8/8a/Flag_of_Guadeloupe_%28Local%29.svg?uselang=ru",
            "name_ru" => "Гваделупа",
            "name_en" => "Guadeloupe",
            "iso_two" => "GP",
            "iso_three" => "GLP"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/07/Flag_of_Guam.svg/22px-Flag_of_Guam.svg.png",
            "name_ru" => "Гуам",
            "name_en" => "Guam",
            "iso_two" => "GU",
            "iso_three" => "GUM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/ec/Flag_of_Guatemala.svg/22px-Flag_of_Guatemala.svg.png",
            "name_ru" => "Гватемала",
            "name_en" => "Guatemala",
            "iso_two" => "GT",
            "iso_three" => "GTM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fa/Flag_of_Guernsey.svg/22px-Flag_of_Guernsey.svg.png",
            "name_ru" => "Гернси",
            "name_en" => "Guernsey",
            "iso_two" => "GG",
            "iso_three" => "GGY"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Flag_of_Guinea.svg/22px-Flag_of_Guinea.svg.png",
            "name_ru" => "Гвинея",
            "name_en" => "Guinea",
            "iso_two" => "GN",
            "iso_three" => "GIN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/01/Flag_of_Guinea-Bissau.svg/22px-Flag_of_Guinea-Bissau.svg.png",
            "name_ru" => "Гвинея-Бисау",
            "name_en" => "Guineabissau",
            "iso_two" => "GW",
            "iso_three" => "GNB"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/99/Flag_of_Guyana.svg/22px-Flag_of_Guyana.svg.png",
            "name_ru" => "Гайана",
            "name_en" => "Guyana",
            "iso_two" => "GY",
            "iso_three" => "GUY"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/56/Flag_of_Haiti.svg/22px-Flag_of_Haiti.svg.png",
            "name_ru" => "Гаити",
            "name_en" => "Haiti",
            "iso_two" => "HT",
            "iso_three" => "HTI"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b9/Flag_of_Australia.svg/22px-Flag_of_Australia.svg.png",
            "name_ru" => "Херд и Макдональд",
            "name_en" => "Heard & McDonald Islands",
            "iso_two" => "HM",
            "iso_three" => "HMD"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/82/Flag_of_Honduras.svg/22px-Flag_of_Honduras.svg.png",
            "name_ru" => "Гондурас",
            "name_en" => "Honduras",
            "iso_two" => "HN",
            "iso_three" => "HND"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/5b/Flag_of_Hong_Kong.svg/22px-Flag_of_Hong_Kong.svg.png",
            "name_ru" => "Гонконг",
            "name_en" => "HongKong",
            "iso_two" => "HK",
            "iso_three" => "HKG"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/c1/Flag_of_Hungary.svg/22px-Flag_of_Hungary.svg.png",
            "name_ru" => "Венгрия",
            "name_en" => "Hungary",
            "iso_two" => "HU",
            "iso_three" => "HUN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Flag_of_Iceland.svg/22px-Flag_of_Iceland.svg.png",
            "name_ru" => "Исландия",
            "name_en" => "Iceland",
            "iso_two" => "IS",
            "iso_three" => "ISL"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/41/Flag_of_India.svg/22px-Flag_of_India.svg.png",
            "name_ru" => "Индия",
            "name_en" => "India",
            "iso_two" => "IN",
            "iso_three" => "IND"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_Indonesia.svg/22px-Flag_of_Indonesia.svg.png",
            "name_ru" => "Индонезия",
            "name_en" => "Indonesia",
            "iso_two" => "ID",
            "iso_three" => "IDN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/ca/Flag_of_Iran.svg/22px-Flag_of_Iran.svg.png",
            "name_ru" => "Иран",
            "name_en" => "Iran",
            "iso_two" => "IR",
            "iso_three" => "IRN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f6/Flag_of_Iraq.svg/22px-Flag_of_Iraq.svg.png",
            "name_ru" => "Ирак",
            "name_en" => "Iraq",
            "iso_two" => "IQ",
            "iso_three" => "IRQ"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/45/Flag_of_Ireland.svg/22px-Flag_of_Ireland.svg.png",
            "name_ru" => "Ирландия",
            "name_en" => "Ireland",
            "iso_two" => "IE",
            "iso_three" => "IRL"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Flag_of_the_Isle_of_Mann.svg/22px-Flag_of_the_Isle_of_Mann.svg.png",
            "name_ru" => "Остров Мэн",
            "name_en" => "Isle of Man",
            "iso_two" => "IM",
            "iso_three" => "IMN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d4/Flag_of_Israel.svg/22px-Flag_of_Israel.svg.png",
            "name_ru" => "Израиль",
            "name_en" => "Israel",
            "iso_two" => "IL",
            "iso_three" => "ISR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/03/Flag_of_Italy.svg/22px-Flag_of_Italy.svg.png",
            "name_ru" => "Италия",
            "name_en" => "Italy",
            "iso_two" => "IT",
            "iso_three" => "ITA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/0a/Flag_of_Jamaica.svg/22px-Flag_of_Jamaica.svg.png",
            "name_ru" => "Ямайка",
            "name_en" => "Jamaica",
            "iso_two" => "JM",
            "iso_three" => "JAM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9e/Flag_of_Japan.svg/22px-Flag_of_Japan.svg.png",
            "name_ru" => "Япония",
            "name_en" => "Japan",
            "iso_two" => "JP",
            "iso_three" => "JPN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/1c/Flag_of_Jersey.svg/22px-Flag_of_Jersey.svg.png",
            "name_ru" => "Джерси",
            "name_en" => "Jersey",
            "iso_two" => "JE",
            "iso_three" => "JEY"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/c0/Flag_of_Jordan.svg/22px-Flag_of_Jordan.svg.png",
            "name_ru" => "Иордания",
            "name_en" => "Jordan",
            "iso_two" => "JO",
            "iso_three" => "JOR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Flag_of_Kazakhstan.svg/22px-Flag_of_Kazakhstan.svg.png",
            "name_ru" => "Казахстан",
            "name_en" => "Kazakhstan",
            "iso_two" => "KZ",
            "iso_three" => "KAZ"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/49/Flag_of_Kenya.svg/22px-Flag_of_Kenya.svg.png",
            "name_ru" => "Кения",
            "name_en" => "Kenya",
            "iso_two" => "KE",
            "iso_three" => "KEN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Flag_of_Kiribati.svg/22px-Flag_of_Kiribati.svg.png",
            "name_ru" => "Кирибати",
            "name_en" => "Kiribati",
            "iso_two" => "KI",
            "iso_three" => "KIR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/aa/Flag_of_Kuwait.svg/22px-Flag_of_Kuwait.svg.png",
            "name_ru" => "Кувейт",
            "name_en" => "Kuwait",
            "iso_two" => "KW",
            "iso_three" => "KWT"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/c7/Flag_of_Kyrgyzstan.svg/22px-Flag_of_Kyrgyzstan.svg.png",
            "name_ru" => "Киргизия",
            "name_en" => "Kyrgyzstan",
            "iso_two" => "KG",
            "iso_three" => "KGZ"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/56/Flag_of_Laos.svg/22px-Flag_of_Laos.svg.png",
            "name_ru" => "Лаос",
            "name_en" => "Laos",
            "iso_two" => "LA",
            "iso_three" => "LAO"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/84/Flag_of_Latvia.svg/22px-Flag_of_Latvia.svg.png",
            "name_ru" => "Латвия",
            "name_en" => "Latvia",
            "iso_two" => "LV",
            "iso_three" => "LVA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/59/Flag_of_Lebanon.svg/22px-Flag_of_Lebanon.svg.png",
            "name_ru" => "Ливан",
            "name_en" => "Lebanon",
            "iso_two" => "LB",
            "iso_three" => "LBN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Flag_of_Lesotho.svg/22px-Flag_of_Lesotho.svg.png",
            "name_ru" => "Лесото",
            "name_en" => "Lesotho",
            "iso_two" => "LS",
            "iso_three" => "LSO"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b8/Flag_of_Liberia.svg/22px-Flag_of_Liberia.svg.png",
            "name_ru" => "Либерия",
            "name_en" => "Liberia",
            "iso_two" => "LR",
            "iso_three" => "LBR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/05/Flag_of_Libya.svg/22px-Flag_of_Libya.svg.png",
            "name_ru" => "Ливия",
            "name_en" => "Libyan",
            "iso_two" => "LY",
            "iso_three" => "LBY"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/47/Flag_of_Liechtenstein.svg/22px-Flag_of_Liechtenstein.svg.png",
            "name_ru" => "Лихтенштейн",
            "name_en" => "Liechtenstein",
            "iso_two" => "LI",
            "iso_three" => "LIE"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/11/Flag_of_Lithuania.svg/22px-Flag_of_Lithuania.svg.png",
            "name_ru" => "Литва",
            "name_en" => "Lithuania",
            "iso_two" => "LT",
            "iso_three" => "LTU"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/da/Flag_of_Luxembourg.svg/22px-Flag_of_Luxembourg.svg.png",
            "name_ru" => "Люксембург",
            "name_en" => "Luxembourg",
            "iso_two" => "LU",
            "iso_three" => "LUX"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/63/Flag_of_Macau.svg/22px-Flag_of_Macau.svg.png",
            "name_ru" => "Макао",
            "name_en" => "Macao",
            "iso_two" => "MO",
            "iso_three" => "MAC"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Flag_of_Madagascar.svg/22px-Flag_of_Madagascar.svg.png",
            "name_ru" => "Мадагаскар",
            "name_en" => "Madagascar",
            "iso_two" => "MG",
            "iso_three" => "MDG"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d1/Flag_of_Malawi.svg/22px-Flag_of_Malawi.svg.png",
            "name_ru" => "Малави",
            "name_en" => "Malawi",
            "iso_two" => "MW",
            "iso_three" => "MWI"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/66/Flag_of_Malaysia.svg/22px-Flag_of_Malaysia.svg.png",
            "name_ru" => "Малайзия",
            "name_en" => "Malaysia",
            "iso_two" => "MY",
            "iso_three" => "MYS"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/0f/Flag_of_Maldives.svg/22px-Flag_of_Maldives.svg.png",
            "name_ru" => "Мальдивы",
            "name_en" => "Maldives",
            "iso_two" => "MV",
            "iso_three" => "MDV"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/92/Flag_of_Mali.svg/22px-Flag_of_Mali.svg.png",
            "name_ru" => "Мали",
            "name_en" => "Mali",
            "iso_two" => "ML",
            "iso_three" => "MLI"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flag_of_Malta.svg/22px-Flag_of_Malta.svg.png",
            "name_ru" => "Мальта",
            "name_en" => "Malta",
            "iso_two" => "MT",
            "iso_three" => "MLT"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/2e/Flag_of_the_Marshall_Islands.svg/22px-Flag_of_the_Marshall_Islands.svg.png",
            "name_ru" => "Маршалловы Острова",
            "name_en" => "Marshall Islands",
            "iso_two" => "MH",
            "iso_three" => "MHL"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/52/Flag_of_Martinique.svg/22px-Flag_of_Martinique.svg.png",
            "name_ru" => "Мартиника",
            "name_en" => "Martinique",
            "iso_two" => "MQ",
            "iso_three" => "MTQ"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/43/Flag_of_Mauritania.svg/22px-Flag_of_Mauritania.svg.png",
            "name_ru" => "Мавритания",
            "name_en" => "Mauritania",
            "iso_two" => "MR",
            "iso_three" => "MRT"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/77/Flag_of_Mauritius.svg/22px-Flag_of_Mauritius.svg.png",
            "name_ru" => "Маврикий",
            "name_en" => "Mauritius",
            "iso_two" => "MU",
            "iso_three" => "MUS"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4a/Flag_of_Mayotte_%28local%29.svg/22px-Flag_of_Mayotte_%28local%29.svg.png",
            "name_ru" => "Майотта",
            "name_en" => "Mayotte",
            "iso_two" => "YT",
            "iso_three" => "MYT"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Flag_of_Mexico.svg/22px-Flag_of_Mexico.svg.png",
            "name_ru" => "Мексика",
            "name_en" => "Mexico",
            "iso_two" => "MX",
            "iso_three" => "MEX"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Flag_of_the_Federated_States_of_Micronesia.svg/22px-Flag_of_the_Federated_States_of_Micronesia.svg.png",
            "name_ru" => "Микронезия",
            "name_en" => "Micronesia",
            "iso_two" => "FM",
            "iso_three" => "FSM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/27/Flag_of_Moldova.svg/22px-Flag_of_Moldova.svg.png",
            "name_ru" => "Молдавия",
            "name_en" => "Moldova",
            "iso_two" => "MD",
            "iso_three" => "MDA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/ea/Flag_of_Monaco.svg/22px-Flag_of_Monaco.svg.png",
            "name_ru" => "Монако",
            "name_en" => "Monaco",
            "iso_two" => "MC",
            "iso_three" => "MCO"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Flag_of_Mongolia.svg/22px-Flag_of_Mongolia.svg.png",
            "name_ru" => "Монголия",
            "name_en" => "Mongolia",
            "iso_two" => "MN",
            "iso_three" => "MNG"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/64/Flag_of_Montenegro.svg/22px-Flag_of_Montenegro.svg.png",
            "name_ru" => "Черногория",
            "name_en" => "Montenegro",
            "iso_two" => "ME",
            "iso_three" => "MNE"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Flag_of_Montserrat.svg/22px-Flag_of_Montserrat.svg.png",
            "name_ru" => "Монтсеррат",
            "name_en" => "Montserrat",
            "iso_two" => "MS",
            "iso_three" => "MSR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Flag_of_Morocco.svg/22px-Flag_of_Morocco.svg.png",
            "name_ru" => "Марокко",
            "name_en" => "Morocco",
            "iso_two" => "MA",
            "iso_three" => "MAR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Flag_of_Mozambique.svg/22px-Flag_of_Mozambique.svg.png",
            "name_ru" => "Мозамбик",
            "name_en" => "Mozambique",
            "iso_two" => "MZ",
            "iso_three" => "MOZ"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/8c/Flag_of_Myanmar.svg/22px-Flag_of_Myanmar.svg.png",
            "name_ru" => "Мьянма",
            "name_en" => "Myanmar",
            "iso_two" => "MM",
            "iso_three" => "MMR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/00/Flag_of_Namibia.svg/22px-Flag_of_Namibia.svg.png",
            "name_ru" => "Намибия",
            "name_en" => "Namibia",
            "iso_two" => "NA",
            "iso_three" => "NAM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/30/Flag_of_Nauru.svg/22px-Flag_of_Nauru.svg.png",
            "name_ru" => "Науру",
            "name_en" => "Nauru",
            "iso_two" => "NR",
            "iso_three" => "NRU"
        ];
        $data[] = [
            "image" => "https://upload.wikimedia.org/wikipedia/commons/9/9b/Flag_of_Nepal.svg?uselang=ru",
            "name_ru" => "Непал",
            "name_en" => "Nepal",
            "iso_two" => "NP",
            "iso_three" => "NPL"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/20/Flag_of_the_Netherlands.svg/22px-Flag_of_the_Netherlands.svg.png",
            "name_ru" => "Нидерланды",
            "name_en" => "Netherlands",
            "iso_two" => "NL",
            "iso_three" => "NLD"
        ];
        $data[] = [
            "image" => "https://upload.wikimedia.org/wikipedia/commons/2/26/Flags_of_New_Caledonia.svg?uselang=ru",
            "name_ru" => "Новая Каледония",
            "name_en" => "Newcaledonia",
            "iso_two" => "NC",
            "iso_three" => "NCL"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Flag_of_New_Zealand.svg/22px-Flag_of_New_Zealand.svg.png",
            "name_ru" => "Новая Зеландия",
            "name_en" => "Newzealand",
            "iso_two" => "NZ",
            "iso_three" => "NZL"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/19/Flag_of_Nicaragua.svg/22px-Flag_of_Nicaragua.svg.png",
            "name_ru" => "Никарагуа",
            "name_en" => "Nicaragua",
            "iso_two" => "NI",
            "iso_three" => "NIC"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f4/Flag_of_Niger.svg/22px-Flag_of_Niger.svg.png",
            "name_ru" => "Нигер",
            "name_en" => "Niger",
            "iso_two" => "NE",
            "iso_three" => "NER"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/79/Flag_of_Nigeria.svg/22px-Flag_of_Nigeria.svg.png",
            "name_ru" => "Нигерия",
            "name_en" => "Nigeria",
            "iso_two" => "NG",
            "iso_three" => "NGA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/01/Flag_of_Niue.svg/22px-Flag_of_Niue.svg.png",
            "name_ru" => "Ниуэ",
            "name_en" => "Niue",
            "iso_two" => "NU",
            "iso_three" => "NIU"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/48/Flag_of_Norfolk_Island.svg/22px-Flag_of_Norfolk_Island.svg.png",
            "name_ru" => "Остров Норфолк",
            "name_en" => "Norfolk Island",
            "iso_two" => "NF",
            "iso_three" => "NFK"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/51/Flag_of_North_Korea.svg/22px-Flag_of_North_Korea.svg.png",
            "name_ru" => "КНДР",
            "name_en" => "Northkorea",
            "iso_two" => "KP",
            "iso_three" => "PRK"
        ];
        $data[] = [
            "image" => "https://upload.wikimedia.org/wikipedia/commons/7/79/Flag_of_North_Macedonia.svg?uselang=ru",
            "name_ru" => "Македония",
            "name_en" => "Northmacedonia",
            "iso_two" => "MK",
            "iso_three" => "MKD"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/e0/Flag_of_the_Northern_Mariana_Islands.svg/22px-Flag_of_the_Northern_Mariana_Islands.svg.png",
            "name_ru" => "Северные Марианские острова",
            "name_en" => "Northern Mariana Islands",
            "iso_two" => "MP",
            "iso_three" => "MNP"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Norway.svg/22px-Flag_of_Norway.svg.png",
            "name_ru" => "Норвегия",
            "name_en" => "Norway",
            "iso_two" => "NO",
            "iso_three" => "NOR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Flag_of_Oman.svg/22px-Flag_of_Oman.svg.png",
            "name_ru" => "Оман",
            "name_en" => "Oman",
            "iso_two" => "OM",
            "iso_three" => "OMN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/32/Flag_of_Pakistan.svg/22px-Flag_of_Pakistan.svg.png",
            "name_ru" => "Пакистан",
            "name_en" => "Pakistan",
            "iso_two" => "PK",
            "iso_three" => "PAK"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/48/Flag_of_Palau.svg/22px-Flag_of_Palau.svg.png",
            "name_ru" => "Палау",
            "name_en" => "Palau",
            "iso_two" => "PW",
            "iso_three" => "PLW"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/00/Flag_of_Palestine.svg/22px-Flag_of_Palestine.svg.png",
            "name_ru" => "Государство Палестина",
            "name_en" => "Palestine",
            "iso_two" => "PS",
            "iso_three" => "PSE"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/ab/Flag_of_Panama.svg/22px-Flag_of_Panama.svg.png",
            "name_ru" => "Панама",
            "name_en" => "Panama",
            "iso_two" => "PA",
            "iso_three" => "PAN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/e3/Flag_of_Papua_New_Guinea.svg/22px-Flag_of_Papua_New_Guinea.svg.png",
            "name_ru" => "Папуа — Новая Гвинея",
            "name_en" => "Papua",
            "iso_two" => "PG",
            "iso_three" => "PNG"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/27/Flag_of_Paraguay.svg/22px-Flag_of_Paraguay.svg.png",
            "name_ru" => "Парагвай",
            "name_en" => "Paraguay",
            "iso_two" => "PY",
            "iso_three" => "PRY"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/df/Flag_of_Peru_%28state%29.svg/22px-Flag_of_Peru_%28state%29.svg.png",
            "name_ru" => "Перу",
            "name_en" => "Peru",
            "iso_two" => "PE",
            "iso_three" => "PER"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/99/Flag_of_the_Philippines.svg/22px-Flag_of_the_Philippines.svg.png",
            "name_ru" => "Филиппины",
            "name_en" => "Philippines",
            "iso_two" => "PH",
            "iso_three" => "PHL"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/88/Flag_of_the_Pitcairn_Islands.svg/22px-Flag_of_the_Pitcairn_Islands.svg.png",
            "name_ru" => "Острова Питкэрн",
            "name_en" => "Pitcairn Islands",
            "iso_two" => "PN",
            "iso_three" => "PCN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/12/Flag_of_Poland.svg/22px-Flag_of_Poland.svg.png",
            "name_ru" => "Польша",
            "name_en" => "Poland",
            "iso_two" => "PL",
            "iso_three" => "POL"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Flag_of_Portugal.svg/22px-Flag_of_Portugal.svg.png",
            "name_ru" => "Португалия",
            "name_en" => "Portugal",
            "iso_two" => "PT",
            "iso_three" => "PRT"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/28/Flag_of_Puerto_Rico.svg/22px-Flag_of_Puerto_Rico.svg.png",
            "name_ru" => "Пуэрто-Рико",
            "name_en" => "Puertorico",
            "iso_two" => "PR",
            "iso_three" => "PRI"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/65/Flag_of_Qatar.svg/22px-Flag_of_Qatar.svg.png",
            "name_ru" => "Катар",
            "name_en" => "Qatar",
            "iso_two" => "QA",
            "iso_three" => "QAT"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/ru/thumb/8/84/Regional_Flag_of_Reunion.gif/22px-Regional_Flag_of_Reunion.gif",
            "name_ru" => "Реюньон",
            "name_en" => "Réunion",
            "iso_two" => "RE",
            "iso_three" => "REU"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flag_of_Romania.svg/22px-Flag_of_Romania.svg.png",
            "name_ru" => "Румыния",
            "name_en" => "Romania",
            "iso_two" => "RO",
            "iso_three" => "ROU"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Russia.svg/22px-Flag_of_Russia.svg.png",
            "name_ru" => "Россия",
            "name_en" => "Russia",
            "iso_two" => "RU",
            "iso_three" => "RUS"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/17/Flag_of_Rwanda.svg/22px-Flag_of_Rwanda.svg.png",
            "name_ru" => "Руанда",
            "name_en" => "Rwanda",
            "iso_two" => "RW",
            "iso_three" => "RWA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/31/Flag_of_Samoa.svg/22px-Flag_of_Samoa.svg.png",
            "name_ru" => "Самоа",
            "name_en" => "Samoa",
            "iso_two" => "WS",
            "iso_three" => "WSM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b1/Flag_of_San_Marino.svg/22px-Flag_of_San_Marino.svg.png",
            "name_ru" => "Сан-Марино",
            "name_en" => "San Marino",
            "iso_two" => "SM",
            "iso_three" => "SMR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4f/Flag_of_Sao_Tome_and_Principe.svg/22px-Flag_of_Sao_Tome_and_Principe.svg.png",
            "name_ru" => "Сан-Томе и Принсипи",
            "name_en" => "Saotomeandprincipe",
            "iso_two" => "ST",
            "iso_three" => "STP"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Flag_of_Saudi_Arabia.svg/22px-Flag_of_Saudi_Arabia.svg.png",
            "name_ru" => "Саудовская Аравия",
            "name_en" => "Saudiarabia",
            "iso_two" => "SA",
            "iso_three" => "SAU"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Flag_of_Senegal.svg/22px-Flag_of_Senegal.svg.png",
            "name_ru" => "Сенегал",
            "name_en" => "Senegal",
            "iso_two" => "SN",
            "iso_three" => "SEN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/ff/Flag_of_Serbia.svg/22px-Flag_of_Serbia.svg.png",
            "name_ru" => "Сербия",
            "name_en" => "Serbia",
            "iso_two" => "RS",
            "iso_three" => "SRB"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fc/Flag_of_Seychelles.svg/22px-Flag_of_Seychelles.svg.png",
            "name_ru" => "Сейшельские Острова",
            "name_en" => "Seychelles",
            "iso_two" => "SC",
            "iso_three" => "SYC"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/17/Flag_of_Sierra_Leone.svg/22px-Flag_of_Sierra_Leone.svg.png",
            "name_ru" => "Сьерра-Леоне",
            "name_en" => "Sierraleone",
            "iso_two" => "SL",
            "iso_three" => "SLE"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/48/Flag_of_Singapore.svg/22px-Flag_of_Singapore.svg.png",
            "name_ru" => "Сингапур",
            "name_en" => "Singapore",
            "iso_two" => "SG",
            "iso_three" => "SGP"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d3/Flag_of_Sint_Maarten.svg/22px-Flag_of_Sint_Maarten.svg.png",
            "name_ru" => "Синт-Мартен",
            "name_en" => "Sint Maarten",
            "iso_two" => "SX",
            "iso_three" => "SXM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Flag_of_Slovakia.svg/22px-Flag_of_Slovakia.svg.png",
            "name_ru" => "Словакия",
            "name_en" => "Slovakia",
            "iso_two" => "SK",
            "iso_three" => "SVK"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f0/Flag_of_Slovenia.svg/22px-Flag_of_Slovenia.svg.png",
            "name_ru" => "Словения",
            "name_en" => "Slovenia",
            "iso_two" => "SI",
            "iso_three" => "SVN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/74/Flag_of_the_Solomon_Islands.svg/22px-Flag_of_the_Solomon_Islands.svg.png",
            "name_ru" => "Соломоновы Острова",
            "name_en" => "Solomonislands",
            "iso_two" => "SB",
            "iso_three" => "SLB"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Flag_of_Somalia.svg/22px-Flag_of_Somalia.svg.png",
            "name_ru" => "Сомали",
            "name_en" => "Somalia",
            "iso_two" => "SO",
            "iso_three" => "SOM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/af/Flag_of_South_Africa.svg/22px-Flag_of_South_Africa.svg.png",
            "name_ru" => "ЮАР",
            "name_en" => "Southafrica",
            "iso_two" => "ZA",
            "iso_three" => "ZAF"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/e/ed/Flag_of_South_Georgia_and_the_South_Sandwich_Islands.svg/22px-Flag_of_South_Georgia_and_the_South_Sandwich_Islands.svg.png",
            "name_ru" => "Южная Георгия и Южные Сандвичевы острова",
            "name_en" => "South Georgia & South Sandwich Islands",
            "iso_two" => "GS",
            "iso_three" => "SGS"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/09/Flag_of_South_Korea.svg/22px-Flag_of_South_Korea.svg.png",
            "name_ru" => "Республика Корея",
            "name_en" => "Southkorea",
            "iso_two" => "KR",
            "iso_three" => "KOR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/7a/Flag_of_South_Sudan.svg/22px-Flag_of_South_Sudan.svg.png",
            "name_ru" => "Южный Судан",
            "name_en" => "Southsudan",
            "iso_two" => "SS",
            "iso_three" => "SSD"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Spain.svg/22px-Flag_of_Spain.svg.png",
            "name_ru" => "Испания",
            "name_en" => "Spain",
            "iso_two" => "ES", "iso_three" => "ESP"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/11/Flag_of_Sri_Lanka.svg/22px-Flag_of_Sri_Lanka.svg.png",
            "name_ru" => "Шри-Ланка",
            "name_en" => "Srilanka",
            "iso_two" => "LK",
            "iso_three" => "LKA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/df/Flag_of_Saint_Barthelemy_%28local%29.svg/22px-Flag_of_Saint_Barthelemy_%28local%29.svg.png",
            "name_ru" => "Сен-Бартелеми",
            "name_en" => "St. Barthélemy",
            "iso_two" => "BL",
            "iso_three" => "BLM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/00/Flag_of_Saint_Helena.svg/22px-Flag_of_Saint_Helena.svg.png",
            "name_ru" => "Острова Святой Елены, Вознесения и Тристан-да-Кунья",
            "name_en" => "St. Helena",
            "iso_two" => "SH",
            "iso_three" => "SHN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Saint_Kitts_and_Nevis.svg/22px-Flag_of_Saint_Kitts_and_Nevis.svg.png",
            "name_ru" => "Сент-Китс и Невис",
            "name_en" => "Saintkitts",
            "iso_two" => "KN",
            "iso_three" => "KNA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Flag_of_Saint_Lucia.svg/22px-Flag_of_Saint_Lucia.svg.png",
            "name_ru" => "Сент-Люсия",
            "name_en" => "Saintlucia",
            "iso_two" => "LC",
            "iso_three" => "LCA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/dd/Flag_of_Saint-Martin_%28fictional%29.svg/22px-Flag_of_Saint-Martin_%28fictional%29.svg.png",
            "name_ru" => "Сен-Мартен",
            "name_en" => "St. Martin",
            "iso_two" => "MF",
            "iso_three" => "MAF"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/74/Flag_of_Saint-Pierre_and_Miquelon.svg/22px-Flag_of_Saint-Pierre_and_Miquelon.svg.png",
            "name_ru" => "Сен-Пьер и Микелон",
            "name_en" => "St. Pierre & Miquelon",
            "iso_two" => "PM",
            "iso_three" => "SPM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/6d/Flag_of_Saint_Vincent_and_the_Grenadines.svg/22px-Flag_of_Saint_Vincent_and_the_Grenadines.svg.png",
            "name_ru" => "Сент-Винсент и Гренадины",
            "name_en" => "Saintvincentgrenadines",
            "iso_two" => "VC",
            "iso_three" => "VCT"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/01/Flag_of_Sudan.svg/22px-Flag_of_Sudan.svg.png",
            "name_ru" => "Судан",
            "name_en" => "Sudan",
            "iso_two" => "SD",
            "iso_three" => "SDN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/60/Flag_of_Suriname.svg/22px-Flag_of_Suriname.svg.png",
            "name_ru" => "Суринам",
            "name_en" => "Suriname",
            "iso_two" => "SR",
            "iso_three" => "SUR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d9/Flag_of_Norway.svg/22px-Flag_of_Norway.svg.png",
            "name_ru" => "Шпицберген и Ян-Майен",
            "name_en" => "Svalbard & Jan Mayen",
            "iso_two" => "SJ",
            "iso_three" => "SJM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4c/Flag_of_Sweden.svg/22px-Flag_of_Sweden.svg.png",
            "name_ru" => "Швеция",
            "name_en" => "Sweden",
            "iso_two" => "SE",
            "iso_three" => "SWE"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f3/Flag_of_Switzerland.svg/20px-Flag_of_Switzerland.svg.png",
            "name_ru" => "Швейцария",
            "name_en" => "Switzerland",
            "iso_two" => "CH",
            "iso_three" => "CHE"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/5/53/Flag_of_Syria.svg/22px-Flag_of_Syria.svg.png",
            "name_ru" => "Сирия",
            "name_en" => "Syrian",
            "iso_two" => "SY",
            "iso_three" => "SYR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/72/Flag_of_the_Republic_of_China.svg/22px-Flag_of_the_Republic_of_China.svg.png",
            "name_ru" => "Китайская Республика",
            "name_en" => "Taiwan",
            "iso_two" => "TW",
            "iso_three" => "TWN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/d/d0/Flag_of_Tajikistan.svg/22px-Flag_of_Tajikistan.svg.png",
            "name_ru" => "Таджикистан",
            "name_en" => "Tajikistan",
            "iso_two" => "TJ",
            "iso_three" => "TJK"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/38/Flag_of_Tanzania.svg/22px-Flag_of_Tanzania.svg.png",
            "name_ru" => "Танзания",
            "name_en" => "Tanzania",
            "iso_two" => "TZ",
            "iso_three" => "TZA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/a9/Flag_of_Thailand.svg/22px-Flag_of_Thailand.svg.png",
            "name_ru" => "Таиланд",
            "name_en" => "Thailand",
            "iso_two" => "TH",
            "iso_three" => "THA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/26/Flag_of_East_Timor.svg/22px-Flag_of_East_Timor.svg.png",
            "name_ru" => "Восточный Тимор",
            "name_en" => "Timorleste",
            "iso_two" => "TL",
            "iso_three" => "TLS"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/68/Flag_of_Togo.svg/22px-Flag_of_Togo.svg.png",
            "name_ru" => "Того",
            "name_en" => "Togo",
            "iso_two" => "TG",
            "iso_three" => "TGO"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/8e/Flag_of_Tokelau.svg/22px-Flag_of_Tokelau.svg.png",
            "name_ru" => "Токелау",
            "name_en" => "Tokelau",
            "iso_two" => "TK",
            "iso_three" => "TKL"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Flag_of_Tonga.svg/22px-Flag_of_Tonga.svg.png",
            "name_ru" => "Тонга",
            "name_en" => "Tonga",
            "iso_two" => "TO",
            "iso_three" => "TON"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/64/Flag_of_Trinidad_and_Tobago.svg/22px-Flag_of_Trinidad_and_Tobago.svg.png",
            "name_ru" => "Тринидад и Тобаго",
            "name_en" => "Trinidad",
            "iso_two" => "TT",
            "iso_three" => "TTO"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/ce/Flag_of_Tunisia.svg/22px-Flag_of_Tunisia.svg.png",
            "name_ru" => "Тунис",
            "name_en" => "Tunisia",
            "iso_two" => "TN",
            "iso_three" => "TUN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/b4/Flag_of_Turkey.svg/22px-Flag_of_Turkey.svg.png",
            "name_ru" => "Турция",
            "name_en" => "Turkey",
            "iso_two" => "TR",
            "iso_three" => "TUR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/1/1b/Flag_of_Turkmenistan.svg/22px-Flag_of_Turkmenistan.svg.png",
            "name_ru" => "Туркмения",
            "name_en" => "Turkmenistan",
            "iso_two" => "TM",
            "iso_three" => "TKM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/a0/Flag_of_the_Turks_and_Caicos_Islands.svg/22px-Flag_of_the_Turks_and_Caicos_Islands.svg.png",
            "name_ru" => "Тёркс и Кайкос",
            "name_en" => "Turks & Caicos Islands",
            "iso_two" => "TC",
            "iso_three" => "TCA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/3/38/Flag_of_Tuvalu.svg/22px-Flag_of_Tuvalu.svg.png",
            "name_ru" => "Тувалу",
            "name_en" => "Tuvalu",
            "iso_two" => "TV",
            "iso_three" => "TUV"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/22px-Flag_of_the_United_States.svg.png",
            "name_ru" => "Внешние малые острова (США)",
            "name_en" => "U.S. Outlying Islands",
            "iso_two" => "UM",
            "iso_three" => "UMI"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/f8/Flag_of_the_United_States_Virgin_Islands.svg/22px-Flag_of_the_United_States_Virgin_Islands.svg.png",
            "name_ru" => "Виргинские Острова (США)",
            "name_en" => "U.S. Virgin Islands",
            "iso_two" => "VI",
            "iso_three" => "VIR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/4e/Flag_of_Uganda.svg/22px-Flag_of_Uganda.svg.png",
            "name_ru" => "Уганда",
            "name_en" => "Uganda",
            "iso_two" => "UG",
            "iso_three" => "UGA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/4/49/Flag_of_Ukraine.svg/22px-Flag_of_Ukraine.svg.png",
            "name_ru" => "Украина",
            "name_en" => "Ukraine",
            "iso_two" => "UA",
            "iso_three" => "UKR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/cb/Flag_of_the_United_Arab_Emirates.svg/22px-Flag_of_the_United_Arab_Emirates.svg.png",
            "name_ru" => "ОАЭ",
            "name_en" => "Uae",
            "iso_two" => "AE",
            "iso_three" => "ARE"
        ];
        $data[] = [
            "image" => "https://upload.wikimedia.org/wikipedia/commons/8/83/Flag_of_the_United_Kingdom_%283-5%29.svg?uselang=ru",
            "name_ru" => "Великобритания",
            "name_en" => "United Kingdom",
            "iso_two" => "GB",
            "iso_three" => "GBR"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/22px-Flag_of_the_United_States.svg.png",
            "name_ru" => "США",
            "name_en" => "USA",
            "iso_two" => "US",
            "iso_three" => "USA"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/22px-Flag_of_the_United_States.svg.png",
            "name_ru" => "США (виртуальные)",
            "name_en" => "USA (virtual)",
            "iso_two" => "",
            "iso_three" => ""
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Uruguay.svg/22px-Flag_of_Uruguay.svg.png",
            "name_ru" => "Уругвай",
            "name_en" => "Uruguay",
            "iso_two" => "UY",
            "iso_three" => "URY"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/84/Flag_of_Uzbekistan.svg/22px-Flag_of_Uzbekistan.svg.png",
            "name_ru" => "Узбекистан",
            "name_en" => "Uzbekistan",
            "iso_two" => "UZ",
            "iso_three" => "UZB"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/b/bc/Flag_of_Vanuatu.svg/22px-Flag_of_Vanuatu.svg.png",
            "name_ru" => "Вануату",
            "name_en" => "Vanuatu",
            "iso_two" => "VU",
            "iso_three" => "VUT"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/00/Flag_of_the_Vatican_City.svg/20px-Flag_of_the_Vatican_City.svg.png",
            "name_ru" => "Ватикан",
            "name_en" => "Vatican City",
            "iso_two" => "VA",
            "iso_three" => "VAT"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/7/7b/Flag_of_Venezuela_%28state%29.svg/22px-Flag_of_Venezuela_%28state%29.svg.png",
            "name_ru" => "Венесуэла",
            "name_en" => "Venezuela",
            "iso_two" => "VE",
            "iso_three" => "VEN"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/21/Flag_of_Vietnam.svg/22px-Flag_of_Vietnam.svg.png",
            "name_ru" => "Вьетнам",
            "name_en" => "Vietnam",
            "iso_two" => "VN",
            "iso_three" => "VNM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Flag_of_France.svg/22px-Flag_of_France.svg.png",
            "name_ru" => "Уоллис и Футуна",
            "name_en" => "Wallis & Futuna",
            "iso_two" => "WF",
            "iso_three" => "WLF"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/2/26/Flag_of_the_Sahrawi_Arab_Democratic_Republic.svg/22px-Flag_of_the_Sahrawi_Arab_Democratic_Republic.svg.png",
            "name_ru" => "САДР",
            "name_en" => "Westernsahara",
            "iso_two" => "EH",
            "iso_three" => "ESH"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/8/89/Flag_of_Yemen.svg/22px-Flag_of_Yemen.svg.png",
            "name_ru" => "Йемен",
            "name_en" => "Yemen",
            "iso_two" => "YE",
            "iso_three" => "YEM"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/0/06/Flag_of_Zambia.svg/22px-Flag_of_Zambia.svg.png",
            "name_ru" => "Замбия",
            "name_en" => "Zambia",
            "iso_two" => "ZM",
            "iso_three" => "ZMB"
        ];
        $data[] = [
            "image" => "//upload.wikimedia.org/wikipedia/commons/thumb/6/6a/Flag_of_Zimbabwe.svg/22px-Flag_of_Zimbabwe.svg.png",
            "name_ru" => "Зимбабве",
            "name_en" => "Zimbabwe",
            "iso_two" => "ZW",
            "iso_three" => "ZWE"
        ];

        DB::table('country')->insert($data);
    }


}
