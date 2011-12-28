<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/work/<?= $action; ?>" method="post">
        <div class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td><span class="jtooltip" title="Name of project">Project name:</span></td>
                        <td>
                            <input type="text" class="jr" name="work[name]" value="<?= @$work['name']; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td><span class="jtooltip" title="Link to external project">Link to project:</span></td>
                        <td>
                            <input type="text" name="work[link]" value="<?= @$work['link']; ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="addContent">
            <table cellpadding="0" cellspacing="0" width="710" id="jListBrowse">
                <thead>
                    <tr>
                        <th colspan="2">
                            Attach files (Pdf, Doc)
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <? if (!empty($fileCollection)): ?>
                        <? foreach ($fileCollection as $file): ?>
                            <tr id="jLine-<?= $file['id']; ?>">
                                <td><a href="<?= DS . 'public' . DS . 'uploads' . DS . 'ads' . DS . $file['file_name']; ?>" target="_blank"><?= $file['image_name']; ?></a></td>
                                <td><a browse-line="jLine-<?= $file['id']; ?>" href="<?= DS . 'cms' . DS . 'download' . DS . 'logo' . DS . 'delete-file' . DS . '?id=' . $file['id']; ?>" title="Remove file"class="jRemoveBrowse cmsDelete"></a></td>
                            </tr>
                        <? endforeach; ?>
                    <? endif; ?>
                </tbody>
            </table>
            <ul class="addTop">
                <li>
                    <a id="jAddBrowse" href="#" class="cmsAdd">Add file</a>
                </li>
            </ul>
        </div>
        <div id="fragment-1" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Description:</td>
                        <td>
                            <textarea name="work[sr][description]" ><?= @$work['sr']['description']; ?></textarea>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fragment-2" class="addContent">
            <table cellpadding="0" cellspacing="0">
                <tbody>
                    <tr>
                        <td>Description:</td>
                        <td>
                            <textarea name="work[en][description]" ><?= @$work['en']['description']; ?></textarea>
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
                            <input type="hidden" name="work[id]" value="<?= @$work['id']; ?>" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </form>
</div>
