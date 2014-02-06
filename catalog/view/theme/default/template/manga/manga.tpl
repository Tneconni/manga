<?php echo $header; ?>

<div id="image" style='padding-top:45px;' align="center">

    <p style='min-width:728px;'>
        <a href='#'>
            <img style='border:none;min-width:728px;'
                 src="<?php echo $chapter['image']?>" alt="<?php echo $chapter['title']?>"/></a>
    </p>

    <div style="margin-top:4px;display:box;" class="pagination pagination-small">
        <ul>
            <li><a style='color:black;font-weight:bold;'
                   href="<?php echo $pages['prev'];?>">Prev</a></li>
            <!--
<li><a style='color:red;font-weight:bold'>1</a></li>

<li><a style='color:black' href='../manga/?series=Naruto&chapter=663&index=1&page=2'>2</a></li>
<li><a style='color:black' href='../manga/?series=Naruto&chapter=663&index=1&page=3'>3</a></li>
<li><a style='color:black' href='../manga/?series=Naruto&chapter=663&index=1&page=4'>4</a></li>
<li><a style='color:black' href='../manga/?series=Naruto&chapter=663&index=1&page=5'>5</a></li>
<li><a style='color:black' href='../manga/?series=Naruto&chapter=663&index=1&page=6'>6</a></li>
<li><a style='color:black' href='../manga/?series=Naruto&chapter=663&index=1&page=7'>7</a></li>
<li><a style='color:black' href='../manga/?series=Naruto&chapter=663&index=1&page=8'>8</a></li>
<li><a style='color:black' href='../manga/?series=Naruto&chapter=663&index=1&page=9'>9</a></li>
<li><a style='color:black' href='../manga/?series=Naruto&chapter=663&index=1&page=10'>10</a></li>
<li><a style='color:black' href='../manga/?series=Naruto&chapter=663&index=1&page=11'>11</a></li>
-->
            <?php if( !empty( $pages )){ ?>
            <?php foreach( $pages['page'] as $pageKey=>$page){ ?>
            <li><a style="color:black <?php echo $currentPage==$pageKey + 1 ? 'font-weight:bold;':''; ?>"
                   href="<?php echo $page;?>" >
                    <?php echo $pageKey + 1 ; ?></a>
            </li>
            <?php }?>
            <?php }?>

            <li><a style='color:black;font-weight:bold;'
                   href="<?php echo $pages['next'];?>">Next</a></li>
        </ul>
    </div>
    <hr style="border:1px #A4A4A4 solid;background-color:#A4A4A4;">
    <h1 class="tittle" style="font-weight:bold">Naruto 663</h1>

    <p style="color:#A4A4A4; width:800px;">Copyrights and trademarks for the manga, and other promotional materials are
        held by their respective owners and their use is allowed under the fair use clause of the
        Copyright Law (<a style="color:#A4A4A4;font-weight:bold;" href="../dmca.php">View Policy</a>). &copy; 2012
        MangaSee.com</p>

    <div align="center" style="margin-bottom:20px;"></div>
</div>

<?php echo $footer; ?>