<?php
	try{$bdd = new PDO('mysql:host=localhost;dbname=dev;charset=utf8', 'dev', '1234');}catch (Exception $e){die('Erreur : ' . $e->getMessage()); }

	require_once 'func.php';
	if(isset($_POST['new']) && !empty($_POST['new'])){
		$message = htmlspecialchars(strip_tags( $_POST['new'] ));
		$notified = insertList($bdd, $message);
	}

	if(isset($_GET['delete']) && !empty($_GET['delete'])){
		$id = intval( $_GET['delete'] );
		$notified = deleteList($bdd, $id);
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>TodoList</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="dist/css/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="dist/css/flat-ui.css" rel="stylesheet">

    <link rel="shortcut icon" href="dist/img/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="../../dist/js/vendor/html5shiv.js"></script>
      <script src="../../dist/js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<div class="container">
		<h4>My Todo list</h4>
		<?php if(isset($notified) && !empty($notified)){echo '<h5>'. $notified .'</h5>';} ?>
		<div class="row">
			<div class="col-sm-12 col-md-12">
				<div class="todo">
					<form action="" method="POST" class="todo-search">
						<input class="todo-search-field" type="search" value="" placeholder="Search" />
					</form>
					<ul style="border-radius:0;overflow:hidden;">
						<?php
						$req = $bdd->query('SELECT * FROM todolist ORDER BY creat DESC');
							while ($res = $req->fetchObject()) {
								if($res->statut == 1){$stat = 'done';}else{$stat = 'none';}
								switch ($res->categ) {
									case 'rdv':
										$icon = 'location';
										break;
									case 'heart':
										$icon = 'heart';
										break;
									case 'mail':
										$icon = 'mail';
										break;
									case 'home':
										$icon = 'home';
										break;
									case 'chat':
										$icon = 'chat';
										break;
									case 'user':
										$icon = 'user';
										break;
									case 'time':
										$icon = 'time';
										break;

									default:
										$icon = 'list';
										break;
								}

							?>
									<li for="check<?= $res->id; ?>" id="todo<?= $res->id; ?>" class="todo-<?= $stat; ?> mytodo">
										<a href="?delete=<?= $res->id; ?>" style="color:rgb(231,76,60);" onclick="return(confirm('Etes-vous sûr de vouloir supprimer cette entrée ?'));" class="todo-icon fui-trash"></a>
										<div class="todo-icon fui-<?= $icon; ?>"></div>
										<div class="todo-content">
											<h4 class="todo-name"><?= $res->message; ?></h4>
											<?= 'Crée le : ' . date('d M y - H:i', $res->creat); ?>
										</div>
									</li>
							<?php
							}
							?>
					</ul>
					<form action="" method="POST" class="todo-search newTodo" style="border-radius:0 0 6px 6px;">
						<input class="todo-search-field" type="text" name="new" placeholder="Nouveau" />
					</form>
				</div><!-- /.todo -->
			</div><!-- /.col-md-4 -->
		</div><!-- /.row -->
	</div><!-- /.container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="dist/js/vendor/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="dist/js/flat-ui.min.js"></script>
    <script src="assets/js/application.js"></script>
  </body>
</html>
