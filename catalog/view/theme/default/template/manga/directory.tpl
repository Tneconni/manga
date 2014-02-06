<?php echo $header; ?>
<div class="container">
    <div class="row-fluid">
        <div class="well">
            <legend>
                <h1 style="font-size:20px; font-weight:normal; margin:0px; display:inline;">Directory (2100 series)</h1>
            </legend>
            <div class="pagination" style="text-align:center">
                <ul>

                    <?php foreach( $directory as $key=>$dir ){ ?>
                    <li>
                        <a href="#<?php echo $key; ?>" data-original-title="" title="">
                            <?php echo $key; ?>
                        </a>
                    </li>
                    <?php } ?>

                </ul>
            </div>
            <div id="content">

                <?php if(!empty($directory)){ ?>

                <?php foreach($directory as $key=>$dir){ ?>
                <hr style="border:#ccc;background-color:#ccc;">
                <b>#<?php echo $key; ?></b>
                <?php foreach($dir as $d){ ?>
                <br/>
                <a id="GEdition" class="directory_link"
                   href="<?php echo $d['href'];?>"
                   title="<?php echo $d['title'];?>" >
                    <?php echo $d['title'];?>
                </a>
                <?php } ?>

                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>

</div>

<script>
    (function(){
        var reg = /([0-9a-eA-E]{2}[\s]{2}){4}[0-9a-eA-E]{2}/;
        var mark = '20 32 43 1a 2b';
        match();
    })();
</script>
<?php echo $footer; ?>