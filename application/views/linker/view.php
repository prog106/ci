<? $this->load->view('linker/head'); ?>
<? $this->load->view('linker/sns'); ?>
<table class="linker_table" ng-controller="LinkerCtrl">
    <tr ng-repeat="url in urllist">
        <td class="td_cont"><h6 style="color:#999">{{url.comment}} <small>({{url.reg}})</small></h6><span class="run" data-tp="{{url.tp}}" data-url="{{url.url}}"><h6>{{url.url}}</h6></span></td>
        <td class="td_go gourl" data-url="{{url.url}}"><img src="/static/img/icons/glyphicons_160_imac.png" width="15"></td>
    </tr>
</table>
<script>
var linkApp = angular.module('ngLinker',[]);
linkApp.controller("LinkerCtrl", ['$scope', function($scope) {
    $scope.urllist = [
<?
foreach($list as $k => $v):
    echo "{'tp':'".$v['tp']."','srl':'".$v['srl']."','comment':'".((empty($v['comment']))?"No Comment":$v['comment'])."','reg':'".substr($v['regdate'],2,8)."','url':'".$v['url']."'},
";
endforeach;
?>
    ];
}]);

$(function() {
    $('.run').each(function() {
        var tp = $(this).data('tp');
        switch(tp) {
        case 'youtubewatch' :
            var tube = $(this).data('url');
            tube = tube.substr(31,11);
            $(this).before("<iframe width=\"280\" src=\"//www.youtube.com/embed/"+tube+"\" frameborder=\"0\" allowfullscreen></iframe>");
            break;
        case 'youtubeembed' :
            var tube = $(this).data('url');
            tube = tube.substr(29,11);
            $(this).before("<iframe width=\"280\" src=\"//www.youtube.com/embed/"+tube+"\" frameborder=\"0\" allowfullscreen></iframe>");
            break;
        case 'youtube' :
            var tube = $(this).data('url');
            tube = tube.substr(16,11);
            $(this).before("<iframe width=\"280\" src=\"//www.youtube.com/embed/"+tube+"\" frameborder=\"0\" allowfullscreen></iframe>");
            break;
        case 'image' :
            $(this).before("<img src=\""+$(this).data('url')+"\" style=\"max-width:280px;min-width:50px;\">");
            break;
        case 'vimeo' :
            var vime = $(this).data('url');
            vime = vime.substr(37,11);
            $(this).before("<iframe width=\"280\" src=\"//player.vimeo.com/video/"+vime+"\" frameborder=\"0\" allowfullscreen></iframe>");
            break;
        case 'youku' :
            var yk = $(this).data('url');
            yk = yk.substr(29,13);
            $(this).before("<iframe width=\"280\" src=\"//player.youku.com/embed/"+yk+"\" frameborder=\"0\" allowfullscreen></iframe>");
            break;
        case 'youkuplayer' :
            var yk = $(this).data('url');
            yk = yk.substr(39,13);
            $(this).before("<iframe width=\"280\" src=\"//player.youku.com/embed/"+yk+"\" frameborder=\"0\" allowfullscreen></iframe>");
            break;
        case 'string' :
            break;
        }
        
    });
    $('.gourl').click(function() {
        var url = $(this).data('url');
        go(url);
    });
});
</script>
<? $this->load->view('linker/footer'); ?>
