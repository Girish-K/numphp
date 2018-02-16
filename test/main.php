<?php
	require_once './../src/Numphp.php';
	use girishk\Numphp;

	$numpy = new Numphp();
	echo $numpy->mean([1,2,3]);
	echo $numpy->standardDeviation([1,2,3], true);
	echo $numpy->zScore(1,2,3);
	echo $numpy->percentile(-1.04);
?>
