<div class="tabs">
    <ul>
        <li><a href="#fragment-1">Serbian</a></li>
        <li><a href="#fragment-2">English (optional)</a></li>
    </ul>
    <form action="/cms/work/<?= $action; ?>" method="post" enctype="multipart/form-data">
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
            <table cellpadding="0" cellspacing="0" width="710" id="jListBrowse" class="display dataTableSortable">
                <thead>
                    <tr>
                        <th>
                            Attach files (Pdf, Doc)
                        </th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <? if (!empty($fileCollection)): ?>
                        <? foreach ($fileCollection as $file): ?>
                            <tr id="jLine-<?= $file['id']; ?>">
                                <td>
                                    <a href="<?= DS . 'public' . DS . 'uploads' . DS . 'work' . DS . $file['file_name']; ?>" target="_blank"><?= $file['image_name']; ?></a>
                                </td>
                                <td><textarea class="mceNoEditor" disabled="disabled"><?=$file['text'];?></textarea></td>
                                <td><a browse-line="jLine-<?= $file['id']; ?>" href="<?= DS . 'cms' . DS . 'work' . DS . 'delete' .DS.$file['work_id'] . DS . 'image' . DS . $file['id']; ?>" title="Remove file"class="jRemoveBrowse cmsDelete"></a></td>
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
                            <textarea name="work[description][sr]" ><?= @$work['lang']['sr']['description']; ?></textarea>
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
                            <textarea name="work[description][en]" ><?= @$work['lang']['en']['description']; ?></textarea>
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
