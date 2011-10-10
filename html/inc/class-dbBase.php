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
  protected  $DB_user="user";
  protected  $DB_password="password";
  protected  $DB_host="hostname";
  protected  $DB_database="db";
  protected  $DB_query="query";

  public $DB_link="link";

  public function connect () 
  {
    set_include_path (get_include_path() . ":" . "." . ":" . "inc" );
    require_once ('config.php');
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

  protected function runQuery ($link, $query)
  {
    return mysql_query($query,$link);
  }

}