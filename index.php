<?php

/*

MASIH BELUM RAPI
---------------------
IDE BY : RAHMAT K
---------------------

[!] HANYA BEKERJA UNTUK FILE .EPUB
    DARI "bookcreator.com"

---------------------
CANTUMKAN KREDIT INI BILA ANADA
MENGGUNAKAN DI WEBSITE ANDA


*/

$ambil = file_get_contents("./OEBPS/data.json");
$lihat = json_decode($ambil, true);
$judul = $lihat['book']['title'];
$author = $lihat['book']['author'];

$count = 0;
$dir = './OEBPS';

if ($hdir = @opendir($dir)) {
	while ($file = @readdir($hdir)) {
		if ((is_file($dir.'/'.$file)) && (strpos($file, '.xhtml'))) {
			$count++;
		}
	}
	@closedir($hdir);
}
$count = $count - 1;

?>
<title><?php echo $judul; ?></title>
<meta name="theme-color" content="#000">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<body>
<style type="text/css">
	body {
		width: 5000px;
		background: rgba(0, 0, 0, 1.0);
	}
	.buku {
		width: 450px;
		height: 690px;
	}
	.kabeh {
		margin-top: 150px;
	}
	.nohal {
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.hal {
		width: 150px;
		height: 50px;
		background: rgba(0, 0, 0, 0.4);
		border-radius: 50px;
		text-align: center;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.nom {
		font-family: courier;
		font-size: 25px;
		color: white;
	}
	.judul {
		position: fixed;
		height: 100px;
		width: 100%;
		left: 0;
		top: 0;
		background: rgba(0, 163, 255, 1);
		color: white;
	}
	.tulisan {
		font-family: courier;
		padding-left: 100px;
	}
	.run {
		position: absolute;
		right: 20px;
		top: 30px;
	}
	.h {
		visibility: hidden;
	}
	select,
	select:active,
	select:hover,
	select:focus {
		background: rgba(0, 0, 0, .3);
		border: none;
		border-radius: 5px;
		height: 30px;
		width: 150px;
		-webkit-color: white;
		   -moz-color: white;
		     -o-color: white;
		        color: white;
		-webkit-text-align: center;
		   -moz-text-align: center;
		     -o-text-align: center;
		        text-align: center;
	}

</style>

<div class="judul">
	<tr>
	<td>
	<span><h1 class="tulisan"><?php echo $author; ?> | <?php echo $judul; ?></h1></span>
	</td>
	<td>
	<div class="run">
		<form action="" name="acc_opt" method="POST">
		<select name="url" onchange="top.location=acc_opt.url.options[selectedIndex].value" >
		<option selected hidden > LOMPAT KE </option>
		<!--optgroup label="LOMPAT KE"></optgroup -->
		<?php
		for ($i=0; $i < $count; $i++) {
		    if ($i == 0) {
		        $nama = 'COVER';
		    } else {
		        $nama = $i;
		    }
		    echo '<option value="#'.$i.'" >'.$nama.'</option>'."\n";
		}
		?>
		</select>
		</form>
	</div>
	</td>
	</tr>

</div>

<table class="kabeh">
<tr>
<?php

for ($i=0; $i < $count; $i++) { 
	if ($i % 2 == 0) {
		$bak = '<td class="h">IIIIIIIIIIIIIIII</td>';
	} else {
		$bak = '';
	}
	if ($i < 9) {
		$nama = '00'.$i;
	} elseif ($i > 10) {
		$nama = '0'.$i;
	} elseif ($i > 100) {
		$nama = ''.$i;
	}
	echo '<td><embed id="'.$i.'" class="buku" src="'.$dir.'/page'.$nama.'.xhtml"></embed></td>'.$bak."\n";
}

?>
</tr>
<tr>
<?php

for ($i=0; $i < $count; $i++) { 
	if ($i % 2 == 0) {
		$bak = '<td class="h">IIIIIIIIIIIIIIII</td>';
	} else {
		$bak = '';
	}
	if ($i == 0) {
		$hal = 'cover';
	} else {
		$hal = $i;
	}
	echo '<td><div class="nohal"><div class="hal"><b class="nom">'.$hal.'</b></div></div></td>'.$bak."\n";
}

?>
</tr>
</table>
</body>
