<?
function calendar($toyear='', $tomonth='', $today='') {
    $cal['toyear'] = $toyear? : date('Y');
    $cal['tomonth'] = $tomonth? : date('n');
    $cal['today'] = $today? : date('j');

    $sday = mktime(0,0,0,$cal['tomonth'],1,$cal['toyear']);
    $day = mktime(0,0,0,$cal['tomonth'],$cal['today'],$cal['toyear']);
    $cal['eday'] = date('t', $day);
    $eday = mktime(0,0,0,$cal['tomonth'],$cal['eday'],$cal['toyear']);

    $cal['sday_week'] = date('w', $sday); // 1 : 0-6 sun-sat
    $cal['day_week'] = date('w', $day); // 1 : 0-6 sun-sat
    $cal['eday_week'] = date('w', $eday); // last day 28-31

    $firstweek = $cal['sday_week'];
    $lastweek = $cal['eday_week'];
    $html = '
<table class="calendar">
    <tr class="month">
        <td colspan="7">'.$cal["toyear"].'-'.$cal["tomonth"].'</td>
    </tr>
    <tr class="week">
        <td>SUN</td>
        <td>MON</td>
        <td>TUE</td>
        <td>WED</td>
        <td>THU</td>
        <td>FRI</td>
        <td>SAT</td>
    </tr>
    <tr class="day">
';

    for($i=0;$i<$firstweek;$i++) {
        $html .= "
        <td>&nbsp;</td>";
    }

    for($i=1;$i<=$cal['eday'];$i++) {
        $html .= "
        <td".(($i == $cal['today'])?' class="today"':'').">".$i."</td>";
        if($firstweek % 7 == 6) {
            $html .= '
    </tr>
    <tr class="day">
';
        }
        $firstweek++;
    }

    for($i=0;$i<(6-$lastweek);$i++) {
        $html .= "
        <td>&nbsp;</td>";
    }

    $html .= "
    </tr>
</table>
";

    return $html;
}
?>
