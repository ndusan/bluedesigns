<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/studio/<?= $action; ?>" method="post" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="studio[title][sr]" value="<?= @$studio['lang']['sr']['title']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="studio[content][sr]" class="jr"><?= @$studio['lang']['sr']['text']; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="studio[title][en]" value="<?= @$studio['lang']['en']['title']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>Content:</td>
                        <td>
                            <textarea name="studio[content][en]"><?= @$studio['lang']['en']['text']; ?></textarea>
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
                            <? if (isset($studio['id']) && !empty($studio['image_name'])): ?>
                                <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'studio' . DS . $studio['image_name']; ?>" target="_blank"><?= $studio['image_name']; ?></a>
                                [<a href="/cms/studio/delete/image/<?= $studio['id']; ?>" class="jw">Delete</a>]
                            <? else: ?>
                                <input type="file" name="image" value="" class="jr"/>
                            <? endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="hidden" name="studio[id]" value="<?= @$studio['id']; ?>" />
                            <input type="submit" value="Submit" name="submit" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>

