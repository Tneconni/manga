<?php echo $header; ?>

<div class="container" style=" width:870px; margin-top:50px">
    <div class="row-fluid">
        <div class="well">
            <table border="3" bordercolor="#003366" cellspacing="5" cellpadding="3" width="100%">
                <tr>
                    <td valign="top" rowspan="6" width="200px">
                        <img style="width:auto; max-width:200px;" src="<?php echo $mangaDesc['image'];?>" />
                    </td>
                    <td bgcolor="#A4A4A4" style="height:15px;" >
                        <h1 style="font-size:23px; padding:0px; margin:0px; display:inline;">
                            <?php echo $mangaDesc['title'];?>
                        </h1>
                    </td>
                </tr>
                <tr>
                    <td valign="top" bgcolor="#E6E6E6" style="height:15px;">Latest Chapter(s):
                        <?php if(!empty($mangaDesc['chapters']) ){ ?>
                        <?php foreach($mangaDesc['chapters'] as $cpt){ ?>
                        <a href='../manga/?series=11Eyes&chapter=12&index=1&page=1'
                           title="Read 11 Eyes chapter 12"
                           class='chapter_link'>
                            <?php echo $cpt;?>
                        </a>,
                        <?php }?>
                        <?php }?>
                        <?php echo $mangaDesc['chaptersNum']; ?>

                    </td>
                </tr>
                <tr>
                    <td valign="top" bgcolor="#A4A4A4" ><b>Author: </b><?php echo $mangaDesc['author'];?> </td>
                </tr>
                <tr>
                    <td valign="top" bgcolor="#E6E6E6" ><b>Status: </b><?php echo $mangaDesc['status']; ?> </td>
                </tr>
                <tr>
                    <td valign="top" bgcolor="#A4A4A4" ><b>Genre: </b><?php echo $mangaDesc['genre'];?> </td>
                </tr>
                <tr>
                    <td valign="top" bgcolor="#E6E6E6" >
                        <h2 style="padding:0px; margin:0px; padding:0px; font-size:17px; display: inline;">Description:</h2><br />
                        <?php echo $mangaDesc['description'];?>
                    </td>
                </tr>
            </table>
            <h2 style="font-size:15px;padding-left:10px;background-color:#E6E6E6;"><i class="icon-chevron-right"></i> Read 11 Eyes Manga Online</h2>

            <table border="0" bordercolor="#666" cellspacing="0" cellpadding="1" width="100%">

                <?php if(!empty( $chapters )){ ?>
                <?php foreach( $chapters as $chapter ){ ?>
                <tr>
                    <td valign='top' >
                        &nbsp;&nbsp;
                        <a class='chapter_link' alt="Read 11 Eyes chapter 12"
                                       href="<?php echo $chapter['href'];?>">
                            <?php echo $chapter['chapter_title'];?>
                        </a>
                    </td>
                    <td valign='top' align='right' width='200px'>
                        <a style='color:gray; font-size:16px;'><?php echo $chapter['timeAgo'];?></a>&nbsp;&nbsp;
                    </td>
                </tr>
                <?php }?>
                <?php }?>

                <!--
                                <tr>
                                    <td valign='top' >
                                        &nbsp;&nbsp;<a class='chapter_link' alt="Read 11 Eyes chapter 11" href='../manga/?series=11Eyes&chapter=11&index=1&page=1'>11 Eyes 11</a>
                                    </td>
                                    <td valign='top' align='right' width='200px'>
                                        <a style='color:gray; font-size:16px;'>7 months ago</a>&nbsp;&nbsp;
                                    </td>
                                </tr>

                                                <tr>
                                                    <td valign='top' >
                                                        &nbsp;&nbsp;<a class='chapter_link' alt="Read 11 Eyes chapter 10" href='../manga/?series=11Eyes&chapter=10&index=1&page=1'>11 Eyes 10</a>
                                                    </td>
                                                    <td valign='top' align='right' width='200px'>
                                                        <a style='color:gray; font-size:16px;'>7 months ago</a>&nbsp;&nbsp;
                                                    </td>
                                                </tr>
                                -->
            </table>

            <hr>
            <div id="fb-root"></div>
            <script>(function(d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0];
                    if (d.getElementById(id)) return;
                    js = d.createElement(s); js.id = id;
                    js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=256229387796247";
                    fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'facebook-jssdk'));</script>

            <div class="fb-comments" data-href="http://mangasee.com/manga/?series=11Eyes" data-width="830" data-num-posts="10"></div>

            <center>
            </center>
        </div>
    </div>

    <div  align="center" style="margin-bottom:20px;">
        <p style="color:#A4A4A4; width:800px;">Copyrights and trademarks for the manga, and other promotional materials are held by their respective owners and their use is allowed under the fair use clause of the
            Copyright Law (<a style="color:#A4A4A4;font-weight:bold;" href="../dmca.php">View Policy</a>). &copy; 2012 MangaSee.com</p>
    </div>

</div>

<?php echo $footer; ?>