                <li id="view">
                    <div class="fullcomment">
                        <?=($row['mu_title'])? $row['mu_title'].'<br>' : '';?>
                        <pre><?=$row['mu_comment'];?></pre>
                        <?=((!empty($row['mu_imagesrc']))? '<img src="/static/upload/'.$row['mu_imagesrc'].'">' : '');?>
                    </div>
                </li>
