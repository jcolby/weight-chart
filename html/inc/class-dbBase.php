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


class dbBase 
{
  protected  $DB_user;
  protected  $DB_password;
  protected  $DB_host;
  protected  $DB_database;

  public $DB_link;

  public function connect () 
  {
    require_once '/home/jcolby/src/weight-chart/html/config.php';
    $this->DB_user = $user;
    $this->DB_password = $password;
    $this->DB_database = $database;
    $this->DB_host = $host;

    $this->DB_link = mysql_connect ($this->DB_host, $this->DB_user, $this->DB_password, true);
    if (!$this->DB_link) {
      die('Could not connect: ' . mysql_error());
    }

    $db_selected = mysql_select_db ($this->DB_database, $this->DB_link);
    if (!$db_selected) {
      die('Could not connect: ' . mysql_error());
    }

    //return $this->DB_link;
  }
}



