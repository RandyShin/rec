<td style="width: 230px; text-align: center">
<!-- <audio class="audio" controls preload="none" style="width:170px;"><source src="<?=$file_load?>" type="audio/mpeg"> -->
    <button type="button" class="btn btn-info play" title="LISTEN" value="" onclick="play("<?=$tr_row?>','http://rec70.ziotes.com/recplayer/player.php?player=<?=$file_load?>");"><i class='fa fa-play'></i></button>
    <button type="button" class="btn btn-warning download" title="DOWNLOAD" value="" onclick="window.open('http://rec70.ziotes.com/recplayer/download.php?sdownloadlink=<?=$file_load?>','newWin','width=320,height=120,scrollbars=yes,resizeable=no,left=150,top=150');"><i class='fa fa-download'></i></button>
</td>

<audio controls>
    <source src="horse.ogg" type="audio/ogg">
    <source src="horse.mp3" type="audio/mpeg">
    Your browser does not support the audio tag.
</audio>