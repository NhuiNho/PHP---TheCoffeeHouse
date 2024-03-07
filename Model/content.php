<?php
class content
{
     function getContent($type)
     {
          $db = new connect();
          $select = "SELECT image, time, caption, content_detail FROM `content` where type = (select id from chuyennha where name = '" . $type . "') order by time desc limit 3";
          $result = $db->getList($select);
          return $result;
     }
}
