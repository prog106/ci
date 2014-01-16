<?
class Auth {
    function __construct() {
        $cookieconfig = &get_instance();
        $this->cookiekey = $cookieconfig->config->item('Cookie_KEY');
    }
    public function login($email, $pwd) {
        $user = array(
            'prog106' => array(
                'pwd' => 'fed33392d3a48aa149a87a38b875ba4a',
                'name' => 'lsk',
                'srl' => '1234',
            ),
        );

        if(empty($user[$email])) {
            return array('status' => 'FAIL', 'result' => '이메일 없음');
        }
        if($user[$email]['pwd'] != $pwd) {
            return array('status' => 'FAIL', 'result' => '비밀번호 틀림');
        }
        return array('status' => 'OK', 'result' => array('usersrl' => $user[$email]['srl']));
    }
}
?>
