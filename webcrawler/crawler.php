<?php
require __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Smalot\PdfParser\Parser;


$api_key = 'YOUR SERPAPI KEY';
$countries = array(
    //Austria
    'at' => array(
        'title' => 'Austria',
        'term_en' => 'gender equality plan',
        'term' => 'Gleichstellungsplan',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Gleichstellungsplan',
            'Frauenförderungsplan',
            'Aktionsplan AND Gleichstellung',
            'Frauenförderplan',
            'Chancengleichheitsplan',
        ),
        'domains' => array(
        ),
        'google_country' => 'at',
        'google_language' => 'de'
    ),
    //Belgium - France
    'be_f' => array(
        'title' => 'Belgium - France',
        'term_en' => 'gender equality plan',
        'term' => 'Charte pour l’égalité de genre',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Charte pour l’égalité de genre',
            "plan d'action pour l'égalité",
            "plan d'action sur l'égalité",
            'plan égalité hommes-femmes',
            'Plan Egalité de Genre',
        ),
        'domains' => array(
        ),
        'google_country' => 'be',
        'google_language' => 'fr'
    ),
    //Belgium - Dutch
    'be_d' => array(
        'title' => 'Belgium - Dutch',
        'term_en' => 'gender equality plan',
        'term' => 'Gender gelijkheids plan',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Gender gelijkheids plan',
            'Gendergelijkheidsplan',
            'Gendergelijkheid en diversiteitsplan',
            'Diversiteit, Inclusie en Gender Equality Plan',
        ),
        'domains' => array(
        ),
        'google_country' => 'be',
        'google_language' => 'nl'
    ),
    //Bosnia and Herzegovina
    'ba' => array(
        'title' => 'Bosnia and Herzegovina',
        'term_en' => 'gender equality plan',
        'term' => 'Gender akcioni plan',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Plan rodne ravnopravnosti',
            'Акциони план за родну равноправност',
            'Gender akcijski plan',
            'Гендер акциони план',
            'Akcioni plan za rodnu ravnopravnost',
            'Akcijski plan za ravnopravnost spolova',
            'Акциони план родне равноправности',
            'Povelja o jednakosti žena i muškaraca',
            'Plan za rodnu ravnopravnost',
            'Akcioni plan rodne ravnopravnosti',
            'Rodni akcioni plan',
            'Povelja za ravnopravnost spolova',
        ),
        'domains' => array(
        ),
        'google_country' => 'ba',
        'google_language' => 'bs'
    ),
    //Bulgaria
    'bg' => array(
        'title' => 'Bulgaria',
        'term_en' => 'gender equality plan',
        'term' => 'План за равнопоставеност между половете',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'План за равнопоставеност между половете',
            'План за равенство между половете',
            'План на дейности за осигуряване равнопоставеност на половете',
            'План за насърчаване равенството между половете',
            'Харта за равнопоставеност между половете',
            'Харта за равенството между половете',
            'План за действие за равнопоставеност между половете',
            'План за действие за равенство между половете',
            'План за действие на половете',
        ),
        'domains' => array(
        ),
        'google_country' => 'bg',
        'google_language' => 'bg'
    ),
    //Croatia
    'hr' => array(
        'title' => 'Croatia',
        'term_en' => 'gender equality plan',
        'term' => 'Akcijski plan za rodnu ravnopravnost',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Akcijski plan za rodnu ravnopravnost',
            'Plan za ravnopravnost spolova',
            'Plan rodne ravnopravnosti',
            'Akcijski plan za ravnopravnost spolova',
            'Plan ravnopravnosti spolova',
            'Povelja za ravnopravnost žena i muškaraca',
            'Povelja o ravnopravnosti spolova',
            'Povelja za ravnopravnost spolova',
            'Povelja ravnopravnosti spolova',
            'Gender akcijski plan',
        ),
        'domains' => array(
        ),
        'google_country' => 'hr',
        'google_language' => 'hr'
    ),
    //Cyprus
    'cy' => array(
        'title' => 'Cyprus',
        'term_en' => 'gender equality plan',
        'term' => 'Σχέδιο Ισότητας των Φύλων',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Σχέδιο Ισότητας των Φύλων',
            'Σχέδιο δράσης για την ισότητα των φύλων',
            'Athena Swan',
            'Σχέδιο δράσης για την Έμφυλη Ισότητα',
            'Χάρτης για την Ισότητα των φύλων',
        ),
        'domains' => array(
        ),
        'google_country' => 'cy',
        'google_language' => 'el'
    ),
    //Czech Republic
    'cz' => array(
        'title' => 'Czech Republic',
        'term_en' => 'gender equality plan',
        'term' => 'Plán pro rovnost žen a mužů',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Plán pro rovnost žen a mužů',
            'Gender akční plán',
            'Akční plán pro rovnost žen a mužů',
            'Charta rovnosti žen a mužů',
            'Akční plán pro rovné odměňování žen a mužů',
            'Akční plán genderové rovnosti',
        ),
        'domains' => array(
        ),
        'google_country' => 'cz',
        'google_language' => 'cs'
    ),
    //Denmark
    'dk' => array(
        'title' => 'Denmark',
        'term_en' => 'gender equality plan',
        'term' => 'Ligestillingsplan',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Ligestillingsplan',
            'Handleplan for ligestilling, diversitet og inklusion',
            'Handleplan for ligestilling og diversitet',
            'Action plan for gender equality',
            'Action plan for equality',
        ),
        'domains' => array(
        ),
        'google_country' => 'dk',
        'google_language' => 'da'
    ),
    //Estonia
    'ee' => array(
        'title' => 'Estonia',
        'term_en' => 'gender equality plan',
        'term' => 'soolise võrdõiguslikkuse plaan',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Soolise võrdõiguslikkuse kava',
            'soolise võrdõiguslikkuse tegevuskava',
            'soolise võrdõiguslikkuse plaan',
            'võrdse kohtlemise kava',
            'Soolise võrdõiguslikkuse põhimõtted ja tegevuskava',
        ),
        'domains' => array(
        ),
        'google_country' => 'ee',
        'google_language' => 'et'
    ),
    //Finland
    'fi' => array(
        'title' => 'Finland',
        'term_en' => 'gender equality plan',
        'term' => 'Tasa-arvosuunnitelma',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Tasa-arvosuunnitelma',
            'Tasa-arvo- ja yhdenvertaisuussuunnitelma',
            'Tasa-arvo-suunnitelma',
            'Sukupuolten tasa-arvon edistämisen toimintasuunnitelma',
        ),
        'domains' => array(
        ),
        'google_country' => 'fi',
        'google_language' => 'fi'
    ),
    //France
    'fr' => array(
        'title' => 'France',
        'term_en' => 'gender equality plan',
        'term' => "plan d'action pour l'égalité",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "plan d'action pour l'égalité",
            "plan d'action sur l'égalité",
            "Plan d'action égalité femmes hommes",
            "plan d'égalité",
            "plan d'action relatifs à l'égalité",
            "Plan pour l'égalité",
            "Charte pour l'égalité",
        ),
        'domains' => array(
        ),
        'google_country' => 'fr',
        'google_language' => 'fr'
    ),
    //Germany
    'de' => array(
        'title' => 'Germany',
        'term_en' => 'gender equality plan',
        'term' => 'Gleichstellungsplan',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Gleichstellungskonzept',
            'Gleichstellungsplan',
            'Frauenförderplan',
            'Rahmenplan AND Gleichstellung',
            'Rahmenplan AND Chancengleichheit',
            'Chancengleichheitsplan',
            'Gleichstellungsstrategie',
            'Aktionsplan AND Gleichstellung',
        ),
        'domains' => array(
        ),
        'google_country' => 'de',
        'google_language' => 'de'
    ),
    //Greece
    'gr' => array(
        'title' => 'Greece',
        'term_en' => 'gender equality plan',
        'term' => 'Σχέδιο για την ισότητα των φύλων',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Σχέδιο για την ισότητα των φύλων',
            'Σχέδιο Δράσης για την Ισότητα των Φύλων',
            'Σχέδιο Δράσης για την Έμφυλη Ισότητα',
            'Σχεδίου Δράσης για την Έμφυλη Ισότητα',
        ),
        'domains' => array(
        ),
        'google_country' => 'gr',
        'google_language' => 'el'
    ),
    //Hungary
    'hu' => array(
        'title' => 'Hungary',
        'term_en' => 'gender equality plan',
        'term' => 'Nemek közötti egyenlőségi terv',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Nemek közötti egyenlőségi terv',
            'Nemi egyenlőségi terv',
            'Nemi esélyegyenlőségi terv',
            'A nemek közötti egyenlőség cselekvési terve',
            'Nemek közötti egyenlőséget támogató terv',
        ),
        'domains' => array(
        ),
        'google_country' => 'hu',
        'google_language' => 'hu'
    ),
    //Ireland
    'ie' => array(
        'title' => 'Ireland',
        'term_en' => 'gender equality plan',
        'term' => 'Gender Equality Plan',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Athena SWAN',
            'Gender equality charter',
        ),
        'domains' => array(
        ),
        'google_country' => 'ie',
        'google_language' => 'en' //'ga'
    ),
    //Israel
    'il' => array(
        'title' => 'Israel',
        'term_en' => 'gender equality plan',
        'term' => "תוכנית שוויון מגדרי",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "תוכנית שוויון מגדרי",
            "תכנית פעולה לשיוויון מגדרי",
            "תוכנית פעולה לשוויון בין המינים",
            "תכנית להטמעת שוויון מגדרי",
            "קידום שיוויון מגדרי",
        ),
        'domains' => array(
        ),
        'google_country' => 'il',
        'google_language' => 'iw'
    ),
    //Italy
    'it' => array(
        'title' => 'Italy',
        'term_en' => 'gender equality plan',
        'term' => "Il piano di parità di genere",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Il piano di parità di genere",
            "Piano di azione di genere",
            "Piano d’azione per l’uguaglianza di genere",
            "Carta dell’uguaglianza di genere",
            "Piano per l'uguaglianza di Genere",
        ),
        'domains' => array(
        ),
        'google_country' => 'it',
        'google_language' => 'it'
    ),
    //Latvia
    'lv' => array(
        'title' => 'Latvia',
        'term_en' => 'gender equality plan',
        'term' => "Dzimumu līdztiesības plāns",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Dzimumu līdztiesības plāns",
            "Dzimumu līdztiesības rīcības plāns",
            "Dzimumu līdztiesības pamatprincipi un plāns",
            "Dzimumu līdztiesības īstenošanas plāns",
            "Dzimumu līdztiesības pamatprincipu īstenošanas plāns",
            "Dzimumu līdztiesības harta",
        ),
        'domains' => array(
        ),
        'google_country' => 'lv',
        'google_language' => 'lv'
    ),
    //Lithuania
    'lt' => array(
        'title' => 'Lithuania',
        'term_en' => 'gender equality plan',
        'term' => "Lyčių lygybės planas",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Lyčių lygybės planas",
            "Lyčių lygybės veiksmų planas",
            "Moterų ir vyrų lygių galimybių veiksmų plano",
            "Lyčių lygybės ir įvairovės politika",
        ),
        'domains' => array(
        ),
        'google_country' => 'lt',
        'google_language' => 'lt'
    ),
    //Luxembourg
    'lu' => array(
        'title' => 'Luxembourg',
        'term_en' => 'gender equality plan',
        'term' => "Gleichstellungsplan",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Gleichstellungsplan",
            "Frauenförderplan",
            "Chancengleichheitsplan",
            "Aktionsplan AND Gleichstellung",
            "Rahmenplan AND Gleichstellung",
            "Rahmenplan AND Chancengleichheit",
            "Gleichstellungskonzept",
            "Gleichstellungsstrategie",
        ),
        'domains' => array(
        ),
        'google_country' => 'lu',
        'google_language' => 'de'
    ),
    //Malta
    'mt' => array(
        'title' => 'Malta',
        'term_en' => 'gender equality plan',
        'term' => "Gender Equality Plan",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Gender Equality Plan",
            "Gender Action Plan",
            "Gender Equality Action Plan",
            "Gender equality charter",
        ),
        'domains' => array(
        ),
        'google_country' => 'mt',
        'google_language' => 'mt'
    ),
    //Netherlands
    'nl' => array(
        'title' => 'Netherlands',
        'term_en' => 'gender equality plan',
        'term' => "Gender gelijkheids plan",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Gender gelijkheids plan",
            "Gendergelijkheidsplan",
            "Gendergelijkheid en diversiteitsplan",
            "Diversiteit, Inclusie en Gender Equality Plan",
        ),
        'domains' => array(
        ),
        'google_country' => 'nl',
        'google_language' => 'nl'
    ),
    //Norway
    'no' => array(
        'title' => 'Norway',
        'term_en' => 'gender equality plan',
        'term' => "Handlingsplan for likestilling",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Handlingsplan for likestilling",
            "Handlingsplan for kjønns",
            "Handlingsplan for kjønnsmangfold",
        ),
        'domains' => array(
        ),
        'google_country' => 'no',
        'google_language' => 'no'
    ),
    //Poland
    'pl' => array(
        'title' => 'Poland',
        'term_en' => 'gender equality plan',
        'term' => "Plan równości płci",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Plan równości płci",
            "Plan na rzecz równości płci",
            "Plan równości",
            "Plan wdrażania polityki równości płci",
            "Plan równości szans",
            "Plan na rzecz równych szans",
            "Plan na rzecz równości kobiet i mężczyzn",
            "Plan działań na rzecz równości płci",
            "Plan Równości Szans Płci",
            "Program działań na rzecz równości płci",
            "Strategia na rzecz równości płci",
        ),
        'domains' => array(
        ),
        'google_country' => 'pl',
        'google_language' => 'pl'
    ),
    //Portugal
    'pt' => array(
        'title' => 'Portugal',
        'term_en' => 'gender equality plan',
        'term' => "Plano para a igualdade de género",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Plano para a igualdade de género",
            "Plano de Ação de Género",
            "Carta de Princípios para a Igualdade de Género",
            "Plano de Ação para a Igualdade de Oportunidades",
            "Estratégia para a Igualdade de Género",
            "Plano de Ação AND Igualdade de Género",
        ),
        'domains' => array(
        ),
        'google_country' => 'pt',
        'google_language' => 'pt'
    ),
    //Romania
    'ro' => array(
        'title' => 'Romania',
        'term_en' => 'gender equality plan',
        'term' => "Planul de egalitate de gen",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Planul de egalitate de gen",
            "Plan de egalitate de gen",
            "Planul de acțiune pentru egalitatea de gen",
            "Carta egalităţii de gen",
        ),
        'domains' => array(
        ),
        'google_country' => 'ro',
        'google_language' => 'ro'
    ),
    //Serbia
    'rs' => array(
        'title' => 'Serbia',
        'term_en' => 'gender equality plan',
        'term' => "Plan o rodnoj ravnopravnosti",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Plan o rodnoj ravnopravnosti",
            "Акциони план за родну равноправност",
            "План за постизање родне равноправности",
            "Акциони план родне равноправности",
            "План мера за остваривање и унапређење родне равноправности",
            "Plan mera za ostvarivanje i unapređenje rodne ravnopravnosti",
            "Akcioni plan za ostvarivanje rodne ravnopravnosti",
            "План за родну равноправност",
            "Akcioni plan za rodnu ravnopravnost",
            "Plan rodne ravnopravnosti",
            "Родни акциони план",
            "Evropska povelja o rodnoj ravnopravnosti",
            "Европска повеља о родној равноправности",
            "Povelja Atena Svon",
        ),
        'domains' => array(
        ),
        'google_country' => 'rs',
        'google_language' => 'sr'
    ),
    //Slovakia
    'sk' => array(
        'title' => 'Slovakia',
        'term_en' => 'gender equality plan',
        'term' => "Plán rodovej rovnosti",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Plán rodovej rovnosti",
            "Rodový akčný plán",
            "Akčný plán pre rodovú rovnosť",
            "Charta rodovej rovnosti",
            "Stratégia rodovej rovnosti",
            "Stratégia pre rodovú rovnosť",
        ),
        'domains' => array(
        ),
        'google_country' => 'sk',
        'google_language' => 'sk'
    ),
    //Slovenia
    'si' => array(
        'title' => 'Slovenia',
        'term_en' => 'gender equality plan',
        'term' => "Načrt za enakost spolov",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Načrt za enakost spolov",
            "Akcijski načrt za uveljavljanje enakosti spolov",
            "Načrt enakosti spolov",
            "Načrt za uveljavljanje enakosti spolov",
            "Akcijski načrt za enakost spolov",
            "Akcijski načrt vzpostavitve enakih možnosti glede na spol",
            "Listina o enakosti spolov",
        ),
        'domains' => array(
        ),
        'google_country' => 'si',
        'google_language' => 'sl'
    ),
    //Spain
    'es' => array(
        'title' => 'Spain',
        'term_en' => 'gender equality plan',
        'term' => "Plan de igualdad de género",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Plan de igualdad de género",
            "Plan de acción de género",
            "Plan para la igualdad entre mujeres y hombres",
        ),
        'domains' => array(
        ),
        'google_country' => 'es',
        'google_language' => 'es'
    ),
    //Sweden
    'se' => array(
        'title' => 'Sweden',
        'term_en' => 'gender equality plan',
        'term' => "jämställdhetsplan",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "jämställdhetsplan",
            "action plan for gender mainstreaming",
            "Handlingsplan för jämställdhetsintegrering",
            "Plan för jämställdhetsintegrering",
            "handlingsplan för jämställdhet",
            "Handlingsplan för jämställdhet mellan könen",
            "Handlingsplan för Lika villkor och jämställdhet",
            "jämställdhetsstadgan",
        ),
        'domains' => array(
        ),
        'google_country' => 'se',
        'google_language' => 'sv'
    ),
    //Switzerland - French
    'ch_f' => array(
        'title' => 'Switzerland - French',
        'term_en' => 'gender equality plan',
        'term' => "plan d'action pour l'égalité",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "plan d'action pour l'égalité",
            "plan d'action sur l'égalité",
            "Plan d'action égalité femmes hommes",
            "plan d'égalité",
            "plan d'action relatifs à l'égalité",
            "Plan pour l'égalité",
            "Charte pour l'égalité",
        ),
        'domains' => array(
        ),
        'google_country' => 'ch',
        'google_language' => 'fr'
    ),
    //Switzerland - German
    'ch_g' => array(
        'title' => 'Switzerland - German',
        'term_en' => 'gender equality plan',
        'term' => "Gleichstellungsplan",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Gleichstellungsplan",
            "Chancengleichheitsplan",
            "Aktionsplan AND Chancengleichheit",
            "Aktionsplan AND Gleichstellung",
            "Frauenförderplan",
        ),
        'domains' => array(
        ),
        'google_country' => 'ch',
        'google_language' => 'de'
    ),
    //Switzerland - Italian
    'ch_i' => array(
        'title' => 'Switzerland - Italian',
        'term_en' => 'gender equality plan',
        'term' => "Il piano di parità di genere",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Il piano di parità di genere",
            "Piano di azione di genere",
            "Piano d’azione per l’uguaglianza di genere",
            "Carta dell’uguaglianza di genere",
            "Piano per l'uguaglianza di Genere",
        ),
        'domains' => array(
        ),
        'google_country' => 'ch',
        'google_language' => 'it'
    ),
    //United Kingdom
    'uk' => array(
        'title' => 'United Kingdom',
        'term_en' => 'gender equality plan',
        'term' => "Gender Equality Plan",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            "Gender Equality Plan",
            "Gender Action Plan",
            "Gender Equality Action Plan",
            "Athena SWAN",
            "Gender equality charter",
        ),
        'domains' => array(
        ),
        'google_country' => 'uk',
        'google_language' => 'en'
    ),

);
$results = array();
$country = $search = '';

