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

require_once ('config.php');

// Arrays
 $date = array();
 $weight = array();

// open connection to database
 $link = mysql_connect("localhost",$user,$password);
 if (!$link) {
   die('Could not connect: ' . mysql_error());
 }

 $db_selected = mysql_select_db($database, $link);
 if (!$db_selected) {
   die ('Can\'t use database : ' . mysql_error());
  }

// Pull data from DB
  $query="SELECT date,weight from daily_weight";
  $result=mysql_query($query);
  $num=mysql_num_rows($result);
  echo "$num";

// Display Data
  echo "<b><center>Database Output</center></b><br><br>";
  $i=0;

  while ($i < $num) {

    // create a new DateTime object containing date in the format need by MySQL
    $formattedDate = new DateTime (mysql_result($result,$i,"date")); 

    // convert date to (m)onth-(d)ay format and store in $date array
    $date[]=$formattedDate->format('m-d');
    $weight[]=mysql_result($result,$i,"weight");
    echo "<b> i: </b> $i <b> Date: </b> $date[$i] <b> Weight: </b> $weight[$i] <BR>\n";
    $i++;
  }

// close connection to database
 mysql_close ($link);

?>

<IMG SRC="http://localhost/chart.php">
