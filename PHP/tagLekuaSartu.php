<script type="text/javascript" src="../JS/argazkiak.js"></script>
<button id="tagLekuaSartuBotoia" class="cursorPointer tagsartubotoia" onclick="tagLekuaSartuDivIkusi()">Nonbait etiketatu</button><br>
<div id="tagLekuaSartu" style="display: none">
	<form method='GET' action='' onsubmit='return tagLekuaDBnSartu(argazkiID.value,latit.value,longit.value)'>
		<?PHP echo "<input type='text' id='argazkiID' name='argazkiID' value='".$_GET['ID']."' style='display:none'></input><br>";?>
		<input type="text" id="latit" name="latit" placeholder="Latitudea"></input><br>
		<input type="text" id="longit" name="longit" placeholder="Longitudea"></input><br>
		<input type="submit" class="tagsartubotoia" value="Lekua gorde"></input>
	</form>
	<div id="lErantzuna"></div>
</div>