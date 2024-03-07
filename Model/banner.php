<?php
class banner
{
     function getBanner()
     {
          $db = new connect();
          $select = "SELECT image FROM `banner` where status = 1";
          $result = $db->getList($select);
          return $result;
     }

     function getBannerMonth()
     {
          $db = new connect();
          $select = "SELECT image FROM banner WHERE status = 2 ORDER BY id DESC LIMIT 1";
          $result = $db->getInstance($select);
          return $result;
     }
}
