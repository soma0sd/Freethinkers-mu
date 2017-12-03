<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php
// Latest compiled and minified CSS
$CSS = array(
  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css",
  "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css",
  get_template_directory_uri()."/css/front.css",
  get_stylesheet_uri()
);
$SCR = array(
  "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js",
  "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js",
);

for($i=0;$i<count($CSS);$i+=1) {
  echo '<link rel="stylesheet" href="'.$CSS[$i].'">';
}
for($i=0;$i<count($SCR);$i+=1) {
  echo '<script src="'.$SCR[$i].'"></script>';
}
?>

<meta charset=<?php bloginfo( 'charset' )?> >
