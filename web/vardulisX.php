<?php
header('Content-Type: text/html; charset=utf-8');
require_once('/home/baumuin/public_html/twitediens.tk/config.php');
require '/home/baumuin/public_html/foodbot/tmhOAuth/tmhOAuth2.php';
//SQL pieslēgšanās informācija
$connection = mysqli_connect("localhost", "username", "password", "database");
mysqli_set_charset($connection, "utf8mb4");


$minejumi = array();
$yd='yesterday';
// $yd=$_GET['day'];
$yesterday = new DateTime($yd);
$vakardiena = $yesterday->format('Y-m-d');
$latest = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` WHERE date LIKE '%$vakardiena%' GROUP BY datums ORDER BY datums ASC");
$viens = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` WHERE date LIKE '%$vakardiena%' AND CHAR_LENGTH(guesses) = 6 GROUP BY datums ORDER BY datums ASC ");
$divi = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` WHERE date LIKE '%$vakardiena%' AND CHAR_LENGTH(guesses) = 11 GROUP BY datums ORDER BY datums ASC ");
$tris = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` WHERE date LIKE '%$vakardiena%' AND CHAR_LENGTH(guesses) = 17 GROUP BY datums ORDER BY datums ASC ");
$cetri = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` WHERE date LIKE '%$vakardiena%' AND CHAR_LENGTH(guesses) = 23 GROUP BY datums ORDER BY datums ASC ");
$pieci = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` WHERE date LIKE '%$vakardiena%' AND CHAR_LENGTH(guesses) = 29 GROUP BY datums ORDER BY datums ASC ");
$sesi = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` WHERE date LIKE '%$vakardiena%' AND CHAR_LENGTH(guesses) = 35 GROUP BY datums ORDER BY datums ASC ");
$atbildes = ['tumšā', 'audio', 'tikai', 'fonds', 'rozes', 'jauna', 'skaļi', 'zāles', 'baltā', 'vārda', 'dzīvē', 'neņem', 'spīti', 'dodot', 'metru', 'krāsā', 'bažām', 'ziņot', 'viena', 'jumtu', 'miltu', 'dzīvs', 'jumta', 'saldo', 'tīras', 'ģirts', 'konts', 'jēgas', 'adobe', 'bieži', 'šuves', 'kokus', 'kārļa', 'peļņa', 'dziļu', 'trešā', 'sāktu', 'sešas', 'modes', 'dārzi', 'upuri', 'gaitā', 'ielām', 'plānu', 'kaitē', 'ogles', 'draud', 'turku', 'bieža', 'tiesa', 'bērnu', 'zinot', 'stāvu', 'tirgu', 'kursā', 'kaklu', 'soļus', 'tumši', 'vannā', 'tauki', 'galdu', 'dievs', 'kazas', 'liene', 'mieru', 'cīņas', 'celta', 'vakar', 'puses', 'plaša', 'krāsu', 'tāpat', 'algas', 'ciema', 'ilgāk', 'likts', 'labas', 'esoša', 'prece', 'ielej', 'aveņu', 'tīrīt', 'pasts', 'vēlāk', 'savām', 'raiņa', 'maigi', 'baudu', 'tērpu', 'flīžu', 'grozā', 'klusā', 'laiku', 'zemēm', 'jāņem', 'pusei', 'laiks', 'vērts', 'darāt', 'garām', 'reizē', 'bloku', 'lietu', 'datus', 'tādos', 'likmi', 'putnu', 'labās', 'balto', 'tajos', 'ozola', 'zirgu', 'ūdenī', 'sūkņu', 'daļās', 'tapis', 'svaru', 'kļūda', 'ieved', 'ieceļ', 'lampu', 'nervu', 'sešām', 'saišu', 'lieli', 'uzvar', 'grūts', 'dārzs', 'sirds', 'ticis', 'zieds', 'amats', 'drošs', 'reižu', 'maija', 'tests', 'posmu', 'laima', 'smagu', 'slavu', 'laiki', 'šķist', 'norit', 'sievu', 'dabai', 'saulē', 'drošā', 'šūnas', 'valkā', 'tiesu', 'ātras', 'katli', 'groza', 'radīt', 'kurss', 'artis', 'īpašu', 'sodus', 'tuvāk', 'zinām', 'rokām', 'spēle', 'testu', 'tiešā', 'veidi', 'galvu', 'segtu', 'marta', 'tumšs', 'dāmas', 'darbs', 'paver', 'četru', 'tādēļ', 'anita', 'pilnā', 'klasi', 'bijām', 'lielā', 'vides', 'likme', 'brīdī', 'bloki', 'vieno', 'martā', 'garās', 'šajās', 'plāni', 'pilda', 'aptur', 'vērtē', 'irāna', 'nodot', 'sākot', 'jauku', 'tonnu', 'slēgt', 'tīkla', 'gaita', 'veids', 'tavas', 'varas', 'sešos', 'plaza', 'divos', 'dažas', 'grozu', 'arēnā', 'nonāk', 'ārēji', 'seksa', 'brāļu', 'jogas', 'salas', 'dziļa', 'varēs', 'kausā', 'zonas', 'kursu', 'šūnās', 'spēku', 'viļņā', 'ieiet', 'maiņa', 'tiešu', 'spēks', 'laikā', 'plīts', 'tālab', 'prātā', 'zvanu', 'vairs', 'silta', 'nekad', 'balsi', 'melnu', 'gribu', 'karšu', 'liela', 'cūkas', 'bērns', 'sejas', 'teica', 'uztur', 'sloga', 'gaisa', 'redzu', 'meita', 'lūdzu', 'vienā', 'glāzi', 'labad', 'šādos', 'katlu', 'jaudu', 'ciest', 'store', 'sāpēm', 'zemei', 'gaida', 'preci', 'dažos', 'valda', 'eļļas', 'tēmām', 'gulta', 'tirgi', 'sakņu', 'lasot', 'slāņa', 'videi', 'zemes', 'kaste', 'bilde', 'tīkls', 'faktu', 'izdot', 'jauki', 'galds', 'ogres', 'kaulu', 'gāzes', 'koris', 'jomās', 'galvā', 'turēt', 'ciklā', 'sekām', 'veica', 'darbu', 'sesto', 'brīdi', 'seksu', 'pants', 'tomēr', 'normu', 'rasas', 'mazās', 'angļu', 'galva', 'fondu', 'klasē', 'zaudē', 'sākās', 'diena', 'vērot', 'svēto', 'abeji', 'tātad', 'kļūst', 'pleca', 'firma', 'ārstu', 'roida', 'kājās', 'laura', 'visai', 'jūras', 'teikt', 'pirts', 'meklē', 'koļļa', 'tīklu', 'trasē', 'mājās', 'gluži', 'slāni', 'kuģis', 'apols', 'posmi', 'jūtos', 'grūti', 'zelts', 'šādus', 'tagad', 'jūkla', 'līmes', 'melno', 'minēt', 'tērēt', 'multi', 'prese', 'durns', 'ielas', 'jauns', 'ciklu', 'cīnās', 'mātei', 'pūles', 'čaiba', 'ātrāk', 'sēdes', 'saņem', 'esošo', 'zīmēm', 'ģeida', 'siltā', 'kūkas', 'metro', 'parki', 'būvju', 'vēlmi', 'saukt', 'aplam', 'domāt', 'vidus', 'mājai', 'sauca', 'līgas', 'mazos', 'mulda', 'asins', 'kādam', 'grozs', 'atgūt', 'telpā', 'tārpi', 'buļba', 'siers', 'gluda', 'mērci', 'josla', 'marka', 'balva', 'īksti', 'dūcis', 'collu', 'jomām', 'cenām', 'siltu', 'darīs', 'ganga', 'banku', 'dzīve', 'zeķes', 'pauls', 'sākam', 'īpašs', 'apals', 'devos', 'vēzis', 'savam', 'lielu', 'radās', 'parka', 'kaive', 'linda', 'zemju', 'naudu', 'nieze', 'putas', 'britu', 'čabis', 'lētāk', 'rāmja', 'pārāk', 'cikla', 'pretī', 'zvani', 'mārša', 'kontā', 'rotas', 'dārgs', 'gadus', 'purva', 'daļas', 'ģeņģe', 'sprēž', 'urīnā', 'maizi', 'kājas', 'ziema', 'visas', 'ģieda', 'dzīvā', 'balts', 'mīlas', 'mītne', 'cīņai', 'lieko', 'garga', 'lūgts', 'tiešo', 'riepu', 'vērst', 'mazāk', 'milti', 'grods', 'rokas', 'maize', 'ledus', 'jādod', 'sešus', 'kartē', 'zeija', 'elīna', 'baltu', 'klajā', 'gudrs', 'klase', 'avīze', 'zārds', 'lakas', 'kāpēc', 'iegūt', 'savus', 'kursa', 'devis', 'ķipis', 'kursi', 'sausā', 'gultā', 'sugām', 'puiši', 'tropu', 'čalus', 'visam', 'sākta', 'posms', 'kipra', 'malta', 'cieto', 'kaiva', 'grāds', 'noved', 'fonda', 'labot', 'krīzi', 'būsim', 'aduta', 'fondā', 'tieša', 'marku', 'apars', 'tādam', 'plūdu', 'lanka', 'telts', 'grupu', 'cikls', 'kauns', 'kungs', 'māsas', 'gaizs', 'dzied', 'skats', 'paust', 'viņus', 'panta', 'plāna', 'ķīris', 'driķi', 'sienu', 'metri', 'garas', 'bāzes', 'grīdu', 'apķis', 'grādi', 'spētu', 'mačos', 'miers', 'mīlēt', 'mirst', 'graba', 'vaska', 'uzsāk', 'pašam', 'ieņem', 'tartu', 'diska', 'ķozis', 'kapos', 'fakti', 'ņemot', 'ideja', 'mizas', 'fakts', 'ķosis', 'gaiss', 'diski', 'posmā', 'zivis', 'reālā', 'trešo', 'ķocis', 'dienu', 'gaurs', 'sūkņa', 'sācis', 'virsū', 'varat', 'sābri', 'zutne', 'nieru', 'testa', 'kalni', 'vēlme', 'sauss', 'ķērne', 'ārējo', 'mātes', 'presē', 'sausu', 'litru', 'svētā', 'kauka', 'savos', 'kāzas', 'dodas', 'kuģim', 'patīk', 'jautā', 'rīlis', 'rāmis', 'tādas', 'lidot', 'zarnu', 'slots', 'tiltu', 'ģidrs', 'mazām', 'stars', 'manis', 'dārza', 'mātēm', 'ķīnas', 'rodas', 'kurām', 'bauda', 'plūst', 'vieni', 'kādos', 'augļa', 'kuģus', 'kakls', 'īsāks', 'smaga', 'ārstē', 'kļūdu', 'upuru', 'tautu', 'prasa', 'veidā', 'plāns', 'kalnā', 'disks', 'prātu', 'kases', 'kungu', 'uguns', 'lētas', 'ziņām', 'kunga', 'ziņas', 'ticēt', 'garšu', 'tilts', 'muiža', 'rūpes', 'maska', 'cūkām', 'trošu', 'ūdeņi', 'ražot', 'bieza', 'citus', 'apaļa', 'pašai', 'būvēt', 'ūdeni', 'tevis', 'citur', 'bērna', 'kādas', 'avoti', 'dēlam', 'runas', 'saule', 'cēsis', 'viņām', 'kļuva', 'gaiši', 'pantu', 'diētu', 'spēki', 'augļu', 'kamēr', 'ārsti', 'šogad', 'peles', 'griba', 'reāli', 'zonām', 'dzīvo', 'silts', 'skata', 'retos', 'maina', 'leļļu', 'peļņu', 'saūda', 'seifs', 'tālāk', 'lieki', 'katrā', 'gaisu', 'dzert', 'augļi', 'balvu', 'vēnas', 'uldis', 'cieņa', 'nakts', 'sodīt', 'bumbu', 'lielo', 'dotos', 'citai', 'siena', 'pieci', 'sākat', 'mācīt', 'manām', 'pirmā', 'rīkot', 'sevis', 'zemēs', 'zaļās', 'visām', 'kuram', 'allaž', 'lēcas', 'laika', 'ausis', 'vilks', 'grupa', 'astes', 'laimi', 'ražas', 'saite', 'kalna', 'paņem', 'lampa', 'smago', 'īrija', 'kastē', 'stūra', 'prāga', 'zīmju', 'meitu', 'ilgst', 'esošā', 'talsu', 'kurai', 'testā', 'summa', 'tīkli', 'aknām', 'šarmu', 'alkas', 'nevar', 'spēlē', 'domas', 'tirgo', 'īstas', 'šādam', 'reālo', 'mežos', 'masku', 'cinka', 'pūtīs', 'tūska', 'valdē', 'bloķē', 'sakām', 'plašu', 'radio', 'bažas', 'sfērā', 'viens', 'tajās', 'zivīm', 'ostām', 'klubu', 'litri', 'avotu', 'stilu', 'grupā', 'sēnes', 'mēles', 'sūtīt', 'kārtu', 'otram', 'zemāk', 'risks', 'sanāk', 'vārdu', 'audzē', 'devās', 'jauks', 'ielai', 'lapām', 'lapās', 'paula', 'plāno', 'lūgti', 'lācis', 'bēgļu', 'viņam', 'slimo', 'vielu', 'pašas', 'sākām', 'nomas', 'lifts', 'būves', 'shēmu', 'brūns', 'pienu', 'mājas', 'labus', 'esiet', 'ideju', 'atdot', 'visos', 'burtu', 'lomas', 'miera', 'plašā', 'palmu', 'spēja', 'spēļu', 'dārga', 'vārdi', 'šādās', 'miega', 'augšā', 'sēdēt', 'veiks', 'gatve', 'bankā', 'lieta', 'devas', 'viļņa', 'salām', 'marts', 'šādas', 'balta', 'bijis', 'fondi', 'andra', 'kārta', 'darbi', 'kontu', 'kuros', 'dažām', 'kaķis', 'līdzi', 'tāpēc', 'slims', 'divus', 'slogs', 'āzijā', 'vārti', 'svari', 'laukā', 'liekā', 'dārzā', 'sapni', 'pirmo', 'maiņu', 'kuņģa', 'ceram', 'rubļu', 'leņķi', 'ausīm', 'čūlas', 'īpaši', 'ņemtu', 'nācis', 'grami', 'veida', 'izeju', 'lapas', 'jēzus', 'plānā', 'brīža', 'forma', 'pašus', 'krēms', 'olīvu', 'teicu', 'trase', 'manam', 'sapņu', 'piens', 'retāk', 'domes', 'plēve', 'visās', 'žults', 'govju', 'gulēt', 'sieru', 'nomāc', 'ceļot', 'brāli', 'parks', 'zveju', 'kvotu', 'audus', 'garša', 'džons', 'sākas', 'redzi', 'uguni', 'šķiet', 'pilis', 'nebūt', 'zālēm', 'izdod', 'savas', 'ļaužu', 'lieto', 'kuņģī', 'ienāk', 'salās', 'tūres', 'gadam', 'ārpus', 'karte', 'vīzas', 'sieva', 'testi', 'ņemti', 'kopas', 'piena', 'kakao', 'fāzes', 'viļņi', 'galam', 'lugas', 'video', 'gudri', 'apgūt', 'stāvs', 'tukša', 'balss', 'skaņu', 'ostas', 'izjūt', 'kalns', 'piecu', 'darba', 'asiņu', 'ilgas', 'daļai', 'joslā', 'plašs', 'nemaz', 'zināt', 'maijs', 'barot', 'cieņu', 'katrs', 'žanra', 'prāta', 'parku', 'ieeja', 'sulas', 'visus', 'inese', 'drošu', 'cieši', 'ārējā', 'ātrās', 'matus', 'gatis', 'klepu', 'ciešā', 'siera', 'proti', 'brīvs', 'preču', 'diāna', 'banka', 'super', 'labāk', 'kodus', 'spēka', 'glabā', 'bumba', 'likās', 'velti', 'veido', 'ezera', 'gunta', 'klāja', 'kāpņu', 'reisu', 'jāsāk', 'arnis', 'agrāk', 'ģints', 'apavu', 'ādažu', 'gultu', 'brīva', 'viņai', 'astra', 'katru', 'toņos', 'ārsts', 'ātrie', 'riski', 'sauso', 'patur', 'izzūd', 'vannu', 'vista', 'augšu', 'aktos', 'tauta', 'tādai', 'sapņi', 'zvana', 'nupat', 'vētra', 'kakla', 'svara', 'tumsā', 'abiem', 'borta', 'nekur', 'diēta', 'gaitu', 'stūrī', 'niezi', 'cieta', 'takas', 'iziet', 'cilts', 'iveta', 'glābt', 'svina', 'uzņem', 'jāiet', 'starp', 'zīmes', 'tēvam', 'staru', 'vieta', 'lietā', 'rauga', 'telpa', 'manai', 'klubā', 'jānis', 'veikt', 'īpaša', 'jābūt', 'reizi', 'plecu', 'šajos', 'ķīlas', 'guvis', 'savās', 'smagi', 'tārpu', 'grīda', 'kājām', 'viņas', 'formā', 'paiet', 'jaunu', 'spāņu', 'kiprā', 'domām', 'brāļi', 'tiktu', 'spēju', 'kaula', 'maksā', 'tēmas', 'smags', 'lauks', 'jauno', 'kavēt', 'dušas', 'cimdi', 'bloka', 'otrai', 'lasīt', 'zobus', 'pastā', 'runāt', 'melna', 'mamma', 'žestu', 'gripu', 'iznāk', 'satur', 'izceļ', 'štata', 'jānim', 'īrijā', 'karti', 'radot', 'akūtu', 'pēdas', 'lepni', 'ciems', 'gints', 'brīvu', 'avota', 'formu', 'darbā', 'konta', 'romas', 'mazas', 'atver', 'itāļu', 'pases', 'krūmu', 'joslu', 'pantā', 'šūnām', 'filmā', 'gudra', 'parkā', 'vajag', 'dažās', 'plašo', 'droša', 'cīņās', 'beigu', 'filmu', 'posma', 'maksa', 'dievu', 'sirdi', 'krēmu', 'pastu', 'datos', 'atceļ', 'kāršu', 'dzēst', 'mazie', 'maksu', 'mērķu', 'tiesā', 'klašu', 'daudz', 'veidu', 'grādu', 'valde', 'pašām', 'somas', 'apavi', 'anāls', 'vārdā', 'ķēdes', 'krūšu', 'nebūs', 'kausu', 'saiti', 'šaubu', 'liels', 'kurās', 'dažus', 'masas', 'rādīt', 'sauna', 'klubs', 'īsumā', 'biezu', 'tipam', 'lauka', 'vadīt', 'rīgas', 'vietā', 'krūts', 'augus', 'nācās', 'katra', 'citas', 'vecās', 'devām', 'skatu', 'aktus', 'veļas', 'stāvā', 'plate', 'norma', 'tādus', 'kravu', 'pauda', 'vecas', 'spēli', 'savāc', 'sekss', 'tirgū', 'izeja', 'darīt', 'vanna', 'galda', 'pilnu', 'aknas', 'reaģē', 'visur', 'nauda', 'krāsa', 'tikās', 'tīklā', 'gaļas', 'mammu', 'tējas', 'amata', 'solis', 'ņemta', 'manas', 'bērni', 'kopēt', 'audos', 'radīs', 'kļūtu', 'rīkus', 'jūtas', 'stils', 'riska', 'ezers', 'avots', 'gadās', 'pēdām', 'sausa', 'ozols', 'telpu', 'otrās', 'miegu', 'nekas', 'dabas', 'cēsīs', 'milzu', 'vadīs', 'ūdens', 'čības', 'smagā', 'mājām', 'krēmi', 'miris', 'kādai', 'solim', 'tilta', 'ziedi', 'amatu', 'simti', 'divās', 'tūlīt', 'sekas', 'brīvi', 'dziļi', 'skolu', 'liedz', 'sirdī', 'eļļām', 'plusi', 'ranga', 'dejas', 'kurus', 'ārsta', 'sakot', 'krasi', 'ņemts', 'vainu', 'dāvis', 'citās', 'dienā', 'zeltu', 'sēklu', 'māris', 'shēma', 'brīvo', 'elpot', 'droši', 'plaši', 'tieši', 'bloks', 'uzdod', 'pasta', 'kauss', 'ostās', 'uzdot', 'laivu', 'neesi', 'divām', 'putni', 'krīze', 'sojas', 'tādās', 'mīklu', 'shēmā', 'lūdza', 'laist', 'vēlos', 'gaisā', 'tepat', 'kalnu', 'opera', 'atkal', 'igors', 'sekmē', 'nakti', 'malas', 'juris', 'summu', 'aitas', 'zemas', 'arābu', 'slejā', 'viela', 'slēpt', 'nevis', 'ezeru', 'otras', 'disku', 'ziedu', 'dzīvu', 'gājis', 'iegūs', 'vīnes', 'rindā', 'gribi', 'pirkt', 'sūkņi', 'malām', 'cauri', 'noņem', 'akūta', 'vēsta', 'reāla', 'mērķa', 'katls', 'melns', 'kārtā', 'gados', 'rokās', 'ceļam', 'ezerā', 'dārzu', 'lauki', 'dzīvi', 'atrod', 'cenās', 'villa', 'varam', 'šķita', 'lēsts', 'pilns', 'pirms', 'sāpes', 'ķiršu', 'džeza', 'rindu', 'firmu', 'senās', 'šorīt', 'dārgi', 'zupas', 'nāves', 'ainas', 'vienu', 'esošu', 'jomas', 'grēku', 'vārtu', 'stila', 'tauku', 'santa', 'galdi', 'četri', 'vietu', 'īpašā', 'slogu', 'tētis', 'mierā', 'viesu', 'iekšā', 'kalpo', 'sauli', 'krūti', 'nākas', 'naktī', 'prāts', 'rinda', 'zilās', 'dieva', 'zivju', 'tādām', 'darot', 'sekos', 'atzīt', 'stāva', 'cietā', 'amatā', 'segas', 'vārds', 'vadot', 'īpašo', 'gaidu', 'daļām', 'lauku', 'ērtāk', 'zelta', 'pienā', 'brīvā', 'sāpju', 'brauc', 'mutes', 'adatu', 'filma', 'balti', 'kungi', 'skola', 'viesi', 'maijā', 'kausa', 'jaunā', 'kādām', 'mācās', 'ielās', 'pilna', 'jumts', 'urīna', 'nesen', 'rīgai', 'ciemā', 'ēriks', 'maltā', 'baiba', 'vēlas', 'ļautu', 'nedod', 'kādēļ', 'skolā', 'dalās', 'elpas', 'citam', 'medus', 'leņķa', 'annas', 'reālu', 'ziemā', 'savai', 'tukšā', 'stilā', 'kāzām', 'sugas', 'pērnā', 'biržā', 'aknās', 'naudā', 'skaņa', 'ivars', 'citām', 'svars', 'jauda', 'risku', 'simts', 'jauka', 'cerēt', 'jauni', 'sīkāk', 'triju', 'darām', 'balsu', 'reize', 'reāls', 'mantu', 'pētīt', 'šādām', 'putns', 'spēkā', 'kuras', 'laime', 'viļņu', 'torņa', 'pusēs', 'sekot', 'sapņo', 'klubi', 'zonās', 'dabūt', 'ābolu', 'pazūd', 'domās', 'divas', 'pāris', 'citos', 'ģipša', 'katla', 'konti', 'oļegs', 'tikko', 'jostu', 'melnā', 'nodod', 'šādai', 'mērķi', 'pogas', 'lēnām', 'ūdeņu', 'kādus', 'kluba', 'cenas', 'ceļus'];
$grutibas = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0,0,0,0,0,1,0,0,0,0,0,1,1,0,1,0,1,0,0,0,0,0,1,1,0,0,1,0,0,0,1,1,1,0,0,0,1,0,0,1,0,0,0,0,0,0,1,1,0,0,0,0,1,1,1,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,1,0,1,0,0,0,0,0,1,0,1,0,0,0,0,0,0,0,0,0,0,1,1,0,1,0,0,0,0,0,0,0,0,0,0,1,0,0,1,0,1,0,0,1,0,0,0,0,1,0,0,0,0,0,0,1,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,0,1,1,0,0,1,0,0,1,0,0,0,0,0,0,1,0,0,1,1,0,0,1,0,0,0,1,0,0,1,1,0,0,1,0,0,1,0,0,1,1,0,0,0,0,0,0,0,0,1,1,1,0,0,1,0,0,1,1,0,1,0,0,1,0,0,0,0,0,1,0,0,1,0,0,0,0,1,0,0,1,0,0,0,1,0,0,1,1,0,1,1,1,0,0,0,0,0,0,0,0,1,0,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,1,0,0,1,0,0,0,1,0,0,1,0,0,0,0,0,0,0,0,1,1,1,1,1,0,0,0,0,0,1,0,0,0,1,0,0,1,1,1,1,0,1,0,0,1,0,0,1,0,1,0,0,1,1,0,1,0,0,0,1,1,0,0,0,0,0,1,0,0,0,1,0,0,1,0,0,0,1,0,0,0,0,0,0,0,0,1,0,0,1,0,0,0,0,0,1,0,0,0,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,1,1,0,0,1,0,0,1,1,0,0,0,1,0,0,0,0,0,0,0,1,0,0,1,0,1,0,0,0,0,0,1,1,0,0,1,0,1,0,0,0,0,0,0,1,0,0,1,0,1,1,0,0,0,0,0,1,1,0,0,1,0,1,1,0,0,0,0,0,0,0,1,0,0,1,1,0,0,0,0,1,0,0,1,0,1,0,1,1,0,0,0,0,0,1,0,0,0,0,0,1,0,1,0,0,1,1,0,0,1,0,1,1,1,1,0,1,1,0,0,0,1,1,1,0,0,0,1,0,1,0,0,0,0,0,0,0,0,1,1,1,1,0,0,0,0,0,0,1,0,1,1,0,0,0,1,0,1,1,0,0,0,1,0,1,0,1,0,0,1,1,1,1,0,1,1,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,1,0,0,1,0,0,1,0,0,0,1,0,1,1,0,1,0,1,0,0,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,1,0,1,0,1,0,1,1,1,0,1,1,0,1,0,0,0,0,1,0,0,1,0,0,1,1,0,1,1,0,0,1,0,1,0,1,1,0,0,0,1,0,0,0,1,0,0,0,0,1,1,1,1,0,0,0,0,0,0,0,0,0,1,0,0,0,1,0,1,0,0,1,0,1,0,0,0,1,1,0,0,1,0,0,0,0,0,0,0,0,0,1,0,0,0,0,1,0,0,1,0,0,0,0,1,0,0,0,1,0,0,1,0,1,1,0,1,1,0,1,0,0,0,0,1,0,0,0,0,1,1,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,1,1,0,1,0,1,1,0,1,0,0,1,0,0,0,1,1,0,1,1,0,1,0,0,0,0,0,0,1,0,0,1,0,0,0,1,1,0,0,0,0,1,1,0,0,0,0,0,1,0,1,0,0,0,1,0,0,0,0,0,0,1,0,0,0,1,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,1,0,1,1,0,0,1,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,1,1,0,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,0,1,1,1,1,0,0,0,1,0,0,0,0,0,1,1,0,0,0,0,1,0,0,1,0,0,0,0,1,1,0,0,1,0,0,0,0,1,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,1,0,0,0,0,1,0,0,1,0,1,1,0,0,0,0,1,0,0,0,0,0,0,0,1,1,1,1,0,1,0,0,0,0,1,0,0,0,0,1,0,1,1,0,0,0,0,0,0,1,1,0,0,1,0,0,0,1,0,1,0,0,1,0,0,0,1,0,0,1,0,1,0,0,0,0,1,0,0,0,0,0,0,0,0,1,0,1,0,1,0,1,0,0,0,0,0,0,0,0,0,0,1,0,1,0,1,1,1,0,0,1,0,0,1,1];

$i = $yesterday->format('z');

$atbilde = mb_strtoupper($atbildes[$i]);
$grutiba = $grutibas[$i];
$j=$i+1;
if ($j < 10) $j = "00".$j;
if ($j < 100) $j = "0".$j;

// echo $atbilde;
// echo "</br>";
// echo $i;
// echo "</br>";

$pareizie = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` 
										WHERE DATE_FORMAT(date, '%j') LIKE '$j' AND guesses LIKE '%$atbilde%'
										GROUP BY datums ORDER BY datums ASC");
										
