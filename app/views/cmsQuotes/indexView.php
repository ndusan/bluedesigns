<ul class="addTop">
    <li><a class="cmsAdd" href="/cms/quotes/add" >Add new quotes</a></li>
</ul>


<? if (!empty($quotesCollection)): ?>
    <table cellpadding="0" cellspacing="0" border="0" class="display" id="dataTable"> 
        <thead> 
            <tr> 
                <th>Client</th>
                <th>Company</th>
                <th>Visible</th>
                <th>Created</th>
                <th width="100px">Action</th>
          </tr> 
        </thead> 
        <tbody> 
            <? foreach ($quotesCollection as $quotes): ?>
                <tr> 
                    <td><?=$quotes['client'];?></td>
                    <td><?=$quotes['company'];?></td>
                    <td><input type="checkbox" value="<?=$quotes['id'];?>" <?=($quotes['visible']==1 ? 'checked="checked"' : '')?> /></td>
                    <td><?=$html->convertDate($quotes['created'], true);?></td>
                    <td align="center">
                        <!--Edit-->
                        <a title="Edit" class="cmsEdit" href="/cms/quotes/edit/<?= $quotes['id']; ?>"></a>
                        <!--Delete-->
                        <a title="Delete" class="jw cmsDelete" href="/cms/quotes/delete/<?= $quotes['id']; ?>"></a>
                    </td> 
          </tr> 
            <? endforeach; ?>
        <tfoot> 
            <tr> 
                <th>Client</th>
                <th>Company</th>
                <th>Visible</th>
                <th>Created</th>
                <th>Action</th> 
            </tr> 
        </tfoot> 
    </tbody> 
    </table> 
    <input type="hidden" id="url" value="/cms/quotes" />
<? else: ?>
    <div class="noResults">
        There are no results on this page.
    </div>
<? endif; ?>

