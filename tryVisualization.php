<?php

require_once __DIR__ . '/vendor/autoload.php';
// Based on hoa-project documentation : http://hoa-project.net/Fr/Literature/Hack/Compiler.html

if($argc <= 1 || $argc >3) {
	man();
}

// 1. Load grammar.
$compiler = Hoa\Compiler\Llk\Llk::load(new Hoa\File\Read('hoa://Library/Regex/Grammar.pp'));


try {
	// 2. Parse a data.
	$ast = $compiler->parse($argv[1]);


	// 3. Dump the AST.
	echo "\n\nFrom Dump visitor\n---------------------\n\n";
	$dump = new Hoa\Compiler\Visitor\Dump();
	echo $dump->visit($ast);


	// 4. Visualize the AST.
	echo "\n\nFrom Graphic visitor\n---------------------\n\n";
	$visu = new \Hoathis\Regex\Visitor\Visualization();
	$time_start = microtime(true);
	$svg = $visu->visit($ast);
	$time_end = microtime(true);
	$time = $time_end - $time_start;
	echo "Computed in $time sec \n\n";
	echo $svg;
	echo "\n\n";

	// only for demo purpose
	if($argc == 3 &&  $argv[2] == '-f') 
	{
		// 5 Save the SVG in a file and open it with Firefox;
		echo "Press enter to load the svg in Firefox :";
		trim(fgets(STDIN));
		exec("rm image.svg 2> /dev/null");
		$file = new Hoa\File\Write('image.svg');
		$file->writeString('<svg class="expression" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" >'); // temp
		$file->writeString( $svg );
		$file->writeString('</svg>');// temp
		exec("firefox image.svg 2> /dev/null");
	}

} catch (Exception $e) {
	echo "\nParsing error : ",$e->getMessage(), "\n\n";
	man();
}


// Man page
function man() {
	echo "\n\n----------------------------------------------------\n";
	echo "Regex visualization manual\n\n";
	
	echo "How to :\n";
	echo "\tphp visualization.php \"[REGEX]\"\n\n";
	
	echo "Examples :\n";
	echo "\tphp visualization.php \"[ab]?\"\n";
	echo "\tphp visualization.php \"([as]+(asdf)|m[æi]?)|[wi]{2,1}\"\n";
	echo "\tphp visualization.php \"\\-{0,1}\\d*\\.{0,1}\\d+\"\n\n";
	
	echo "Requirements :\n";
	echo "\tComposer install\n";
	echo "\tphp5-gd library\n";
	
	echo "\n----------------------------------------------------\n\n";
	exit();
}


