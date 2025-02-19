<?php
require __DIR__ . '/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        'domains' => array(),
        'google_country' => 'at',
        'google_language' => 'de'
    ),
	
    //Belgium - France
    'be_f' => array(
        'title' => 'Belgium',
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
        'domains' => array(),
        'google_country' => 'be',
        'google_language' => 'fr'
    ),
	
    //Belgium - Dutch
    'be_d' => array(
        'title' => 'Belgium',
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
        'domains' => array(),
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
            array(
                'Plan rodne ravnopravnosti',
                'Акциони план за родну равноправност',
                'Gender akcijski plan',
                'Гендер акциони план',
            ),
            array(
                'Akcioni plan za rodnu ravnopravnost',
                'Akcijski plan za ravnopravnost spolova',
                'Акциони план родне равноправности',
                'Povelja o jednakosti žena i muškaraca',
            ),
            array(
                'Plan za rodnu ravnopravnost',
                'Akcioni plan rodne ravnopravnosti',
                'Rodni akcioni plan',
                'Povelja za ravnopravnost spolova',
            ),
        ),
        'domains' => array(),
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
            array(
                'План за равнопоставеност между половете',
                'План за равенство между половете',
                'План на дейности за осигуряване равнопоставеност на половете',
            ),
            array(
                'План за насърчаване равенството между половете',
                'Харта за равнопоставеност между половете',
                'Харта за равенството между половете',
            ),
            array(
                'План за действие за равнопоставеност между половете',
                'План за действие за равенство между половете',
                'План за действие на половете',
            ),
        ),
        'domains' => array(),
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
            array(
                'Akcijski plan za rodnu ravnopravnost',
                'Plan za ravnopravnost spolova',
                'Plan rodne ravnopravnosti',
            ),
            array(
                'Akcijski plan za ravnopravnost spolova',
                'Plan ravnopravnosti spolova',
                'Povelja za ravnopravnost žena i muškaraca',
            ),
            array(
                'Povelja o ravnopravnosti spolova',
                'Povelja za ravnopravnost spolova',
                'Povelja ravnopravnosti spolova',
                'Gender akcijski plan',
            ),
        ),
        'domains' => array(),
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
        'domains' => array(),
        'google_country' => 'cy',
        'google_language' => 'el'
    ),
	
    //Czech Republic
    'cz' => array(
        'title' => 'Czechia',
        'term_en' => 'gender equality plan',
        'term' => 'Plán pro rovnost žen a mužů',
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            array(
                'Plán pro rovnost žen a mužů',
                'Gender akční plán',
                'Akční plán pro rovnost žen a mužů',
            ),
            array(
                'Charta rovnosti žen a mužů',
                'Akční plán pro rovné odměňování žen a mužů',
                'Akční plán genderové rovnosti',
            ),
        ),
        'domains' => array(),
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
        'domains' => array(),
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
        'domains' => array(),
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
        'domains' => array(),
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
            array(
                "plan d'action pour l'égalité",
                "plan d'action sur l'égalité",
                "Plan d'action égalité femmes hommes",
                "plan d'égalité",
            ),
            array(
                "plan d'action relatifs à l'égalité",
                "Plan pour l'égalité",
                "Charte pour l'égalité",
            )
        ),
        'domains' => array(),
        'google_country' => 'fr',
        'google_language' => 'fr'
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
        'domains' => array(),
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
        'domains' => array(),
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
        'domains' => array(),
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
        'domains' => array(),
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
        'domains' => array(),
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
        'domains' => array(),
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
        'domains' => array(),
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
        'domains' => array(),
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
        'domains' => array(),
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
        'domains' => array(),
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
        'domains' => array(),
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
            array(
                "Plan równości płci",
                "Plan na rzecz równości płci",
                "Plan równości",
                "Plan wdrażania polityki równości płci",
                "Plan równości szans",
            ),
            array(
                "Plan na rzecz równych szans",
                "Plan na rzecz równości kobiet i mężczyzn",
                "Plan działań na rzecz równości płci",
                "Plan Równości Szans Płci",
            ),
            array(
                "Program działań na rzecz równości płci",
                "Strategia na rzecz równości płci",
            ),
        ),
        'domains' => array(),
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
            array(
                "Plano para a igualdade de género",
                "Plano de Ação de Género",
                "Carta de Princípios para a Igualdade de Género",
            ),
            array(
                "Plano de Ação para a Igualdade de Oportunidades",
                "Estratégia para a Igualdade de Género",
                "Plano de Ação AND Igualdade de Género",
            ),
        ),
        'domains' => array(),
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
        'domains' => array(),
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
            array(
                "Plan o rodnoj ravnopravnosti",
                "Акциони план за родну равноправност",
                "План за постизање родне равноправности",
                "Акциони план родне равноправности",
                "План мера за остваривање и унапређење родне равноправности",
            ),
            array(
                "Plan mera za ostvarivanje i unapređenje rodne ravnopravnosti",
                "Akcioni plan za ostvarivanje rodne ravnopravnosti",
                "План за родну равноправност",
                "Akcioni plan za rodnu ravnopravnost",
            ),
            array(
                "Plan rodne ravnopravnosti",
                "Родни акциони план",
                "Evropska povelja o rodnoj ravnopravnosti",
                "Европска повеља о родној равноправности",
                "Povelja Atena Svon",
            ),
        ),
        'domains' => array(),
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
        'domains' => array(),
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
            array(
                "Načrt za enakost spolov",
                "Akcijski načrt za uveljavljanje enakosti spolov",
                "Načrt enakosti spolov",
                "Načrt za uveljavljanje enakosti spolov",
                "Akcijski načrt za enakost spolov",
            ),
            array(
                "Akcijski načrt vzpostavitve enakih možnosti glede na spol",
                "Listina o enakosti spolov",
            ),
        ),
        'domains' => array(),
        'google_country' => 'si',
        'google_language' => 'sl'
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
        'domains' => array(),
        'google_country' => 'se',
        'google_language' => 'sv'
    ),
	
    //Switzerland - French
    'ch_f' => array(
        'title' => 'Switzerland',
        'term_en' => 'gender equality plan',
        'term' => "plan d'action pour l'égalité",
        'terms_en' => array(
            'Gender Equality Plan',
            'Gender Action Plan',
            'Gender Equality Action Plan',
            'Gender Equality Charter',
        ),
        'terms' => array(
            array(
                "plan d'action pour l'égalité",
                "plan d'action sur l'égalité",
                "Plan d'action égalité femmes hommes",
                "plan d'égalité",
            ),
            array(
                "plan d'action relatifs à l'égalité",
                "Plan pour l'égalité",
                "Charte pour l'égalité",
            ),
        ),
        'domains' => array(),
        'google_country' => 'ch',
        'google_language' => 'fr'
    ),
	
    //Switzerland - German
    'ch_g' => array(
        'title' => 'Switzerland',
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
        'domains' => array(),
        'google_country' => 'ch',
        'google_language' => 'de'
    ),
	
    //Switzerland - Italian
    'ch_i' => array(
        'title' => 'Switzerland',
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
        'domains' => array(),
        'google_country' => 'ch',
        'google_language' => 'it'
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
        'domains' => array(),
        'google_country' => 'de',
        'google_language' => 'de'
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
        'domains' => array(),
        'google_country' => 'es',
        'google_language' => 'es'
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
            "Gender Action Plan",
            "Gender Equality Action Plan",
            "Athena SWAN",
            "Gender equality charter",
        ),
        'domains' => array(),
        'google_country' => 'uk',
        'google_language' => 'en'
    ),
);
$results = array();
$country = $search = '';