$p = mysqli_fetch_array($pareizie);
$skaits = $p["skaits"];
$minejumi['vards'] = $atbilde;
$minejumi['pareizi'] = $skaits;

$p=mysqli_fetch_array($latest);
$skaits = $p["skaits"];
$minejumi['skaits'] = $skaits;
$minejumi['nepareizi'] = $skaits - $minejumi['pareizi'];
$p=mysqli_fetch_array($viens);
$skaits = $p["skaits"];
$minejumi['1x'] = $skaits;
$p=mysqli_fetch_array($divi);
$skaits = $p["skaits"];
$minejumi['2x'] = $skaits;
$p=mysqli_fetch_array($tris);
$skaits = $p["skaits"];
$minejumi['3x'] = $skaits;
$p=mysqli_fetch_array($cetri);
$skaits = $p["skaits"];
$minejumi['4x'] = $skaits;
$p=mysqli_fetch_array($pieci);
$skaits = $p["skaits"];
$minejumi['5x'] = $skaits;
$p=mysqli_fetch_array($sesi);
$skaits = $p["skaits"];
$minejumi['6x'] = $skaits - ($minejumi['skaits']-$minejumi['pareizi']);

$papildus = "";

if($minejumi['nepareizi'] > ($minejumi['6x'] * 2)){
	$papildus = "Šis bija skarbi.";
}else if($minejumi['nepareizi'] > $minejumi['6x']){
	$papildus = "Izskatās, ka bija izaicinoša minēšana.";
}else if($minejumi['5x'] > $minejumi['6x'] && $minejumi['5x'] > $minejumi['4x']){
	$papildus = "Nebija nemaz tik grūti!";
}else if($minejumi['4x'] > $minejumi['6x'] && $minejumi['4x'] > $minejumi['5x'] && $minejumi['4x'] > $minejumi['3x']){
	$papildus = "Šoreiz gadījās vieglāk :)";
}else if($minejumi['3x'] > $minejumi['6x'] && $minejumi['3x'] > $minejumi['5x'] && $minejumi['3x'] > $minejumi['4x']){
	$papildus = "Vai tik nebija pārāk vienkārši?";
}

