<?php
class Start extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->model('dental', 'dental');
        //$this->load->helper('url');
        $this->load->view('start/_head');
        //$this->xml['info'] = $xml['channel']['image'];
        //$this->xml['item'] = $xml['channel']['item'];
        $this->load->view('start/menu');
    }
    private function object2array($object) {
        return @json_decode(@json_encode($object),1);
    }
    public function xml2array($url="http://rss.egloos.com/blog/color106") {
        $xmlread = file_get_contents($url);
        return self::object2array(simplexml_load_string($xmlread, 'SimpleXMLElement', LIBXML_NOCDATA));
    }
    function index() {
        $this->load->view('start/main');
        if(BROWSER_TYPE == 'W') {
            echo "<!-- W -->";
        } else if(BROWSER_TYPE == 'M') {
            echo "<!-- M -->";
        }
    }
    function like() {
        $this->load->view('start/like');

    }
    function love() {
        $this->load->view('start/love');
    }
    function health() {
        $list = $this->dental->md_list();
        print_r('<pre>');
        print_r($list);
        print_r('</pre>');
        $this->load->view('start/health');
    }
    function favorite() {
        $this->load->view('start/favorite');
    }
    function blog() {
        $xml = self::xml2array('http://rss.egloos.com/blog/color106');
        $data['item'] = $xml['channel']['item'];
        $data['info'] = $xml['channel']['image'];
        $this->load->view('start/blog', $data);
    }
}
?>
