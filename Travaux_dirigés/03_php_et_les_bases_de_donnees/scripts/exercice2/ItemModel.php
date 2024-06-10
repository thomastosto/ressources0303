<?php
class ItemModel {

    public static function fromArray(array $array) : Item {
        return new Item(
                $array['ite_id'], $array['ite_title'], $array['ite_description'],
                $array['ite_price'], $array['ite_supplier']
            );
    }
    
    public static function create(Item $item) : bool {
        $DB = MyPDO::getInstance();
        $SQL = <<<SQL
            INSERT INTO `item` (`ite_id`, `ite_title`, `ite_description`, `ite_price`, `ite_supplier`)
            VALUES (NULL, :title, :description, :price, :supplier);
SQL;
        $data = [
                ":title" => $item->getTitle(),
                ":description" => $item->getDescription(),
                ":price" => $item->getPrice(),
                ":supplier" => $item->getSupplier(),
            ];

        if(($request = $DB->prepare($SQL)) && $request->execute($data)) {
            $item->setId($DB->lastInsertId());
            return true;
        }
        else
            return false;
    }
    
    public static function read(int $id) : Item {
        $DB = MyPDO::getInstance();
        $SQL = "SELECT * FROM `item` WHERE `ite_id`=:id;";
        $data = [":id" => $id];

        if(($request = $DB->prepare($SQL)) && $request->execute($data) && 
           ($row = $request->fetch()))
            return self::fromArray($row);
        else
            return null;
    }    
    
    public static function update(Item $item) : bool {
        $DB = MyPDO::getInstance();
        $SQL = <<<SQL
            UPDATE `item` SET `ite_title`=:title, `ite_description`=:description, `ite_price`=:price
            WHERE `ite_id`=:id
SQL;
        $data = [
                ":id" => $item->getId(),
                ":title" => $item->getTitle(),
                ":description" => $item->getDescription(),
                ":price" => $item->getPrice()
            ];
        
        return (($request = $DB->prepare($SQL)) && $request->execute($data));
    }
    
    public static function delete(int $id) : bool {
        $DB = MyPDO::getInstance();
        $SQL = "DELETE FROM `item` WHERE `ite_id`=:id LIMIT 1";

        return ($request = $DB->prepare($SQL)) && $request->execute([":id" => $id]);
    }
    
}