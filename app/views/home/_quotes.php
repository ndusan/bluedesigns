<div class="quotes">
    <? if(!empty($quotes)):?>
    <div class="quoteText">
        <span class="jQuoteText"><?=$quotes[0]['text'];?></span>
        <h2 class="jQuoteClient"><?=$quotes[0]['client'];?></h2>
        <h4 class="jQuoteCompany"><?=$quotes[0]['company'];?></h4>
    </div>
    <div class="quoteIcons">
        <h2><?=$_t['page.quotes.title'];?></h2>
        <ul class="clientsLogos">
            <? $first = true; ?>
            <? foreach($quotes as $q):?>
            <li>
                <a <? if($first){ $first=false; echo 'class="active"'; };?> href="#">
                    <img src="<?= PUBLIC_UPLOAD_PATH . 'quotes' . DS . $q['image_name'];?>" class="jQuote" id="jQuote-<?=$q['id'];?>" />
                </a>
            </li>
            <? endforeach;?>
        </ul>
    </div>
    <? endif; ?>
</div>

<!-- JS -->
<? if(!empty($quotes)):?>
<script type='text/javascript'>
<? 
   $first = true; 
   $output = array();
?>
<? foreach($quotes as $q):?>
    <? if($first): $first=false;?>
    App.Home.cQuotes = <?=json_encode($q);?>;
    <? endif;?>
    <? $output['jQuote-'.$q['id']] = $q;?>
<? endforeach;?>
    App.Home.allQuotes = <?=json_encode($output);?>;
    
    $('body').delegate('.jQuote', 'click', function(e){
        e.preventDefault();
        
        //Set image active
        var cImg;
        var cId = $(this).attr('id');

        //Set text
        $('.jQuoteText').html(App.Home.allQuotes[cId]['text']);
        //Set client
        $('.jQuoteClient').html(App.Home.allQuotes[cId]['client']);
        //Set company
        $('.jQuoteCompany').html(App.Home.allQuotes[cId]['company']);
        
        $('.clientsLogos a').each(function(){
            if(cId != $(this).find('img').attr('id')){
                $(this).removeClass('active');
            }else{
                $(this).addClass('active');
            }
        });
        
    });
</script>
<? endif;?>
