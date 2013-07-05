                <div id="view<?=$row['mu_id'];?>">
                    <?=($row['mu_title'])? $row['mu_title'].'<br>' : '';?>
                    <?=$row['mu_comment'];?>
                    <?($row['mu_imagesrc'])? '<br><div class="imagesrc"><img src="/static/upload/'.$row['mu_imagesrc'].'"></div>' : '';?>
                </div>
