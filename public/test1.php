<?PHP

/*
 * Ask.fm ask question bot, ver 0.1
 * Bot can automatically login to your account and ask questions
 * required: Questions e.g. from mysql and nicks to ask
 * */


define('SETUSERAGENT', 'Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1)');
function echow($text) {
    if (isset($_SERVER{'TERM'})) {
        echo $text . "\t\n";
    } else {
        echo $text . "<br />";
    }
    ob_flush();
    flush();
    ob_end_flush();
    ob_start();
}
function getToken() {
    $curl = curl_init();
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);
                curl_setopt($curl, CURLOPT_URL, 'http://ask.fm/login/');
                curl_setopt($curl, CURLOPT_COOKIEJAR, getcwd()."cookie.txt");
                curl_setopt($curl, CURLOPT_COOKIEFILE, getcwd()."cookie.txt");
                $b0x = curl_exec($curl);
                preg_match('/<input name="authenticity_token" type="hidden" value="(.*?)" /' ,$b0x ,$token);
                return $token[1];
}
function login($login, $password) {
    $token = getToken();
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);
                curl_setopt($curl, CURLOPT_URL, "http://ask.fm/session");
                curl_setopt($curl, CURLOPT_POSTFIELDS, "authenticity_token={$token}&login={$login}&password={$password}&commit=Log+in");
                curl_setopt($curl, CURLOPT_COOKIEJAR, getcwd()."cookie.txt");
                curl_setopt($curl, CURLOPT_COOKIEFILE, getcwd()."cookie.txt");
                $brute = curl_exec($curl);
}
function ask($question, $user) {
    $token = getToken();
    $curlchanel = curl_init("http://ask.fm/$user/questions/create");
    curl_setopt($curlchanel, CURLOPT_USERAGENT, SETUSERAGENT);
    curl_setopt($curlchanel, CURLOPT_COOKIEJAR, 'cookie.txt');
    curl_setopt($curlchanel, CURLOPT_COOKIEFILE, 'cookie.txt');
    curl_setopt($curlchanel, CURLOPT_HEADER, 0);
    curl_setopt($curlchanel, CURLOPT_TIMEOUT, 6);
    curl_setopt($curlchanel, CURLOPT_RETURNTRANSFER, 0);
    curl_setopt($curlchanel, CURLOPT_POSTFIELDS, trim("authenticity_token=$token&question%5Bquestion_text%5D=$question%3F&question%5Bforce_anonymous%5D=&authenticity_token=$token"));
    $wynik = curl_exec($curlchanel);
    if ($wynik != 1) {
        echow("Unable to login");
        die;
    }
    
}
login('a1750018@trbvm.com', 'gf1f3mk5');
ask('Whats up?', 'MikielD');