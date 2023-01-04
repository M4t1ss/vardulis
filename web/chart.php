<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="lv" lang="lv">
<head>
<title>Vārduļa statistika</title>
<meta name="viewport" content="width=320, initial-scale=1.0" />
<meta charset=UTF-8>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
</head>
<body>
<?php
header("Content-Type: text/html; charset=utf-8");
$connection = mysqli_connect("localhost", "username", "password", "database");
mysqli_set_charset($connection, "utf8mb4");

$minejumi = array();
$latest = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses`
									WHERE date > DATE_SUB(curdate(),INTERVAL 3 WEEK) GROUP BY datums ORDER BY datums ASC");
$viens = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` 
									WHERE date > DATE_SUB(curdate(),INTERVAL 3 WEEK) AND CHAR_LENGTH(guesses) = 6 GROUP BY datums ORDER BY datums ASC ");
$divi = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` 
									WHERE date > DATE_SUB(curdate(),INTERVAL 3 WEEK) AND CHAR_LENGTH(guesses) = 11 GROUP BY datums ORDER BY datums ASC ");
$tris = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` 
									WHERE date > DATE_SUB(curdate(),INTERVAL 3 WEEK) AND CHAR_LENGTH(guesses) = 17 GROUP BY datums ORDER BY datums ASC ");
$cetri = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` 
									WHERE date > DATE_SUB(curdate(),INTERVAL 3 WEEK) AND CHAR_LENGTH(guesses) = 23 GROUP BY datums ORDER BY datums ASC ");
$pieci = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` 
									WHERE date > DATE_SUB(curdate(),INTERVAL 3 WEEK) AND CHAR_LENGTH(guesses) = 29 GROUP BY datums ORDER BY datums ASC ");
