Regex Visualization
===================

The tryVisualization.php script is an example application of the project compiler-visualization [1] based on HOA libraries [2].


tryVisualization system dependencies :
- php5-gd module
- firefox ( If you have another favorite web-browser, you can edit the tryVisualisation.php line 45 )

tryVisualization HOA dependencies :
- davidkuhner/graphictools
- davidkuhner/regex
- hoa/compiler
- hoa/regex

Installation :
* Install the system dependencies.
* Run standard composer install to resolve HOA dependacies.


Debian/Ubuntu users can use the install.sh script to resolve dependencies guided by an assistante.
This script will check the system dependencies and ask you to install them.
Then the script will download composer.phar and run php composer.phar install to resolve HOA dependencies.


Use : 
* $ php tryVisualisation.php "[REGEX]"

Exemples :
* $ php tryVisualization.php "[ab]?"
* $ php tryVisualization.php "\\-{0,1}\\d*\\.{0,1}\\d+"
* $ php tryVisualization.php "([as]+(asdf)|m[æi]?)|[wi]{2,1}"

References :
* [1] https://github.com/davidkuhner/compiler-visualization
* [2] http://hoa-project.net
