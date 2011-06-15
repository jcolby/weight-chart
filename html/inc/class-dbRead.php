<?php

require_once 'class-dbBase.php';

class dbRead extends dbBase
{
  
  private $num=0;
  private $result=0;
  private $i=0;

  public function getDate ()
  {

    $this->DB_query ="SELECT date from daily_weight";
    $this->result=$this->runQuery($this->DB_link, $this->DB_query );
    $this->num=mysql_num_rows($this->result);
    
    while ($this->i < $this->num)
    {
      // create a new DateTime object containing date in the format need by MySQL
      $formattedDate = new DateTime (mysql_result($this->result,$this->i,"date"));
      // convert date to (m)onth-(d)ay format and store in $date array
      $date[]=$formattedDate->format('m-d');
      $this->i++;
    }

    $this->i = 0;  //Reset Counter as it is used by other methods
    return $date;

  }

  public function getNumRecords () 
  {

    return $this->num;

  }

  public function getWeight ()
  {

    $this->query="SELECT weight from daily_weight";
    $this->result=$this->runQuery($this->DB_link, $this->query);
    $this->num=mysql_num_rows($this->result);
    while ( $this->i < $this->num ) 
    {
       $weight[]=mysql_result($this->result,$this->i,"weight");
       $this->i++;
    }

    $this->i=0; //Reset counter as it is used by other methods
    return $weight;
  }

}

?>
