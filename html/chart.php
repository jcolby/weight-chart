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

// Include
 require_once('jpgraph/jpgraph.php');
 require_once ('jpgraph/jpgraph_line.php');
 require_once ('config.php');

// Width and height of the graph
$width = 600; $height = 200;

// Arrays to hold query results
$date = array();
$weight = array();

// open connection to database
$link = mysql_connect("localhost",$user,$password);
if (!$link) {
  die('Could not connect: ' . mysql_error());
}

// Switch to database
$db_selected = mysql_select_db($database, $link);
if (!$db_selected) {
  die ('Can\'t use database : ' . mysql_error());
}

// Pull data from DB
$query="SELECT date,weight from daily_weight";
$result=mysql_query($query);
$num=mysql_num_rows($result);

// loop through query results and add data to
// indvidual arrays to be passed to graph object
$i=0;

while ($i < $num) {
  // create a new DateTime object containing date in the format need by MySQL
  $formattedDate = new DateTime (mysql_result($result,$i,"date"));

  // convert date to (m)onth-(d)ay format and store in $date array
  $date[]=$formattedDate->format('m-d');
  $weight[]=mysql_result($result,$i,"weight");
  $i++;
}

// close connection to database
mysql_close ($link);
 
// Create a graph instance
$graph = new Graph($width,$height);
 
// Specify what scale we want to use,
// int = integer scale for the X-axis
// int = integer scale for the Y-axis
$graph->SetScale('intint');
 
// Setup a title for the graph
$graph->title->Set('Weight Chart');
 
// Setup titles and X-axis labels
#$graph->xaxis->title->Set('(Weight)');
 
// Setup Y-axis title
$graph->yaxis->title->Set('(Weight)');

// Setup X-axis labels
$graph->xaxis->SetTickLabels($date);
 
// Create the linear plot
$lineplot=new LinePlot($weight);
 
// Add the plot to the graph
$graph->Add($lineplot);
 
// Display the graph
$graph->Stroke();


?>

