<ul class="addTop">
    <li><a href="/cms" >Home</a></li>
</ul>
<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Srpski</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form method="post" action="/cms" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Title:</td>
                        <td>
                            <input type="text" name="home[sr][title]" value="<?= @$home['sr']['title']; ?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Set text visible on Home page">Description:</span></td>
                        <td>
                            <textarea name="home[sr][text]" class="jr"><?= @$home['sr']['text'];?></textarea>
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
                            <input type="text" name="home[title][en]" value="<?= @$home['en']['title']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Set text visible on Home page">Description:</span></td>
                        <td>
                            <textarea name="home[en][text]"><?= @$home['en']['text'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Image on home page">Image:</span></td>
                        <td>
                            <? if (isset($home['id']) && !empty($home['image_name'])): ?>
                                <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'static' . DS . $home['image_name']; ?>" target="_blank"><?= $home['image_name']; ?></a>
                                [<a href="/cms/delete/image/<?= $home['id']; ?>" target="_blank" class="jw">Delete</a>]
                            <? else:?>
                                <input type="file" name="image" class="jr" value=""/>
                            <? endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Submit" name="submit" />
                            <input type="hidden" name="home[id]" value="<?= @$home['id']; ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>