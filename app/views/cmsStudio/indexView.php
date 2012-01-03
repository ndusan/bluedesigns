<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/studio/add" >Add new studio</a></li>
</ul>


<? if (!empty($studioCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display dataTableSortable"> 
        <thead> 
            <tr> 
                <th>Created</th> 
                <th width="100px">Action</th>
          </tr> 
        </thead> 
        <tbody> 
            <? $i=1;?>
            <? foreach ($studioCollection as $studio): ?>
                <tr> 
                    <td>
                        <input type="hidden" class="jpos-<?=$i++;?>" value="<?=$studio['position'];?>" id="t-<?=$studio['id'];?>" />
                        <?=$html->convertDate($studio['created'], true);?>
                    </td>
                    <td align="center">
                        <!--Edit-->
                        <a title="Edit" class="cmsEdit" href="/cms/studio/edit/<?= $studio['id']; ?>"></a>
                        <!--Delete-->
                        <a title="Delete" class="jw cmsDelete" href="/cms/studio/delete/<?= $studio['id']; ?>"></a>
                    </td> 
          </tr> 
            <? endforeach; ?>
        </tbody> 
        <tfoot> 
            <tr> 
                <th>Created</th> 
                <th>Action</th> 
            </tr> 
        </tfoot> 
    </table> 
<? else: ?>
    <div class="noResults">
        There are no results on this page.
    </div>
<? endif; ?>

