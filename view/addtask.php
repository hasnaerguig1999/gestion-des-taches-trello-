<?php
session_start();
require '../controller/tasks.Controller.php';
// die(print_r($_SESSION['id']));


if (!isset($_SESSION['id'])) {
	header('location:login.php');
}

if (isset($_POST['add_multiple'])) {
	// die(print($_POST['a']));

	$task = new ADD_task();
	$task->addtask();
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./css/style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<title>Gestion des tâches</title>
</head>

<body>
	<!-- Masthead -->
	<header class="masthead">

		<div class="user-settings">

			<a href="logout.php">
				<button class="user-settings-btn btn" aria-label="Create">

					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-box-arrow-right" viewBox="0 0 16 16">
						<path fill-rule="evenodd"
							d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
						<path fill-rule="evenodd"
							d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
					</svg>
				</button>
			</a>
			<a href="dashboard.php">
				<button class="user-settings-btn btn" aria-label="Create">
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house"
						viewBox="0 0 16 16">
						<path
							d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
					</svg>
				</button>
			</a>
		</div>

		<div class="logo">

			<h1><i class="fab fa-trello logo-icon" aria-hidden="true"></i>Gestion-des-projet</h1>

		</div>
		<div class="input-group">
			<div class="form-outline">


			</div>
			<form method="post" action="search.php" id="form">
				<input type="search" name="word" id="form1" class="form-control" placeholder="Search" />
				<button name="search" type="button" class="btn btn-primary">
					<i class="fas fa-search"></i>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
						viewBox="0 0 16 16">
						<path
							d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
					</svg>
				</button>
			</form>
		</div>
		</div>
	</header>
	<!-- Masthead -->
	<div class="card-body py-5 px-md-5">

		<div class="row d-flex justify-content-center">
			<div class="col-lg-3">
				<form method="post">
					<label for="task-count" class="mr-sm-2" style="color: black;">Nombre de tâches à ajouter:</label><br>
					<input type="number" id="task-count" name="task-count" min="0" onchange="createTaskForm()"
						class="form-control" id="inpu"><br>

					<div id="task-forms">
						<!-- forme de js stocke ici -->
					</div>
					<br> <button name="add_multiple" class="btn btn-primary">add tasks</button>
				</form>
			</div>
		</div>
	</div>
	</div>
	</section>
	<!-- Lists container -->

	<style>
		#form {
			display: flex;
		}

		.scroll {
			overflow: scroll;
		}

		label {
			color: black;
		}

		input#task {
			border: 1px black;
		}
	</style>
	
	<script>
		const createTaskForm = () => {
			// Récupérer le nombre de formulaires à créer
			let taskCount = document.getElementById("task-count").value;
			console.log(taskCount);
			// Vider les formulaires existants
			let taskForms = document.getElementById("task-forms");
			taskForms.innerHTML = "";
			// Créer autant de formulaires que spécifié
			for (let i = 0; i < taskCount; i++) {
				// let taskForm = document.createElement("form");
				let html = `
				<div class="form-group">
	<br>
	<select class="form-control" name="statut${i}">
		<option value="todo">A faire</option>
		<option value="doing">En cours</option>
		<option value="done">Terminer</option>
	</select><br>
	
	<label for="task_end">Date limite :</label><br>
	<br><input type="date" class="form-control" name="task_end${i}" >
	<br>
	<label>Tâche${i + 1}:</label>
	<input type="text" class="form-control" placeholder="enter description" name="task_descr${i}">
</div>
				`;
				console.log(html);
				// taskForm.innerHTML = ;
				taskForms.innerHTML += html;
			}
		}
		function addTasks() {
			// Récupérer les valeurs des formulaires
			let taskForms = document.getElementById("task-forms");
			let taskList = document.getElementById("task-list");
			for (let i = 0; i < taskForms.children.length; i++) {
				let task = taskForms.children[i].elements[0].value;
				// Vérifier si l'input est vide
				if (!task) {
					alert("Veuillez entrer une tâche valide");
					return;
				}
				// Ajouter la tâche à la liste
				let newTask = document.createElement("input");
				newTask.innerHTML = task;
				newTask.value = task;
				taskList.appendChild(newTask);
			}
			// Réinitialiser les formulaires
			taskForms.innerHTML = "";
			document.getElementById("task-count").value = "<input>";
		}
	</script>

	<script src="../view/js/script.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
		crossorigin="anonymous"></script>
</body>

</html>