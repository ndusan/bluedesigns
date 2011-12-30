<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/quotes/<?= $action; ?>" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="quotes[text][sr]" class="jr"><?= @$quotes['lang']['sr']['text']; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="quotes[text][en]"><?= @$quotes['lang']['en']['text']; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Maximum image width 530px">Image:</span></td>
                        <td>
                            <input type="file" name="image" value=""/>
                            <? if (isset($quotes['id']) && !empty($quotes['image_name'])): ?>
                                <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'quotes' . DS . $quotes['image_name']; ?>" target="_blank"><?= $quotes['image_name']; ?></a>
                                [<a href="/cms/quotes/delete/image/<?= $quotes['id']; ?>" class="jw">Delete</a>]
                            <? endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Client:</td>
                        <td>
                            <input type="text" name="quotes[client]" value="<?= @$quotes['client']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Company:</td>
                        <td>
                            <input type="text" name="quotes[company]" value="<?= @$quotes['company']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="quotes[id]" value="<?= @$quotes['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>

