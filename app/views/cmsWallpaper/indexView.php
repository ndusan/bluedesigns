<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/wallpaper/add" >Add new wallpaper</a></li>
</ul>


<? if (!empty($wallpaperCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Image name</th> 
                <th>Created</th> 
                <th width="100px">Action</th> 
            </tr> 
        </thead> 
        <tbody> 
            <? foreach ($wallpaperCollection as $w): ?>
                <tr> 
                    <td><?= $w['name']; ?></td> 
                    <td><?= $w['description']; ?></td> 
                    <td><?= $html->convertDate($w['created'], true); ?></td> 
                    <td align="center">
                        <!--Delete-->
                        <a class="jw cmsDelete" title="Delete" href="/cms/wallpaper/delete/<?= $w['id']; ?>" ></a>
                    </td> 
                </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Image name</th> 
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

