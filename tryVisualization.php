<?php

require_once __DIR__ . '/vendor/autoload.php';
// Based on hoa-project documentation : http://hoa-project.net/Fr/Literature/Hack/Compiler.html

if($argc <= 1 || $argc >3) {
	help();
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
    
    // 5. Save in a file.
    if($argc == 3 &&  ( $argv[2] == '-s' || $argv[2] == '-b') ) {
        $filename = 'image.svg';
        try {
            $file = new Hoa\File\Write($filename, Hoa\File::MODE_TRUNCATE_WRITE);
        } catch (Exception $e) {
            $file = new Hoa\File\Write($filename);
        }
		$file->writeString( $svg );
        $file->close();
    }

	// 6. Open the file in a browser
	if($argc == 3 &&  $argv[2] == '-b') {
		echo "Press enter to load the svg in a browser :";
		trim(fgets(STDIN));

        $uname = strtolower(php_uname());
        if (strpos($uname, "darwin") !== false) {
            exec("open " . "." . DIRECTORY_SEPARATOR . $filename);
        } else if (strpos($uname, "win") !== false) {
            exec("start " . getcwd() . DIRECTORY_SEPARATOR . $filename);
        } else if (strpos($uname, "linux") !== false) {
            exec("sensible-browser " . "." . DIRECTORY_SEPARATOR . $filename . " 2> /dev/null");
        } else {
            echo "\nSorry something goes wrong with your OS version : ", $uname ;
        }
	}

} catch (Exception $e) {
	if($argc == 3 &&  $argv[2] == '-v') 
	{
		echo "\nParsing error : ",$e->getMessage();
	} else {
		echo "\nSorry something goes wrong with \"$argv[1]\"";
	}
	help();
}



// Help page
function help() {
	echo "\n\n----------------------------------------------------\n";
	echo "Try Visualization help page\n\n";
	
	echo "How to :\n";
	echo "\tphp tryVisualization.php \"[REGEX]\" [PARAM]\n\n";
	
	echo "Examples :\n";
	echo "\tphp tryVisualization.php \"[ab]?\"\n";
	echo "\tphp tryVisualization.php \"([as]+(asdf)|m[æi]?)|[wi]{2,1}\"\n";
	echo "\tphp tryVisualization.php \"\\-{0,1}\\d*\\.{0,1}\\d+\"\n\n";
	
	echo "Requirements :\n";
	echo "\tComposer install\n";
	echo "\tphp5-gd library\n\n";
	
	echo "Second optional parameter :\n";
	echo "\t-v : Verbose mode for exceptions\n";
	echo "\t-s : Save the SVG as image.svg\n";
	echo "\t-b : Visualization of the SVG in a browser\n";
	
	echo "\n----------------------------------------------------\n\n";
	exit();
}


