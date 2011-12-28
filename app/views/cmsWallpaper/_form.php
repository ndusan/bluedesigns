<div class="addContent">
    <form action="/cms/wallpaper/<?= $action; ?>" method="post">
        <table cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <td><span class="jtooltip" title="Image size 770x280px">Image:</span></td>
                    <td>
                        <? if (isset($wallpaper['id']) && !empty($wallpaper['image_name'])): ?>
                            <input type="file" name="image" value=""/>
                            <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'wallpaper' . DS . $wallpaper['image_name']; ?>" target="_blank"><?= $wallpaper['image_name']; ?></a>
                        <? else: ?>
                            <input type="file" name="image" value="" class="jr"/>
                        <? endif; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="hidden" name="wallpaper[id]" value="<?= @$wallpaper['id']; ?>" />
                        <input type="submit" value="Submit" name="submit" />
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
