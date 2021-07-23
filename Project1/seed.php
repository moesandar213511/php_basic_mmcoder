<?php
    require 'init.php';   

    //category
    query(
        'delete from pcategory'
    );
    query(
        'alter table pcategory auto_increment = 1'
    );

    $cat = ['Hat Some','Shirt','Electronic','Drink','Beauty'];
    foreach($cat as $c){
        query(
            'insert into pcategory (slug,name) values(?,?)',
            [slug($c), $c]
        );
    }
    echo "success category..";


    $sql = query("delete from product");

    $sql = query(
        'alter table product auto_increment=1'
    );

    $product = [
        ['category_id' => 1, 'name' => "some", 'slug' => slug('some'), 'image' => "image", 'description' => "desc", 'total_quantity' => 2, 'sell_price' => 100],
        ['category_id' => 1, 'name' => "some", 'slug' => slug('some'), 'image' => "image", 'description' => "desc", 'total_quantity' => 2, 'sell_price' => 100],
        ['category_id' => 1, 'name' => "some", 'slug' => slug('some'), 'image' => "image", 'description' => "desc", 'total_quantity' => 2, 'sell_price' => 100],
        ['category_id' => 1, 'name' => "some", 'slug' => slug('some'), 'image' => "image", 'description' => "desc", 'total_quantity' => 2, 'sell_price' => 100],
        ['category_id' => 1, 'name' => "some", 'slug' => slug('some'), 'image' => "image", 'description' => "desc", 'total_quantity' => 2, 'sell_price' => 100],

    ];
    foreach($product as $p){
        query(
            "insert into product(category_id,name,slug,image,description,total_quantity,sell_price) values('{$p['category_id']}','{$p['name']}','{$p['slug']}','{$p['image']}','{$p['description']}','{$p['total_quantity']}','{$p['sell_price']}')"
        );
    }
    echo "product seed...";
?>