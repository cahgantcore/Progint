<?php
	$input = $_GET['tag'];
	$nilai = $_GET['value'];
	$xml=simplexml_load_file("data/csvtoxml.xml");
	header("content-type: text/xml");
	switch($input) {
	                case null:
	                        echo "kosong";
	                        break;
	                case 'all':
	                        $xmlPath = "data/csvtoxml.xml";
	                    $doc = new DOMDocument(); 
	                    $doc->load($xmlPath); 
	                    $xml = $doc; 
	                        print $xml->saveXML();
                      break;
	                  default:
	                        $xmlPath = "data/csvtoxml.xml";
	                    $domDocument = new DOMDocument(); 
	                    $domDocument->load($xmlPath); 

	                        $doc = new DOMDocument('1.0','UTF-8');
	                    $doc->formatOutput = true;

	                    $tag = $input;
	                    $value = $nilai;
	                    $root = $doc->createElement('daftar_majalah');
	                    $root = $doc->appendChild($root);
	                    for ($i=0; $i<$domDocument->getElementsByTagName($tag)->length; $i++)
	                    {
	                        $curr = $domDocument->getElementsByTagName($tag)->item($i);  
	                        if ($curr->nodeValue == $value)
	                        {
	                            $mjl = $doc->createElement('majalah');
	                            $mjl = $root->appendChild($mjl);
	                            $judul = $doc->createElement('Judul');
	                            $judul = $mjl->appendChild($judul);
	                            $text = $doc->createTextNode($domDocument->getElementsByTagName('Judul')->item($i)->nodeValue);
	                            $text = $judul->appendChild($text);
	                            $hal = $doc->createElement('Halaman');
	                            $hal = $mjl->appendChild($hal);
	                            $text = $doc->createTextNode($domDocument->getElementsByTagName('Halaman')->item($i)->nodeValue);
	                            $text = $hal->appendChild($text);
	                        }
	                    }
	                        $xml = $doc;
	                        print $xml->saveXML();
	}
?>
