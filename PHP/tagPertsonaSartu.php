<script type="text/javascript" src="../JS/argazkiak.js"></script>
<button id="tagPertsonaSartuBotoia" class="cursorPointer tagsartubotoia" onclick="tagPertsonaSartuDivIkusi()">Norbait etiketatu</button>
<div id="tagPertsonaSartu" style="display: none">
	<form method='GET' action='' onsubmit='return tagPertsonaDBnSartu(argazkiID.value,nick.value)'>
		<?PHP echo "<input type='text' id='argazkiID' name='argazkiID' value='".$_GET['ID']."' style='display:none'></input>";?>
		<input type="text" id="nick" name="nick" placeholder="Lagunaren nickname-a"></input><br>
		<input type="submit" class="tagsartubotoia" value="Laguna etiketatu"></input>
	</form>
	<div id="nErantzuna"></div>
</div>