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

require_once 'class-dbBase.php';

class dbRead extends dbBase
{
  
  private $query="SELECT date from daily_weight";
  private $num;
  private $result;
  private $i=0;

  public function getDate ()
  {
    $this->result=mysql_query($this->query,$this->DB_link);
    $this->num=mysql_num_rows($this->result);
    
    while ($this->i < $this->num)
    {
      // create a new DateTime object containing date in the format need by MySQL
      $formattedDate = new DateTime (mysql_result($this->result,$this->i,"date"));
      // convert date to (m)onth-(d)ay format and store in $date array
      $date[]=$formattedDate->format('m-d');
      $this->i++;
    }

    return $date;

  }

  public function getNumRecords () 
  {

    return $this->num;

  }

}