$pdf_terms = array(
    'ee' => array(
        'Gender Equality Plan',
        'GEP',
        'Action Plan',
        'Gender Equality Action Plan',
        'GEAP'
    ),
    'de' => array(
        'Gender Equality Plan',
        'GEP',
        'Action Plan',
        'Gender Equality Action Plan',
        'GEAP',
        'Gleichstellungs',
        'Rahmenplan'
    ),
    'ie' => array(
        'Gender Equality Plan',
        'GEP',
        'Action Plan',
        'Gender Equality Action Plan',
        'GEAP'
    ),
    'gr' => array(
        'Gender Equality Plan',
        'GEP',
        'Action Plan',
        'Gender Equality Action Plan',
        'GEAP',
        'ΣΧΕΔΙΟ ΙΣΟΤΗΤΑΣ',
        'ΣΧΕΔΙΟ ΔΡΑΣΗΣ'
    ),
);

foreach($countries as $key => $value) {
    $country = $key;
    $file = 'serpapi-' . strtoupper($key);
    $file_xlsx = './exports/' . $file . '.xlsx';
    $file_meta_xlsx = './exports/' . $file . '_meta.xlsx';
    $root_export_dir = './exports/PDFs/' . strtoupper($key) . '/';
    $root_gep_dir = './exports/GEPs/' . strtoupper($key) . '/';

    if ( !file_exists( $root_export_dir ) && !is_dir( $root_export_dir ) ) {
        mkdir( $root_export_dir );
    }
    if ( !file_exists( $root_gep_dir ) && !is_dir( $root_gep_dir ) ) {
        mkdir( $root_gep_dir );
    }

    $xls = [
        ['step', 'source', 'title', 'link', 'snippet', 'snippet_highlighted_words']
    ];
    $xls_meta = [
        ['step', 'link', 'file', 'title', 'author', 'subject', 'keywords']
    ];

    foreach($countries[$country]['domains'] as $domain) {
        $gep_found = false;
        $export_dir = $root_export_dir . $domain . '/';
        $gep_dir = $root_gep_dir . $domain . '/';
        if ( !file_exists( $export_dir ) && !is_dir( $export_dir ) ) {
            mkdir( $export_dir );
        }

        $str = '(site:' .$domain . ') filetype:pdf';

        if($key == 'ie') {
            $steps = array(
                /*
                '4' => array(
                    'hl' => 'en',
                    'terms' => $value['term_en']
                ),
                */
                '3' =>  array(
                    'hl' => $countries[$country]['google_language'],
                    'terms' => $value['term']
                ),
                /*
                '2' =>  array(
                    'hl' => 'en',
                    'terms' => $value['terms_en']
                ),
                */
                '1' =>  array(
                    'hl' => $countries[$country]['google_language'],
                    'terms' => $value['terms']
                )
            );
        }
        elseif($key == 'gr' || $key == 'de') {
            $steps = array(
                '4' => array(
                    'hl' => 'en',
                    'terms' => $value['term_en']
                ),
                '3' =>  array(
                    'hl' => $countries[$country]['google_language'],
                    'terms' => $value['term']
                ),
                '2' =>  array(
                    'hl' => 'en',
                    'terms' => $value['terms_en']
                ),
                '1' =>  array(
                    'hl' => $countries[$country]['google_language'],
                    'terms' => $value['terms']
                )
            );
        }
        else {
            $steps = array(
                '4' => array(
                    'hl' => 'en',
                    'terms' => $value['term_en']
                ),
                /*
                '3' =>  array(
                    'hl' => $countries[$country]['google_language'],
                    'terms' => $value['term']
                ),
                */
                '2' =>  array(
                    'hl' => 'en',
                    'terms' => $value['terms_en']
                ),
                /*
                '1' =>  array(
                    'hl' => $countries[$country]['google_language'],
                    'terms' => $value['terms']
                )
                */
            );
        }

        foreach($steps as $step_key => $step_value) {
            $index = array_search($step_key, array_keys($steps));
            ${'go_step_'. $step_key } = true; //( $index === 0 ? true: false);
        }

        foreach($steps as $step_key => $step_value) {
            if ( ${'go_step_'. $step_key }) {

                $_str = ' ' . query_terms($step_value['terms']);
                $query = [
                    'q' => $str . $_str,
                    'engine' => 'google',
                    //'google_domain' => 'google.com',
                    'num' => 10,
                    'location' => $countries[$country]['title'],
                    'gl' => $countries[$country]['google_country'],
                    'hl' => $step_value['hl'],
                    //"hl" => $countries[$country]['google_language'],
                    'async' => 'false',
                ];

                $client = new GoogleSearchResults($api_key);
                $results = $client->get_json($query);
                $total_results = 0;
                $files = array( );

                if (isset($results->organic_results) && count($results->organic_results) &&
                    isset($results->search_information->organic_results_state) &&
                    ($results->search_information->organic_results_state == 'Results for exact spelling')) {

                    $total_results = isset($results->search_information->total_results) ? $results->search_information->total_results : 0;

                    foreach ($results->organic_results as $result) {
                        $xls[] = [$step_key, $result->source, $result->title, $result->link, (isset($result->snippet) ? $result->snippet : ''), (isset
                        ($result->snippet_highlighted_words) ? implode("|", $result->snippet_highlighted_words) : '')];

                        $files[] = array(
                            'file' => rawurldecode($result->link),
                            'step' => $step_key
                        );
                    }
                }

                if($total_results == 0) {
                    if (isset($results->organic_results) && count($results->organic_results) &&
                        isset($results->search_information->organic_results_state) &&
                        ($results->search_information->organic_results_state == 'Empty showing fixed spelling results')) {

                        $total_results = isset($results->search_information->total_results) ? $results->search_information->total_results : 0;

                        foreach ($results->organic_results as $result) {
                            $xls[] = [$step_key, $result->source, $result->title, $result->link, (isset($result->snippet) ? $result->snippet : ''), (isset
                            ($result->snippet_highlighted_words) ? implode("|", $result->snippet_highlighted_words) : '')];

                            $files[] = array(
                                'file' => rawurldecode($result->link),
                                'step' => $step_key
                            );
                        }
                    }
                }

                $url_request = chr(10) . 'https://www.google.com/search?' . http_build_query($query) . ' | ' . $total_results . ' results' . chr(10);
                $file_requests = './exports/requests.txt';

                file_put_contents($file_requests, $url_request, FILE_APPEND);

                if(is_array($files) && count($files)) {
                    foreach($files as $file_val) {
                        $file = $file_val['file'];
                        if ($rfile = isPdf($file)) {
                            $filename = '';

                            $parts = parse_url($rfile);
                            $pathInfo = pathinfo($parts['path']);
                            $filename = $pathInfo['basename'];

                            // Check if the basename has a PDF extension
                            if(strtolower(mb_substr($filename, -3, 3)) !== 'pdf' && !empty($filename)) {
                                $filename .= '.pdf';
                            }

                            if(!empty($filename)) {
                                $filename = time() . '-' . $filename;

                                // Initialize cURL session
                                $ch = curl_init($rfile);

                                // Set cURL options
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                                // Execute cURL session and get the HTML content
                                $file_content = curl_exec($ch);

                                // Close cURL session
                                curl_close($ch);

                                if($file_content) {
                                    if(file_exists($export_dir . urldecode(urldecode($filename)))) {
                                        $filename = time() . '-' . $filename;
                                    }
                                    file_put_contents($export_dir . urldecode(urldecode($filename)), $file_content);

                                    file_put_contents($file_requests, 'success file - ' .  urldecode(urldecode($filename)) . chr(10), FILE_APPEND);

                                    // check filename for terms
                                    foreach($pdf_terms as $pdf_key_term => $pdf_key_val) {
                                        if($pdf_key_term == $key) {
                                            foreach ($pdf_key_val as $term) {
                                                $_tmp = explode(" ", $term);
                                                if (preg_match("/(.*)" . implode("(.*)", $_tmp) . "(.*)/i", urldecode(urldecode($filename)))) {
                                                    //move file to GEP
                                                    if (!file_exists($gep_dir) && !is_dir($gep_dir)) {
                                                        mkdir($gep_dir);
                                                    }
                                                    copy($export_dir . urldecode(urldecode($filename)), $gep_dir . urldecode(urldecode($filename)));
                                                    $gep_found = true;

                                                    break;
                                                }
                                            }
                                        }
                                    }

                                    if($gep_found)
                                        break;


                                    // check 1st page for terms with TCPDF/Fpdi
                                    try {
                                        $pdf = new TCPDF();
                                        $fpdi = new \setasign\Fpdi\Tcpdf\Fpdi();
                                        $pdf->AddPage();
                                        $pages = $fpdi->setSourceFile($export_dir . urldecode(urldecode($filename)));
                                        $pageId = $fpdi->importPage(1);
                                        $fpdi->useTemplate($pageId);
                                        $pdf_page = $pdf->Output('', 'S');

                                        foreach($pdf_terms as $pdf_key_term => $pdf_key_val) {
                                            if($pdf_key_term == $key) {
                                                foreach ($pdf_key_val as $term) {
                                                    $_tmp = explode(" ", $term);
                                                    if (preg_match("/(.*)" . implode("(.*)", $_tmp) . "(.*)/i", urldecode(urldecode($pdf_page)))) {
                                                        //move file to GEP
                                                        if (!file_exists($gep_dir) && !is_dir($gep_dir)) {
                                                            mkdir($gep_dir);
                                                        }
                                                        copy($export_dir . urldecode(urldecode($filename)), $gep_dir . urldecode(urldecode($filename)));
                                                        $gep_found = true;

                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                    } catch (Exception $e) {
                                        echo chr(10)."Error on reading 1st pdf page: " .  urldecode(urldecode($filename)) . " : " . $e->getMessage();
                                    }

                                    if($gep_found)
                                        break;


                                    // check 1st page for terms with mutools
                                    try {
                                        // Use mutool to extract text from the first page
                                        $command = "mutool draw -F text -o - \"".$export_dir . urldecode(urldecode($filename))."\" 1";
                                        $pdf_page = shell_exec($command);

                                        foreach($pdf_terms as $pdf_key_term => $pdf_key_val) {
                                            if($pdf_key_term == $key) {
                                                foreach ($pdf_key_val as $term) {
                                                    $_tmp = explode(" ", $term);
                                                    if (preg_match("/(.*)" . implode("(.*)", $_tmp) . "(.*)/i", urldecode(urldecode($pdf_page)))) {
                                                        //move file to GEP
                                                        if (!file_exists($gep_dir) && !is_dir($gep_dir)) {
                                                            mkdir($gep_dir);
                                                        }
                                                        copy($export_dir . urldecode(urldecode($filename)), $gep_dir . urldecode(urldecode($filename)));
                                                        $gep_found = true;

                                                        break;
                                                    }
                                                }
                                            }
                                        }
                                    } catch (Exception $e) {
                                        echo chr(10)."Error on reading 1st pdf page: " .  urldecode(urldecode($filename)) . " : " . $e->getMessage();
                                    }

                                    if($gep_found)
                                        break;


                                    $meta_data = getPDFMetaData($export_dir . urldecode(urldecode($filename)));
                                    array_unshift($meta_data , $file_val['file']);
                                    array_unshift($meta_data , $file_val['step']);
                                    $xls_meta[] = $meta_data;
                                }
                                else {
                                    file_put_contents($file_requests, 'error getting - ' . $rfile . chr(10), FILE_APPEND);
                                }
                            }
                            else
                                file_put_contents($file_requests, 'error parsing - ' . $rfile . chr(10), FILE_APPEND);
                        }
                        else { //we assume it's a page that includes links to pdfs
                            file_put_contents($file_requests, 'file not recognised as direct pdf - ' . $file . chr(10), FILE_APPEND);

                            $links = getLinksFromPage($file);

                            foreach ($links as $link) {
                                if($rlink = isPdf($link)) {
                                    $filename = '';
                                    $parts = parse_url($rlink);
                                    // Separate the path and filename
                                    $pathInfo = pathinfo($parts['path']);
                                    // get only the filename
                                    $filename = $pathInfo['basename'];

                                    // Check if the basename has a PDF extension
                                    if(strtolower(mb_substr($filename, -3, 3)) !== 'pdf' && !empty($filename)) {
                                        $filename .= '.pdf';
                                    }

                                    if(!empty($filename)) {
                                        $filename = time() . '-' . $filename;

                                        // Initialize cURL session
                                        $ch = curl_init($rlink);

                                        // Set cURL options
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                                        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

                                        // Execute cURL session and get the HTML content
                                        $file_content = curl_exec($ch);

                                        // Close cURL session
                                        curl_close($ch);

                                        if($file_content) {
                                            if(file_exists($export_dir . urldecode(urldecode($filename)))) {
                                                $filename = time() . '-' . $filename;
                                            }
                                            file_put_contents($export_dir . urldecode(urldecode($filename)), $file_content);

                                            file_put_contents($file_requests, 'success file - ' .  urldecode(urldecode($filename)) . chr(10), FILE_APPEND);

                                            // check filename for terms
                                            foreach($pdf_terms as $pdf_key_term => $pdf_key_val) {
                                                if($pdf_key_term == $key) {
                                                    foreach ($pdf_key_val as $term) {
                                                        $_tmp = explode(" ", $term);
                                                        if (preg_match("/(.*)" . implode("(.*)", $_tmp) . "(.*)/i", urldecode(urldecode($filename)))) {
                                                            //move file to GEP
                                                            if (!file_exists($gep_dir) && !is_dir($gep_dir)) {
                                                                mkdir($gep_dir);
                                                            }
                                                            copy($export_dir . urldecode(urldecode($filename)), $gep_dir . urldecode(urldecode($filename)));
                                                            $gep_found = true;

                                                            break;
                                                        }
                                                    }
                                                }
                                            }

                                            if($gep_found)
                                                break;

                                            // check 1st page for terms with TCPDF/Fpdi
                                            try {
                                                $pdf = new TCPDF();
                                                $fpdi = new \setasign\Fpdi\Tcpdf\Fpdi();
                                                $pdf->AddPage();
                                                $pages = $fpdi->setSourceFile($export_dir . urldecode(urldecode($filename)));
                                                $pageId = $fpdi->importPage(1);
                                                $fpdi->useTemplate($pageId);
                                                $pdf_page = $pdf->Output('', 'S');

                                                foreach($pdf_terms as $pdf_key_term => $pdf_key_val) {
                                                    if($pdf_key_term == $key) {
                                                        foreach ($pdf_key_val as $term) {
                                                            $_tmp = explode(" ", $term);
                                                            if (preg_match("/(.*)" . implode("(.*)", $_tmp) . "(.*)/i", urldecode(urldecode($pdf_page)))) {
                                                                //move file to GEP
                                                                if (!file_exists($gep_dir) && !is_dir($gep_dir)) {
                                                                    mkdir($gep_dir);
                                                                }
                                                                copy($export_dir . urldecode(urldecode($filename)), $gep_dir . urldecode(urldecode($filename)));
                                                                $gep_found = true;

                                                                break;
                                                            }
                                                        }
                                                    }
                                                }
                                            } catch (Exception $e) {
                                                echo chr(10)."Error on reading 1st pdf page: " .  urldecode(urldecode($filename)) . " : " . $e->getMessage();
                                            }

                                            if($gep_found)
                                                break;


                                            // check 1st page for terms wit mutools
                                            try {
                                                $command = "mutool draw -F text -o - \"".$export_dir . urldecode(urldecode($filename))."\" 1";
                                                $pdf_page = shell_exec($command);

                                                foreach($pdf_terms as $pdf_key_term => $pdf_key_val) {
                                                    if($pdf_key_term == $key) {
                                                        foreach ($pdf_key_val as $term) {
                                                            $_tmp = explode(" ", $term);
                                                            if (preg_match("/(.*)" . implode("(.*)", $_tmp) . "(.*)/i", urldecode(urldecode($pdf_page)))) {
                                                                //move file to GEP
                                                                if (!file_exists($gep_dir) && !is_dir($gep_dir)) {
                                                                    mkdir($gep_dir);
                                                                }
                                                                copy($export_dir . urldecode(urldecode($filename)), $gep_dir . urldecode(urldecode($filename)));
                                                                $gep_found = true;

                                                                break;
                                                            }
                                                        }
                                                    }
                                                }
                                            } catch (Exception $e) {
                                                echo chr(10)."Error on reading 1st pdf page: " .  urldecode(urldecode($filename)) . " : " . $e->getMessage();
                                            }

                                            if($gep_found)
                                                break;

                                            $meta_data = getPDFMetaData($export_dir . urldecode(urldecode($filename)));
                                            array_unshift($meta_data , $file_val['file']);
                                            array_unshift($meta_data , $file_val['step']);
                                            $xls_meta[] = $meta_data;
                                        }
                                        else {
                                            file_put_contents($file_requests, 'error getting - ' . $rlink . chr(10), FILE_APPEND);
                                        }
                                    }
                                    else
                                        file_put_contents($file_requests, 'error parsing - ' . $rlink . chr(10), FILE_APPEND);
                                }
                                else {
                                    file_put_contents($file_requests, 'link not recognised as pdf - ' . $link . chr(10), FILE_APPEND);
                                }

                                if($gep_found)
                                    break;
                            }
                        }

                        if($gep_found)
                            break;
                    }
                }

            }

            if($gep_found)
                break;
        }

    }

    $spreadsheet = new Spreadsheet();
    $activeWorksheet = $spreadsheet->getActiveSheet();
    $activeWorksheet->fromArray($xls);
    $writer = new Xlsx($spreadsheet);
    $writer->save($file_xlsx);


    $spreadsheet = new Spreadsheet();
    $activeWorksheet = $spreadsheet->getActiveSheet();
    $activeWorksheet->fromArray($xls_meta);
    $writer = new Xlsx($spreadsheet);
    $writer->save($file_meta_xlsx);
}

function query_terms($terms) {
    $_str = array();

    if(is_array($terms)){
        foreach ($terms as $val) {
            $_arr = explode(" AND ", $val);
            $_arr = array_map('trim', $_arr);

            if (is_array($_arr) && count($_arr) > 1)
                $_str[] = '("' . implode('" AND "', $_arr) . '")';
            else
                $_str[] = '"' . $val . '"';
        }

        $out = ' (' . implode(" OR ", $_str) . ')';
    }
    else {
        $out = '"' . $terms . '"';
    }

    return $out;
}

function isPdf($url) {
    $urlComponents = parse_url($url);

    // Separate the path and filename
    $pathInfo = pathinfo($urlComponents['path']);

    // Encode only the filename
    $encodedFilename = $pathInfo['basename'];

    if(strtolower(mb_substr($encodedFilename, -3, 3)) === 'pdf' && !empty($encodedFilename)) {
        // Reconstruct the URL
        $url = $urlComponents['scheme'] . '://' . $urlComponents['host'] . $pathInfo['dirname'] . '/' . rawurlencode($encodedFilename);

        // Add any remaining components (query, fragment, etc.)
        if (isset($urlComponents['query'])) {
            $url .= '?' . $urlComponents['query'];
        }
        if (isset($urlComponents['fragment'])) {
            $url .= '#' . $urlComponents['fragment'];
        }
    }

    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (X11; Linux i686; rv:109.0) Gecko/20100101 Firefox/121.0');
    curl_setopt($ch, CURLOPT_HEADER, true); // Include headers in the response
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute cURL session and get the response
    $response = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    if ($response === false) {
        // Handle error when fetching the content
        return false;
    }

    // Split the response into header and body
    list($headers, $body) = explode("\r\n\r\n", $response, 2);
    // Extract the content type from headers
    //preg_match('/content-type: ([^\r\n]+)/', $headers, $matches);

    if (stripos($headers, 'Content-Type: application/pdf') !== false) {
    //if (!empty($matches[1])) {
        //$contentType = $matches[1];

        // Check if the Content-Type header indicates a PDF file
        // return strpos($contentType, 'application/pdf') !== false;
        //return true;
        return $url;
    }
    else if (stripos($headers, 'Status: HTTP/1.1 301 Moved Permanently') !== false) {
        preg_match('/Location:(.*?)\n/', $response, $matches);

        $newurl = trim(array_pop($matches));
        if(mb_substr($newurl, 0, 1) === '/') {
            $newurl = $urlComponents['scheme'] . '://' . $urlComponents['host'] . $newurl;
        }
        if($newurl = isPDF($newurl)) {
            return $newurl;
        }
    }
    else {
        //echo '<pre>'.print_r($headers, true).'</pre>'.chr(10);
        //$urlComponents = parse_url($url);
        //echo '<pre>'.print_r($urlComponents, true).'</pre>'.chr(10);
    }

    return false;
}

function getLinksFromPage($url) {
    // Initialize cURL session
    $ch = curl_init($url);

    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

    // Execute cURL session and get the HTML content
    $html = curl_exec($ch);

    // Close cURL session
    curl_close($ch);

    if ($html === false || empty($html)) {
        // Handle error when fetching the content
        return [];
    }

    $dom = new DOMDocument;
    libxml_use_internal_errors(true); // Disable warnings for HTML5 elements

    // Load the HTML content into the DOMDocument
    $dom->loadHTML($html);

    $links = [];

    // Find all anchor (a) tags
    $anchorTags = $dom->getElementsByTagName('a');

    foreach ($anchorTags as $anchor) {
        // Get the href attribute of each anchor tag
        $href = $anchor->getAttribute('href');

        // Filter out non-URL links and include only links ending with ".pdf"
        if (filter_var($href, FILTER_VALIDATE_URL) !== false && $href = isPdf($href)) { //} && pathinfo($href, PATHINFO_EXTENSION) === 'pdf') {
            $links[] = $href;
        }
    }

    return $links;
}

function getPDFMetaData($url) {
    try {
        // Create an instance of the PDF parser
        $parser = new Parser();

        // Parse the PDF file
        $pdf = $parser->parseFile($url);

        // Get document information
        $info = $pdf->getDetails();

        $title = $info['Title'] ?? '';
        $title = (is_array($title) ? implode(',', $title) : $title);
        $author = $info['Author'] ?? '';
        $author = (is_array($author) ? implode(',', $author) : $author);
        $subject = $info['Subject'] ?? '';
        $subject = (is_array($subject) ? implode(',', $subject) : $subject);
        $keywords = $info['Keywords'] ?? '';
        $keywords = (is_array($keywords) ? implode(',', $keywords) : $keywords);

        return [$url, $title, $author, $subject, $keywords];
    } catch (Exception $e) {
        echo chr(10)."Error on file: " . $url . " : " . $e->getMessage();
        return [$url, '', '', '', ''];
    }
}