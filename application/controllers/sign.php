<?
class Sign extends CI_Controller {
    function __construct() {
        parent::__construct();
        //$split = explode('/', $_SERVER['HTTP_REFERER'], 4);
        //$this->referer = ($split[4])? $split[4] : 'start';
    }
    public function login() {
        $email = $_POST['login_email'];
        $pwd = md5($_POST['login_pwd']);

        $res = $this->auth->login($email, $pwd);
        if($res['status'] != 'OK') {
            header('Location: /start/info');
            exit();
        }
        $return = $res['result'];
        $this->load->helper('cookie');
        $cookie_array = array(
            'name' => 'is_login',
            'value' => $this->encrypt->encode($return['usersrl'].$this->config->item('Cookie_KEY').$email),
            'expire' => 60 * 60 * 24 * 1,
            'domain' => 'localhost',
            'path' => '/',
            'prefix' => '',
            'secure' => false,
        );
        $this->input->set_cookie($cookie_array);
        header('Location: /start');
    }
    public function logout() {
        $this->load->helper('cookie');
        $cookie_array = array(
            'name' => 'is_login',
            'domain' => 'localhost',
            'path' => '/',
            'prefix' => '',
        );
        delete_cookie($cookie_array);
        header('Location: /start');
    }
}
?>
