<div class="addContent">
    <form action="/cms/wallpaper/<?= $action; ?>" method="post" enctype="multipart/form-data">
    <table cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
                <td>Group</td>
                <td>Image</td>
            </tr>
            <tr>
                <td>1680x1050</td>
                <td>
                    <? if (!empty($wallpaper['1680x1050']['image_name'])): ?>
                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'wallpaper' . DS . $wallpaper['1680x1050']['image_name']; ?>" target="_blank"><?= $wallpaper['1680x1050']['image_name']; ?></a>
                        <a href="<?=DS.'cms'.DS.'wallpaper'.DS.'delete'.DS.$wallpaper['1680x1050']['wallpaper_id'].DS.'image'.DS.$wallpaper['1680x1050']['id'].'?group=1680x1050';?>" class="cmsDelete jw"></a>
                    <? else: ?>
                        <input type="file" name="image[1680x1050]" value=""/>
                    <? endif; ?>
                </td>
            </tr>
            <tr>
                <td>1024x768</td>
                <td>
                    <? if (!empty($wallpaper['1024x768']['image_name'])): ?>
                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'wallpaper' . DS . $wallpaper['1024x768']['image_name']; ?>" target="_blank"><?= $wallpaper['1024x768']['image_name']; ?></a>
                        <a href="<?=DS.'cms'.DS.'wallpaper'.DS.'delete'.DS.$wallpaper['1024x768']['wallpaper_id'].DS.'image'.DS.$wallpaper['1024x768']['id'].'?group=1024x768';?>" class="cmsDelete jw"></a>
                    <? else: ?>
                        <input type="file" name="image[1024x768]" value=""/>
                    <? endif; ?>
                </td>
            </tr>
            <tr>
                <td>1280x1024</td>
                <td>
                    <? if (!empty($wallpaper['1280x1024']['image_name'])): ?>
                        <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'wallpaper' . DS . $wallpaper['1280x1024']['image_name']; ?>" target="_blank"><?= $wallpaper['1280x1024']['image_name']; ?></a>
                        <a href="<?=DS.'cms'.DS.'wallpaper'.DS.'delete'.DS.$wallpaper['1280x1024']['wallpaper_id'].DS.'image'.DS.$wallpaper['1280x1024']['id'].'?group=1280x1024';?>" class="cmsDelete jw"></a>
                    <? else: ?>
                        <input type="file" name="image[1280x1024]" value=""/>
                    <? endif; ?>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit" name="submit" />
                    <input type="hidden" name="wallpaper[id]" value="<?= @$wallpaper['id']; ?>" />
                </td>
            </tr>
        </tbody>
    </table>
    </form>
</div>