$viegli = " 
Šodienas vārds droši vien būs ".($grutiba==1?"nedaudz grūtāks.":"diezgan viegls.");

// for ($skkk=1;$skkk<7;$skkk++){
	// echo $minejumi[$skkk.'x']."</br>";
// }

$text = "Vakar, ".$yesterday->format('d.m.Y').", #Vārdulis spēlēts ".$minejumi['skaits']."x.
🟩⬜️⬜️⬜️⬜️⬜️ ".round(100*$minejumi['1x']/$minejumi['skaits'])."%
🟩🟩⬜️⬜️⬜️⬜️ ".round(100*$minejumi['2x']/$minejumi['skaits'])."%
🟩🟩🟩⬜️⬜️⬜️ ".round(100*$minejumi['3x']/$minejumi['skaits'])."%
🟩🟩🟩🟩⬜️⬜️ ".round(100*$minejumi['4x']/$minejumi['skaits'])."%
🟩🟩🟩🟩🟩⬜️ ".round(100*$minejumi['5x']/$minejumi['skaits'])."%
🟩🟩🟩🟩🟩🟩 ".round(100*$minejumi['6x']/$minejumi['skaits'])."%
⬜️⬜️⬜️⬜️⬜️⬜️ ".round(100*$minejumi['nepareizi']/$minejumi['skaits'])."%
".$papildus.$viegli;

$image = '/home/baumuin/public_html/wordle/bildeVardulim.jpg';

//Twitter autentificēšanās
$tmhOAuth = new tmhOAuth(array(
  'consumer_key'    => 'consumer_key',
  'consumer_secret' => 'consumer_secret',
  'user_token'      => 'user_token',
  'user_secret'     => 'user_secret',
));

// echo "<pre>";
// echo $text;
// echo "</pre>";

if(date('l') == "Sunday"){
	include('/home/baumuin/public_html/wordle/savechart.php');
	$code = $tmhOAuth->request(
	  'POST',
	  'https://api.twitter.com/1.1/statuses/update_with_media.json',
	  array(
		'media[]'  => file_get_contents($image),
		'status'   => $text,
	  ),
	  true,
	  true 
	);
}else{
	$code = $tmhOAuth->request(
	  'POST',
	  'https://api.twitter.com/1.1/statuses/update.json',
	  array(
		'status'   => $text,
	  ),
	  true,
	  true 
	);
}


if ($code == 200) {
  var_dump(json_decode($tmhOAuth->response['response']));
} else {
  var_dump($tmhOAuth->response['response']);
}