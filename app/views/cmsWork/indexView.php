<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/work/add" >Add new project</a></li>
</ul>


<? if (!empty($workCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Project name</th> 
                <th>Link</th> 
                <th>Created</th> 
                <th width="100px">Action</th> 
            </tr> 
        </thead> 
        <tbody> 
            <? foreach ($workCollection as $w): ?>
                <tr> 
                    <td><?= $w['name']; ?></td> 
                    <td><?= $w['link']; ?></td> 
                    <td><?= $html->convertDate($w['created'], true); ?></td> 
                    <td align="center">
                        <!--Edit-->
                        <a class="cmsEdit" title="Edit" href="/cms/work/edit/<?= $w['id']; ?>"></a>
                        <!--Delete-->
                        <a class="jw cmsDelete" title="Delete" href="/cms/work/delete/<?= $w['id']; ?>" ></a>
                    </td> 
                </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Project name</th> 
                <th>Link</th> 
                <th>Created</th> 
                <th width="100px">Action</th> 
            </tr> 
        </tfoot> 
    </tbody> 
    </table> 
<? else: ?>
    <div class="noResults">
        There are no results on this page.
    </div>
<? endif; ?>

