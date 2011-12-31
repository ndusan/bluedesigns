<div class="contentAll colContact">
    <h2>Feel free to contact us</h2> 
    <ul class="contact">
        <li>
            <?=$contactCollection['text'];?>
        </li>
        <li>
            <ul>
                <? if(!empty($sent)):?>
                Message sent!
                <? endif;?>
                <form action="<?=DS.$params['lang'].DS.'contact';?>" method="post">
                    <li>
                        <span>*</span>
                        <input type="text" name="contact[name]" value="name" title="name" class="jr form" />
                    </li>
                    <li>
                        <span>*</span>
                        <input type="text" name="contact[email]" value="e-mail address" title="e-mail address" class="jr form" />
                    </li>
                    <li>
                        <span>*</span>
                        <input type="text" name="contact[phone]" value="phone" title="phone" class="jr form" />
                    </li>
                    <li><input type="text" name="contact[company]" value="company" title="company" class="form"/></li>
                    <li><input type="text" name="contact[country]" value="country" title="country" class="form"/></li>
                    <li><textarea name="contact[message]" rows="4" cols="20" class="form" title="text field">text field</textarea></li>
                    <li>
                        <input type="submit" name="submit" value="Send" />
                    </li>
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