Regex Visualization
===================

The tryVisualization.php script is an example application of the project compiler-visualization [1] based on HOA libraries [2].


tryVisualization system dependencies :
- php5-gd module

tryVisualization HOA dependencies :
- davidkuhner/graphictools
- davidkuhner/regex
- hoa/compiler
- hoa/regex

Installation :
--------------
* Run standard composer install to resolve dependacies.


Use : 
-----
* $ php tryVisualisation.php "[REGEX]"

Exemples :
----------
* $ php tryVisualization.php "[ab]?"
* $ php tryVisualization.php "\\-{0,1}\\d*\\.{0,1}\\d+"
* $ php tryVisualization.php "([as]+(asdf)|m[æi]?)|[wi]{2,1}"

References :
------------
* [1] https://github.com/davidkuhner/compiler-visualization
* [2] http://hoa-project.net
