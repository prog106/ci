                <li id="view">
                    <div class="fullcomment">
                        <?=($row['mu_title'])? $row['mu_title'].'<br>' : '';?>
                        <?=$row['mu_comment'];?>
                        <?=((!empty($row['mu_imagesrc']))? '<br><img src="/static/upload/'.$row['mu_imagesrc'].'">' : '');?>
                    </div>
                </li>
