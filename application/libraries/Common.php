<?
class Common {
    public function debug_log($var="no data")
    {
        ob_start();
        print_r($var);
        $str = ob_get_clean();
        $str = "\n".$str."\n";

        $fp = fopen('/Users/prog106/Sites/LOG/prog106log', 'a');
        fputs($fp, $str);
        fclose($fp);
    }
    public function debug($var="no data", $die=false) {
        echo "<div style='border:1px solid #FF0000;padding:5px'><pre>";
        print_r($var);
        echo "</pre></div>";
        if($die) die;
    }
}
?>
