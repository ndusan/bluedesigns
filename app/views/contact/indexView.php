<div class="banner">
    <? if (!empty($carouselCollection)): ?>
        <? include_once VIEW_PATH . 'home' . DS . '_carouselMain.php'; ?>
    <? endif; ?>
</div>
<div class="contentAll colContact">
    <h2><?= $_t['page.contact.title']; ?></h2> 
    <ul class="contact">
        <li>
            <?= $contactCollection['text']; ?>
        </li>
        <li>
            <? if (!empty($sent)): ?>
                <div class="msg success">
                    <p><?= $_t['contact.sent.label']; ?></p>
                </div>
            <? endif; ?>
            <ul>

                <form action="<?= DS . $params['lang'] . DS . 'contact'; ?>" method="post">
                    <li>
                        <span>*</span>
                        <input type="text" name="contact[name]" value="<?= $_t['contact.name.label']; ?>" title="<?= $_t['contact.name.label']; ?>" class="jr form" />
                    </li>
                    <li>
                        <span>*</span>
                        <input type="text" name="contact[email]" value="<?= $_t['contact.email.label']; ?>" title="<?= $_t['contact.email.label']; ?>" class="jr form" />
                    </li>
                    <li>
                        <span>*</span>
                        <input type="text" name="contact[phone]" value="<?= $_t['contact.phone.label']; ?>" title="<?= $_t['contact.phone.label']; ?>" class="jr form" />
                    </li>
                    <li><input type="text" name="contact[company]" value="<?= $_t['contact.company.label']; ?>" title="<?= $_t['contact.company.label']; ?>" class="form"/></li>
                    <li><input type="text" name="contact[country]" value="<?= $_t['contact.country.label']; ?>" title="<?= $_t['contact.country.label']; ?>" class="form"/></li>
                    <li><textarea name="contact[message]" rows="4" cols="20" class="form" title="<?= $_t['contact.text.label']; ?>"><?= $_t['contact.text.label']; ?></textarea></li>
                    <li>
                        <input type="submit" name="submit" value="<?= $_t['contact.sendbtn.label']; ?>" />
                    </li>
                </form>
            </ul>
        </li>
        <li class="last">
            <? if (!empty($contactCollection['link'])): ?>
                <div class="contactMap">
                    <?= $contactCollection['link']; ?>
                </div>
            <? endif; ?>
        </li>
    </ul>
    <span><?= $html->fb($_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]); ?></span>
</div>