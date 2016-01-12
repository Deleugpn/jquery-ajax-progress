<?php
if (!defined('__DIR__'))
	define('__DIR__', dirname(__FILE__));

ini_set('max_execution_time', 60);

// The bigger this number, the longer the request will take
$max = 100000000;

/**
 * Store the current progress in a file to be read by status.php
 * @param $progress
 */
function setProgress($progress) {
	$file = __DIR__ . '/p';
	if (!is_file($file))
		touch($file);
	file_put_contents($file, $progress);
}

// Loop to delay the request a lot
for ($i = 0; $i < $max; $i++) {

	/**
	 * Each 100'000 runs, the progress will be "recorded"
	 * This is where you should learn what number is good for your loop that won't affect
	 * the requests' performance.
	 */
	if ($i % 100000 === 0) {
		setProgress(($i * 100) / $max);
	}
}

echo rand(1, 100);