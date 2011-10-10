<?php

/*************************************************************************
 *                                                                       *
 *  Copyright (C) 2011 by James Colby <jcolby@gmail.com>                 *
 *                                                                       *
 *  This program is free software: you can redistribute it and/or modify *
 *  it under the terms of the GNU General Public License as published by *
 *  the Free Software Foundation, either version 3 of the License, or    *
 *  at your option) any later version.                                   *
 *                                                                       *
 *  This program is distributed in the hope that it will be useful,      *
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of       *
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the        *
 *  GNU General Public License for more details.                         *
 *                                                                       *
 *  You should have received a copy of the GNU General Public License    *
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.*
 *                                                                       *
 *************************************************************************/
 
set_include_path (get_include_path() . ":.:inc" );
require_once ('class-dbRead.php');

// Arrays
 $date = array();
 $weight = array();

// open connection to database
$db = new dbRead();
$db->connect();
$date = $db->getDate();
$weight = $db->getWeight();


// Display Data
  echo "<b><center>Database Output</center></b><br><br>";
  $i=0;

  while ($i < $db->getNumRecords()) {
    echo "<b> i: </b> $i <b> Date: </b> $date[$i] <b> Weight: </b> $weight[$i] <BR>\n";
    #echo "<b> i: </b> $i <b> Date: </b> $date[$i]  <BR>\n";
    $i++;
  }
  echo "$web_path";
?>
<IMG SRC="http://chart.php">
