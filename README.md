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
**1** $ php tryVisualization.php

**2** $ php tryVisualization.php "[ab]?"

![sample1](https://dl.dropboxusercontent.com/u/43124690/Hoa/sample1.svg)

**3** $ php tryVisualization.php "\\-{0,1}\\d*\\.{0,1}\\d+"

![sample2](https://dl.dropboxusercontent.com/u/43124690/Hoa/sample2.svg)

**4** $ php tryVisualization.php "([as]+(asdf)|m[æi]?)|[wi]{2,1}"

![sample3](https://dl.dropboxusercontent.com/u/43124690/Hoa/sample3.svg)

Compiler visualisation project :
--------------------------------
The goal of the Compiler visualization project is the graphical representation of regular or context free 
grammar. This project takes place in the HE-Arc for the travail d’automne course and it is made for the 
Hoa Project association. The finale product is a PHP based solution working with libraries from Hoa. 

Project documents :
-------------------
* HE-Arc project rapport [4]
* HE-Arc project presentation [5]

References :
------------
* [1] https://github.com/davidkuhner/CompilerVisualization  /!\ no longer maintained, please see [6] and [7]
* [2] http://hoa-project.net
* [3] http://getcomposer.org/doc/00-intro.md#installation-nix
* [4] https://dl.dropboxusercontent.com/u/43124690/Hoa/Rapport-ProjetP3-TA204-2014.pdf
* [5] https://dl.dropboxusercontent.com/u/43124690/Hoa/Presentation-ProjetP3-TA204-2014.pdf
* [6] https://github.com/davidkuhner/Regex
* [7] https://github.com/davidkuhner/GraphicTools
