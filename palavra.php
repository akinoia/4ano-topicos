<?php

function stripUnwantedTagsAndAttrs($html_str){
  $xml = new DOMDocument();
//Suppress warnings: proper error handling is beyond scope of example
  libxml_use_internal_errors(true);
//List the tags you want to allow here, NOTE you MUST allow html and body otherwise entire string will be cleared
  $allowed_tags = array("Anus","Baba-ovo","Babaovo","Babaca","Bacura","Bagos","Baitola","Bebum","Besta","Bicha","Bisca","Bixa","Boazuda","Boceta","Boco","Boiola","Bolagato","Boquete","Bosseta","Bosta","Bostana","Brecha","Brexa","Brioco","Bronha","Buca","Buceta","Bunda","Bunduda","Burra","Burro","Busseta","Cachorra","Cachorro","Cadela","Caga","Cagado","Cagao","Cagona","Canalha","Caralho","Casseta","Cassete","Checheca","Chereca","Chibumba","Chibumbo","Chifruda","Chifrudo","Chota","Chochota","Chupada","Chupado","Clitoris","Cocaina","Coco","Corna","Corno","Cornuda","Cornudo","Corrupta","Corrupto","Cretina","Cretino","Cruz-credo","Cu","Culhao","Curalho","Cuzao","Cuzuda","Cuzudo","Debil","Debiloide","Defunto","Demonio","Difunto","Doida","Doido","Egua","Escrota","Escroto","Esporrada","Esporrado","Esporro","Estupida","Estupidez","Estupido","Fedida","Fedido","Fedor","Fedorenta","Feia","Feio","Feiosa","Feioso","Feioza","Feiozo","Fenda","Foda","Fodao","Fode","Fodida","Fodido","Fornica","Fudendo","Fudecao","Fudida","Fudido","Furada","Furado","Furão","Furnica","Furnicar","Furona","Gaiata","Gaiato","Gay","Gonorrea","Gonorreia","Gosma","Gosmenta","Gosmento","Grelinho","Grelo","Homo-sexual","Homossexual","Homossexual","Idiota","Idiotice","Imbecil","Iscrota","Iscroto","Japa","Ladra","Ladrao","Ladroeira","Ladrona","Lalau","Leprosa","Leproso","Lésbica","Macaca","Macaco","Machona","Machorra","Manguaca","Masturba","Meleca","Merda","Mija","Mijada","Mijado","Mijo","Mocrea","Mocreia","Moleca","Moleque","Mondronga","Mondrongo","Naba","Nadega","Nojeira","Nojenta","Nojento","Nojo","Olhota","Otaria","Otario","Paca","Paspalha",
  "Paspalhao","Paspalho","Pau","Peia","Peido","Pemba","Pênis","Pentelha","Pentelho","Perereca","Peru","Pica","Picao","Pilantra","Piranha","Piroca","Piroco","Piru","Porra","Prega","Prostibulo","Prostituta","Prostituto","Punheta","Punhetao","Pus","Puta","Puto","Puxa-saco","Puxasaco","Rabao","Rabo","Rabuda","Rabudao","Rabudo","Rabudona","Racha","Rachada","Rachadao","Rachadinha","Rachadinho","Rachado","Ramela","Remela","Retardada","Retardado","Ridícula","Rola","Rolinha","Rosca","Sacana","Safada","Safado","Sapatao","Sifilis","Siririca","Tarada","Tarado","Testuda","Tezao","Tezuda","Tezudo","Trocha","Troucha","Trouxa","Troxa","Vaca","Vagabunda","Vagabundo","Vagina","Veada","Veadao","Veado","Viada","Víado","Viadao","Xerereca","Xexeca","Xibiu","Xota","Xochota","Xoxota","Xana","Xaninha");
//List the attributes you want to allow here
  $allowed_attrs = array ("class", "id", "style");
  if (!strlen($html_str)){return false;}
  if ($xml->loadHTML($html_str, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD)){
    foreach ($xml->getElementsByTagName("*") as $tag){
      if (!in_array($tag->tagName, $allowed_tags)){
        $tag->parentNode->removeChild($tag);
      }else{
        foreach ($tag->attributes as $attr){
          if (!in_array($attr->nodeName, $allowed_attrs)){
            $tag->removeAttribute($attr->nodeName);
          }
        }
      }
    }
  }
  return $xml->saveHTML();
}
?>