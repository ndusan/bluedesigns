<div class="contentAll colContact">
    <h2>Feel free to contact us</h2> 
    <ul class="contact">
        <li>
            <?=$contactCollection['text'];?>
        </li>
        <li>
            <ul>
                <form action="<?=DS.$params['lang'].DS.'contact';?>" method="post">
                    <li>
                        <span>*</span>
                        <input type="text" name="name" value="name" class="jr" />
                    </li>
                    <li>
                        <span>*</span>
                        <input type="text" name="" value="e-mail address" class="jr" />
                    </li>
                    <li>
                        <span>*</span><input type="text" name="" value="phone" class="jr" />
                    </li>
                    <li><input type="text" name="" value="company" /></li>
                    <li><input type="text" name="" value="country" /></li>
                    <li><textarea name="" rows="4" cols="20">text field</textarea></li>
                    <li><input type="submit" name="submit" value="Send" /></li>
                </form>
            </ul>
        </li>
        <li class="last">
            <? if(!empty($contactCollection['link'])):?>
            <div class="contactMap">
                <?=$contactCollection['link'];?>
            </div>
            <? endif;?>
        </li>
    </ul>
</div>