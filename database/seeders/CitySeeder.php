<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city_list['Nigeria'] = [
            ["Abia State"=> [
                  ["name" => "Aba North"],
                  ["name" => "Aba South"],
                  ["name" => "Arochukwu"],
                  ["name" => "Bende"],
                  ["name" => "Ikwuano"],
                  ["name" => "Isiala-Ngwa North"],
                  ["name" => "Isiala-Ngwa South"],
                  ["name" => "Isuikwato"],
                  ["name" => "Obi Nwa"],
                  ["name" => "Ohafia"],
                  ["name" => "Osisioma"],
                  ["name" => "Ngwa"],
                  ["name" => "Ugwunagbo"],
                  ["name" => "Ukwa East"],
                  ["name" => "Ukwa West"],
                  ["name" => "Umuahia North"],
                  ["name" => "Umuahia South"],
                  ["name" => "Umu-Neochi"]
                ],
            ],
            ["Adamawa State"=> [
                  ["name" => "Demsa"],
                  ["name" => "Fufore"],
                  ["name" => "Ganaye"],
                  ["name" => "Gireri"],
                  ["name" => "Gombi"],
                  ["name" => "Guyuk"],
                  ["name" => "Hong"],
                  ["name" => "Jada"],
                  ["name" => "Lamurde"],
                  ["name" => "Madagali"],
                  ["name" => "Maiha"],
                  ["name" => "Mayo-Belwa"],
                  ["name" => "Michika"],
                  ["name" => "Mubi North"],
                  ["name" => "Mubi South"],
                  ["name" => "Numan"],
                  ["name" => "Shelleng"],
                  ["name" => "Song"],
                  ["name" => "Toungo"],
                  ["name" => "Yola North"],
                  ["name" => "Yola South"]
                ],
            ],
            ["Anambra State"=> [
                  ["name" => "Aguata"],
                  ["name" => "Anambra East"],
                  ["name" => "Anambra West"],
                  ["name" => "Anaocha"],
                  ["name" => "Awka North"],
                  ["name" => "Awka South"],
                  ["name" => "Ayamelum"],
                  ["name" => "Dunukofia"],
                  ["name" => "Ekwusigo"],
                  ["name" => "Idemili North"],
                  ["name" => "Idemili south"],
                  ["name" => "Ihiala"],
                  ["name" => "Njikoka"],
                  ["name" => "Nnewi North"],
                  ["name" => "Nnewi South"],
                  ["name" => "Ogbaru"],
                  ["name" => "Onitsha North"],
                  ["name" => "Onitsha South"],
                  ["name" => "Orumba North"],
                  ["name" => "Orumba South"],
                  ["name" => "Oyi"]
                ],
            ],
            ["Akwa Ibom State"=> [
                  ["name" => "Abak"],
                  ["name" => "Eastern Obolo"],
                  ["name" => "Eket"],
                  ["name" => "Esit Eket"],
                  ["name" => "Essien Udim"],
                  ["name" => "Etim Ekpo"],
                  ["name" => "Etinan"],
                  ["name" => "Ibeno"],
                  ["name" => "Ibesikpo Asutan"],
                  ["name" => "Ibiono Ibom"],
                  ["name" => "Ika"],
                  ["name" => "Ikono"],
                  ["name" => "Ikot Abasi"],
                  ["name" => "Ikot Ekpene"],
                  ["name" => "Ini"],
                  ["name" => "Itu"],
                  ["name" => "Mbo"],
                  ["name" => "Mkpat Enin"],
                  ["name" => "Nsit Atai"],
                  ["name" => "Nsit Ibom"],
                  ["name" => "Nsit Ubium"],
                  ["name" => "Obot Akara"],
                  ["name" => "Okobo"],
                  ["name" => "Onna"],
                  ["name" => "Oron"],
                  ["name" => "Oruk Anam"],
                  ["name" => "Udung Uko"],
                  ["name" => "Ukanafun"],
                  ["name" => "Uruan"],
                  ["name" => "Urue-Offong/Oruko "],
                  ["name" => "Uyo"]
                ],
            ],
            ["Bauchi State"=> [
                  ["name" => "Alkaleri"],
                  ["name" => "Bauchi"],
                  ["name" => "Bogoro"],
                  ["name" => "Damban"],
                  ["name" => "Darazo"],
                  ["name" => "Dass"],
                  ["name" => "Ganjuwa"],
                  ["name" => "Giade"],
                  ["name" => "Itas/Gadau"],
                  ["name" => "Jama'are"],
                  ["name" => "Katagum"],
                  ["name" => "Kirfi"],
                  ["name" => "Misau"],
                  ["name" => "Ningi"],
                  ["name" => "Shira"],
                  ["name" => "Tafawa-Balewa"],
                  ["name" => "Toro"],
                  ["name" => "Warji"],
                  ["name" => "Zaki"]
                ],
            ],
            ["Bayelsa State"=> [
                  ["name" => "Brass"],
                  ["name" => "Ekeremor"],
                  ["name" => "Kolokuma/Opokuma"],
                  ["name" => "Nembe"],
                  ["name" => "Ogbia"],
                  ["name" => "Sagbama"],
                  ["name" => "Southern Jaw"],
                  ["name" => "Yenegoa"]
                ],
            ],
            ["Benue State"=> [
                  ["name" => "Ado"],
                  ["name" => "Agatu"],
                  ["name" => "Apa"],
                  ["name" => "Buruku"],
                  ["name" => "Gboko"],
                  ["name" => "Guma"],
                  ["name" => "Gwer East"],
                  ["name" => "Gwer West"],
                  ["name" => "Katsina-Ala"],
                  ["name" => "Konshisha"],
                  ["name" => "Kwande"],
                  ["name" => "Logo"],
                  ["name" => "Makurdi"],
                  ["name" => "Obi"],
                  ["name" => "Ogbadibo"],
                  ["name" => "Oju"],
                  ["name" => "Okpokwu"],
                  ["name" => "Ohimini"],
                  ["name" => "Oturkpo"],
                  ["name" => "Tarka"],
                  ["name" => "Ukum"],
                  ["name" => "Ushongo"],
                  ["name" => "Vandeikya"]
                ],
            ],
            ["Borno State"=> [
                  ["name" => "Abadam"],
                  ["name" => "Askira/Uba"],
                  ["name" => "Bama"],
                  ["name" => "Bayo"],
                  ["name" => "Biu"],
                  ["name" => "Chibok"],
                  ["name" => "Damboa"],
                  ["name" => "Dikwa"],
                  ["name" => "Gubio"],
                  ["name" => "Guzamala"],
                  ["name" => "Gwoza"],
                  ["name" => "Hawul"],
                  ["name" => "Jere"],
                  ["name" => "Kaga"],
                  ["name" => "Kala/Balge"],
                  ["name" => "Konduga"],
                  ["name" => "Kukawa"],
                  ["name" => "Kwaya Kusar"],
                  ["name" => "Mafa"],
                  ["name" => "Magumeri"],
                  ["name" => "Maiduguri"],
                  ["name" => "Marte"],
                  ["name" => "Mobbar"],
                  ["name" => "Monguno"],
                  ["name" => "Ngala"],
                  ["name" => "Nganzai"],
                  ["name" => "Shani"]
                ],
            ],
            ["Cross River State"=> [
                  ["name" => "Akpabuyo"],
                  ["name" => "Odukpani"],
                  ["name" => "Akamkpa"],
                  ["name" => "Biase"],
                  ["name" => "Abi"],
                  ["name" => "Ikom"],
                  ["name" => "Yarkur"],
                  ["name" => "Odubra"],
                  ["name" => "Boki"],
                  ["name" => "Ogoja"],
                  ["name" => "Yala"],
                  ["name" => "Obanliku"],
                  ["name" => "Obudu"],
                  ["name" => "Calabar South"],
                  ["name" => "Etung"],
                  ["name" => "Bekwara"],
                  ["name" => "Bakassi"],
                  ["name" => "Calabar Municipality"]
                ],
            ],
            ["Delta State"=> [
                  ["name" => "Oshimili"],
                  ["name" => "Aniocha"],
                  ["name" => "Aniocha South"],
                  ["name" => "Ika South"],
                  ["name" => "Ika North-East"],
                  ["name" => "Ndokwa West"],
                  ["name" => "Ndokwa East"],
                  ["name" => "Isoko south"],
                  ["name" => "Isoko North"],
                  ["name" => "Bomadi"],
                  ["name" => "Burutu"],
                  ["name" => "Ughelli South"],
                  ["name" => "Ughelli North"],
                  ["name" => "Ethiope West"],
                  ["name" => "Ethiope East"],
                  ["name" => "Sapele"],
                  ["name" => "Okpe"],
                  ["name" => "Warri North"],
                  ["name" => "Warri South"],
                  ["name" => "Uvwie"],
                  ["name" => "Udu"],
                  ["name" => "Warri Central"],
                  ["name" => "Ukwani"],
                  ["name" => "Oshimili North"],
                  ["name" => "Patani"]
                ],
            ],
            ["Ebonyi State"=> [
                  ["name" => "Afikpo South"],
                  ["name" => "Afikpo North"],
                  ["name" => "Onicha"],
                  ["name" => "Ohaozara"],
                  ["name" => "Abakaliki"],
                  ["name" => "Ishielu"],
                  ["name" => "lkwo"],
                  ["name" => "Ezza"],
                  ["name" => "Ezza South"],
                  ["name" => "Ohaukwu"],
                  ["name" => "Ebonyi"],
                  ["name" => "Ivo"]
                ],
            ],
            ["Enugu State"=> [
                  ["name" => "Enugu South,"],
                  ["name" => "Igbo-Eze South"],
                  ["name" => "Enugu North"],
                  ["name" => "Nkanu"],
                  ["name" => "Udi Agwu"],
                  ["name" => "Oji-River"],
                  ["name" => "Ezeagu"],
                  ["name" => "IgboEze North"],
                  ["name" => "Isi-Uzo"],
                  ["name" => "Nsukka"],
                  ["name" => "Igbo-Ekiti"],
                  ["name" => "Uzo-Uwani"],
                  ["name" => "Enugu Eas"],
                  ["name" => "Aninri"],
                  ["name" => "Nkanu East"],
                  ["name" => "Udenu."]
                ],
            ],
            ["Edo State"=> [
                  ["name" => "Esan North-East"],
                  ["name" => "Esan Central"],
                  ["name" => "Esan West"],
                  ["name" => "Egor"],
                  ["name" => "Ukpoba"],
                  ["name" => "Central"],
                  ["name" => "Etsako Central"],
                  ["name" => "Igueben"],
                  ["name" => "Oredo"],
                  ["name" => "Ovia SouthWest"],
                  ["name" => "Ovia South-East"],
                  ["name" => "Orhionwon"],
                  ["name" => "Uhunmwonde"],
                  ["name" => "Etsako East"],
                  ["name" => "Esan South-East"]
                ],
            ],
            ["Ekiti State"=> [
                  ["name" => "Ado"],
                  ["name" => "Ekiti-East"],
                  ["name" => "Ekiti-West"],
                  ["name" => "Emure/Ise/Orun"],
                  ["name" => "Ekiti South-West"],
                  ["name" => "Ikere Ekiti"],
                  ["name" => "Irepodun"],
                  ["name" => "Ijero,"],
                  ["name" => "Ido/Osi"],
                  ["name" => "Oye"],
                  ["name" => "Ikole"],
                  ["name" => "Moba"],
                  ["name" => "Gbonyin"],
                  ["name" => "Efon"],
                  ["name" => "Ise/Orun"],
                  ["name" => "Ilejemeje."]
                ],
            ],
            ["Federal Capital Territory"=> [
                  ["name" => "Abaji"],
                  ["name" => "Abuja Municipal"],
                  ["name" => "Bwari"],
                  ["name" => "Gwagwalada"],
                  ["name" => "Kuje"],
                  ["name" => "Kwali"]
                ],
            ],
            ["Gombe State"=> [
                  ["name" => "Akko"],
                  ["name" => "Balanga"],
                  ["name" => "Billiri"],
                  ["name" => "Dukku"],
                  ["name" => "Kaltungo"],
                  ["name" => "Kwami"],
                  ["name" => "Shomgom"],
                  ["name" => "Funakaye"],
                  ["name" => "Gombe"],
                  ["name" => "Nafada/Bajoga"],
                  ["name" => "Yamaltu/Delta."]
                ],
            ],
            ["Imo State"=> [
                  ["name" => "Aboh-Mbaise"],
                  ["name" => "Ahiazu-Mbaise"],
                  ["name" => "Ehime-Mbano"],
                  ["name" => "Ezinihitte"],
                  ["name" => "Ideato North"],
                  ["name" => "Ideato South"],
                  ["name" => "Ihitte/Uboma"],
                  ["name" => "Ikeduru"],
                  ["name" => "Isiala Mbano"],
                  ["name" => "Isu"],
                  ["name" => "Mbaitoli"],
                  ["name" => "Mbaitoli"],
                  ["name" => "Ngor-Okpala"],
                  ["name" => "Njaba"],
                  ["name" => "Nwangele"],
                  ["name" => "Nkwerre"],
                  ["name" => "Obowo"],
                  ["name" => "Oguta"],
                  ["name" => "Ohaji/Egbema"],
                  ["name" => "Okigwe"],
                  ["name" => "Orlu"],
                  ["name" => "Orsu"],
                  ["name" => "Oru East"],
                  ["name" => "Oru West"],
                  ["name" => "Owerri-Municipal"],
                  ["name" => "Owerri North"],
                  ["name" => "Owerri West"]
                ],
            ],
            ["Jigawa State"=> [
                  ["name" => "Auyo"],
                  ["name" => "Babura"],
                  ["name" => "Birni Kudu"],
                  ["name" => "Biriniwa"],
                  ["name" => "Buji"],
                  ["name" => "Dutse"],
                  ["name" => "Gagarawa"],
                  ["name" => "Garki"],
                  ["name" => "Gumel"],
                  ["name" => "Guri"],
                  ["name" => "Gwaram"],
                  ["name" => "Gwiwa"],
                  ["name" => "Hadejia"],
                  ["name" => "Jahun"],
                  ["name" => "Kafin Hausa"],
                  ["name" => "Kaugama Kazaure"],
                  ["name" => "Kiri Kasamma"],
                  ["name" => "Kiyawa"],
                  ["name" => "Maigatari"],
                  ["name" => "Malam Madori"],
                  ["name" => "Miga"],
                  ["name" => "Ringim"],
                  ["name" => "Roni"],
                  ["name" => "Sule-Tankarkar"],
                  ["name" => "Taura"],
                  ["name" => "Yankwashi"]
                ],
            ],
            ["Kaduna State"=> [
                  ["name" => "Birni-Gwari"],
                  ["name" => "Chikun"],
                  ["name" => "Giwa"],
                  ["name" => "Igabi"],
                  ["name" => "Ikara"],
                  ["name" => "jaba"],
                  ["name" => "Jema'a"],
                  ["name" => "Kachia"],
                  ["name" => "Kaduna North"],
                  ["name" => "Kaduna South"],
                  ["name" => "Kagarko"],
                  ["name" => "Kajuru"],
                  ["name" => "Kaura"],
                  ["name" => "Kauru"],
                  ["name" => "Kubau"],
                  ["name" => "Kudan"],
                  ["name" => "Lere"],
                  ["name" => "Makarfi"],
                  ["name" => "Sabon-Gari"],
                  ["name" => "Sanga"],
                  ["name" => "Soba"],
                  ["name" => "Zango-Kataf"],
                  ["name" => "Zaria"]
                ],
            ],
            ["Kano State"=> [
                  ["name" => "Ajingi"],
                  ["name" => "Albasu"],
                  ["name" => "Bagwai"],
                  ["name" => "Bebeji"],
                  ["name" => "Bichi"],
                  ["name" => "Bunkure"],
                  ["name" => "Dala"],
                  ["name" => "Dambatta"],
                  ["name" => "Dawakin Kudu"],
                  ["name" => "Dawakin Tofa"],
                  ["name" => "Doguwa"],
                  ["name" => "Fagge"],
                  ["name" => "Gabasawa"],
                  ["name" => "Garko"],
                  ["name" => "Garum"],
                  ["name" => "Mallam"],
                  ["name" => "Gaya"],
                  ["name" => "Gezawa"],
                  ["name" => "Gwale"],
                  ["name" => "Gwarzo"],
                  ["name" => "Kabo"],
                  ["name" => "Kano Municipal"],
                  ["name" => "Karaye"],
                  ["name" => "Kibiya"],
                  ["name" => "Kiru"],
                  ["name" => "kumbotso"],
                  ["name" => "Kunchi"],
                  ["name" => "Kura"],
                  ["name" => "Madobi"],
                  ["name" => "Makoda"],
                  ["name" => "Minjibir"],
                  ["name" => "Nasarawa"],
                  ["name" => "Rano"],
                  ["name" => "Rimin Gado"],
                  ["name" => "Rogo"],
                  ["name" => "Shanono"],
                  ["name" => "Sumaila"],
                  ["name" => "Takali"],
                  ["name" => "Tarauni"],
                  ["name" => "Tofa"],
                  ["name" => "Tsanyawa"],
                  ["name" => "Tudun Wada"],
                  ["name" => "Ungogo"],
                  ["name" => "Warawa"],
                  ["name" => "Wudil"]
                ],
            ],
            ["Katsina State"=> [
                  ["name" => "Bakori"],
                  ["name" => "Batagarawa"],
                  ["name" => "Batsari"],
                  ["name" => "Baure"],
                  ["name" => "Bindawa"],
                  ["name" => "Charanchi"],
                  ["name" => "Dandume"],
                  ["name" => "Danja"],
                  ["name" => "Dan Musa"],
                  ["name" => "Daura"],
                  ["name" => "Dutsi"],
                  ["name" => "Dutsin-Ma"],
                  ["name" => "Faskari"],
                  ["name" => "Funtua"],
                  ["name" => "Ingawa"],
                  ["name" => "Jibia"],
                  ["name" => "Kafur"],
                  ["name" => "Kaita"],
                  ["name" => "Kankara"],
                  ["name" => "Kankia"],
                  ["name" => "Katsina"],
                  ["name" => "Kurfi"],
                  ["name" => "Kusada"],
                  ["name" => "Mai'Adua"],
                  ["name" => "Malumfashi"],
                  ["name" => "Mani"],
                  ["name" => "Mashi"],
                  ["name" => "Matazuu"],
                  ["name" => "Musawa"],
                  ["name" => "Rimi"],
                  ["name" => "Sabuwa"],
                  ["name" => "Safana"],
                  ["name" => "Sandamu"],
                  ["name" => "Zango"]
                ],
            ],
            ["Kebbi State"=> [
                  ["name" => "Aleiro"],
                  ["name" => "Arewa-Dandi"],
                  ["name" => "Argungu"],
                  ["name" => "Augie"],
                  ["name" => "Bagudo"],
                  ["name" => "Birnin Kebbi"],
                  ["name" => "Bunza"],
                  ["name" => "Dandi"],
                  ["name" => "Fakai"],
                  ["name" => "Gwandu"],
                  ["name" => "Jega"],
                  ["name" => "Kalgo"],
                  ["name" => "Koko/Besse"],
                  ["name" => "Maiyama"],
                  ["name" => "Ngaski"],
                  ["name" => "Sakaba"],
                  ["name" => "Shanga"],
                  ["name" => "Suru"],
                  ["name" => "Wasagu/Danko"],
                  ["name" => "Yauri"],
                  ["name" => "Zuru"]
                ],
            ],
            ["Kogi State"=> [
                  ["name" => "Adavi"],
                  ["name" => "Ajaokuta"],
                  ["name" => "Ankpa"],
                  ["name" => "Bassa"],
                  ["name" => "Dekina"],
                  ["name" => "Ibaji"],
                  ["name" => "Idah"],
                  ["name" => "Igalamela-Odolu"],
                  ["name" => "Ijumu"],
                  ["name" => "Kabba/Bunu"],
                  ["name" => "Kogi"],
                  ["name" => "Lokoja"],
                  ["name" => "Mopa-Muro"],
                  ["name" => "Ofu"],
                  ["name" => "Ogori/Mangongo"],
                  ["name" => "Okehi"],
                  ["name" => "Okene"],
                  ["name" => "Olamabolo"],
                  ["name" => "Omala"],
                  ["name" => "Yagba East"],
                  ["name" => "Yagba West"]
                ],
            ],
            ["Kwara State"=> [
                  ["name" => "Asa"],
                  ["name" => "Baruten"],
                  ["name" => "Edu"],
                  ["name" => "Ekiti"],
                  ["name" => "Ifelodun"],
                  ["name" => "Ilorin East"],
                  ["name" => "Ilorin West"],
                  ["name" => "Irepodun"],
                  ["name" => "Isin"],
                  ["name" => "Kaiama"],
                  ["name" => "Moro"],
                  ["name" => "Offa"],
                  ["name" => "Oke-Ero"],
                  ["name" => "Oyun"],
                  ["name" => "Pategi"]
                ],
            ],
            ["Lagos State"=> [
                  ["name" => "Agege"],
                  ["name" => "Ajeromi-Ifelodun"],
                  ["name" => "Alimosho"],
                  ["name" => "Amuwo-Odofin"],
                  ["name" => "Apapa"],
                  ["name" => "Badagry"],
                  ["name" => "Epe"],
                  ["name" => "Eti-Osa"],
                  ["name" => "Ibeju/Lekki"],
                  ["name" => "Ifako-Ijaye"],
                  ["name" => "Ikeja"],
                  ["name" => "Ikorodu"],
                  ["name" => "Kosofe"],
                  ["name" => "Lagos Island"],
                  ["name" => "Lagos Mainland"],
                  ["name" => "Mushin"],
                  ["name" => "Ojo"],
                  ["name" => "Oshodi-Isolo"],
                  ["name" => "Shomolu"],
                  ["name" => "Surulere"]
                ],
            ],
            ["Nasarawa State"=> [
                  ["name" => "Akwanga"],
                  ["name" => "Awe"],
                  ["name" => "Doma"],
                  ["name" => "Karu"],
                  ["name" => "Keana"],
                  ["name" => "Keffi"],
                  ["name" => "Kokona"],
                  ["name" => "Lafia"],
                  ["name" => "Nasarawa"],
                  ["name" => "Nasarawa-Eggon"],
                  ["name" => "Obi"],
                  ["name" => "Toto"],
                  ["name" => "Wamba"]
                ],
            ],
            ["Niger State"=> [
                  ["name" => "Agaie"],
                  ["name" => "Agwara"],
                  ["name" => "Bida"],
                  ["name" => "Borgu"],
                  ["name" => "Bosso"],
                  ["name" => "Chanchaga"],
                  ["name" => "Edati"],
                  ["name" => "Gbako"],
                  ["name" => "Gurara"],
                  ["name" => "Katcha"],
                  ["name" => "Kontagora"],
                  ["name" => "Lapai"],
                  ["name" => "Lavun"],
                  ["name" => "Magama"],
                  ["name" => "Mariga"],
                  ["name" => "Mashegu"],
                  ["name" => "Mokwa"],
                  ["name" => "Muya"],
                  ["name" => "Pailoro"],
                  ["name" => "Rafi"],
                  ["name" => "Rijau"],
                  ["name" => "Shiroro"],
                  ["name" => "Suleja"],
                  ["name" => "Tafa"],
                  ["name" => "Wushishi"]
                ],
            ],
            ["Ogun State"=> [
                  ["name" => "Abeokuta North"],
                  ["name" => "Abeokuta South"],
                  ["name" => "Ado-Odo/Ota"],
                  ["name" => "Egbado North"],
                  ["name" => "Egbado South"],
                  ["name" => "Ewekoro"],
                  ["name" => "Ifo"],
                  ["name" => "Ijebu East"],
                  ["name" => "Ijebu North"],
                  ["name" => "Ijebu North East"],
                  ["name" => "Ijebu Ode"],
                  ["name" => "Ikenne"],
                  ["name" => "Imeko-Afon"],
                  ["name" => "Ipokia"],
                  ["name" => "Obafemi-Owode"],
                  ["name" => "Ogun Waterside"],
                  ["name" => "Odeda"],
                  ["name" => "Odogbolu"],
                  ["name" => "Remo North"],
                  ["name" => "Shagamu"]
                ],
            ],
            ["Ondo State"=> [
                  ["name" => "Akoko North East"],
                  ["name" => "Akoko North West"],
                  ["name" => "Akoko South Akure East"],
                  ["name" => "Akoko South West"],
                  ["name" => "Akure North"],
                  ["name" => "Akure South"],
                  ["name" => "Ese-Odo"],
                  ["name" => "Idanre"],
                  ["name" => "Ifedore"],
                  ["name" => "Ilaje"],
                  ["name" => "Ile-Oluji"],
                  ["name" => "Okeigbo"],
                  ["name" => "Irele"],
                  ["name" => "Odigbo"],
                  ["name" => "Okitipupa"],
                  ["name" => "Ondo East"],
                  ["name" => "Ondo West"],
                  ["name" => "Ose"],
                  ["name" => "Owo"]
                ],
            ],
            ["Osun State"=> [
                  ["name" => "Aiyedade"],
                  ["name" => "Aiyedire"],
                  ["name" => "Atakumosa East"],
                  ["name" => "Atakumosa West"],
                  ["name" => "Boluwaduro"],
                  ["name" => "Boripe"],
                  ["name" => "Ede North"],
                  ["name" => "Ede South"],
                  ["name" => "Egbedore"],
                  ["name" => "Ejigbo"],
                  ["name" => "Ife Central"],
                  ["name" => "Ife East"],
                  ["name" => "Ife North"],
                  ["name" => "Ife South"],
                  ["name" => "Ifedayo"],
                  ["name" => "Ifelodun"],
                  ["name" => "Ila"],
                  ["name" => "Ilesha East"],
                  ["name" => "Ilesha West"],
                  ["name" => "Irepodun"],
                  ["name" => "Irewole"],
                  ["name" => "Isokan"],
                  ["name" => "Iwo"],
                  ["name" => "Obokun"],
                  ["name" => "Odo-Otin"],
                  ["name" => "Ola-Oluwa"],
                  ["name" => "Olorunda"],
                  ["name" => "Oriade"],
                  ["name" => "Orolu"],
                  ["name" => "Osogbo"]
                ],
            ],
            ["Oyo State"=> [
                  ["name" => "Afijio"],
                  ["name" => "Akinyele"],
                  ["name" => "Atiba"],
                  ["name" => "Atigbo"],
                  ["name" => "Egbeda"],
                  ["name" => "Ibadan Central"],
                  ["name" => "Ibadan North"],
                  ["name" => "Ibadan North West"],
                  ["name" => "Ibadan South East"],
                  ["name" => "Ibadan South West"],
                  ["name" => "Ibarapa Central"],
                  ["name" => "Ibarapa East"],
                  ["name" => "Ibarapa North"],
                  ["name" => "Ido"],
                  ["name" => "Irepo"],
                  ["name" => "Iseyin"],
                  ["name" => "Itesiwaju"],
                  ["name" => "Iwajowa"],
                  ["name" => "Kajola"],
                  ["name" => "Lagelu Ogbomosho North"],
                  ["name" => "Ogbomosho South"],
                  ["name" => "Ogo Oluwa"],
                  ["name" => "Olorunsogo"],
                  ["name" => "Oluyole"],
                  ["name" => "Ona-Ara"],
                  ["name" => "Orelope"],
                  ["name" => "Ori Ire"],
                  ["name" => "Oyo East"],
                  ["name" => "Oyo West"],
                  ["name" => "Saki East"],
                  ["name" => "Saki West"],
                  ["name" => "Surulere"]
                ],
            ],
            ["Plateau State"=> [
                  ["name" => "Barikin Ladi"],
                  ["name" => "Bassa"],
                  ["name" => "Bokkos"],
                  ["name" => "Jos East"],
                  ["name" => "Jos North"],
                  ["name" => "Jos South"],
                  ["name" => "Kanam"],
                  ["name" => "Kanke"],
                  ["name" => "Langtang North"],
                  ["name" => "Langtang South"],
                  ["name" => "Mangu"],
                  ["name" => "Mikang"],
                  ["name" => "Pankshin"],
                  ["name" => "Qua'an Pan"],
                  ["name" => "Riyom"],
                  ["name" => "Shendam"],
                  ["name" => "Wase"]
                ],
            ],
            ["Rivers State"=> [
                  ["name" => "Abua/Odual"],
                  ["name" => "Ahoada East"],
                  ["name" => "Ahoada West"],
                  ["name" => "Akuku Toru"],
                  ["name" => "Andoni"],
                  ["name" => "Asari-Toru"],
                  ["name" => "Bonny"],
                  ["name" => "Degema"],
                  ["name" => "Emohua"],
                  ["name" => "Eleme"],
                  ["name" => "Etche"],
                  ["name" => "Gokana"],
                  ["name" => "Ikwerre"],
                  ["name" => "Khana"],
                  ["name" => "Obia/Akpor"],
                  ["name" => "Ogba/Egbema/Ndoni"],
                  ["name" => "Ogu/Bolo"],
                  ["name" => "Okrika"],
                  ["name" => "Omumma"],
                  ["name" => "Opobo/Nkoro"],
                  ["name" => "Oyigbo"],
                  ["name" => "Port-Harcourt"],
                  ["name" => "Tai"]
                ],
            ],
            ["Sokoto State"=> [
                  ["name" => "Binji"],
                  ["name" => "Bodinga"],
                  ["name" => "Dange-shnsi"],
                  ["name" => "Gada"],
                  ["name" => "Goronyo"],
                  ["name" => "Gudu"],
                  ["name" => "Gawabawa"],
                  ["name" => "Illela"],
                  ["name" => "Isa"],
                  ["name" => "Kware"],
                  ["name" => "kebbe"],
                  ["name" => "Rabah"],
                  ["name" => "Sabon birni"],
                  ["name" => "Shagari"],
                  ["name" => "Silame"],
                  ["name" => "Sokoto North"],
                  ["name" => "Sokoto South"],
                  ["name" => "Tambuwal"],
                  ["name" => "Tqngaza"],
                  ["name" => "Tureta"],
                  ["name" => "Wamako"],
                  ["name" => "Wurno"],
                  ["name" => "Yabo"]
                ],
            ],
            ["Taraba State"=> [
                  ["name" => "Ardo-kola"],
                  ["name" => "Bali"],
                  ["name" => "Donga"],
                  ["name" => "Gashaka"],
                  ["name" => "Cassol"],
                  ["name" => "Ibi"],
                  ["name" => "Jalingo"],
                  ["name" => "Karin-Lamido"],
                  ["name" => "Kurmi"],
                  ["name" => "Lau"],
                  ["name" => "Sardauna"],
                  ["name" => "Takum"],
                  ["name" => "Ussa"],
                  ["name" => "Wukari"],
                  ["name" => "Yorro"],
                  ["name" => "Zing"]
                ],
            ],
            ["Yobe State"=> [
                  ["name" => "Bade"],
                  ["name" => "Bursari"],
                  ["name" => "Damaturu"],
                  ["name" => "Fika"],
                  ["name" => "Fune"],
                  ["name" => "Geidam"],
                  ["name" => "Gujba"],
                  ["name" => "Gulani"],
                  ["name" => "Jakusko"],
                  ["name" => "Karasuwa"],
                  ["name" => "Karawa"],
                  ["name" => "Machina"],
                  ["name" => "Nangere"],
                  ["name" => "Nguru Potiskum"],
                  ["name" => "Tarmua"],
                  ["name" => "Yunusari"],
                  ["name" => "Yusufari"]
                ],
            ],
            ["Zamfara State"=> [
                  ["name" => "Anka"],
                  ["name" => "Bakura"],
                  ["name" => "Birnin Magaji"],
                  ["name" => "Bukkuyum"],
                  ["name" => "Bungudu"],
                  ["name" => "Gummi"],
                  ["name" => "Gusau"],
                  ["name" => "Kaura"],
                  ["name" => "Namoda"],
                  ["name" => "Maradun"],
                  ["name" => "Maru"],
                  ["name" => "Shinkafi"],
                  ["name" => "Talata Mafara"],
                  ["name" => "Tsafe"],
                  ["name" => "Zurmi"]
                ]
            ]
            ];
            

        foreach($city_list as $country => $states){
            $country_id = self::getCountryCode($country);
            foreach($states as $cities){
                foreach($cities as $state => $city){
                    $state_id = self::getStateCode($state, $country_id);
                    
                    foreach($city as $cit){
                        $cit['state_id'] = $state_id;
                        // Log::error($cit);
                        City::updateOrCreate($cit);
                    }
                }

            }
        }
    }

    public static function getCountryCode($name){
        return Country::whereName($name)->first()->id;
    }

    public static function getStateCode($name, $country_id){
        return State::whereName($name)->whereCountryId($country_id)->first()->id;
    }
}

    