<script type="text/javascript" src="../JS/argazkiak.js"></script>
<button id="tagHitzaSartuBotoia" class="cursorPointer tagsartubotoia" onclick="tagHitzaSartuDivIkusi()">Zerbait etiketatu</button><br>
<div id="tagHitzaSartu" style="display: none">
	<form method='GET' action='' onsubmit='return tagHitzaDBnSartu(argazkiID.value,hitza.value)'>
		<?PHP echo "<input type='text' id='argazkiID' name='argazkiID' value='".$_GET['ID']."' style='display:none'></input><br>";?>
		<input type="text" id="hitza" name="hitza" placeholder="Hitzak hemen doaz"></input><br>
		<input type="submit" class="tagsartubotoia" value="Hitza gorde"></input>
	</form>
	<div id="hErantzuna"></div>
</div>