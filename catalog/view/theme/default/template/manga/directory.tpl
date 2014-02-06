<div class="container">
    <div class="row-fluid">
        <div class="well">
            <legend>
                <h1 style="font-size:20px; font-weight:normal; margin:0px; display:inline;">Directory (2100 series)</h1>
            </legend>
            <div class="pagination" style="text-align:center">
                <ul>
                    <li><a href="#A" data-original-title="" title="">A</a></li>
                    <li><a href="#B" data-original-title="" title="">B</a></li>
                    <li><a href="#C" data-original-title="" title="">C</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="content">
        <hr style="border:#ccc;background-color:#ccc;">
        <b>#0-9</b>
        <?php if(!empty($directory)){ ?>
        <?php foreach($directory as $dir){ ?>
        <a id="GEdition" class="directory_link" href="<?php echo $dir['href'];?>" title="<?php echo $dir['title'];?>" >
            (G) Edition
            <?php echo $dir['title'];?>
        </a>
        <?php } ?>
        <?php } ?>
    </div>
</div>

<script>
    (function(){
        var reg = /([0-9a-eA-E]{2}[\s]{2}){4}[0-9a-eA-E]{2}/;
        var mark = '20 32 43 1a 2b';
        match();
    })();
</script>