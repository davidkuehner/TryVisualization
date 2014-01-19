Try Visualization
===================

The tryVisualization.php script is an example application for  Perl Compatible Regular Expressions (PCRE) of the project Compiler Visualization [1] based on Hoa libraries [2].


tryVisualization system dependencies :
- php5-gd module

tryVisualization Hoa dependencies :
- davidkuhner/graphictools
- davidkuhner/regex
- hoa/compiler
- hoa/regex

Installation :
--------------
* Run standard composer install to resolve dependacies [3].


Use : 
-----
* $ php tryVisualisation.php "[REGEX]"

Exemples :
----------
* $ php tryVisualization.php
* $ php tryVisualization.php "[ab]?"
* $ php tryVisualization.php "\\-{0,1}\\d*\\.{0,1}\\d+"
* $ php tryVisualization.php "([as]+(asdf)|m[æi]?)|[wi]{2,1}"

References :
------------
* [1] https://github.com/davidkuhner/CompilerVisualization
* [2] http://hoa-project.net
* [3] http://getcomposer.org/doc/00-intro.md#installation-nix
