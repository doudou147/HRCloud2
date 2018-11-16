<!DOCTYPE html>
<?php
/*//
HRCLOUD2-PLUGIN-START
App Name: OpenJSCAD
App Version: v2.0 (11-15-2018 23:30)
App License: GPLv3
App Author: OpenJSCAD
App Website: https://OpenJSCAD.org
App Description: A simple HRCloud2 App for creating, viewing, and managing 3d Models!
App Integration: 0 (False)
HRCLOUD2-PLUGIN-END
//*/
?>

<html  xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<!--
== OpenJSCAD.org, Copyright (c) 2013-2017 by Rene K. Mueller <spiritdude@gmail.com>, Licensed under MIT License ==
   with some code from OpenJsCad processfile.html by Joost Nieuwenhuijse
   in conjunction with csg.js, openjscad.js, lightgl.js by various authors (see them listed in the individual files)

Purpose:
   More modern interface for OpenJsCad as published at http://joostn.github.com/OpenJsCad/
-->
    <meta http-equiv=Pragma content=no-cache>
    <meta http-equiv=Expires content=-1>
    <meta http-equiv=CACHE-CONTROL content=NO-CACHE>

    <title>OpenJSCAD.org</title>
    <link rel="shortcut icon" href="imgs/favicon.png" type="image/x-png">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="openjscad.css" type="text/css">
  </head>
  <body>
    <script src="dist/index.js"></script>
<!-- top left header (logo and error message) -->
    <div id="header">
      <img src="imgs/title.png">
      <div id="errordiv"></div>
    </div>

<!-- sliding tab (help, links, examples, options, etc) -->
    <div id="menu">
      <img id="menuHandle" src="imgs/menuHandleVLIn.png">
      <nav>
        <div id="menuVersion"></div>
        <p/>
        <table class="info">
          <tr><td class="infoView" colspan=2>Editor</td></tr>
          <tr><td align="right" class="infoOperation">Render Code</td><td class="infoKey">F5 or SHIFT + Return</td></tr>
          <tr><td align="right" class="infoOperation">Save To Cache</td><td class="infoKey">CTRL + S</td></tr>
          <tr><td align="right" class="infoOperation">Load From Cache</td><td class="infoKey">CTRL + L</td></tr>
          <tr><td align="right" class="infoOperation">Clear Cache</td><td class="infoKey">CTRL + SHIFT + \</td></tr>
          <tr><td align="right" class="infoOperation">Download Code</td><td class="infoKey">CTRL + SHIFT + S</td></tr>
          <tr><td align="right" class="infoOperation">Reset View</td><td class="infoKey">CRTL + Return</td></tr>
          <tr><td class="infoView" colspan=2>3D View</td></tr>
          <tr><td align="right" class="infoOperation">Rotate XZ</td><td class="infoKey">Left Mouse</td></tr>
          <tr><td align="right" class="infoOperation">Pan</td><td class="infoKey">Middle Mouse or SHIFT + Left Mouse</td></tr>
          <tr><td align="right" class="infoOperation">Rotate XY</td><td class="infoKey">Right Mouse or ALT + Left Mouse</td></tr>
          <tr><td align="right" class="infoOperation">Zoom In/Out</td><td class="infoKey">Wheel Mouse or CTRL + Left Mouse</td></tr>
        </table>
        <p>
          <a class="navlink" href="https://openjscad.org/dokuwiki/doku.php" target="_blank" rel="noopener">User Guide / Documentation <img src="imgs/externalLink.png" style="externalLink"></a>
          <br/><span class="menuSubInfo">How to program with OpenJSCAD: online, offline &amp; CLI</span>
        </p>
        <p>
          <a class="navlink" href="https://plus.google.com/communities/114958480887231067224" rel="publisher" target="_blank" rel="noopener">Recent Updates <img src="imgs/externalLink.png" style="externalLink"></a>
          <br/><span class="menuSubInfo">Announcements of recent developments</span>
        </p>
        <p>
          <a class="navlink" href="https://plus.google.com/communities/114958480887231067224" target="_blank" rel="noopener">Google+ Community <img src="imgs/externalLink.png" style="externalLink"></a>
          <br/><span class="menuSubInfo">Discuss with other users &amp; developers</span>
        </p>
        <div id="examplesTitle" class="navlink"><a href='#' onclick='return false'>Examples</a></div>
        <div id="examples"></div>
        <span class="menuSubInfo">Dozens of examples to learn from</span>
        <p/>
