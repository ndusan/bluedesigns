<ul class="addTop">
    <li><a href="/cms/studio/about" >studio</a></li>
</ul>
<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Srpski</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form method="post" action="/cms/studio/about" enctype="multipart/form-data">
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Set subtitle visible on studio page">Subtitle:</span></td>
                        <td>
                            <input type="text" name="studio[sr][title]" value ="<?= @$studio['sr']['title'];?>" class="jr"/>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Set text visible on studio page">Description:</span></td>
                        <td>
                            <textarea name="studio[sr][text]" class="jr"><?= @$studio['sr']['text'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Set subtitle visible on studio page">Subtitle:</span></td>
                        <td>
                            <input type="text" name="studio[en][title]" value ="<?= @$studio['en']['title'];?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Set text visible on studio page">Description:</span></td>
                        <td>
                            <textarea name="studio[en][text]"><?= @$studio['en']['text'];?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" value="Submit" name="submit" />
                            <input type="hidden" name="studio[id]" value="<?= @$studio['id']; ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>