$sesi = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` 
									WHERE date > DATE_SUB(curdate(),INTERVAL 3 WEEK) AND CHAR_LENGTH(guesses) = 35 GROUP BY datums ORDER BY datums ASC ");

$atbildes = ['tumšā', 'audio', 'tikai', 'fonds', 'rozes', 'jauna', 'skaļi', 'zāles', 'baltā', 'vārda', 'dzīvē', 'neņem', 'spīti', 'dodot', 'metru', 'krāsā', 'bažām', 'ziņot', 'viena', 'jumtu', 'miltu', 'dzīvs', 'jumta', 'saldo', 'tīras', 'ģirts', 'konts', 'jēgas', 'adobe', 'bieži', 'šuves', 'kokus', 'kārļa', 'peļņa', 'dziļu', 'trešā', 'sāktu', 'sešas', 'modes', 'dārzi', 'upuri', 'gaitā', 'ielām', 'plānu', 'kaitē', 'ogles', 'draud', 'turku', 'bieža', 'tiesa', 'bērnu', 'zinot', 'stāvu', 'tirgu', 'kursā', 'kaklu', 'soļus', 'tumši', 'vannā', 'tauki', 'galdu', 'dievs', 'kazas', 'liene', 'mieru', 'cīņas', 'celta', 'vakar', 'puses', 'plaša', 'krāsu', 'tāpat', 'algas', 'ciema', 'ilgāk', 'likts', 'labas', 'esoša', 'prece', 'ielej', 'aveņu', 'tīrīt', 'pasts', 'vēlāk', 'savām', 'raiņa', 'maigi', 'baudu', 'tērpu', 'flīžu', 'grozā', 'klusā', 'laiku', 'zemēm', 'jāņem', 'pusei', 'laiks', 'vērts', 'darāt', 'garām', 'reizē', 'bloku', 'lietu', 'datus', 'tādos', 'likmi', 'putnu', 'labās', 'balto', 'tajos', 'ozola', 'zirgu', 'ūdenī', 'sūkņu', 'daļās', 'tapis', 'svaru', 'kļūda', 'ieved', 'ieceļ', 'lampu', 'nervu', 'sešām', 'saišu', 'lieli', 'uzvar', 'grūts', 'dārzs', 'sirds', 'ticis', 'zieds', 'amats', 'drošs', 'reižu', 'maija', 'tests', 'posmu', 'laima', 'smagu', 'slavu', 'laiki', 'šķist', 'norit', 'sievu', 'dabai', 'saulē', 'drošā', 'šūnas', 'valkā', 'tiesu', 'ātras', 'katli', 'groza', 'radīt', 'kurss', 'artis', 'īpašu', 'sodus', 'tuvāk', 'zinām', 'rokām', 'spēle', 'testu', 'tiešā', 'veidi', 'galvu', 'segtu', 'marta', 'tumšs', 'dāmas', 'darbs', 'paver', 'četru', 'tādēļ', 'anita', 'pilnā', 'klasi', 'bijām', 'lielā', 'vides', 'likme', 'brīdī', 'bloki', 'vieno', 'martā', 'garās', 'šajās', 'plāni', 'pilda', 'aptur', 'vērtē', 'irāna', 'nodot', 'sākot', 'jauku', 'tonnu', 'slēgt', 'tīkla', 'gaita', 'veids', 'tavas', 'varas', 'sešos', 'plaza', 'divos', 'dažas', 'grozu', 'arēnā', 'nonāk', 'ārēji', 'seksa', 'brāļu', 'jogas', 'salas', 'dziļa', 'varēs', 'kausā', 'zonas', 'kursu', 'šūnās', 'spēku', 'viļņā', 'ieiet', 'maiņa', 'tiešu', 'spēks', 'laikā', 'plīts', 'tālab', 'prātā', 'zvanu', 'vairs', 'silta', 'nekad', 'balsi', 'melnu', 'gribu', 'karšu', 'liela', 'cūkas', 'bērns', 'sejas', 'teica', 'uztur', 'sloga', 'gaisa', 'redzu', 'meita', 'lūdzu', 'vienā', 'glāzi', 'labad', 'šādos', 'katlu', 'jaudu', 'ciest', 'store', 'sāpēm', 'zemei', 'gaida', 'preci', 'dažos', 'valda', 'eļļas', 'tēmām', 'gulta', 'tirgi', 'sakņu', 'lasot', 'slāņa', 'videi', 'zemes', 'kaste', 'bilde', 'tīkls', 'faktu', 'izdot', 'jauki', 'galds', 'ogres', 'kaulu', 'gāzes', 'koris', 'jomās', 'galvā', 'turēt', 'ciklā', 'sekām', 'veica', 'darbu', 'sesto', 'brīdi', 'seksu', 'pants', 'tomēr', 'normu', 'rasas', 'mazās', 'angļu', 'galva', 'fondu', 'klasē', 'zaudē', 'sākās', 'diena', 'vērot', 'svēto', 'abeji', 'tātad', 'kļūst', 'pleca', 'firma', 'ārstu', 'roida', 'kājās', 'laura', 'visai', 'jūras', 'teikt', 'pirts', 'meklē', 'koļļa', 'tīklu', 'trasē', 'mājās', 'gluži', 'slāni', 'kuģis', 'apols', 'posmi', 'jūtos', 'grūti', 'zelts', 'šādus', 'tagad', 'jūkla', 'līmes', 'melno', 'minēt', 'tērēt', 'multi', 'prese', 'durns', 'ielas', 'jauns', 'ciklu', 'cīnās', 'mātei', 'pūles', 'čaiba', 'ātrāk', 'sēdes', 'saņem', 'esošo', 'zīmēm', 'ģeida', 'siltā', 'kūkas', 'metro', 'parki', 'būvju', 'vēlmi', 'saukt', 'aplam', 'domāt', 'vidus', 'mājai', 'sauca', 'līgas', 'mazos', 'mulda', 'asins', 'kādam', 'grozs', 'atgūt', 'telpā', 'tārpi', 'buļba', 'siers', 'gluda', 'mērci', 'josla', 'marka', 'balva', 'īksti', 'dūcis', 'collu', 'jomām', 'cenām', 'siltu', 'darīs', 'ganga', 'banku', 'dzīve', 'zeķes', 'pauls', 'sākam', 'īpašs', 'apals', 'devos', 'vēzis', 'savam', 'lielu', 'radās', 'parka', 'kaive', 'linda', 'zemju', 'naudu', 'nieze', 'putas', 'britu', 'čabis', 'lētāk', 'rāmja', 'pārāk', 'cikla', 'pretī', 'zvani', 'mārša', 'kontā', 'rotas', 'dārgs', 'gadus', 'purva', 'daļas', 'ģeņģe', 'sprēž', 'urīnā', 'maizi', 'kājas', 'ziema', 'visas', 'ģieda', 'dzīvā', 'balts', 'mīlas', 'mītne', 'cīņai', 'lieko', 'garga', 'lūgts', 'tiešo', 'riepu', 'vērst', 'mazāk', 'milti', 'grods', 'rokas', 'maize', 'ledus', 'jādod', 'sešus', 'kartē', 'zeija', 'elīna', 'baltu', 'klajā', 'gudrs', 'klase', 'avīze', 'zārds', 'lakas', 'kāpēc', 'iegūt', 'savus', 'kursa', 'devis', 'ķipis', 'kursi', 'sausā', 'gultā', 'sugām', 'puiši', 'tropu', 'čalus', 'visam', 'sākta', 'posms', 'kipra', 'malta', 'cieto', 'kaiva', 'grāds', 'noved', 'fonda', 'labot', 'krīzi', 'būsim', 'aduta', 'fondā', 'tieša', 'marku', 'apars', 'tādam', 'plūdu', 'lanka', 'telts', 'grupu', 'cikls', 'kauns', 'kungs', 'māsas', 'gaizs', 'dzied', 'skats', 'paust', 'viņus', 'panta', 'plāna', 'ķīris', 'driķi', 'sienu', 'metri', 'garas', 'bāzes', 'grīdu', 'apķis', 'grādi', 'spētu', 'mačos', 'miers', 'mīlēt', 'mirst', 'graba', 'vaska', 'uzsāk', 'pašam', 'ieņem', 'tartu', 'diska', 'ķozis', 'kapos', 'fakti', 'ņemot', 'ideja', 'mizas', 'fakts', 'ķosis', 'gaiss', 'diski', 'posmā', 'zivis', 'reālā', 'trešo', 'ķocis', 'dienu', 'gaurs', 'sūkņa', 'sācis', 'virsū', 'varat', 'sābri', 'zutne', 'nieru', 'testa', 'kalni', 'vēlme', 'sauss', 'ķērne', 'ārējo', 'mātes', 'presē', 'sausu', 'litru', 'svētā', 'kauka', 'savos', 'kāzas', 'dodas', 'kuģim', 'patīk', 'jautā', 'rīlis', 'rāmis', 'tādas', 'lidot', 'zarnu', 'slots', 'tiltu', 'ģidrs', 'mazām', 'stars', 'manis', 'dārza', 'mātēm', 'ķīnas', 'rodas', 'kurām', 'bauda', 'plūst', 'vieni', 'kādos', 'augļa', 'kuģus', 'kakls', 'īsāks', 'smaga', 'ārstē', 'kļūdu', 'upuru', 'tautu', 'prasa', 'veidā', 'plāns', 'kalnā', 'disks', 'prātu', 'kases', 'kungu', 'uguns', 'lētas', 'ziņām', 'kunga', 'ziņas', 'ticēt', 'garšu', 'tilts', 'muiža', 'rūpes', 'maska', 'cūkām', 'trošu', 'ūdeņi', 'ražot', 'bieza', 'citus', 'apaļa', 'pašai', 'būvēt', 'ūdeni', 'tevis', 'citur', 'bērna', 'kādas', 'avoti', 'dēlam', 'runas', 'saule', 'cēsis', 'viņām', 'kļuva', 'gaiši', 'pantu', 'diētu', 'spēki', 'augļu', 'kamēr', 'ārsti', 'šogad', 'peles', 'griba', 'reāli', 'zonām', 'dzīvo', 'silts', 'skata', 'retos', 'maina', 'leļļu', 'peļņu', 'saūda', 'seifs', 'tālāk', 'lieki', 'katrā', 'gaisu', 'dzert', 'augļi', 'balvu', 'vēnas', 'uldis', 'cieņa', 'nakts', 'sodīt', 'bumbu', 'lielo', 'dotos', 'citai', 'siena', 'pieci', 'sākat', 'mācīt', 'manām', 'pirmā', 'rīkot', 'sevis', 'zemēs', 'zaļās', 'visām', 'kuram', 'allaž', 'lēcas', 'laika', 'ausis', 'vilks', 'grupa', 'astes', 'laimi', 'ražas', 'saite', 'kalna', 'paņem', 'lampa', 'smago', 'īrija', 'kastē', 'stūra', 'prāga', 'zīmju', 'meitu', 'ilgst', 'esošā', 'talsu', 'kurai', 'testā', 'summa', 'tīkli', 'aknām', 'šarmu', 'alkas', 'nevar', 'spēlē', 'domas', 'tirgo', 'īstas', 'šādam', 'reālo', 'mežos', 'masku', 'cinka', 'pūtīs', 'tūska', 'valdē', 'bloķē', 'sakām', 'plašu', 'radio', 'bažas', 'sfērā', 'viens', 'tajās', 'zivīm', 'ostām', 'klubu', 'litri', 'avotu', 'stilu', 'grupā', 'sēnes', 'mēles', 'sūtīt', 'kārtu', 'otram', 'zemāk', 'risks', 'sanāk', 'vārdu', 'audzē', 'devās', 'jauks', 'ielai', 'lapām', 'lapās', 'paula', 'plāno', 'lūgti', 'lācis', 'bēgļu', 'viņam', 'slimo', 'vielu', 'pašas', 'sākām', 'nomas', 'lifts', 'būves', 'shēmu', 'brūns', 'pienu', 'mājas', 'labus', 'esiet', 'ideju', 'atdot', 'visos', 'burtu', 'lomas', 'miera', 'plašā', 'palmu', 'spēja', 'spēļu', 'dārga', 'vārdi', 'šādās', 'miega', 'augšā', 'sēdēt', 'veiks', 'gatve', 'bankā', 'lieta', 'devas', 'viļņa', 'salām', 'marts', 'šādas', 'balta', 'bijis', 'fondi', 'andra', 'kārta', 'darbi', 'kontu', 'kuros', 'dažām', 'kaķis', 'līdzi', 'tāpēc', 'slims', 'divus', 'slogs', 'āzijā', 'vārti', 'svari', 'laukā', 'liekā', 'dārzā', 'sapni', 'pirmo', 'maiņu', 'kuņģa', 'ceram', 'rubļu', 'leņķi', 'ausīm', 'čūlas', 'īpaši', 'ņemtu', 'nācis', 'grami', 'veida', 'izeju', 'lapas', 'jēzus', 'plānā', 'brīža', 'forma', 'pašus', 'krēms', 'olīvu', 'teicu', 'trase', 'manam', 'sapņu', 'piens', 'retāk', 'domes', 'plēve', 'visās', 'žults', 'govju', 'gulēt', 'sieru', 'nomāc', 'ceļot', 'brāli', 'parks', 'zveju', 'kvotu', 'audus', 'garša', 'džons', 'sākas', 'redzi', 'uguni', 'šķiet', 'pilis', 'nebūt', 'zālēm', 'izdod', 'savas', 'ļaužu', 'lieto', 'kuņģī', 'ienāk', 'salās', 'tūres', 'gadam', 'ārpus', 'karte', 'vīzas', 'sieva', 'testi', 'ņemti', 'kopas', 'piena', 'kakao', 'fāzes', 'viļņi', 'galam', 'lugas', 'video', 'gudri', 'apgūt', 'stāvs', 'tukša', 'balss', 'skaņu', 'ostas', 'izjūt', 'kalns', 'piecu', 'darba', 'asiņu', 'ilgas', 'daļai', 'joslā', 'plašs', 'nemaz', 'zināt', 'maijs', 'barot', 'cieņu', 'katrs', 'žanra', 'prāta', 'parku', 'ieeja', 'sulas', 'visus', 'inese', 'drošu', 'cieši', 'ārējā', 'ātrās', 'matus', 'gatis', 'klepu', 'ciešā', 'siera', 'proti', 'brīvs', 'preču', 'diāna', 'banka', 'super', 'labāk', 'kodus', 'spēka', 'glabā', 'bumba', 'likās', 'velti', 'veido', 'ezera', 'gunta', 'klāja', 'kāpņu', 'reisu', 'jāsāk', 'arnis', 'agrāk', 'ģints', 'apavu', 'ādažu', 'gultu', 'brīva', 'viņai', 'astra', 'katru', 'toņos', 'ārsts', 'ātrie', 'riski', 'sauso', 'patur', 'izzūd', 'vannu', 'vista', 'augšu', 'aktos', 'tauta', 'tādai', 'sapņi', 'zvana', 'nupat', 'vētra', 'kakla', 'svara', 'tumsā', 'abiem', 'borta', 'nekur', 'diēta', 'gaitu', 'stūrī', 'niezi', 'cieta', 'takas', 'iziet', 'cilts', 'iveta', 'glābt', 'svina', 'uzņem', 'jāiet', 'starp', 'zīmes', 'tēvam', 'staru', 'vieta', 'lietā', 'rauga', 'telpa', 'manai', 'klubā', 'jānis', 'veikt', 'īpaša', 'jābūt', 'reizi', 'plecu', 'šajos', 'ķīlas', 'guvis', 'savās', 'smagi', 'tārpu', 'grīda', 'kājām', 'viņas', 'formā', 'paiet', 'jaunu', 'spāņu', 'kiprā', 'domām', 'brāļi', 'tiktu', 'spēju', 'kaula', 'maksā', 'tēmas', 'smags', 'lauks', 'jauno', 'kavēt', 'dušas', 'cimdi', 'bloka', 'otrai', 'lasīt', 'zobus', 'pastā', 'runāt', 'melna', 'mamma', 'žestu', 'gripu', 'iznāk', 'satur', 'izceļ', 'štata', 'jānim', 'īrijā', 'karti', 'radot', 'akūtu', 'pēdas', 'lepni', 'ciems', 'gints', 'brīvu', 'avota', 'formu', 'darbā', 'konta', 'romas', 'mazas', 'atver', 'itāļu', 'pases', 'krūmu', 'joslu', 'pantā', 'šūnām', 'filmā', 'gudra', 'parkā', 'vajag', 'dažās', 'plašo', 'droša', 'cīņās', 'beigu', 'filmu', 'posma', 'maksa', 'dievu', 'sirdi', 'krēmu', 'pastu', 'datos', 'atceļ', 'kāršu', 'dzēst', 'mazie', 'maksu', 'mērķu', 'tiesā', 'klašu', 'daudz', 'veidu', 'grādu', 'valde', 'pašām', 'somas', 'apavi', 'anāls', 'vārdā', 'ķēdes', 'krūšu', 'nebūs', 'kausu', 'saiti', 'šaubu', 'liels', 'kurās', 'dažus', 'masas', 'rādīt', 'sauna', 'klubs', 'īsumā', 'biezu', 'tipam', 'lauka', 'vadīt', 'rīgas', 'vietā', 'krūts', 'augus', 'nācās', 'katra', 'citas', 'vecās', 'devām', 'skatu', 'aktus', 'veļas', 'stāvā', 'plate', 'norma', 'tādus', 'kravu', 'pauda', 'vecas', 'spēli', 'savāc', 'sekss', 'tirgū', 'izeja', 'darīt', 'vanna', 'galda', 'pilnu', 'aknas', 'reaģē', 'visur', 'nauda', 'krāsa', 'tikās', 'tīklā', 'gaļas', 'mammu', 'tējas', 'amata', 'solis', 'ņemta', 'manas', 'bērni', 'kopēt', 'audos', 'radīs', 'kļūtu', 'rīkus', 'jūtas', 'stils', 'riska', 'ezers', 'avots', 'gadās', 'pēdām', 'sausa', 'ozols', 'telpu', 'otrās', 'miegu', 'nekas', 'dabas', 'cēsīs', 'milzu', 'vadīs', 'ūdens', 'čības', 'smagā', 'mājām', 'krēmi', 'miris', 'kādai', 'solim', 'tilta', 'ziedi', 'amatu', 'simti', 'divās', 'tūlīt', 'sekas', 'brīvi', 'dziļi', 'skolu', 'liedz', 'sirdī', 'eļļām', 'plusi', 'ranga', 'dejas', 'kurus', 'ārsta', 'sakot', 'krasi', 'ņemts', 'vainu', 'dāvis', 'citās', 'dienā', 'zeltu', 'sēklu', 'māris', 'shēma', 'brīvo', 'elpot', 'droši', 'plaši', 'tieši', 'bloks', 'uzdod', 'pasta', 'kauss', 'ostās', 'uzdot', 'laivu', 'neesi', 'divām', 'putni', 'krīze', 'sojas', 'tādās', 'mīklu', 'shēmā', 'lūdza', 'laist', 'vēlos', 'gaisā', 'tepat', 'kalnu', 'opera', 'atkal', 'igors', 'sekmē', 'nakti', 'malas', 'juris', 'summu', 'aitas', 'zemas', 'arābu', 'slejā', 'viela', 'slēpt', 'nevis', 'ezeru', 'otras', 'disku', 'ziedu', 'dzīvu', 'gājis', 'iegūs', 'vīnes', 'rindā', 'gribi', 'pirkt', 'sūkņi', 'malām', 'cauri', 'noņem', 'akūta', 'vēsta', 'reāla', 'mērķa', 'katls', 'melns', 'kārtā', 'gados', 'rokās', 'ceļam', 'ezerā', 'dārzu', 'lauki', 'dzīvi', 'atrod', 'cenās', 'villa', 'varam', 'šķita', 'lēsts', 'pilns', 'pirms', 'sāpes', 'ķiršu', 'džeza', 'rindu', 'firmu', 'senās', 'šorīt', 'dārgi', 'zupas', 'nāves', 'ainas', 'vienu', 'esošu', 'jomas', 'grēku', 'vārtu', 'stila', 'tauku', 'santa', 'galdi', 'četri', 'vietu', 'īpašā', 'slogu', 'tētis', 'mierā', 'viesu', 'iekšā', 'kalpo', 'sauli', 'krūti', 'nākas', 'naktī', 'prāts', 'rinda', 'zilās', 'dieva', 'zivju', 'tādām', 'darot', 'sekos', 'atzīt', 'stāva', 'cietā', 'amatā', 'segas', 'vārds', 'vadot', 'īpašo', 'gaidu', 'daļām', 'lauku', 'ērtāk', 'zelta', 'pienā', 'brīvā', 'sāpju', 'brauc', 'mutes', 'adatu', 'filma', 'balti', 'kungi', 'skola', 'viesi', 'maijā', 'kausa', 'jaunā', 'kādām', 'mācās', 'ielās', 'pilna', 'jumts', 'urīna', 'nesen', 'rīgai', 'ciemā', 'ēriks', 'maltā', 'baiba', 'vēlas', 'ļautu', 'nedod', 'kādēļ', 'skolā', 'dalās', 'elpas', 'citam', 'medus', 'leņķa', 'annas', 'reālu', 'ziemā', 'savai', 'tukšā', 'stilā', 'kāzām', 'sugas', 'pērnā', 'biržā', 'aknās', 'naudā', 'skaņa', 'ivars', 'citām', 'svars', 'jauda', 'risku', 'simts', 'jauka', 'cerēt', 'jauni', 'sīkāk', 'triju', 'darām', 'balsu', 'reize', 'reāls', 'mantu', 'pētīt', 'šādām', 'putns', 'spēkā', 'kuras', 'laime', 'viļņu', 'torņa', 'pusēs', 'sekot', 'sapņo', 'klubi', 'zonās', 'dabūt', 'ābolu', 'pazūd', 'domās', 'divas', 'pāris', 'citos', 'ģipša', 'katla', 'konti', 'oļegs', 'tikko', 'jostu', 'melnā', 'nodod', 'šādai', 'mērķi', 'pogas', 'lēnām', 'ūdeņu', 'kādus', 'kluba', 'cenas', 'ceļus'];

$gadaDiena = date('z');
$max = 0;
echo "<pre>";
for ($i = 27; $i <= $gadaDiena; $i++){
	$atbilde = mb_strtoupper($atbildes[$i]);
	$j=$i+1;
	if ($j < 10) $j = "00".$j;
	if ($j < 100) $j = "0".$j;
	$pareizie = mysqli_query($connection, "SELECT DISTINCT DATE_FORMAT(date, '%Y.%m.%d') datums, COUNT(*) skaits FROM `guesses` 
											WHERE date > DATE_SUB(curdate(),INTERVAL 3 WEEK) AND DATE_FORMAT(date, '%j') LIKE '$j' AND guesses LIKE '%$atbilde%'
											GROUP BY datums ORDER BY datums ASC");
											
	$p = mysqli_fetch_array($pareizie);
	$datums = $p["datums"];
	$skaits = $p["skaits"];
	$minejumi[$datums]['vards'] = $atbilde;
	$minejumi[$datums]['pareizi'] = $skaits;
	if($skaits > $max) $max = $skaits;

}

while($p=mysqli_fetch_array($latest)){
	$datums = $p["datums"];
	$skaits = $p["skaits"];
	$minejumi[$datums]['skaits'] = $skaits;
}
$prevDay = false;
while($p=mysqli_fetch_array($viens)){
	$datums = $p["datums"];
	$skaits = $p["skaits"];
	$minejumi[$datums]['1x'] = $skaits;
	
	$dp = explode(".", $datums);
	$today = strtotime($dp[2].".".$dp[1].".".$dp[0]);
	$check = strtotime('+1 day', $prevDay);
	
	if($prevDay != false && $check != $today){
		$minejumi[date('Y.m.d', $check)]['1x'] = 0;
	}
	$prevDay = $today;
}
$prevDay = false;
while($p=mysqli_fetch_array($divi)){
	$datums = $p["datums"];
	$skaits = $p["skaits"];
	$minejumi[$datums]['2x'] = $skaits;
	
	$dp = explode(".", $datums);
	$today = strtotime($dp[2].".".$dp[1].".".$dp[0]);
	$check = strtotime('+1 day', $prevDay);
	
	if($prevDay != false && $check != $today){
		$minejumi[date('Y.m.d', $check)]['2x'] = 0;
	}
	$prevDay = $today;
}
$prevDay = false;
while($p=mysqli_fetch_array($tris)){
	$datums = $p["datums"];
	$skaits = $p["skaits"];
	$minejumi[$datums]['3x'] = $skaits;
	
	$dp = explode(".", $datums);
	$today = strtotime($dp[2].".".$dp[1].".".$dp[0]);
	$check = strtotime('+1 day', $prevDay);
	
	if($prevDay != false && $check != $today){
		$minejumi[date('Y.m.d', $check)]['3x'] = 0;
	}
	$prevDay = $today;
}
$prevDay = false;
while($p=mysqli_fetch_array($cetri)){
	$datums = $p["datums"];
	$skaits = $p["skaits"];
	$minejumi[$datums]['4x'] = $skaits;
	
	$dp = explode(".", $datums);
	$today = strtotime($dp[2].".".$dp[1].".".$dp[0]);
	$check = strtotime('+1 day', $prevDay);
	
	if($prevDay != false && $check != $today){
		$minejumi[date('Y.m.d', $check)]['4x'] = 0;
	}
	$prevDay = $today;
}
$prevDay = false;
while($p=mysqli_fetch_array($pieci)){
	$datums = $p["datums"];
	$skaits = $p["skaits"];
	$minejumi[$datums]['5x'] = $skaits;
	
	$dp = explode(".", $datums);
	$today = strtotime($dp[2].".".$dp[1].".".$dp[0]);
	$check = strtotime('+1 day', $prevDay);
	
	if($prevDay != false && $check != $today){
		$minejumi[date('Y.m.d', $check)]['5x'] = 0;
	}
	$prevDay = $today;
}
$prevDay = false;
while($p=mysqli_fetch_array($sesi)){
	$datums = $p["datums"];
	$skaits = $p["skaits"];
	$minejumi[$datums]['6x'] = $skaits;
	
	$dp = explode(".", $datums);
	$today = strtotime($dp[2].".".$dp[1].".".$dp[0]);
	$check = strtotime('+1 day', $prevDay);
	
	if($prevDay != false && $check != $today){
		$minejumi[date('Y.m.d', $check)]['6x'] = 0;
	}
	$prevDay = $today;
}
$reversed = array_reverse($minejumi);
$keys = array_keys($reversed);
echo "</pre>";
?>


<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://twitediens.lielakeda.lv/includes/jq/js/jquery-1.6.2.min.js"></script>
<script type="text/javascript">
  google.load('visualization', '1', {packages: ['corechart']});
</script>
<script type="text/javascript">
  function drawVisualization() {
	// Create and populate the data table.
	var data = google.visualization.arrayToDataTable([
	  ['x', 'X', '1', '2', '3', '4', '5', '6'],
	  ['<?php echo $reversed[$keys[14]]["vards"];?>', <?php echo (($reversed[$keys[14]]['skaits'] - $reversed[$keys[14]]['pareizi'])/$reversed[$keys[14]]['skaits']).", "; foreach ($reversed[$keys[14]] as $kk=>$vv) { if(strstr($kk,"x") && $kk!="6x") echo $vv/$reversed[$keys[14]]['skaits'].", "; if($kk=="6x") echo ($vv-($reversed[$keys[14]]['skaits'] - $reversed[$keys[14]]['pareizi']))/$reversed[$keys[14]]['skaits']; } ?>],
	  ['<?php echo $reversed[$keys[13]]["vards"];?>', <?php echo (($reversed[$keys[13]]['skaits'] - $reversed[$keys[13]]['pareizi'])/$reversed[$keys[13]]['skaits']).", "; foreach ($reversed[$keys[13]] as $kk=>$vv) { if(strstr($kk,"x") && $kk!="6x") echo $vv/$reversed[$keys[13]]['skaits'].", "; if($kk=="6x") echo ($vv-($reversed[$keys[13]]['skaits'] - $reversed[$keys[13]]['pareizi']))/$reversed[$keys[13]]['skaits']; } ?>],
	  ['<?php echo $reversed[$keys[12]]["vards"];?>', <?php echo (($reversed[$keys[12]]['skaits'] - $reversed[$keys[12]]['pareizi'])/$reversed[$keys[12]]['skaits']).", "; foreach ($reversed[$keys[12]] as $kk=>$vv) { if(strstr($kk,"x") && $kk!="6x") echo $vv/$reversed[$keys[12]]['skaits'].", "; if($kk=="6x") echo ($vv-($reversed[$keys[12]]['skaits'] - $reversed[$keys[12]]['pareizi']))/$reversed[$keys[12]]['skaits']; } ?>],
	  ['<?php echo $reversed[$keys[11]]["vards"];?>', <?php echo (($reversed[$keys[11]]['skaits'] - $reversed[$keys[11]]['pareizi'])/$reversed[$keys[11]]['skaits']).", "; foreach ($reversed[$keys[11]] as $kk=>$vv) { if(strstr($kk,"x") && $kk!="6x") echo $vv/$reversed[$keys[11]]['skaits'].", "; if($kk=="6x") echo ($vv-($reversed[$keys[11]]['skaits'] - $reversed[$keys[11]]['pareizi']))/$reversed[$keys[11]]['skaits']; } ?>],
	  ['<?php echo $reversed[$keys[10]]["vards"];?>', <?php echo (($reversed[$keys[10]]['skaits'] - $reversed[$keys[10]]['pareizi'])/$reversed[$keys[10]]['skaits']).", "; foreach ($reversed[$keys[10]] as $kk=>$vv) { if(strstr($kk,"x") && $kk!="6x") echo $vv/$reversed[$keys[10]]['skaits'].", "; if($kk=="6x") echo ($vv-($reversed[$keys[10]]['skaits'] - $reversed[$keys[10]]['pareizi']))/$reversed[$keys[10]]['skaits']; } ?>],
	  ['<?php echo $reversed[$keys[9]]["vards"];?>', <?php echo (($reversed[$keys[9]]['skaits'] - $reversed[$keys[9]]['pareizi'])/$reversed[$keys[9]]['skaits']).", "; foreach ($reversed[$keys[9]] as $kk=>$vv) { if(strstr($kk,"x") && $kk!="6x") echo $vv/$reversed[$keys[9]]['skaits'].", "; if($kk=="6x") echo ($vv-($reversed[$keys[9]]['skaits'] - $reversed[$keys[9]]['pareizi']))/$reversed[$keys[9]]['skaits']; } ?>],
	  ['<?php echo $reversed[$keys[8]]["vards"];?>', <?php echo (($reversed[$keys[8]]['skaits'] - $reversed[$keys[8]]['pareizi'])/$reversed[$keys[8]]['skaits']).", "; foreach ($reversed[$keys[8]] as $kk=>$vv) { if(strstr($kk,"x") && $kk!="6x") echo $vv/$reversed[$keys[8]]['skaits'].", "; if($kk=="6x") echo ($vv-($reversed[$keys[8]]['skaits'] - $reversed[$keys[8]]['pareizi']))/$reversed[$keys[8]]['skaits']; } ?>],
	  ['<?php echo $reversed[$keys[7]]["vards"];?>', <?php echo (($reversed[$keys[7]]['skaits'] - $reversed[$keys[7]]['pareizi'])/$reversed[$keys[7]]['skaits']).", "; foreach ($reversed[$keys[7]] as $kk=>$vv) { if(strstr($kk,"x") && $kk!="6x") echo $vv/$reversed[$keys[7]]['skaits'].", "; if($kk=="6x") echo ($vv-($reversed[$keys[7]]['skaits'] - $reversed[$keys[7]]['pareizi']))/$reversed[$keys[7]]['skaits']; } ?>],
	  ['<?php echo $reversed[$keys[6]]["vards"];?>', <?php echo (($reversed[$keys[6]]['skaits'] - $reversed[$keys[6]]['pareizi'])/$reversed[$keys[6]]['skaits']).", "; foreach ($reversed[$keys[6]] as $kk=>$vv) { if(strstr($kk,"x") && $kk!="6x") echo $vv/$reversed[$keys[6]]['skaits'].", "; if($kk=="6x") echo ($vv-($reversed[$keys[6]]['skaits'] - $reversed[$keys[6]]['pareizi']))/$reversed[$keys[6]]['skaits']; } ?>],
	  ['<?php echo $reversed[$keys[5]]["vards"];?>', <?php echo (($reversed[$keys[5]]['skaits'] - $reversed[$keys[5]]['pareizi'])/$reversed[$keys[5]]['skaits']).", "; foreach ($reversed[$keys[5]] as $kk=>$vv) { if(strstr($kk,"x") && $kk!="6x") echo $vv/$reversed[$keys[5]]['skaits'].", "; if($kk=="6x") echo ($vv-($reversed[$keys[5]]['skaits'] - $reversed[$keys[5]]['pareizi']))/$reversed[$keys[5]]['skaits']; } ?>],
	  ['<?php echo $reversed[$keys[4]]["vards"];?>', <?php echo (($reversed[$keys[4]]['skaits'] - $reversed[$keys[4]]['pareizi'])/$reversed[$keys[4]]['skaits']).", "; foreach ($reversed[$keys[4]] as $kk=>$vv) { if(strstr($kk,"x") && $kk!="6x") echo $vv/$reversed[$keys[4]]['skaits'].", "; if($kk=="6x") echo ($vv-($reversed[$keys[4]]['skaits'] - $reversed[$keys[4]]['pareizi']))/$reversed[$keys[4]]['skaits']; } ?>],
	  ['<?php echo $reversed[$keys[3]]["vards"];?>', <?php echo (($reversed[$keys[3]]['skaits'] - $reversed[$keys[3]]['pareizi'])/$reversed[$keys[3]]['skaits']).", "; foreach ($reversed[$keys[3]] as $kk=>$vv) { if(strstr($kk,"x") && $kk!="6x") echo $vv/$reversed[$keys[3]]['skaits'].", "; if($kk=="6x") echo ($vv-($reversed[$keys[3]]['skaits'] - $reversed[$keys[3]]['pareizi']))/$reversed[$keys[3]]['skaits']; } ?>],
	  ['<?php echo $reversed[$keys[2]]["vards"];?>', <?php echo (($reversed[$keys[2]]['skaits'] - $reversed[$keys[2]]['pareizi'])/$reversed[$keys[2]]['skaits']).", "; foreach ($reversed[$keys[2]] as $kk=>$vv) { if(strstr($kk,"x") && $kk!="6x") echo $vv/$reversed[$keys[2]]['skaits'].", "; if($kk=="6x") echo ($vv-($reversed[$keys[2]]['skaits'] - $reversed[$keys[2]]['pareizi']))/$reversed[$keys[2]]['skaits']; } ?>],
	  ['<?php echo $reversed[$keys[1]]["vards"];?>', <?php echo (($reversed[$keys[1]]['skaits'] - $reversed[$keys[1]]['pareizi'])/$reversed[$keys[1]]['skaits']).", "; foreach ($reversed[$keys[1]] as $kk=>$vv) { if(strstr($kk,"x") && $kk!="6x") echo $vv/$reversed[$keys[1]]['skaits'].", "; if($kk=="6x") echo ($vv-($reversed[$keys[1]]['skaits'] - $reversed[$keys[1]]['pareizi']))/$reversed[$keys[1]]['skaits']; } ?>]
	]);
	var formatter = new google.visualization.NumberFormat({pattern:'#,###%'});
	  formatter.format(data, 1);
	  formatter.format(data, 2);
	  formatter.format(data, 3);
	  formatter.format(data, 4);
	  formatter.format(data, 5);
	  formatter.format(data, 6);
	  formatter.format(data, 7);
	new google.visualization.LineChart(document.getElementById('vardi')).
		draw(data, {curveType: "none",
					'chartArea': {'width': '85%', 'height': '85%'},
                    'backgroundColor':'transparent',
					lineWidth: 4,
					  series: {
						0: { lineDashStyle: [1, 1] },
						7: { lineDashStyle: [14, 2, 2, 7] },
						2: { lineDashStyle: [4, 4] },
						3: { lineDashStyle: [5, 1, 3] },
						4: { lineDashStyle: [4, 1] },
						8: { lineDashStyle: [2, 2, 20, 2, 20, 2] },
						5: { lineDashStyle: [10, 2] },
						6: { lineDashStyle: [14, 2, 7, 2] }
					  },
					vAxis: {
					  format: "#,###%",
					  viewWindowMode:'explicit',
					  viewWindow:{
						max:0.5,
						min:0.0
					  }
					},
 					colors: ['#de425b', '#488f31', '#8fa94d', '#cbc474', '#ffe0a3', '#f8b177', '#ef7d5f']
			  }
			);
  }
  google.setOnLoadCallback(drawVisualization);
  $(window).resize(drawVisualization);
</script><br/><br/>
<div style="text-align:center;font-weight:bold;">Minējumu sadalījums</div>
<div style="background-color:white;border-radius:8px;width:100%;height:550px;margin:auto;" id="vardi"></div>
</div>
</body>
</html>