foreach($countries as $key => $value) {
    $country = $key;
    $file = 'serpapi-' . strtoupper($key);
    $file_xlsx = './exports/' . $file . '.xlsx';
    $file_csv = './exports/' . $file . '.csv';
    $file_log = './exports/' . $file . '.log';
    $file_requests = './exports/requests+prevalence+final.txt';

    $xls = [
        ['step', 'source', 'title', 'link', 'snippet', 'snippet_highlighted_words']
    ];

    file_put_contents($file_csv, '"step","source","title","link","snippet","snippet_highlighted_words"' . chr(10), FILE_APPEND);

    foreach($countries[$country]['domains'] as $domain) {
        echo $domain.chr(10);
        $str = '(site:' .$domain . ')';

        if($key == 'ie') {
            $steps = array(
                /*
                '4' => array(
                    'hl' => 'en',
                    'terms' => $value['term_en']
                ),*/
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
        else {
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

        foreach($steps as $step_key => $step_value) {
            $index = array_search($step_key, array_keys($steps));
            ${'go_step_'. $step_key } = true; //( $index === 0 ? true: false);
        }

        foreach($steps as $step_key => $step_value) {
            if ( ${'go_step_'. $step_key }) {
                if (is_array($step_value['terms']) && hasArrayElements($step_value['terms'])) {
                    foreach($step_value['terms'] as  $terms_value) {
                        $_str = ' ' . query_terms($terms_value);
                        $query = [
                            "q" => $str . $_str,
                            "engine" => "google",
                            "num" => 10,
                            "location" => $countries[$country]['title'],
                            'gl' => $countries[$country]['google_country'],
                            'hl' => $step_value['hl'],
                            "async" => "false",
                        ];

                        $client = new GoogleSearchResults($api_key);
                        $results = $client->get_json($query);
                        $total_results = 0;

                        if (isset($results->organic_results) && count($results->organic_results) &&
                            isset($results->search_information->organic_results_state) &&
                            $results->search_information->organic_results_state == 'Results for exact spelling') {

                            $total_results = $results->search_information->total_results;

                            foreach ($results->organic_results as $result) {
                                /*$xls[] = [$step_key, $result->source, $result->title, $result->link, (isset($result->snippet) ? $result->snippet : ''), (isset
                                ($result->snippet_highlighted_words) ? implode("|", $result->snippet_highlighted_words) : '')];*/

                                file_put_contents($file_csv, '"' . $step_key . '","' . $domain . '","' . $result->title . '","' . $result->link . '","' . (isset($result->snippet) ? $result->snippet : '') . '","' . (isset
                                    ($result->snippet_highlighted_words) ? implode("|", $result->snippet_highlighted_words) : '') . '"' . chr(10), FILE_APPEND);
                            }

                            $url_request = chr(10) . 'https://www.google.com/search?' . http_build_query($query) . ' | ' . $total_results . ' results' . chr(10);
                            file_put_contents($file_requests, $url_request, FILE_APPEND);

                            file_put_contents($file_log, serialize($results) . chr(10), FILE_APPEND);

                            if (count($results->organic_results) > 5)
                                break 2;
                        }
                        else {
                            $url_request = chr(10) . 'https://www.google.com/search?' . http_build_query($query) . ' | ' . $total_results . ' results' . chr(10);
                            file_put_contents($file_requests, $url_request, FILE_APPEND);
                        }
                    }
                }
                else {
                    $_str = ' ' . query_terms($step_value['terms']);
                    $query = [
                        "q" => $str . $_str,
                        "engine" => "google",
                        "num" => 10,
                        "location" => $countries[$country]['title'],
                        'gl' => $countries[$country]['google_country'],
                        'hl' => $step_value['hl'],
                        "async" => "false",
                    ];

                    $client = new GoogleSearchResults($api_key);
                    $results = $client->get_json($query);
                    $total_results = 0;

                    if (isset($results->organic_results) && count($results->organic_results) &&
                        isset($results->search_information->organic_results_state) &&
                        $results->search_information->organic_results_state == 'Results for exact spelling') {

                        $total_results = $results->search_information->total_results;

                        foreach ($results->organic_results as $result) {
                            /*$xls[] = [$step_key, $result->source, $result->title, $result->link, (isset($result->snippet) ? $result->snippet : ''), (isset
                            ($result->snippet_highlighted_words) ? implode("|", $result->snippet_highlighted_words) : '')];*/

                            file_put_contents($file_csv, '"' . $step_key . '","' . $domain . '","' . $result->title . '","' . $result->link . '","' . (isset($result->snippet) ? $result->snippet : '') . '","' . (isset
                                ($result->snippet_highlighted_words) ? implode("|", $result->snippet_highlighted_words) : '') . '"' . chr(10), FILE_APPEND);
                        }

                        $url_request = chr(10) . 'https://www.google.com/search?' . http_build_query($query) . ' | ' . $total_results . ' results' . chr(10);
                        file_put_contents($file_requests, $url_request, FILE_APPEND);

                        file_put_contents($file_log, serialize($results) . chr(10), FILE_APPEND);

                        if (count($results->organic_results) > 5)
                            break;
                    }
                    else {
                        $url_request = chr(10) . 'https://www.google.com/search?' . http_build_query($query) . ' | ' . $total_results . ' results' . chr(10);
                        file_put_contents($file_requests, $url_request, FILE_APPEND);
                    }
                }
            }
        }
    }

/*
    $spreadsheet = new Spreadsheet();
    $activeWorksheet = $spreadsheet->getActiveSheet();
    $activeWorksheet->fromArray($xls);

    $writer = new Xlsx($spreadsheet);
    $writer->save($file_xlsx);
*/
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

function hasArrayElements($array) {
    foreach ($array as $element) {
        if (is_array($element)) {
            return true; // Found an array element
        }
    }
    return false; // No array elements found
}
