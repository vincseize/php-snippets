function sortArray_ByKeyName($keyName,$order, $a, $b) {
    if($order=="ASC"){
        return $a[$keyName] > $b[$keyName];
    }
    if($order=="DESC"){
        return $a[$keyName] < $b[$keyName];
    } 
}

// $cats = Array ( 
//            [0] => Array ( [icon] => cat-neutre.jpg [categorie] => Anecdotes ) 
//            [1] => Array ( [icon] => histoire.png [categorie] => Histoire ) 
//            [2] => Array ( [icon] => histoires.jpg [categorie] => Bretagne ) [3] => Array ( [icon] => cat-neutre.jpg [categorie] => Tranches de Vies ) 
//            )

print_r($cats);
            
$keyName = "categorie"; 
$order = "ASC"; 
usort($cats, function ($a, $b) use ($keyName,$order) {
    return sortArray_ByKeyName($keyName, $order, $a, $b);
});

print_r($cats);
