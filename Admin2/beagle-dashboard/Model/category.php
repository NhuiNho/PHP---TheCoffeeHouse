<?php
class category
{
     function getCategoryById($id)
     {
          $db = new connect();
          if ($id == 'all') {
               $select = "SELECT * FROM category";
          } else {
               $select = "SELECT * FROM category where id = $id";
          }
          $result = $db->getList($select);
          return $result;
     }
     function getCategorySearch($search, $type)
     {
          $db = new connect();
          $select = "SELECT count(*) FROM category where type like '%$search%' and category_type like '%$type%'";
          $result = $db->getList($select);
          return $result;
     }
     function getCategorySearch1($search, $type, $index, $count)
     {
          $db = new connect();
          $select = "SELECT * FROM category where type like '%$search%' and category_type like '%$type%' limit $index, $count";
          $result = $db->getList($select);
          return $result;
     }
     function getCategoryPage($index, $count)
     {
          $db = new connect();
          $select = "SELECT * FROM category limit $index, $count";
          $result = $db->getList($select);
          return $result;
     }
     function updateImageCategory($id, $image)
     {
          $db = new connect();
          $query = "UPDATE category SET image = '$image' WHERE id = $id";
          $result = $db->exec($query);
          return $result;
     }
     function updateCategory($id, $name, $category_type)
     {
          $db = new connect();
          $query = "UPDATE category SET type = '$name', category_type = $category_type  WHERE id = $id";
          $result = $db->exec($query);
          return $result;
     }
     function insertCategory($type, $menu, $image)
     {
          $db = new connect();
          $query = "INSERT INTO category (id, type, category_type, image) VALUES (null, '$type', $menu, '$image')";
          $result = $db->exec($query);
          return $result;
     }
     function removeCategory($id)
     {
          $db = new connect();
          $query = "DELETE FROM category WHERE id = $id";
          $result = $db->exec($query);
          return $result;
     }
}
