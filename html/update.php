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

require_once ('./config.php');



// variables passed in from index.html
 $date = $_POST['date'];
 $weight = $_POST['weight'];

// open connection to database
 $link = mysql_connect("localhost",$user,$password);
 if (!$link) {
   die('Could not connect: ' . mysql_error());
 }

 $db_selected = mysql_select_db($database, $link);
 if (!$db_selected) {
   die ('Can\'t use database : ' . mysql_error());
  }

// insert data into database
 $query = "INSERT INTO daily_weight VALUE ('','$date',$weight)";
 mysql_query($query);

// close connection to database
 mysql_close ($link);

?>