<!--
        <div id="optionsTitle" class="navlink"><a href='#' onclick='return false'>Options</a></div>
        <div id="options"></div>
        <span class="menuSubInfo">Your personal settings</span></p>
 -->
        <p/>
        <b>Supported Formats</b>
        <table class="info">
          <tr><td align="right"><b>jscad</b></td><td><a target="_blank" rel="noopener" href="https://openjscad.org/dokuwiki/doku.php">OpenJSCAD</a> (native, import/export)</td></tr>
          <tr><td align="right"><b>scad</b></td><td><a target="_blank" rel="noopener" href="http://openscad.org">OpenSCAD</a> (<a target=_blank href="https://openjscad.org/dokuwiki/doku.php">experimental</a>, import)</td></tr>
          <tr><td align="right"><b>stl</b></td><td><a target="_blank" rel="noopener" href="http://en.wikipedia.org/wiki/STL_(file_format)">STL format</a> (experimental, import/export)</td></tr>
          <tr><td align="right"><b>amf</b></td><td><a target="_blank" rel="noopener" href="http://en.wikipedia.org/wiki/Additive_Manufacturing_File_Format">AMF format</a> (experimental, import/export)</td></tr>
          <tr><td align="right"><b>dxf</b></td><td><a target="_blank" rel="noopener" href="https://en.wikipedia.org/wiki/AutoCAD_DXF">DXF format</a> (experimental, import/export)</td></tr>
          <tr><td align="right"><b>x3d</b></td><td><a target="_blank" rel="noopener" href="https://en.wikipedia.org/wiki/X3D">X3D format</a> (experimental, export)</td></tr>
          <tr><td align="right"><b>svg</b></td><td><a target="_blank" rel="noopener" href="https://en.wikipedia.org/wiki/Scalable_Vector_Graphics">SVG format</a> (experimental, import/export)</td></tr>
        </table>
        <p><a class="navlink about" href="#">About</a></p>
      </nav>
    </div> <!-- /menu -->

<!-- about dialog -->
    <div id="about">
      <img src="imgs/title.png">
      <div id="aboutVersion" ></div>

      <p>
<h4>OpenJsCad by</h4>
- Joost Nieuwenhuijse (core),</br>
- Ren&eacute; K. M&uuml;ller (core, CLI & GUI),</br>
- Stefan Baumann (core),</br>
- Z3 Dev (core, CLI & GUI),</br>
- Mark Moissette (core, CLI & GUI),</br>
- Eduard Bespalov (core),</br>
- Gary Hogdson (OpenSCAD translator)

<h4>csg.js core &amp; improvements by</h4>
- Evan Wallace</br>
- Eduard Bespalov</br>
- Joost Nieuwenhuijse</br>
- Alexandre Girard

<h4>Additional libraries & tools</h4>
- xmldom</br>
- sax</br>
- browserify</br>
- babel</br>
</p>

<p>
License: MIT License<br>
Get your copy/clone/fork from <a href="https://github.com/jscad/OpenJSCAD.org" target="_blank" rel="noopener">GitHub: OpenJSCAD</a>
      </p>
      <p>
        <br/><a class="okButton" href='#'> OK </a>
      </p>
    </div> <!-- about -->

<!-- editor -->
    <div id="editFrame">
      <div>
        <img id="editHandle" src="imgs/editHandleIn.png"></img>
      </div>
      <div id="editor">
// -- OpenJSCAD.org logo

function main() {
   return union(
      difference(
         cube({size: 3, center: true}),
         sphere({r:2, center: true})
      ),
      intersection(
          sphere({r: 1.3, center: true}),
          cube({size: 2.1, center: true})
      )
   ).translate([0,0,1.5]).scale(10);
}
      </div>
    </div> <!-- editor -->

<!-- design viewer -->
    <div oncontextmenu="return false;" id="viewerContext"></div> <!-- avoiding popup when right mouse is clicked -->

<!-- design parameters -->
    <div id="parametersdiv"></div>
    <div id="selectdiv"></div>

<!-- design information (status message, download buttons, drag and drop area, etc) -->
    <div id="tail">
      <div id="statusdiv"></div>
      <div id="filedropzone">
        <div id="filedropzone_empty">
        </div>
        <div id="filedropzone_input">
          <p>
            <label class="input-control">Add Supported Files: <input type="file" id="files-input" accept="*/*" multiple="1"></input></label>
          </p>
        </div>
        <div id="filedropzone_filled">
          <span id="currentfile">...</span>
          <div id="filebuttons">
            <button id="getstlbutton" style="display:none" onclick="getStl();">Get STL</button>
            <button id="reloadAllFiles">Reload</button>
           <!--button onclick="parseFile(gCurrentFile,true,false);">Debug (see below)</button-->
            <label for="autoreload">Auto Reload</label><input type="checkbox" name="autoreload" value="" id="autoreload">
          </div>
        </div>
      </div>
    </div> <!-- tail -->

<!-- footer (version, copyright) -->
    <div id="footer">
    </div>
  </body>
</html>
