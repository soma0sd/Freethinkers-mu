<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
/*
Latest compiled and minified CSS
*/
$CSS = array(
  get_stylesheet_uri(),
);
$SCR = array(
  "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js",
);

for($i=0;$i<count($CSS);$i+=1) {
  echo '<link rel="stylesheet" href="'.$CSS[$i].'">';
}
for($i=0;$i<count($SCR);$i+=1) {
  echo '<script src="'.$SCR[$i].'"></script>';
}
?>

<meta charset=<?php bloginfo( 'charset' )?> >
